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
    <div class="demand_status">
        <h2>Demands List</h2>
        <table>

            hello
        </table>
    </div>
    <div class="Cars_status">
        <h2>Cars List</h2>
        <?php
        $query = "select * from voiture";
        $result = mysqli_query($connect, $query);
        ?>
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