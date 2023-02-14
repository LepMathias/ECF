<?php
require '../src/models/MealManager.php';
require '../src/models/MenuManager.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=restaurant', 'root', '');

/**
 * Display meals and menus on Menus Page
 */
$mealManager = new MealManager($pdo);
$starters = $mealManager->getMeals(1);
$mainCourses = $mealManager->getMeals(2);
$desserts = $mealManager->getMeals(3);

$menuManager = new MenuManager($pdo);
$menus = $menuManager->getMenus();