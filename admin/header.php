<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahami rifas</title>
    <!-- Booostrap   -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/table_numbers.css">
    <link rel="stylesheet" href="../assets/css/table_admin.css">
    <!-- Icon Image -->
    <link rel="icon" href="../assets/imgs/sahami.jpg" type="image/x-icon">
</head>

<body class="bg-first">
    <?php
    session_start();
    if (!$_SESSION["id"] || $_SESSION["cargoAdm"] != 1) {
        header("location: ../");
    }
    include("./top.php")
    ?>