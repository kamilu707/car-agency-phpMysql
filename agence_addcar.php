<?php
$host = '127.0.0.1';
$user = "root";
$password = '';
$database = 'voiture_db';

$connect = mysqli_connect(
    $host,
    $user,
    $password,
    $database
);

if (mysqli_connect_errno()) {
    die("Cannot connect to database." . mysqli_connect_errno());
} else {
    // echo "Database is connected.";
}
?>

<!-- Header global content. -->
<?php
include("./templates/base_top.php");
?>

<!-- Start Section -->
<section>
    <h1>Add New Cars <i class="fas fa-car-alt"></i></h1>
    <br>
    <div class="form_add">
        <?php
        $message = "";
        if (isset($_POST['submit'])) {
            $Matricule = $_POST['Matricule'];
            $Couleur = $_POST['Couleur'];
            $Typecar = $_POST['Typecar'];
            $Manuel = $_POST['Manuel'];
            $marque = $_POST['marque'];
            // echo "<br>";
            // echo $Matricule;
            // Step 2: Insert into database.
            $query = "INSERT INTO voiture(Matricule, Couleur, Typecar, Manuel, marque) VALUES ('" . $Matricule . "','" . $Couleur . "','" . $Typecar . "','" . $Manuel . "','" . $marque . "')";
            $result = mysqli_query($connect, $query);
            // if there any problem in query it will stop.

            if (!$result) {
                die("<br>Error in query. <br>" . mysqli_error($connect));
            } elseif ($result) {
                $message = "<br> <p>Data inserterd.  <i class='far fa-check-circle'></i></p> <br>";
            }
        }
        ?>


        <form action="" method="POST">
            <div class="input_dv">
                <label for="">matricule</label>
                <input type="text" name="Matricule" id="" required>
            </div>

            <div class="input_dv">
                <label for="">couleur</label>
                <input type="text" name="Couleur" required>
            </div>

            <div class="input_dv">
                <label for="">Type Car</label>
                <input type="text" name="Typecar" required>
            </div>

            <div class="input_dv">
                <label for="Matricule">Manuel</label>
                <input type="text" name="Manuel" required>
            </div>

            <div class="input_dv">
                <label for="marque">Marque</label>
                <select name="marque" required>
                    <option value="">----</option>
                    <?php
                    $query1 = 'SELECT * FROM marque';
                    $resultat1 = mysqli_query($connect, $query1);

                    if (mysqli_num_rows($resultat1) > 0) {
                        // La fonctionFeTch recupérer une ligne de résultat-assoc=assiciatif

                        while ($row = mysqli_fetch_assoc($resultat1)) {

                            echo "<Option value=" . $row['id_marque'] . ">" . $row['nom_marque'] . "</Option> ";
                        }
                    } else {
                        echo "pas de trie- 0 résultat";
                    }
                    // free memory.
                    mysqli_free_result($resultat1);
                    ?>

                </select>
            </div>

            <div class="submit_dv">
                <input type="submit" name="submit" value="Valider">
            </div>
        </form>
    </div>
    <?php
    echo $message;
    ?>

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