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
        <link rel="stylesheet" href="public/css/style.css">
        <title>Le Quai Antique</title>
    </head>
    <header>
        <div class="container-fluid">
            <nav class="row align-items-center" id="navMenu">
                <div class="col-md-3">
                    <button class="btn" id="homePage"><h1 class="text-white">Le Quai Antique</h1></button>
                </div>
                <div class="col-md-6 justify-content-md-start">
                    <div class="row">
                        <button class="btn" id="menusPage"><h2 class="text-white">Nos menus</h2></button>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php if(isset($_SESSION['id']) && $_SESSION['admin'] === 1): ?>
                        <div class="row">
                            <p class="text-center"><?= $_SESSION['firstName'].' '.$_SESSION['lastName'] ?></p>
                        </div>
                        <div class="row">
                            <a href="../../admin/pages/parameters.php" class="btn" id="param"><h5 class="text-white">Paramètres</h5></a>
                        </div>
                        <div class="row">
                            <a href="public/pages/logout.php" class="btn" id="log-ou"><h5 class="text-white">Log out</h5></a>
                        </div>
                    <?php elseif(isset($_SESSION['id']) && $_SESSION['admin'] === 0): ?>
                        <div class="row">
                            <p class="text-center"><?= $_SESSION['firstName'].' '.$_SESSION['lastName'] ?></p>
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
        <div class="row">
                <div class="col-md hover">
                    <img src="public/src/img/gallery/plat-1.jpg" class="gallery-img"/>
                    <p class="img-title">La traditionelle tartiflette</p>
                </div>
                <div class="col-md hover">
                    <img src="public/src/img/gallery/plat-2.webp" class="gallery-img"/>
                    <p class="img-title">La mini-tartiflette minute self-making</p>
                </div>
                <div class="col-md hover">
                    <img src="public/src/img/gallery/plat-3.jpg" class="gallery-img"/>
                    <p class="img-title">Les bons crozets de chez nous</p>
                </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <button class="btn-menu"><img class="pic-menu" src="public/src/img/navbar/menu_icone-reservation.png" id="reservation"></button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <button class="btn-menu"><img class="pic-menu modal-btn" src="public/src/img/navbar/menu_allergenes_pic.jpg" id="allergenes_img"></button>
                </div>
                <div class="row">
                    <button class="btn-menu"><img class="pic-menu" src="public/src/img/navbar/menu_horraires_pic.jpg" id="horaires-img"></button>
                </div>
            </div>
            <div class="col-md-4" id="display-feedback">
                <div class="card">
                    <div class="card-header">
                        <button class="btn-menu"><p class="modal-btn" id="feedback">Laissez votre avis</p></button>
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($posts as $post) {
                            include 'public/pages/postView.php';
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once("public/pages/footer.php");
    include_once("public/pages/popUpModal.php");
    ?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5s
    mXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script>
        $(function($) {
            <!-- EventListener pop-up modal -->
            $('#horaires-img').click(function() {
                $('#horaires-modal').modal('show');
            })
            $('#allergenes_img').click(function() {
                $('#allergenes-modal').modal('show');
            })
            $('#galery_img').click(function() {
                $('#gallery-modal').modal('show');
            })
            $('#feedback').click(function() {
                $('#feedback-modal').modal('show');
            })
            $('#reservation').click(function() {
                $('#reservation-modal').modal('show');
            })
            $('#log-in').click(function() {
                $('#log-in-modal').modal('show');
            })
            $('#sign-up').click(function() {
                $('#sign-up-modal').modal('show');
            })

            $('#log-out').click(function() {
                $('location').attr('href', 'public/pages/logout.php');
            })
            $('#homePage').click(function() {
                document.location.href = "index.php";
            })
            $('#menusPage').click(function() {
                document.location.href = "public/pages/menus.php";
            })
        });
    </script>
    </body>

    </html>