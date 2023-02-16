<?php
require '../public/src/models/SchedulesManager.php';
require '../public/src/models/SettingManager.php';
require '../public/src/models/ReservationManager.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=restaurant', 'root', '');
$schedulesManager = new SchedulesManager($pdo);
$settingManager = new SettingManager($pdo);
$reservationManager = new ReservationManager($pdo);

$s = date(mktime(0,0,0,2,18,2023));
$ss = date('Y-m-d', $s);
$q = $_GET['q'];
$date = date('l', strtotime($ss));
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
//$schedulesOfDay = $schedulesManager->getSchedulesDay($day);
$nbrOnLunch = $reservationManager->getCountLunch($q, $schedulesManager->getSchedulesDay($day)->startDej, $schedulesManager->getSchedulesDay($day)->endDej);
$nbrOnDiner = $reservationManager->getCountDiner($q, $schedulesManager->getSchedulesDay($day)->startDin, $schedulesManager->getSchedulesDay($day)->endDin);
$availability = $schedulesManager->getAvailableHours($day, $nbrOnLunch[0], $nbrOnDiner[0], $maxOfGuest->content);

if(!isset($availability['lunch'])){
    echo "<option value='' selected disabled>Déjeuner complet</option>";
}
foreach ($availability as $service) {
    foreach ($service as $i) {
        echo "<option value=" . $i . ">" . $i . "</option>";
    }
}
if(!isset($availability['diner'])){
    echo "<option value='' selected disabled>Dîner complet</option>";
}
