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

<!-- Start section-->
<div class="container_status">

    <!-- Show all demande records. -->
    <div class="demand_status">
        <h2>Demands List</h2>
        <table>
            <tr>
                <th>Id Demand</th>
                <th>Matricul</th>
                <th>User</th>
                <th>Durration</th>
            </tr>
            <tbody>
                <?php
                $query1 = "select demande.Id_demande, demande.Matr, utilisateur.Name, demande.Duree from demande INNER JOIN utilisateur ON demande.Id_utisateur=utilisateur.Id_U;";
                $result1 = mysqli_query($connect, $query1);

                if (mysqli_num_rows($result1) > 0) {
                    while ($row = mysqli_fetch_assoc($result1)) {
                        echo "<tr> <td>" . $row['Id_demande'] .  "</td> <td>" . $row['Matr'] .  "</td> <td>" . $row['Name'] .  "</td> <td>" . $row['Duree'] . " Jrs</td></tr>";
                    }
                }
                mysqli_free_result($result1);

                ?>
            </tbody>
        </table>
    </div>

    <!-- Show all Users records. -->
    <div class="Users_status">
        <h2>Users List</h2>
        <table>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>User Phone</th>
            </tr>
            <tbody>

                <?php
                $query2 = "SELECT * FROM utilisateur";
                $result2 = mysqli_query($connect, $query2);

                if (mysqli_num_rows($result2) > 0) {
                    while ($row = mysqli_fetch_assoc($result2)) {
                        echo "<tr> <td>" . $row['Id_U'] . "</td><td>" . $row['Name'] . "</td><td>" . $row['Tele'] . "</td> </tr>";
                    }
                }
                mysqli_free_result($result2);


                ?>
            </tbody>
        </table>
    </div>

    <!-- Show all cars records. -->
    <div class="Cars_status">
        <h2>Cars List</h2>
        <?php
        $query = "select * from voiture";
        $result = mysqli_query($connect, $query);
        ?>
        <table>
            <!-- <th> -->
            <tr>
                <th>Matricule</th>
                <th>Couleur</th>
                <th>Type</th>
                <th>Manuel</th>
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
    </div>
</div>
<!-- End section -->

<!-- Footer global content -->
<?php
include('./templates/base_below.php');
?>


<?php
//Close database connection.
mysqli_close($connect);
?>