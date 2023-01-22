<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Description" value="Le Quai Antique, restaurant du Chef Arnaud Michant, propose une cuisine authentique
    et passionnée autour des produits et producteurs de Savoie.">
    <meta name="keywords" content="restaurant, savoie, Arnaud, Michant, Chef, cuisine, authentique, produits frais">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
    <title>Le Quai Antique</title>
</head>
<header>
    <nav class="container">
        <div class="row align-items-center" id="navMenu">
            <div class="col-md-9"><a href="#"><h1 class="text-white">Le Quai Antique</h1></a></div>
            <div class="col-md-3"><a href="#"><h3 class="text-white">Contact</h3></a></div>
        </div>
    </nav>
</header>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <img class="menu-pic" src="src/img/navbar/navbar_menu_pic.jpeg">
                </div>
                <div class="row">
                    <img class="menu-pic" src="src/img/navbar/menu_icone-reservation.png">
                </div>
            </div>
            <div class="col-md-4">
                <div class="row"" >
                    <img class="menu-pic" src="src/img/navbar/menu_horraires_pic.jpg" id="horaires-img">
                </div>
                <div class="row"">
                    <img class="menu-pic" src="src/img/navbar/menu_allergenes_pic.jpg" id="allergenes_img">
                </div>
                <div class="row"">
                    <img class="menu-pic" src="src/img/navbar/menu_galery_pic.jpg" id="galery_img">
                </div>
            </div>
        </div>
    </div>
<!-- Pop up horaires-->
    <div class="modal fade" id="horaires-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nos horaires d'ouverture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <thead>
                        <th scope="col" class="text-left">Jour</th>
                        <th scope="col">Déj.</th>
                        <th scope="col">Dîner</th>
                        </thead>
                        <tr>
                            <th scope="row">Lundi</th>
                            <td>Fermé</td>
                            <td>Fermé</td>
                        </tr>
                        <tr>
                            <th scope="row">Mardi</th>
                            <td>Fermé</td>
                            <td>Fermé</td>
                        </tr>
                        <tr>
                            <th scope="row">Mercredi</th>
                            <td>12h - 14h</td>
                            <td>19h - 21h30</td>
                        </tr>
                        <tr>
                            <th scope="row">Jeudi</th>
                            <td>12h - 14h</td>
                            <td>19h - 21h30</td>
                        </tr>
                        <tr>
                            <th scope="row">Vendredi</th>
                            <td>12h - 14h</td>
                            <td>19h - 21h30</td>
                        </tr>
                        <tr>
                            <th scope="row">Samedi</th>
                            <td>12h - 14h</td>
                            <td>19h - 21h30</td>
                        </tr>
                        <tr>
                            <th scope="row">Dimanche</th>
                            <td>12h - 14h</td>
                            <td>19h - 21h30</td>s
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="allergenes-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Allergènes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Le gluten et la lactose.</p>
                    <p>Deux allergènes qui ne sont pas à négliger dans la cuisine savoyarde.<br><br>
                    C'est pourquoi nous proposons différents pains snas gluten ainsi que des plats sans lactose tout au long
                        de l'année.</p>
                    <p>Pour toute(s) autre(s) allergie(s), n'hésitez pas à nous le spécifier lors de votre réservation.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="galery-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="carouselControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-inner overflow-hidden">
                        <div class="carousel-item active">
                            <img src="https://images.unsplash.com/photo-1622222298089-042b5e973333?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=632&q=80" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1622227614434-a7a26021879f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1622115168398-af384a2b4d85?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=668&q=80" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5s
    mXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
</body>
<script>
$(function($) {
    $('#horaires-img').click(function() {
        $('#horaires-modal').modal('show');
    })
    $('#allergenes_img').click(function() {
        $('#allergenes-modal').modal('show');
    })
    $('#galery_img').click(function() {
        $('#galery-modal').modal('show');
    })
});


</script>
</html>

