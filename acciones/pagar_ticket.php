<?php
include('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["number"])) {
    $number = $_GET["number"];
    $ticket = $_GET["ticket"];
    $result = mysqli_query($con, "SELECT * FROM table_raffle WHERE id_raffle = $ticket");
    $data = mysqli_fetch_assoc($result);
    $table_name = $data["table_numbers"];
    $table_tickets = $data["table_tickets"];

    $result = mysqli_query($con, "UPDATE $table_tickets SET `pago`='si' WHERE `numero`='$number'");

    echo "<script>history.go(-1);</script>";
}
