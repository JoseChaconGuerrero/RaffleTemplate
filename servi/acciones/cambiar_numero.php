<?php
include('../../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST["number"];

    $query = mysqli_query($con, "UPDATE raffle_configuration SET number = $number");
    header("location: ../admin/rifas.php");
}
