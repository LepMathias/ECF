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
    lastname VARCHAR(50) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    email VARCHAR(254) NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,
    password CHAR(60) NOT NULL,
    defaultNbrGuest INT(2) NOT NULL,
    allergies VARCHAR(150),
    isAdmin INT(1) DEFAULT 0
)') !== false){
/*Création table "reservations Utilisateurs connectés*/
                    if ($restoPdo->exec('CREATE TABLE reservations (
    userId CHAR(36),
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREmENT,
    date CHAR(10) NOT NULL,
    hour CHAR(5) NOT NULL,
    nbrOfGuest CHAR(3) NOT NULL,
    lastname VARCHAR(50),
    firstname VARCHAR(50),
    phoneNumber VARCHAR(50),
    allergies VARCHAR(150),
    FOREIGN KEY (userId) REFERENCES users(id)
    )')) {
/*Création table "reservations Utilisateurs non connectés*/
   /*                     if ($restoPdo->exec('CREATE TABLE reservationsNoLog (
    userId CHAR(36),
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREmENT,
    date CHAR(10) NOT NULL,
    hour CHAR(5) NOT NULL,
    nbrOfGuest CHAR(3) NOT NULL,
    FOREIGN KEY (userId) REFERENCES users(id)
    )')) {
                            echo "Installation réussie";
                        } else {
                            "Impossible de créer la table 'reservationsNoLog'";
                        }*/
                        echo "Installation réussie";
                    } else {
                        echo "Impossible de créer la table 'reservationsLogIn'";
                    }
                } else {
                    echo "Impossible de créer la table 'users'";
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

