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