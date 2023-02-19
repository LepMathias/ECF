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
    $('#reg-modal-btn').click(function() {
        $('#reg-modal').modal('hide');
        $('#log-in-modal').modal('show');
    })
    $('#reg-modal-btn-2').click(function() {
        $('#reg-modal').modal('hide');
        $('#sign-up-modal').modal('show');
    })
});
function getAvailability(date){
    fetch("db/getAvailability.php?q=" + date)
        .then(async function (response) {
            document.getElementById("hour-select").innerHTML = await response.text();
        })
}