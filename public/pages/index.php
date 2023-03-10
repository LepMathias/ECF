<?php
session_start();
include './includes/header.php';
?>
<div class="main-div">
    <div class="home-picture">
        <img class="home-picture" src="../../src/img/banniere.jpg" alt="Photo du Pays">
    </div>
    <div class="carousel-container">
        <div class="container">
            <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
                <!-- Les indicateurs-->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#caroussel1" data-bs-slide-to="0" class="active"></button>
                    <?php
                    for ($i = 1; $i <= count($files); $i++) {
                        include './includes/buttonCarousel.php';
                    }
                    ?>
                </div>
                <!-- Le carousel -->
                <div class="carousel-inner">
                    <?php
                    include './includes/firstDisplayCarousel.php';
                    foreach ($files as $file){
                        include './includes/displayCarousel.php';
                    }
                    ?>
                </div>
                <!-- Les commandes de contrôle -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>
    <div class="row justify-content-center div-100vw">
        <div class="col-md-3">
            <div class="row">
                <button class="btn-menu"><img class="pic-menu" src="./src/img/navbar/menu_icone-reservation.jpg" id="booking"></button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <button class="btn-menu"><img class="pic-menu" src="./src/img/navbar/menu_allergenes_pic.jpg" id="allergy"></button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <button class="btn-menu"><img class="pic-menu" src="./src/img/navbar/menu_horraires_pic.jpg" id="schedules"></button>
            </div>
        </div>
    </div>
</div>

<?php
include './includes/popUpModal.php';
include './includes/footer.php';
?>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5s
    mXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="./src/script/script.js"></script>
<script type="text/javascript">
$(function($) {

    <?php
    if(isset($regStatus)) { ?>
    $('#reg-modal').modal('show');
    <?php }
    if(isset($reservationStatus)) { ?>
    $('#res-modal').modal('show');
    <?php } ?>
});

</script>
</body>

</html>
