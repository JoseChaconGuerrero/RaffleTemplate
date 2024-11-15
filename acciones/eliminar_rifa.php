<?php
include('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["number"])) {
    $id = $_GET["number"];

    $q = "SELECT * FROM `table_raffle` WHERE id_raffle= $id";
    $result = mysqli_query($con, $q);

    if ($data = mysqli_fetch_assoc($result)) {
        $numbers = $data["table_numbers"];
        $tickets = $data["table_tickets"];
        $delete = "DELETE FROM `table_raffle` WHERE id_raffle = $id";
        mysqli_query($con, $delete);
        $delete = "DELETE FROM `raffles` WHERE id = $id";
        mysqli_query($con, $delete);

        // Desactivar las verificaciones de clave foránea
        mysqli_query($con, "SET foreign_key_checks = 0");

        // Eliminar las tablas
        $delete = "DROP TABLE $numbers";
        mysqli_query($con, $delete);

        $delete = "DROP TABLE $tickets";
        mysqli_query($con, $delete);

        // Reactivar las verificaciones de clave foránea
        mysqli_query($con, "SET foreign_key_checks = 1");
    }

    header("location: ../admin/rifas.php");
}
