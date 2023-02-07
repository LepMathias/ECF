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
    $('#log-out').click(function() {
        $('location').attr('href', 'logout.php');
    })
    $('#sign-up').click(function() {
        $('#sign-up-modal').modal('show');
    })

    //$('.gallery').mouseover(function (){
    //    $('.img-title').css('display','block');
    //})

    $('#homePage').click(function() {
        document.location.href = "../../pages/index.php";
    })
    $('#menusPage').click(function() {
        document.location.href = "../../pages/menus.php";
    })

});