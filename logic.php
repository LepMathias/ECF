<?php
require 'public/src/models/UserManager.php';
require 'public/src/models/ReservationManager.php';
require 'public/src/models/PictureManager.php';
require 'public/src/models/SchedulesManager.php';
require 'public/src/models/SettingManager.php';
include 'db/confDB.php';

try {
    $pdo = new PDO("mysql:host=$HOST;dbname=$DB", $USER, $PWD);

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

    /**
     * Update / Read Schedules on footer
     */
    $settingManager = new SettingManager($pdo);
    $schedulesFooter = $settingManager->getSettings('schedulesFooter');
    if(!empty($_POST['schedulesFooter'])) {
        $settingManager->updateSetting($_POST['schedulesFooter'], $_POST['settingId']);
    }
} catch (PDOException $e){
    file_put_contents('dblogs.log', $e->getMessage().PHP_EOL, FILE_APPEND);
    echo "<script>alert('Une erreur s\'est produite. Contactez l\'administrateur')</script>";
}