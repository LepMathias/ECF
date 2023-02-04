<?php
class Reservation
{
    public int $id;
    public string $date;
    public string $hour;
    public int $nbrOfGuest;
    public User $user;
}