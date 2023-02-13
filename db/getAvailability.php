<?php
require '../public/src/models/SchedulesManager.php';
require '../public/src/models/SettingManager.php';
require '../public/src/models/ReservationManager.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=restaurant', 'root', '');
$schedulesManager = new SchedulesManager($pdo);
$settingManager = new SettingManager($pdo);
$reservationManager = new ReservationManager($pdo);

$s = date(mktime(0,0,0,2,16,2023));
$q = $_GET['q'];
$date = date('l', strtotime($q));
    switch ($date) {
        case 'Monday':
            $day = 'Lundi';
            break;
        case 'Thuesday':
            $day = 'Mardi';
            break;
        case 'Wednesday':
            $day = 'Mercredi';
            break;
        case 'Thursday':
            $day = 'Jeudi';
            break;
        case 'Friday':
            $day = 'Vendredi';
            break;
        case 'Saturday':
            $day = 'Samedi';
            break;
        case 'Sunday':
            $day = 'Dimanche';
            break;
    }
$maxOfGuest = $settingManager->getSettings('maxOfGuest');
$schedulesOfDay = $schedulesManager->getSchedulesDay($day);
$nbrOnLunch = $reservationManager->getCountLunch($q, $schedulesOfDay->startDej, $schedulesOfDay->endDej);
$nbrOnDiner = $reservationManager->getCountDiner($q, $schedulesOfDay->startDin, $schedulesOfDay->endDin);
$availability = $schedulesManager->getAvailableHours($day, $nbrOnLunch, $nbrOnDiner, $maxOfGuest);
var_dump($nbrOnLunch);
var_dump($schedulesOfDay);
var_dump($availability);
    foreach ($availability as $service) {
        foreach ($service as $i) {
            echo "<option value=" . $i . ">" . $i . "</option>";
        }
    }
