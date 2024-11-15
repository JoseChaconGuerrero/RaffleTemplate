<?php
include('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["number"])) {
    $number = $_GET["number"];
    $ticket = $_GET["ticket"];
    $result = mysqli_query($con, "SELECT * FROM table_raffle WHERE id_raffle = $ticket");
    $data = mysqli_fetch_assoc($result);
    $table_name = $data["table_numbers"];
    $table_tickets = $data["table_tickets"];


    $query = ("UPDATE `$table_name` SET `status`= CASE
    WHEN `status` = 'activate' THEN 'deactivate'
    WHEN `status` = 'deactivate' THEN 'activate'
    ELSE `status` END WHERE number = $number");

    $reg = mysqli_query($con, $query);
    $result = mysqli_query($con, "DELETE FROM `$table_tickets` WHERE numero = $number");

    echo "<script>history.go(-1);</script>";
}
