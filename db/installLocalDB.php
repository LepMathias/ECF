<?php
include 'confDB.php';
try {
/**
 * Création PDO dsn = MySQL
 */
    $pdo = new PDO("mysql:host=$HOST", $USER, $PWD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/**
 * Install DataBase Restaurant
 */
    $pdo->exec("DROP DATABASE IF EXISTS $DB");
    $pdo->exec("CREATE DATABASE $DB");
    $restoPdo = new PDO("mysql:host=$HOST;dbname=$DB", $USER, $PWD);

/**
 * Création table "users"
 */
    $restoPdo->exec('CREATE TABLE users (
        id CHAR(36) PRIMARY KEY NOT NULL,
        lastname VARCHAR(50) NOT NULL,
        firstname VARCHAR(50) NOT NULL,
        email VARCHAR(254) NOT NULL,
        phoneNumber VARCHAR(20) NOT NULL,
        password CHAR(72) NOT NULL,
        defaultNbrGuest VARCHAR(2),
        allergies VARCHAR(150),
        isAdmin INT(1) DEFAULT 0)');

    /*Création du 1er ADMIN*/
    $statement = $restoPdo->prepare('INSERT INTO users (
       id, lastname, firstname, email, phoneNumber, password, defaultNbrGuest, allergies, isAdmin)
       VALUES (UUID(), :lastname, :firstname, :email, :phoneNumber, :password, :nbr, :allergies, :isAdmin)');
    $statement->bindValue(':lastname', 'Admin');
    $statement->bindValue(':firstname', 'Admin');
    $statement->bindValue(':email', 'admin@lqa.fr');
    $statement->bindValue(':phoneNumber', '0202');
    $statement->bindValue(':password', password_hash('0202', PASSWORD_BCRYPT));
    $statement->bindValue(':nbr', 2);
    $statement->bindValue(':allergies', '');
    $statement->bindValue(':isAdmin', 1);

    $statement->execute();

    /*Création client 1*/
    $statement = $restoPdo->prepare('INSERT INTO users (
       id, lastname, firstname, email, phoneNumber, password, defaultNbrGuest, allergies, isAdmin)
       VALUES (UUID(), :lastname, :firstname, :email, :phoneNumber, :password, :nbr, :allergies, :isAdmin)');
    $statement->bindValue(':lastname', 'Dupont');
    $statement->bindValue(':firstname', 'Gérard');
    $statement->bindValue(':email', 'gerard@dpd.fr');
    $statement->bindValue(':phoneNumber', '0202');
    $statement->bindValue(':password', password_hash('0202', PASSWORD_BCRYPT));
    $statement->bindValue(':nbr', 2);
    $statement->bindValue(':allergies', '');
    $statement->bindValue(':isAdmin', 0);

    $statement->execute();

        /*Recup de son UUID*/
        $statement= $restoPdo->prepare('SELECT id FROM users WHERE lastname = "Dupont"');
        $statement->execute();
        $user1 = $statement->fetch()[0];

    /*Création client 2*/
    $statement = $restoPdo->prepare('INSERT INTO users (
       id, lastname, firstname, email, phoneNumber, password, defaultNbrGuest, allergies, isAdmin)
       VALUES (UUID(), :lastname, :firstname, :email, :phoneNumber, :password, :nbr, :allergies, :isAdmin)');
    $statement->bindValue(':lastname', 'Martinel');
    $statement->bindValue(':firstname', 'Jean');
    $statement->bindValue(':email', 'jean@mtl.fr');
    $statement->bindValue(':phoneNumber', '0303');
    $statement->bindValue(':password', password_hash('0202', PASSWORD_BCRYPT));
    $statement->bindValue(':nbr', 2);
    $statement->bindValue(':allergies', 'Gluten - Lactose');
    $statement->bindValue(':isAdmin', 0);

    $statement->execute();

        /*Recup de son UUID*/
        $statement= $restoPdo->prepare('SELECT id FROM users WHERE lastname = "Martinel"');
        $statement->execute();
        $user2 = $statement->fetch()[0];


    /**
 * Création table "reservations
 */
    $restoPdo->exec('CREATE TABLE reservations (
        userId CHAR(36),
        id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        date CHAR(10) NOT NULL,
        hour CHAR(5) NOT NULL,
        nbrOfGuest CHAR(3) NOT NULL,
        lastname VARCHAR(50),
        firstname VARCHAR(50),
        phoneNumber VARCHAR(50),
        allergies VARCHAR(150),
        FOREIGN KEY (userId) REFERENCES users(id)
        )');

    /*Insertion de réservations*/
    $statement = $restoPdo->prepare("INSERT INTO reservations (userId, date, hour, nbrOfGuest, lastname, firstname, phoneNumber, allergies)
                                VALUES (:user1, '2023-02-16', '12:00', '3', NULL, NULL, NULL, NULL),
                                       (NULL, '2023-02-16', '12:15', '5', 'Dupond', 'Albert', '0203040506', 'Gluten'),
                                       (NULL, '2023-02-16', '12:30', '2', 'Martin', 'Bernard', '0304050607', 'Lactose'),
                                       (:user2, '2023-02-16', '12:45', '6', NULL, NULL, NULL, 'Gluten - Lactose'),

                                       (NULL, '2023-02-16', '19:00', '2', 'Martin', 'Bernard', '0304050607', 'Lactose'),
                                       (:user1, '2023-02-16', '19:15', '2', NULL, NULL, NULL, NULL),
                                       (:user2, '2023-02-16', '19:30', '3', NULL, NULL, NULL, 'Gluten - Lactose'),
                                       (NULL, '2023-02-16', '19:45', '2', 'Dupond', 'Albert', '0203040506', 'Gluten')");
    $statement->bindValue(':user1', $user1);
    $statement->bindValue(':user2', $user2);
    $statement->execute();

/**
 * Création table categoriesMeal
 */
    $restoPdo->exec('CREATE TABLE categoriesMeal (
        id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL);');

    /*Alimentation de la categoriesMeal table*/
    $restoPdo->exec("INSERT INTO categoriesMeal (name) 
        VALUES ('starter'), 
               ('main course'), 
               ('dessert')");

/**
 * Création table Meal
 */
    $restoPdo->exec('CREATE TABLE meals (
        id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(50) NOT NULL,
        description VARCHAR(250),
        price CHAR(3) NOT NULL,
        categoryId INT(1) NOT NULL,
        FOREIGN KEY (categoryId) REFERENCES categoriesMeal(id));');

    /*Insertion d'entrées, de plats et de desserts*/
    $restoPdo->exec('INSERT INTO meals (title, description, price, categoryId)
                                VALUES  ("Terrine de cochon", "Aux noisettes et abricots secs, sucrine et gel de pommes", "22", "1"),
                                        ("Millefeuille de gorgonzola", "Au mascarpone aux poiresde Savoie et noix de pécan", "20", "1"),
                                        ("Foie gras de canard", "Mariné au cognac et Porto, confit d\'oignon au balsamique", "29", "1"),

                                        ("Suprême de poulet fermier", "condiments rougaille et guacamole, accras de légumes et patate douce", "32", "2"),
                                        ("Poitrine de cochon confite", "Oeufs parfait meurette, champignons, truffes", "35", "2"),
                                        ("Tartare de boeuf", "Charolais assaisonné en cuisine", "26", "2"),
                                        
                                        ("Rafraichie d\'agrumes", "grenade à la citronelle et gingembre, sorbet citron", "12", "3"),
                                        ("Poire de Savoie", "Pochée façon belle Hélène", "12", "3"),
                                        ("Panna cotta fruit de la passion", "Ananas mariné à la vanille et citron vert", "12", "3")');

/**
 * Création table Menu
 */
    $restoPdo->exec('CREATE TABLE menus (
        id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(50) NOT NULL,
        description VARCHAR(250) NOT NULL,
        availability VARCHAR(150) NOT NULL,
        price CHAR(3) NOT NULL)');

    /*Insertion de menus*/
    $restoPdo->exec('INSERT INTO menus (title, description, availability, price)
                                VALUES  ("Menu du jour", "Entrée, Plat, Dessert (unique, sans choix)", "Le midi du mercredi au vendredi", "28"),
                                        ("Menu Fraicheur", "Entrée, Plat, dessert (au choix, à la carte)", "Le soir du mercredi au vendredi, le midi de samedi à dimanche", "60")');

/**
 * Création table schedules
 */
    $restoPdo->exec('CREATE TABLE schedules (
        id INT(1) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        day VARCHAR(8) NOT NULL,
        startDej CHAR(7),
        endDej CHAR(7),
        startDin CHAR(7),
        endDin CHAR(7)
        )');

    /*Alimentation de la schedules table*/
    $restoPdo->exec("INSERT INTO schedules (day, startDej, endDej, startDin, endDin) 
                                VALUES ('Lundi', '', '', '', ''), 
                                       ('Mardi', '', '', '', ''),
                                       ('Mercredi', '12:00', '14:00', '19:00', '21:30'),
                                       ('Jeudi', '12:00', '14:00', '19:00', '21:30'),
                                       ('Vendredi', '12:00', '14:00', '19:00', '21:30'),
                                       ('Samedi', '12:00', '14:00', '19:00', '21:30'),
                                       ('Dimanche', '12:00', '14:00', '19:00', '21:30')");

/**
 * Création table settings
 */
    $restoPdo->exec('CREATE TABLE settings (
        id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        content VARCHAR(250)
    )');

    /*Alimentation de la table settings*/
    $restoPdo->exec("INSERT INTO settings (name, content) 
                                VALUES  ('maxOfGuest', '12'),
                                        ('schedulesFooter', 'du mercredi au dimanche de 12h00 à 14h00 et de 19h00 à 21h30')");

    echo "Database successfully installed";

} catch (PDOException $e) {
    file_put_contents('dblogs.log', $e->getMessage().PHP_EOL, FILE_APPEND);
}