<?php
require 'Menu.php';
class MenuManager
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function addMenu($title, $description, $price)
    {
        $statement = $this->pdo->prepare('INSERT INTO menus (
                   title, description, price) 
                   VALUES (:title, :description, :price)');
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);

        $statement->execute();
    }

    public function getMenus()
    {
        $statement = $this->pdo->prepare('SELECT * FROM menus');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Menu');
        $statement->execute();

        return $statement->fetchAll();
    }
    public function deleteMenu($id)
    {
        $this->pdo->exec("DELETE FROM menus WHERE id=$id");
    }
}