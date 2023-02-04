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
(category, title, description, price)
VALUES (:category, :title, :description, :price)');
        $statement->bindValue(':category', $category);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);

        if($statement->execute()) {
            echo "Envoyé en DB";
        }
    }
    public function getMeal()
    {

    }
}
