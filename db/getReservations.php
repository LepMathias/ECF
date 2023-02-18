<?php
include 'confDB.php';

if(isset($_GET['q'])){
    $q = $_GET['q'];

    $pdo = new PDO("mysql:host=$HOST;dbname=$DB", $USER, $PWD);

    $statement = $pdo->prepare("SELECT reservations.*,
                                        users.lastname AS Ulastname,
                                        users.firstname AS Ufirstname
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
<tr>
<th>Heure</th>
<th>Nom</th>
<th>Prénom</th>
<th>Nbr de cvts</th>
<th>allergies</th>
</tr>";

    foreach($result as $row) {
        echo "<tr>";
        echo "<td>".$row['hour']."</td>";
        if(isset($row['Ulastname'])){
            echo "<td>".$row['Ulastname']."</td>";
            echo "<td>".$row['Ufirstname']."</td>";
        } else {
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['firstname']."</td>";
        }
        echo "<td>".$row['nbrOfGuest']."</td>";
        echo "<td>".$row['allergies']."</td>";
        echo "<tr>";

    }
    echo "</table>";

}
