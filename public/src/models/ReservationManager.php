<?php
require 'Reservation.php';
class ReservationManager
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function addReservationUId(string $date, string $hour, string $nbrOfGuest, string $userId, string $allergies)
    {
        $statement = $this->pdo->prepare('INSERT INTO reservations 
                    (date, hour, nbrOfGuest, userId, allergies)
                    VALUES (:date, :hour, :nbrOfGuest, :userId, :allergies)');
        $statement->bindValue(':date', $date);
        $statement->bindValue(':hour', $hour);
        $statement->bindValue(':nbrOfGuest', $nbrOfGuest);
        $statement->bindValue(':userId', $userId);
        $statement->bindValue(':allergies', $allergies);

        $statement->execute();
    }
    public function addReservation(string $date, string $hour, string $nbrOfGuest, string $lastname, string $firstname, string $phoneNumber, string $allergies)
    {
        $statement = $this->pdo->prepare('INSERT INTO reservations
    (date, hour, nbrOfGuest, lastname, firstname, phoneNumber, allergies)
    VALUES (:date, :hour, :nbrOfGuest, :lastname, :firstname, :phoneNumber, :allergies)');
        $statement->bindValue(':date', $date);
        $statement->bindValue(':hour', $hour);
        $statement->bindValue(':nbrOfGuest', $nbrOfGuest);
        $statement->bindValue(':lastname', $lastname);
        $statement->bindValue(':firstname', $firstname);
        $statement->bindValue(':phoneNumber', $phoneNumber);
        $statement->bindValue(':allergies', $allergies);

        $statement->execute();
    }
    public function getCountLunch(string $date, string $startDej, string $endDej)
    {
        $statement = $this->pdo->prepare("SELECT 
                                    SUM(DISTINCT nbrOfGuest)
                                    FROM reservations 
                                    WHERE date = :d
                                    AND hour BETWEEN :a AND :b");
        $statement->bindValue(':d', $date);
        $statement->bindValue(':a', $startDej);
        $statement->bindValue(':b', $endDej);

        return $statement->fetch();
    }
    public function getCountDiner(string $date, string $startDin, string $endDin)
    {
        $statement = $this->pdo->prepare("SELECT SUM(DISTINCT nbrOfGuest)
                                    FROM reservations 
                                    WHERE date = :d 
                                    AND hour BETWEEN :a AND :b");
        $statement->bindValue(':d', $date);
        $statement->bindValue(':a', $startDin);
        $statement->bindValue(':b', $endDin);

        return $statement->fetch();
    }
}