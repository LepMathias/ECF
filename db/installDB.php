<?php
try {
/*Création PDO dsn = MySQL*/
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* Install DataBase Restaurant*/
    if ($pdo->exec('DROP DATABASE IF EXISTS restaurant') !== false) {
        if ($pdo->exec('CREATE DATABASE restaurant') !== false) {
            $restoPdo = new PDO('mysql:host=localhost;dbname=restaurant', 'root', '');

/*Création table "posts"*/
            if ($restoPdo->exec('CREATE TABLE posts (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    note INT(1) NOT NULL,
    title VARCHAR(50),
    message VARCHAR(200)
)') !== false) {

/*Création table "users"*/
                if ($restoPdo->exec('CREATE TABLE users (
    id CHAR(36) PRIMARY KEY NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    firstName VARCHAR(50) NOT NULL,
    email VARCHAR(254) NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,
    password CHAR(60) NOT NULL,
    defaultNbrGuest INT(2) NOT NULL,
    allergies VARCHAR(150),
    isAdmin INT(1) DEFAULT 0
)') !== false){
                    echo "Installation réussie";
                }
            } else {
                echo "Impossible de créer la table 'posts'";
            }
        } else {
            echo "Impossbil de de créer la DB restauarnt";
        }
    } else {
        echo "Impossible de détruire la DB éxistante";
    }
} catch (PDOException $e) {
    file_put_contents('dblogs.log', $e->getMessage(), FILE_APPEND);
}

