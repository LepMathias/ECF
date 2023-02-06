<?php
require 'public/src/models/PostManager.php';
require 'public/src/models/UserManager.php';
require 'public/src/models/ReservationManager.php';
require 'public/src/models/PictureManager.php';
require 'public/src/models/MealManager.php';

session_start();
$pdo = new PDO('mysql:host=localhost;dbname=restaurant', 'root', '');
$postManager = new PostManager($pdo);
$userManager = new UserManager($pdo);
$reservationManager = new ReservationManager($pdo);
$mealManager = new MealManager($pdo);

if (!empty($_POST['category']))
    $mealManager->addMeal($_POST['category'], $_POST['title'], $_POST['decription'], $_POST['price']);

include 'parametersView.php';