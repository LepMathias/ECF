<?php
session_start();
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
<div class="container">
    <div class="row">
        <div class="col-2">
            <form name="reservationsCheck" method="post" action="">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" onchange="showReservations(this.value)">

                <label for="service" class="form-label">Heure</label>
                <select name="service" class="form-select datepicker" id="hour-select">
                    <option value="both" selected>Tous</option>
                    <option value="Déjeuner">Déjeuner</option>
                    <option value="Dîner">Dîner</option>
                </select>
            </form>
        </div>
        <div class="col-8">
            <div class="row" id="displayReservations">

            </div>
        </div>
        <div class="col-2">
            <form name="maxOfGuest">
                <label for="maxOfGuest" class="form-label">Nombre de personne max par service</label>
                <input type="number" name="maxOfGuest" id="maxOfGuest" value="" class="form-control">
                <button type="submit" class="btn btn-success mt-1">Submit</button>
            </form>
        </div>
    </div>

</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5s
    mXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script type="text/javascript">
    function showReservations(date, hour) {
        fetch("../../db/getReservations.php?q=" + date)
            .then(async function (response) {
                document.getElementById("displayReservations").innerHTML = await response.text();
            })
    }
</script>

