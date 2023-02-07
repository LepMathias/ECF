<?php
require 'Meal.php';
class MealManager
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function addMeal(int $category, string $title, string $description, string $price)
    {
        $statement = $this->pdo->prepare('INSERT INTO meals
                    (categoryId, title, description, price)
                    VALUES (:category, :title, :description, :price)');
        $statement->bindValue(':category', $category);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);

        $statement->execute();
    }
    public function getMeals($i)
    {
        require_once 'Meal.php';
        $statement = $this->pdo->prepare("SELECT * FROM meals WHERE categoryId=$i");
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Meal');
        $statement->execute();

        return $statement->fetchAll();
    }
    public function deleteMeal($id)
    {
        $this->pdo->exec("DELETE FROM meals WHERE id=$id");
    }
}
