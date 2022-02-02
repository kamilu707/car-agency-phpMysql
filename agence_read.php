<?php
$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'voiture_db';

$connect = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_error()) {
    die("DB Not connected: " . mysqli_connect_error());
} else {
    // echo "DB connected successfully.";
}


?>

<?php
include("./templates/base_top.php");
?>
<!-- End header -->

<?php
$query = "select * from voiture";
$result = mysqli_query($connect, $query);
?>
<h3>Les Voitures </h3>
<table>
    <!-- <th> -->
    <tr>
        <td>Matricule</td>
        <td>Couleur</td>
        <td>Type</td>
        <td>Manuel</td>
    </tr>
    <!-- </th> -->
    <tbody>
        <?php
        if (!$result) {
            die("Error in query.");
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['Matricule'] . "</td> <td>" . $row['Couleur'] .  "</td> <td>" . $row['Typecar'] .  "</td>" . " </td> <td>" . $row['Manuel'] .  "</td></tr>";
            }
        }
        ?>

    </tbody>
</table>
</body>

</html>


<?php
//Close database connection.
mysqli_close($connect);
?>