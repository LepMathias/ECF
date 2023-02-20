<?php
include 'confDB.php';

if(isset($_GET['q'])){
    $q = $_GET['q'];

    $pdo = new PDO("mysql:host=$HOST;dbname=$DB", $USER, $PWD);

    $statement = $pdo->prepare("SELECT reservations.*,
                                        users.lastname AS Ulastname,
                                        users.firstname AS Ufirstname,
                                        users.phoneNumber AS UphoneNumber
                                        FROM reservations 
                                    LEFT JOIN users 
                                        ON reservations.userId = users.id 
                                    WHERE date = :q");
    $statement->bindValue(':q', $q);

    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    /*if(isset($_GET['h'])){
        $h = $_GET['h'];
        if($_GET('Déjeuner')){
            $newResult = [];
            foreach($result as $row){
                if()
            }
        }
    }*/

    echo "<table class='mt-3'>
<tr class='displayReservations'>
<th>Heure</th>
<th>Nom</th>
<th>Prénom</th>
<th>Téléphone</th>
<th>Nbr de cvts</th>
<th>allergies</th>
</tr>";

    foreach($result as $row) {
        echo "<tr class='displayReservations'>";
        echo "<td>".$row['hour']."</td>";
        if(isset($row['Ulastname'])){
            echo "<td>".$row['Ulastname']."</td>";
            echo "<td>".$row['Ufirstname']."</td>";
            echo "<td>".$row['UphoneNumber']."</td>";
        } else {
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['firstname']."</td>";
            echo "<td>".$row['phoneNumber']."</td>";
        }
        echo "<td>".$row['nbrOfGuest']."</td>";
        echo "<td>".$row['allergies']."</td>";
        echo "<tr>";

    }
    echo "</table>";

}
