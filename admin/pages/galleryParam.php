<?php
session_start();
require '../../public/src/models/PictureManager.php';
require '../../public/src/models/MealManager.php';

$pdo = new PDO('mysql:host=localhost;dbname=restaurant', 'root', '');

$mealManager = new MealManager($pdo);
if (!empty($_POST['category']))
    $mealManager->addMeal($_POST['category'], $_POST['title'], $_POST['description'], $_POST['price']);

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
include '../../commonFiles/includes/header.php';
include '../includes/headerParam.php'
?>
<body>
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
                        include '../includes/pictureView.php';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid menus-menu" id="menus-menu">
    <div class="card" id="menu-item">
        <form class="row" method="post" action="#">
            <div class="col-9 card-header">
                <div class="card-title">
                    <h3>Entrées</h3>
                    <label class="form-label" for="title"><h5>Titre</h5></label>
                    <input class="form-control" type="text" name="title" id="title">
                </div>
                <div class="card-body">
                    <label class="form-label" for="description">Descriptif</label>
                    <textarea class="form-control" type="text" name="description" id="description"></textarea>
                </div>
            </div>
            <div class="col-3 justify-content-between">
                <div class="card-footer">
                    <div class="row">
                        <label class="form-label" for="price"><h5>Prix €</h5></label>
                        <input class="form-control d-inline-block" type="text" name="price" id="price">
                        <input class="form-control" type="hidden" name="category" value="1">
                    </div>
                    <div class="row mt-5">
                        <button class="btn btn-success" type="submit" id="addMeal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                            </svg>Ajouter</button>
                        <button class="btn btn-danger mt-3" type="" id="deleteMeal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>Supprimer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card" id="menu-item">
        <form class="row" method="post" action="#">
            <div class="col-9 card-header">
                <div class="card-title">
                    <h3>Plats</h3>
                    <label class="form-label" for="titleMeal"><h5>Titre</h5></label>
                    <input class="form-control" type="text" name="titleMeal" id="titleMeal">
                    <input class="form-control" type="hidden" name="category" value="2">
                </div>
                <div class="card-body">
                    <label class="form-label" for="descriptiveMeal">Descriptif</label>
                    <textarea class="form-control" type="text" name="descriptiveMeal" id="descriptiveMeal"></textarea>
                </div>
            </div>
            <div class="col-3 justify-content-between">
                <div class="card-footer">
                    <div class="row">
                        <label class="form-label" for="price"><h5>Prix €</h5></label>
                        <input class="form-control d-inline-block" type="text" name="price" id="price">
                    </div>
                    <div class="row mt-5">
                        <button class="btn btn-success" id="addMeal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                            </svg>Ajouter</button>
                        <button class="btn btn-danger mt-3" id="deleteMeal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>Supprimer</button>
                    </div>
                </div>
            </div>
        </form>
    </div><div class="card" id="menu-item">
        <form class="row" method="post" action="#">
            <div class="col-9 card-header">
                <div class="card-title">
                    <h3>Desserts</h3>
                    <label class="form-label" for="titleMeal"><h5>Titre</h5></label>
                    <input class="form-control" type="text" name="titleMeal" id="titleMeal">
                    <input class="form-control" type="hidden" name="category" value="3">
                </div>
                <div class="card-body">
                    <label class="form-label" for="descriptiveMeal">Descriptif</label>
                    <textarea class="form-control" type="text" name="descriptiveMeal" id="descriptiveMeal"></textarea>
                </div>
            </div>
            <div class="col-3 justify-content-between">
                <div class="card-footer">
                    <div class="row">
                        <label class="form-label" for="price"><h5>Prix €</h5></label>
                        <input class="form-control d-inline-block" type="text" name="price" id="price">
                    </div>
                    <div class="row mt-5">
                        <button class="btn btn-success" id="addMeal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                            </svg>Ajouter</button>
                        <button class="btn btn-danger mt-3" id="deleteMeal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>Supprimer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5s
    mXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script>
    $(function ($){
    })
</script>
</body>
