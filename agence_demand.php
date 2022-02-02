<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'voiture_db';

$connect = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    echo "Cannot connect to DB" . mysqli_connect_errno();
} else {
    // echo "Connected to DB successfully.";
}
?>

<!-- Header global content. -->
<?php
include("./templates/base_top.php");
?>

<!-- Start Section -->

<section class="section_demand">
    <h1>Create Demand <i class="fas fa-plus-square"></i></h1>
    <br>
    <?php
    $message = "";
    if (isset($_POST['submit'])) {
        $Matr = $_POST['Matr'];
        $Id_utisateur = $_POST['Id_utisateur'];
        $Duree = $_POST['Duree'];
        $query1 = "INSERT INTO demande(Matr, Id_utisateur, Duree) VALUES('" . $Matr  . "','" . $Id_utisateur . "','" . $Duree . "')";
        $result = mysqli_query($connect, $query1);
        if (!$result) {
            $message = "Error in Query!!!" . $result;
        } else {
            $message = "<br> Demand created succesfully. <i class='far fa-check-circle'></i></p> <br> ";
        }
    }


    ?>

    <div class="form_add">
        <form action="" method="POST">
            <div>
                <label for="Matr">Car: </label>
                <select name="Matr" required>
                    <option value="">------</option>
                    <?php
                    $query = "SELECT * FROM voiture";
                    $result = mysqli_query($connect, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            // echo "<option >" . $row['Matricule'] . "</option>";
                            echo "<option value=" . $row['Matricule'] . ">" . $row['marque'] . " | " . $row['Typecar'] . " | " . $row['Manuel'] . " | " . $row['Couleur'] . "</option>";
                        }
                    } else {
                        echo "<option>" . "No Records!" . "</option>";
                    }
                    mysqli_free_result($result);
                    ?>
                </select>
            </div>
            <!-- selcel for User -->
            <div>
                <label for="Id_utisateur">User:</label>
                <select name="Id_utisateur" required>
                    <option>------</option>
                    <?php
                    $query2 = "SELECT * FROM utilisateur";
                    $result = mysqli_query($connect, $query2);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value=" . $row['Id_U'] . ">" . $row['Name'] . "</option>";
                        }
                    }
                    mysqli_free_result($result);
                    ?>
                </select>
            </div>
            <div>
                <label for="Duree">Duration:</label>
                <input type="text" name="Duree" required>
            </div>
            <div class="submit_dv">
                <input type="submit" name="submit" value="Approve">
            </div>
        </form>
    </div>
    <div>
        <?php
        echo $message;
        ?>
    </div>

    <!-- See Cars lis view -->
    <a href="./agence_read.php">See All Cars List <i class="fas fa-clipboard-list"></i></a>

</section>



<!-- End section -->

<!-- Footer global content -->
<?php
include('./templates/base_below.php');
?>


<?php
// close Connection to DB.
mysqli_close($connect);
?>