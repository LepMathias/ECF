<?php
require 'public/src/models/PostManager.php';
require 'public/src/models/UserManager.php';


$pdo = new PDO('mysql:host=localhost;dbname=restaurant', 'root', '');
$postManager = new PostManager($pdo);
$userManager = new UserManager($pdo);

if (!empty($_POST['note'])) {
    $postManager->addFeedback($_POST['note'], htmlentities($_POST['title']), htmlentities($_POST['content']));
}

if (!empty($_POST['log-in_form'])) {
    try {
        $user = $userManager->connectUser(htmlspecialchars($_POST['email']), htmlentities($_POST['password']));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

if (!empty($_POST['sign-up_form'])) {
    $userManager->addUser($_POST['lastName'], $_POST['firstName'], $_POST['email'], $_POST['phoneNumber'], $_POST['password'], $_POST['defaultNbrGuest'], $_POST['allergies']);
}

$posts = $postManager->getPosts();

include 'view.php';

