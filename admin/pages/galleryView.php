<?php
session_start();
require '../../public/src/models/PictureManager.php';

$pictureManager = new PictureManager();
if (!empty($_FILES['uploadedFile'])) {
    $pictureManager->isUploadSuccessful($_FILES['uploadedFile']);
}

$files = $pictureManager->getUploadedFiles();
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
<?php
include 'header.php';
?>
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

<div class="container-fluid gallery-menu" id="gallery-menu">
    <div id="gallery-menu">
        <div class="row ">
            <div class="col-md-2">
                <form name="gallery-form" enctype="multipart/form-data" method="post" action="#">
                    <label class="form-label text-center" for="uploadedFile">Choisissez une photo à ajouter</label>
                    <input class="form-control" type="file" id="uploadedFile" name="uploadedFile" accept="image/png, imgae/jpeg, image/jpg, image/gif">

                    <label class="form-label" for="title">Nom de la photo</label>
                    <input class="form-control" type="text" id="title" name="pictureTitle">

                    <input name="upload-picture" value="pictureUploaded" type="hidden"/>
                    <button type="submit" class="btn btn-menu">Submit</button>
                </form>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <?php
                    foreach ($files as $file) {
                        include 'pictureView.php';
                    }
                    ?>
                </div>
            </div>
        </div>
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