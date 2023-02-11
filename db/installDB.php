<?php
try {
/*Création PDO dsn = MySQL*/
    $pdo = new PDO('mysql:host=127.0.0.1', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /* Install DataBase Restaurant*/
    if ($pdo->exec('DROP DATABASE IF EXISTS restaurant') !== false) {
        if ($pdo->exec('CREATE DATABASE restaurant') !== false) {
            $restoPdo = new PDO('mysql:host=127.0.0.1;dbname=restaurant', 'root', '');

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
                    defaultNbrGuest (2),
                    allergies VARCHAR(150),
                    isAdmin INT(1) DEFAULT 0
                    )') !== false){

                    /*Création du 1er ADMIN*/
                    $statement = $restoPdo->prepare('INSERT INTO users (
                   id, lastname, firstname, email, phoneNumber, password, defaultNbrGuest, allergies, isAdmin)
                   VALUES (UUID(), :lastname, :firstname, :email, :phoneNumber, :password, :nbr, :allergies, :isAdmin)');
                    $statement->bindValue(':lastname', 'Admin');
                    $statement->bindValue(':firstname', 'Admin');
                    $statement->bindValue(':email', 'admin@gmail.com');
                    $statement->bindValue(':phoneNumber', '0202');
                    $statement->bindValue(':password', password_hash('0202', PASSWORD_BCRYPT));
                    $statement->bindValue(':nbr', 2);
                    $statement->bindValue(':allergies', '');
                    $statement->bindValue(':isAdmin', 1);

                    if ($statement->execute()) {

                        /*Création table "reservations*/
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
                            )') !== false) {

                            /*Création table categoriesMeal*/
                            if ($restoPdo->exec('CREATE TABLE categoriesMeal (
                                id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                name VARCHAR(20) NOT NULL);') !== false) {

                                /*Alimentation de la categoriesMeal table*/
                                $restoPdo->exec("INSERT INTO categoriesMeal (name) VALUES ('starter')");
                                $restoPdo->exec("INSERT INTO categoriesMeal (name) VALUES ('main course')");
                                $restoPdo->exec("INSERT INTO categoriesMeal (name) VALUES ('dessert')");

                                /*Création table Meal*/
                                if ($restoPdo->exec('CREATE TABLE meals (
                                id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                title VARCHAR(50) NOT NULL,
                                description VARCHAR(250),
                                price CHAR(3) NOT NULL,
                                categoryId INT(1) NOT NULL,
                                FOREIGN KEY (categoryId) REFERENCES categoriesMeal(id));') !== false) {

                                    /*Création table Menu*/
                                    if ($restoPdo->exec('CREATE TABLE menus (
                                    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                    title VARCHAR(50) NOT NULL,
                                    availability VARCHAR(150) NOT NULL,
                                    description VARCHAR(250) NOT NULL,
                                    price CHAR(3) NOT NULL)') !== false) {

                                        /*Création table schedules*/
                                        if($restoPdo->exec('CREATE TABLE schedules (
                                            id INT(1) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                            day VARCHAR(8) NOT NULL,
                                            startDej CHAR(5),
                                            endDej CHAR(5),
                                            startDin CHAR(5),
                                            endDin CHAR(5)
                                            )') !== false) {
                                            /*Alimentation de la schedules table*/
                                            $restoPdo->exec("INSERT INTO schedules (day) 
                                                                VALUES ('Lundi')");
                                            $restoPdo->exec("INSERT INTO schedules (day) 
                                                                VALUES ('Mardi')");
                                            $restoPdo->exec("INSERT INTO schedules (day, startDej, endDej, startDin, endDin) 
                                                                VALUES ('Mercredi', '12:00', '14:00', '19:00', '21:30')");
                                            $restoPdo->exec("INSERT INTO schedules (day, startDej, endDej, startDin, endDin) 
                                                                VALUES ('Jeudi', '12:00', '14:00', '19:00', '21:30')");
                                            $restoPdo->exec("INSERT INTO schedules (day, startDej, endDej, startDin, endDin) 
                                                                VALUES ('Vendredi', '12:00', '14:00', '19:00', '21:30')");
                                            $restoPdo->exec("INSERT INTO schedules (day, startDej, endDej, startDin, endDin) 
                                                                VALUES ('Samedi', '12:00', '14:00', '19:00', '21:30')");
                                            $restoPdo->exec("INSERT INTO schedules (day, startDej, endDej, startDin, endDin) 
                                                                VALUES ('Dimanche', '12:00', '14:00', '19:00', '21:30')");
                                            echo "Installation réussie";
                                        } else {
                                            echo "Impossible de créer table 'schedules'";
                                        }
                                    } else {
                                        echo "Impossible de créer la table menus";
                                    }
                                } else {
                                    echo "Impossible de créer la table meals";
                                }
                            } else {
                                echo "Impossible de créer la table categorieMeal";
                            }
                        } else {
                            echo "Impossible de créer la table 'reservations'";
                        }
                    } else {
                        echo "Impossible de créer Admin";
                    }
                } else {
                    echo "Impossible de créer la table 'users'";
                }
            } else {
                echo "Impossible de créer la table 'posts'";
            }
        } else {
            echo "Impossible de de créer la DB restauarnt";
        }
    } else {
        echo "Impossible de détruire la DB éxistante";
    }
} catch (PDOException $e) {
    file_put_contents('dblogs.log', $e->getMessage().PHP_EOL, FILE_APPEND);
}
/*

INSERT INTO categoriesMeal (id, name) VALUES ('1', 'starter')
INSERT INTO categoriesMeal (id, name) VALUES ('1', 'main course')
INSERT INTO categoriesMeal (id, name) VALUES ('1', 'dessert')



*/