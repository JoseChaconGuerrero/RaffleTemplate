<?php
include('./config/config.php');

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$q = "SELECT * FROM raffles";
$result = mysqli_query($con, $q);

$path = [
    "" => "user/home.php",
    "login" => "servi/index.php",
    "registro" => "servi/registerUser.php",
];

while ($row = mysqli_fetch_assoc($result)) {
    $fecha = new DateTime($row["date"]);
    $_SESSION['raffle_id'] = $row["id"];
    $partes = explode(' ', $row["title"]);
    $primeraPalabra = strtolower($partes[0]);

    $path[$primeraPalabra] = "user/details.php";
}

$realurl = parse_url($_SERVER["REQUEST_URI"])['path'];
$posicion = strrpos($realurl, '/');
$url = substr($realurl, $posicion + 1);

if (array_key_exists($url, $path)) {
    include $path[$url];
} else {
    http_response_code(404);
    require "user/404.php";
}
?>
