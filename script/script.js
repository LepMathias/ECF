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

    //$('.gallery').mouseover(function (){
    //    $('.img-title').css('display','block');
    //})

    $('#homePage').click(function() {
        document.location.href = "index.php";
    })
    $('#menusPage').click(function() {
        document.location.href = "menus.php";
    })

});