<?php
require '../src/models/UserManager.php';
require '../src/models/MealManager.php';
require '../src/models/MenuManager.php';
require '../src/models/SettingManager.php';
require '../src/models/SchedulesManager.php';
include'../../db/confDB.php';


$pdo = new PDO("mysql:host=$HOST;dbname=$DB", $USER, $PWD);

try {
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
     * Display meals and menus on Menus Page
     */
    $mealManager = new MealManager($pdo);
    $starters = $mealManager->getMeals(1);
    $mainCourses = $mealManager->getMeals(2);
    $desserts = $mealManager->getMeals(3);

    $menuManager = new MenuManager($pdo);
    $menus = $menuManager->getMenus();

    /**
     * Update / Read Schedules on footer
     */
    $settingManager = new SettingManager($pdo);
    $schedulesFooter = $settingManager->getSettings('schedulesFooter');
    if(!empty($_POST['schedulesFooter'])) {
        $settingManager->updateSetting($_POST['schedulesFooter'], $_POST['settingId']);
    }

    /**
     * Display Schedules
     */
    $schedulesManager = new SchedulesManager($pdo);
    $schedules = $schedulesManager->getSchedules();

} catch (PDOException $e){
    file_put_contents('dblogs.log', $e->getMessage().PHP_EOL, FILE_APPEND);
    echo "<script>alert('Une erreur s\'est produite. Contactez l\'administrateur')</script>";
}
