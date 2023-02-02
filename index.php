<?php
require 'public/src/models/PostManager.php';
require 'public/src/models/UserManager.php';
require 'public/src/models/ReservationManager.php';

session_start();
$pdo = new PDO('mysql:host=localhost;dbname=restaurant', 'root', '');
$postManager = new PostManager($pdo);
$userManager = new UserManager($pdo);
$reservationManager = new ReservationManager($pdo);

if (!empty($_POST['note'])) {

    $postManager->addFeedback($_POST['note'], htmlentities($_POST['title']), htmlentities($_POST['content']));
}
$posts = $postManager->getPosts();

if (!empty($_POST['log-in_form'])) {

    try {
        $user = $userManager->connectUser(htmlspecialchars($_POST['email']), htmlentities($_POST['password']));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

if (!empty($_POST['sign-up_form'])) {
    $userManager->addUser(htmlentities($_POST['lastname']), htmlentities($_POST['firstname']), htmlspecialchars($_POST['email']),
        htmlentities($_POST['phoneNumber']), $_POST['password'], htmlentities($_POST['defaultNbrGuest']), htmlentities($_POST['allergies']));
}

if (!empty($_POST['reservation_form'])) {
    if (isset($_SESSION['id'])) {
        $reservationManager->addReservationUId($_POST['date'], $_POST['hour'], $_POST['nbrOfGuest'], $_SESSION['id']);
    } else {
        $reservationManager->addReservation($_POST['date'], $_POST['hour'], $_POST['nbrOfGuest'], $_POST['lastname'], $_POST['firstname'], $_POST['phoneNumber'], $_POST['allergies']);
    }
}


/*
    if (!isset($_SESSION['id'])) {

    } else {

    }
*/


include 'view.php';

