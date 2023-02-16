<?php
require '../../public/src/models/MealManager.php';
require '../../public/src/models/MenuManager.php';
require '../../public/src/models/PictureManager.php';
require '../../public/src/models/SettingManager.php';
require '../../public/src/models/SchedulesManager.php';
include '../../db/confDB.php';

try{
    $pdo = new PDO("mysql:host=$HOST;dbname=$DB", $USER, $PWD);

    /**
     * Create / Read / Delete Meals
     */
    $mealManager = new MealManager($pdo);
    if (!empty($_POST['category'])){
        $mealManager->addMeal($_POST['category'], $_POST['title'], $_POST['description'], $_POST['price']);
    }
    if (isset($_GET['id'])) {
        $mealManager->deleteMeal($_GET['id']);
    }
    $starters = $mealManager->getMeals(1);
    $mains = $mealManager->getMeals(2);
    $desserts = $mealManager->getMeals(3);

    /**
     * Create / Read / Delete Menus
     */
    $menuManager = new MenuManager($pdo);
    if (!empty($_POST['menu'])) {
        $menuManager->addMenu($_POST['title'], $_POST['description'], $_POST['price'], $_POST['availability']);
    }
    if (isset($_GET['id'])) {
        $menuManager->deleteMenu($_GET['id']);
    }
    $menus = $menuManager->getMenus();

    /**
     * Upload / Delete / Read pictures for carousel
     */
    $pictureManager = new PictureManager();
    if (!empty($_FILES['uploadedFile'])) {
        $pictureManager->isUploadSuccessful($_FILES['uploadedFile']);
    }
    if (!empty($_POST['file'])) {
        $pictureManager->deleteFile($_POST['file']);
    }
    $files = $pictureManager->getUploadedFiles();

    /**
     * Update / Read setting -> Limit of Guest per service
     */
    $settingManager = new SettingManager($pdo);
    $maxOfGuest = $settingManager->getSettings('maxOfGuest');

    if(!empty($_POST['maxOfGuest'])){
        $settingManager->updateSetting($_POST['maxOfGuest'], $_POST['settingId']);
    }

    /**
     * Update / Read Schedules
     */
    $schedulesManager = new SchedulesManager($pdo);
    $schedules = $schedulesManager->getSchedules();
    if (!empty($_POST['id'])) {
        $schedulesManager->updateSchedules($_POST['startDej'], $_POST['endDej'], $_POST['startDin'], $_POST['endDin'], $_POST['id']);
    }

    /**
     * Update / Read Schedules on footer
     */
    $schedulesFooter = $settingManager->getSettings('schedulesFooter');
    if(!empty($_POST['schedulesFooter'])) {
        $settingManager->updateSetting($_POST['schedulesFooter'], $_POST['settingId']);
    }
} catch (PDOException $e) {
    file_put_contents('dblogs.log', $e->getMessage().PHP_EOL, FILE_APPEND);
    echo "<script>alert('Une erreur s\'est produite. Contactez l\'administrateur')</script>";
}