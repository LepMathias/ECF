<?php
require 'public/src/models/PostManager.php';
require 'public/src/models/UserManager.php';
require 'public/src/models/ReservationManager.php';
require 'public/src/models/PictureManager.php';
require 'public/src/models/SchedulesManager.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=restaurant', 'root', '');

/**
 * Posts Gestion -> Future Fonction
 */
$postManager = new PostManager($pdo);
if (!empty($_POST['note'])) {
    $postManager->addFeedback($_POST['note'], htmlentities($_POST['title']), htmlentities($_POST['content']));
}
$posts = $postManager->getPosts();

/**
 * User gestion -> sign_up and log_in
 */
$userManager = new UserManager($pdo);
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

/**
 * Create Reservation
 */
$reservationManager = new ReservationManager($pdo);
if (!empty($_POST['reservation_form'])) {
    if (isset($_SESSION['id'])) {
        $reservationManager->addReservationUId($_POST['date'], $_POST['hour'], $_POST['nbrOfGuest'], $_SESSION['id'], $_POST['allergies']);
    } else {
        $reservationManager->addReservation($_POST['date'], $_POST['hour'], $_POST['nbrOfGuest'], $_POST['lastname'], $_POST['firstname'], $_POST['phoneNumber'], $_POST['allergies']);
    }
}

/**
 * Display Pictures in carousel
 */
$pictureManager = new PictureManager();

$firstPic = $pictureManager->getFirstPic();
$files = $pictureManager->getRestPic();

/**
 * Display Schedules
 */
$schedulesManager = new SchedulesManager($pdo);
$schedules = $schedulesManager->getSchedules();

