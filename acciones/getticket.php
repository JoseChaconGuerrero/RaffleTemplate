<?php
include('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $ticket = $_GET["ticket"];
    $result = mysqli_query($con, "SELECT * FROM table_raffle WHERE id_raffle = $id");
    $data = mysqli_fetch_assoc($result);
    $table_name = $data["table_tickets"];

    $result = mysqli_query($con, "SELECT * FROM $table_name WHERE numero = '$ticket'") or die(mysqli_error($con));;

    $numbers = array();
    if ($result->num_rows > 0) {
        while ($row = $Data = mysqli_fetch_assoc($result)) {
            $numbers[] = $row;
        }
    }

    echo json_encode($numbers[0]);
}