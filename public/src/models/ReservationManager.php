<?php
require 'Reservation.php';
class ReservationManager
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function addReservationUId(string $date, string $hour, string $nbrOfGuest, string $userId)
    {
        $statement = $this->pdo->prepare('INSERT INTO reservations 
    (date, hour, nbrOfGuest, userId)
    VALUES (:date, :hour, :nbrOfGuest, :userId)');
        $statement->bindValue(':date', $date);
        $statement->bindValue(':hour', $hour);
        $statement->bindValue(':nbrOfGuest', $nbrOfGuest);
        $statement->bindValue(':userId', $userId);

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
}