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
                    <th scope="col">Déjeuner</th>
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
                            <input type="date" name="date" id="date" class="form-control" onchange="getAvailability(this.value)" required>
                        </div>
                        <div class="col">
                            <label for="hour" class="form-label">Heure</label>
                            <select name="hour" class="form-select" id="hour-select" required>
                            </select>
                        </div>
                    </div>
                    <?php if (!isset($_SESSION['id'])): ?>
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" name="lastname" id="lastname" value="<?=$_SESSION['lastname']?>" class="form-control" required>

                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" name="firstname" id="firstname" value="<?=$_SESSION['firstname']?>" class="form-control" required>
                    <?php endif;?>

                    <label for="nbrOfGuest" class="form-label">Nombre de personne</label>
                    <input type="number" name="nbrOfGuest" id="nbrOfGuest" value="<?=$_SESSION['defaultNbrGuest']?>" class="form-control" required>

                    <label for="emailAddress" class="form-label">Adresse e-mail</label>
                    <input type="email" name="emailAddress" id="emailAddress" value="<?=$_SESSION['email']?>" class="form-control" required>

                    <label for="phoneNumber" class="form-label">Numéro de téléphone</label>
                    <input type="tel" name="phoneNumber" id="phoneNumber" value="<?=$_SESSION['phoneNumber']?>" class="form-control" required pattern="^((\+)33|0)[1-9](\d{2}){4}$">

                    <label for="allergies" class="form-label">Allergies</label>
                    <textarea type="text" name="allergies" id="allergies" value="<?=$_SESSION['allergies']?>" class="form-control" rows="5"></textarea>

                    <input name="reservation_form" value="newReservation" type="hidden"/>
                    <button type="submit" class="btn btn-menu">Réserver</button>
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
                    <input type="email" name="email" id="email" class="form-control" required>

                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" required>

                    <input name="log-in_form" value="tryToLog" type="hidden"/>
                    <button type="submit" class="btn btn-menu">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Pop up modal sign_up -->
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
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Lettre uniquement" required>
                        </div>

                        <div class="col">
                            <label for="firstname" class="form-label">Prénom</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Lettre uniquement" required>
                        </div>
                    </div>

                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="email@valide.fr" required>

                    <label for="phoneNumber" class="form-label">Numéro de téléphone</label>
                    <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="0479000000" required pattern="^((\+)33|0)[1-9](\d{2}){4}$">

                    <div class="row">
                        <div class="col">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                    </div>

                    <label for="defaultNbrGuest" class="form-label">Nombre de convive par défault</label>
                    <input type="number" name="defaultNbrGuest" id="defaultNbrGuest" class="form-control" min="1" max="20" required>

                    <label for="allergies" class="form-label">Allergies</label>
                    <textarea type="text" name="allergies" id="allergies" class="form-control" rows="4"></textarea>

                    <input name="sign-up_form" value="newGuest" type="hidden"/>
                    <button type="submit" class="btn btn-menu">S'Inscrire</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Pop up modal result of sign up -->
<div class="modal fade" id="reg-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php if($regStatus === "OK") { ?>
                <div class="modal-header">
                    <h5 class="modal-title">Inscription terminée</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Bienvenus<br><br>
                                            Votre compte est à présent actif.<br>
                        Il ne vous reste plus qu'a vous <button type="button" id="reg-modal-btn">connecter</button> pour réserver</p>
                </div>
            <?php } else { ?>
                <div class="modal-header">
                    <h5 class="modal-title">Erreur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Une erreur est survenu lors de la création de ovtre compte<br><br>
                        Si le problème persiste, contactez l'administrateur du site</p>
                        <button type="button" id="reg-modal-btn-2">Inscrivez-vous</button>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Pop up modal result of reservation -->
<div class="modal fade" id="res-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php if($reservationStatus[0] == "OK") { ?>
                <div class="modal-header">
                    <h5 class="modal-title">Réservation enregistrée</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Félicitations<br><br>
                        Vous venez de réserver une table <br>
                        pour <?=$reservationStatus[3]?> personnes.<br><br>
                        Nous vous attendrons <br>
                        le <?=$reservationStatus[1]?> à <?=$reservationStatus[2]?>
                    </p>
                </div>
            <?php } else { ?>
                <div class="modal-header">
                    <h5 class="modal-title">Erreur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Une erreur est survenu lors de votre réservation<br><br>
                        Si le problème persiste, contactez l'administrateur du site
                    </p>
                    <button type="button" id="res-modal-btn-2">Réservez</button>
                </div>
            <?php } ?>
        </div>
    </div>
</div>