$(function($) {
    <!-- EventListener pop-up modal -->
    $('#horaires-img').click(function() {
        $('#horaires-modal').modal('show');
    })
    $('#allergenes_img').click(function() {
        $('#allergenes-modal').modal('show');
    })
    $('#galery_img').click(function() {
        $('#galery-modal').modal('show');
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
    $('#homePage').click(function() {
        document.location.href = "index.php";
    })
});