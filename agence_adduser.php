<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'voiture_db';

$connect = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    echo "Cannot connect to database." . mysqli_connect_errno();
} else {
    // echo "Connected to DB succesfully.";
}
?>

<?php
include("./templates/base_top.php");
?>
<!-- Start Section -->
<section>
    <h1>Add New User</h1>

    <div class="form_add">
        <br>
        <?php
        // Declare massage var.
        $message = "";

        if (isset($_POST['submit'])) {
            $Id_U = $_POST['Id_U'];
            $Name = $_POST['Name'];
            $Tele = $_POST['Tele'];

            $query = "INSERT INTO utilisateur(Id_U, Name, Tele) VALUES('" . $Id_U . "','" . $Name . "','" . $Tele . "')";
            $result = mysqli_query($connect, $query);
            if (!$result) {
                $messgae = "Error in query" . $result;
            } elseif ($query) {
                $message = "<br> <p> Data inserterd.  <i class='far fa-check-circle'></i></p> <br>" . $result;
            }
        }

        ?>

        <form action="#" method="POST">
            <div class="input_div">
                <label for="Id_U">ID User</label>
                <input type="text" name="Id_U" required>
            </div>
            <div class="input_div">
                <label for="id_user">Name:</label>
                <input type="text" name="Name" required>
            </div>
            <div class="input_div">
                <label for="Tele">Telephone:</label>
                <input type="text" name="Tele" required>
            </div>


            <div class="submit_dv">
                <input type="submit" name="submit" value="Validate">
            </div>
        </form>
    </div>

    <?php
    echo $message;

    ?>


</section>

<!-- End Section -->
<?php
include('./templates/base_below.php');
?>

<?php
// Close DB connection.
mysqli_close($connect);
?>