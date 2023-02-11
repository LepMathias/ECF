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
                    <?php
                    foreach ($schedules as $schedule) {
                        include 'schedulesView.php';
                    }
                    ?>
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
                                <option value="19:00">19:00</option>
                                <option value="20:00">20:00</option>
                            </select>
                        </div>
                    </div>
                    <?php if (!isset($_SESSION['id'])): ?>
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" name="lastname" id="lastname" value="<?=$_SESSION['lastname']?>" class="form-control">

                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" name="firstname" id="firstname" value="<?=$_SESSION['firstname']?>" class="form-control">
                    <?php endif;?>

                    <label for="nbrOfGuest" class="form-label">Nombre de personne</label>
                    <input type="number" name="nbrOfGuest" id="nbrOfGuest" value="<?=$_SESSION['defaultNbrGuest']?>" class="form-control">

                    <label for="emailAddress" class="form-label">Adresse e-mail</label>
                    <input type="email" name="emailAddress" id="emailAddress" value="<?=$_SESSION['email']?>" class="form-control">

                    <label for="phoneNumber" class="form-label">Numéro de téléphone</label>
                    <input type="tel" name="phoneNumber" id="phoneNumber" value="<?=$_SESSION['phoneNumber']?>" class="form-control">

                    <label for="allergies" class="form-label">Allergies</label>
                    <textarea type="text" name="allergies" id="allergies" value="<?=$_SESSION['allergies']?>" class="form-control" rows="5"></textarea>

                    <input name="reservation_form" value="newReservation" type="hidden"/>
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
                            <label for="lastname" class="form-label">Nom</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" required>
                        </div>

                        <div class="col">
                            <label for="firstname" class="form-label">Prénom</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" required>
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