<?php
include('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $select_raffle = $_POST["select_raffle"];

    $query = mysqli_query($con, "UPDATE raffle_configuration SET select_raffle = $select_raffle");
    header("location: ../admin/rifas.php");
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $select = mysqli_query($con, "SELECT * FROM raffle_configuration");
    $data_select = mysqli_fetch_assoc($select);

    $select_raffle = $data_select["select_raffle"];

    $raffle = mysqli_query($con, "SELECT * FROM raffles WHERE id = $select_raffle");
    $data = mysqli_fetch_assoc($raffle);

    $fecha = new DateTime($data["date"]);
    $fecha_formateada = $fecha->format('d M, Y');
    $hora = $fecha->format('h:i A');

    echo json_encode($fecha);
};
