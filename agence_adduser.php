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
include('./templates/base_top.php');

?>


<?php
include('./templates/base_below.php');
?>

<?php
// Close DB connection.
mysqli_close($connect);
?>