    <!DOCTYPE html>
    <html lang="fr" xmlns="http://www.w3.org/1999/html">
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
    <?php
    include_once("header.php");
    ?>

    <body>
    <div class="container-fluid">
        <div class="row">
                <div class="col-md hover">
                    <img src="src/img/gallery/plat-1.jpg" class="gallery-img"/>
                    <p class="img-title">La traditionelle tartiflette</p>
                </div>
                <div class="col-md hover">
                    <img src="src/img/gallery/plat-2.webp" class="gallery-img"/>
                    <p class="img-title">La mini-tartiflette minute self-making</p>
                </div>
                <div class="col-md hover">
                    <img src="src/img/gallery/plat-3.jpg" class="gallery-img"/>
                    <p class="img-title">Les bons crozets de chez nous</p>
                </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <button class="btn-menu"><img class="pic-menu" src="src/img/navbar/menu_icone-reservation.png" id="reservation"></button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <button class="btn-menu"><img class="pic-menu modal-btn" src="src/img/navbar/menu_allergenes_pic.jpg" id="allergenes_img"></button>
                </div>
                <div class="row">
                    <button class="btn-menu"><img class="pic-menu" src="src/img/navbar/menu_horraires_pic.jpg" id="horaires-img"></button>
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
                            include 'postView.php';
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once("footer.php");
    ?>
    <!-- Pop up modal horaires -->
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
                            <td>19h - 21h30</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop up modal allergenes -->
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
    <!-- Pop up modal feedback -->
    <div class="modal fade" id="feedback-modal">
        <input name="form_action" value="sendmessage" type="hidden"/>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Partagez votre expérience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="form-feedback" action="#" method="post">
                        <div class="row">
                            <div class="col-md">
                                <label for="note" class="form-label">Note</label>
                                <select name="note" class="form-select" id="note-select">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option selected value="5">5</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="title" class="form-label">Titre</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                        </div>

                        <label for="content" class="form-label">Votre avis</label>
                        <textarea style="font-family: aria,sans-serif;" type="text" name="content" id="content" class="form-control" rows="8"></textarea>

                        <button type="submit" class="btn btn-menu">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop up modal reservation -->
    <div class="modal fade" id="reservation-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Réservez votre table</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="reservation" action="#" method="post">
                        <div class="row">
                            <div class="col">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" id="date" class="form-control">
                            </div>
                            <div class="col">
                                <label for="hour" class="form-label">Heure</label>
                                <select name="hour" class="form-select" id="hour-select">
                                    <option value="12:00">12:00</option>
                                    <option value="12:15">12:15</option>
                                    <option value="12:30">12:30</option>
                                    <option value="12:45">12:45</option>
                                    <option value="13:00">13:00</option>
                                </select>
                            </div>
                        </div>
                        <label for="firstname" class="form-label">Nom</label>
                        <input type="text" name="firstname" id="firstname" class="form-control">

                        <label for="lastname" class="form-label">Prénom</label>
                        <input type="text" name="lastname" id="lastname" class="form-control">

                        <label for="nbrGuest" class="form-label">Nombre de personne</label>
                        <input type="number" name="nbrGuest" id="nbrGuest" class="form-control">

                        <label for="emailAddress" class="form-label">Adresse e-mail</label>
                        <input type="email" name="emailAddress" id="emailAddress" class="form-control">

                        <label for="phoneNumber" class="form-label">Numéro de téléphone</label>
                        <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control">

                        <label for="messageReservation" class="form-label">Commentaire / Allergies</label>
                        <textarea type="text" name="messageReservation" id="messageReservation" class="form-control" rows="5"></textarea>

                        <button type="submit" class="btn btn-menu">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop up modal log-in -->
    <div class="modal fade" id="log-in-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Connexion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="log-in" action="#" method="post">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control">

                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control">

                        <input name="log-in_form" value="tryToLog" type="hidden"/>
                        <button type="submit" class="btn btn-menu">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop up modal sign_in-->
    <div class="modal fade" id="sign-up-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inscription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="log-in" action="#" method="post">
                        <div class="row">
                            <div class="col">
                                <label for="lastName" class="form-label">Nom</label>
                                <input type="text" name="lastName" id="lastName" class="form-control" required>
                            </div>

                            <div class="col">
                                <label for="firstName" class="form-label">Prénom</label>
                                <input type="text" name="firstName" id="firstName" class="form-control" required>
                            </div>
                        </div>

                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" required>

                        <label for="phoneNumber" class="form-label">Numéro de téléphone</label>
                        <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control" required>

                        <div class="row">
                            <div class="col">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="password2" class="form-label">Conf. du mot de passe</label>
                                <input type="password" name="password2" id="password2" class="form-control" required>
                            </div>
                        </div>

                        <label for="defaultNbrGuest" class="form-label">Nombre de convive par défault</label>
                        <input type="number" name="defaultNbrGuest" id="defaultNbrGuest" class="form-control" min="1" max="20">

                        <label for="allergies" class="form-label">Commentaire / Allergies</label>
                        <textarea type="text" name="allergies" id="allergies" class="form-control" rows="4"></textarea>

                        <input name="sign-up_form" value="newGuest" type="hidden"/>
                        <button type="submit" class="btn btn-menu">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5s
    mXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="script/script.js"></script>
    </body>

    </html>