<?php

namespace managers;
use PDO;
use models\Schedules;

require './src/models/Schedules.php';

class SchedulesManager
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getSchedules()
    {
        $statement = $this->pdo->prepare('SELECT * FROM schedules');
        $statement->setFetchMode(PDO::FETCH_CLASS, Schedules::class);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getSchedulesDay($day)
    {
        $statement = $this->pdo->prepare('SELECT * FROM schedules WHERE day = :day');
        $statement->bindValue(':day', $day);
        $statement->setFetchMode(PDO::FETCH_CLASS, Schedules::class);
        $statement->execute();

        return $statement->fetch();
    }

    public function updateSchedules(string $startDej, string $endDej, string $startDin, string $endDin, int $id)
    {
        $statement = $this->pdo->prepare("UPDATE schedules
            SET startDej = :startDej, endDej = :endDej, startDin = :startDin, endDin = :endDin
            WHERE id = :id");
        $statement->bindValue(':startDej', $startDej);
        $statement->bindValue(':endDej', $endDej);
        $statement->bindValue(':startDin', $startDin);
        $statement->bindValue(':endDin', $endDin);
        $statement->bindValue(':id', $id);

        $statement->execute();
    }

    public function getAvailableHours(string $day, $nbrOnLunch, $nbrOnDiner, $maxOfGuest): array
    {
        $availableHours = [];
        $schedule = $this->getSchedulesDay($day);
        if (strlen($schedule->startDej) === 0) {
            $availableHours['lunch'] = "close";
        } else if ($nbrOnLunch > $maxOfGuest) {
            $availableHours['lunch'] = "full";
        } else {
            $availableLunchHours = [];
            $countLunch = strtotime($schedule->startDej);
            $countEndLunch = strtotime($schedule->endDej) - 3600;
            $availableLunchHours[] = $schedule->startDej;
            while ($countLunch < $countEndLunch) {
                $countLunch += 900;
                $availableLunchHours[] = date('H:i', $countLunch);
            }
            $availableHours['lunch'] = $availableLunchHours;
        }
        if (strlen($schedule->startDin) === 0) {
            $availableHours['diner'] = "close";
        } else if ($nbrOnDiner > $maxOfGuest) {
            $availableHours['diner'] = "full";
        } else {
            $availableDinerHours = [];
            $countDiner = strtotime($schedule->startDin);
            $countEndDiner = strtotime($schedule->endDin) - 3600;
            $availableDinerHours[] = $schedule->startDin;
            while ($countDiner < $countEndDiner) {
                $countDiner += 900;
                $availableDinerHours[] = date('H:i', $countDiner);
            }
            $availableHours['diner'] = $availableDinerHours;
        }
        return $availableHours;
    }
}