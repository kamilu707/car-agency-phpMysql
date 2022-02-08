<?php
include("./templates/base_top.php");
?>
<!-- Start Section -->

<div class="h1_home">
    <h1 class="header">Welcom Kam</h1>

</div>
<section>
    <div class="container_home">
        <!-- elemets of home page -->
        <div class="box">
            <img src="./style/images/user_icon.png" alt="">
            <a class="home_link" href="./agence_adduser.php">Add New User</a>
        </div>
        <div class="box">
            <img src="./style/images/demand_icon.png" alt="">
            <a class="home_link" href="./agence_adduser.php">Create Demand</a>
        </div>
        <div class="box">
            <img src="./style/images/car_icon.png" alt="">
            <a class="home_link" href="./agence_addcar.php">Add New car</a>
        </div>
    </div>
</section>

<!-- End Section -->
<?php
include('./templates/base_below.php');
?>