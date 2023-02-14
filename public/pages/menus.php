<?php
session_start();
include '../includes/logic.php';
?>
<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Description" content="Le Quai Antique, restaurant du Chef Arnaud Michant, propose une cuisine authentique
    et passionnée autour des produits et producteurs de Savoie.">
    <meta name="keywords" content="restaurant, savoie, Arnaud, Michant, Chef, cuisine, authentique, produits frais">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/style.css">
    <title>Le Quai Antique</title>
</head>
<header>
    <?php
    include_once '../../commonFiles/includes/header.php';
    ?>
</header>
<body>
<div class="container" id="carte">
    <div class="row text-center head-menus" id="head-menus">
        <h3>Notre carte</h3>
    </div>
    <div class="row text-center justify-content-between">
        <div class="col-md-3">
            <h5 class="subTitle">Entrées</h5>
            <?php
            foreach ($starters as $meal){
                include '../includes/mealView.php';
            }
            ?>
        </div>
        <div class="col-md-3">
            <h5 class="subTitle">Plats</h5>
            <?php
            foreach ($mainCourses as $meal){
                include '../includes/mealView.php';
            }
            ?>
        </div>
        <div class="col-md-3">
            <h5 class="subTitle">Desserts</h5>
            <?php
            foreach ($desserts as $meal){
                include '../includes/mealView.php';
            }
            ?>
        </div>
    </div>
</div>
<div class="container" id="menus">
    <div class="row text-center head-menus" id="head-menus">
        <h3>Nos menus</h3>
    </div>
    <div class="row text-center">
        <div class="col">
            <?php
            foreach ($menus as $menu){
                include '../includes/menuView.php';
            }
            ?>
        </div>
    </div>
</div>

<?php
include_once("../../commonFiles/includes/footer.php");
include_once("../includes/popUpModal.php");
?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5s
        mXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="../script/script.js"></script>
</body>

</html>