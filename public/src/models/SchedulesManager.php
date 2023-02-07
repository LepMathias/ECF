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
    public function getMenus()
    {
        $statement = $this->pdo->prepare('SELECT * FROM menus');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Menu');
        $statement->execute();

        return $statement->fetchAll();
    }
}