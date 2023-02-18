<?php
session_start();
include '../includes/logicAdmin.php';
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

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <table>
                <thead>
                <th scope="col" class="text-left">Jour</th>
                <th scope="col">Déj.</th>
                <th scope="col">Dîner</th>
                </thead>
                <div id="displaySchedules">
                    <?php
                    foreach ($schedules as $schedule) {
                        include '../includes/schedulesView.php';
                    }
                    ?>
                </div>
            </table>
        </div>
        <div class="col-md-6">
            <form name="schedulesFooterForm" method="post" action="#">
                <label class="form-label" for="schedulesFooter">Horaires sommaire en pied de page</label>
                <input class="form-control" type="text" name="schedulesFooter" id="schedulesFooter" value="<?=$schedulesFooter->content?>">
                <input type="hidden" name="settingId" id="settingId" value="<?=$schedulesFooter->id?>">
                <button class="btn btn-success mt-3" type="submit">Mettre à jour</button>
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
<script type="text/javascript">


</script>
</html>