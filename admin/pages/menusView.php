<?php
session_start();

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
    <div class="container-fluid">
        <nav class="row align-items-center" id="navMenu">
            <div class="col-md-3">
                <a href="../../view.php" class="btn" id="homePage"><h1 class="text-white">Le Quai Antique</h1></a>
            </div>
            <div class="col-md-6 justify-content-md-start">
                <div class="row">
                    <a href="../../public/pages/menus.php" class="btn" id="menusPage"><h2 class="text-white">Nos menus</h2></a>
                </div>
            </div>
            <div class="col-md-3">
                <?php if(isset($_SESSION) && $_SESSION['admin'] === 1): ?>
                    <div class="row">
                        <p class="text-center"><?= $_SESSION['firstname'].' '.$_SESSION['lastname'] ?></p>
                    </div>
                    <div class="row">
                        <a href="#" class="btn" id="param"><h5 class="text-white">Paramètres</h5></a>
                    </div>
                    <div class="row">
                        <a href="../../public/pages/logout.php" class="btn" id="log-ou"><h5 class="text-white">Log out</h5></a>
                    </div>
                <?php elseif(isset($_SESSION) && $_SESSION['admin'] === 0): ?>
                    <div class="row">
                        <p class="text-center"><?= $_SESSION['firstname'].' '.$_SESSION['lastname'] ?></p>
                    </div>
                    <div class="row">
                        <a href="public/pages/logout.php" class="btn" id="log-out"><h5 class="text-white">Log out</h5></a>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <button class="btn" id="log-in"><h5 class="text-white">Log in</h5></button>
                    </div>
                    <div class="row">
                        <button class="btn" id="sign-up"><h5 class="text-white">Sign up</h5></button>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>
<body>

<div class="container-fluid">
    <div class="row navbarParam justify-content-around">
        <a href="galleryView.php" class="col btn btn-param" id="gallery-btn">Gallerie Photos<i
                class="bi bi-caret-down-fill"></i></a>
        <a href="menusView.php" class="col btn btn-param" id="carte-btn">Carte et Menus<i
                class="bi bi-caret-down-fill"></i></a>
        <a href="schedulesView.php" class="col btn btn-param" id="hour-btn">Heures d'ouverture<i
                class="bi bi-caret-down-fill"></i></a>
        <a href="reservations.php" class="col btn btn-param" id="reservation-btn">Réservations<i
                class="bi bi-caret-down-fill"></i></a>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5s
    mXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script>
    $(function ($){
        $('#deletePicture').click(function() {
            ;
        })
    })
</script>
</body>
