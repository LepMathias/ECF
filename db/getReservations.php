
<?php

$q = $_GET['q'];

$pdo = new PDO('mysql:host=127.0.0.1;dbname=restaurant', 'root', '');

$statement = $pdo->prepare("SELECT * FROM reservations 
                                    LEFT JOIN users 
                                        ON reservations.userId = users.id 
                                    WHERE date = :q");
$statement->bindValue(':q', $q);

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "<table>
<tr>
<th>Nom</th>
<th>Prénom</th>
<th>Date</th>
<th>Heure</th>
<th>Nbr de cvts</th>
<th>allergies</th>
</tr>";

foreach($result as $row) {
    echo "<tr>";
    echo "<td>".$row['lastname']."</td>";
    echo "<td>".$row['firstname']."</td>";
    echo "<td>".$row['date']."</td>";
    echo "<td>".$row['hour']."</td>";
    echo "<td>".$row['nbrOfGuest']."</td>";
    echo "<td>".$row['allergies']."</td>";
    echo "<tr>";
}
echo "</table>";
?>
