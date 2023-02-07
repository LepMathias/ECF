<?php
require 'Schedules.php';
class SchedulesManager
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getSchedules()
    {
        $statement = $this->pdo->prepare('SELECT * FROM schedules');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Schedules');
        $statement->execute();

        return $statement->fetchAll();
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
        echo "exe Ok";
        $statement->execute();

    }
}