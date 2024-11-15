<?php
include('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["number"])) {
    $id = $_GET["number"];
    $title = $_POST["title"];
    $price = $_POST["price_per_numbers"];
    $min_tickets = $_POST["min_tickets"];
    $description = $_POST["description"];
    $date = $_POST["date"];


    if (isset($_FILES["image"]['name'])) {
        $img          = $_FILES["image"]['name'];
        $file_loc    = $_FILES['image']['tmp_name'];
        $mimeType    = $_FILES["image"]["type"];

        $fileExtension  = substr(strrchr($img, '.'), 1);
        $logitudpass     = 10;
        $newname         = substr(md5(microtime()), 1, $logitudpass);
        $image         = $newname . '.' . $fileExtension;

        //Verificando si existe el directorio de lo contarios lo creamos el Directorio
        $directorio = "../assets/raffle";
        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
        }

        $dir            = opendir($directorio);
        $target_path     = $directorio . '/' . $image;
        //Moviendo imagen de Perfil
        if (move_uploaded_file($file_loc, $target_path)) {
            $Q = "UPDATE raffles SET  title = '$title',
            description = '$description',
            date = '$date',
            image = '$image',
            price_per_number = $price WHERE id=$id";
            mysqli_query($con, $Q);
        }
    }

    $Q = "UPDATE raffles SET  title = '$title',
    description = '$description',
    date = '$date',
    price_per_number = $price,
    min_tickets = $min_tickets WHERE id=$id";
    mysqli_query($con, $Q);

    header("location: ../admin/rifas.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_GET["number"])) {
    $title = $_POST["title"];
    $qty = $_POST["qty_numbers"];
    $price = $_POST["price_per_numbers"];
    $min_tickets = $_POST["min_tickets"];
    $description = $_POST["description"];
    $date = $_POST["date"];
    $table_numbers = strtolower(str_replace(' ', '', $title)) . "numbers";
    $table_tickets = strtolower(str_replace(' ', '', $title)) . "tickets";

    $img          = $_FILES["image"]['name'];
    $file_loc    = $_FILES['image']['tmp_name'];
    $mimeType    = $_FILES["image"]["type"];

    $fileExtension  = substr(strrchr($img, '.'), 1);
    $logitudpass     = 10;
    $newname         = substr(md5(microtime()), 1, $logitudpass);
    $image         = $newname . '.' . $fileExtension;

    $directorio = "../assets/raffle";
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
    }

    $dir            = opendir($directorio);
    $target_path     = $directorio . '/' . $image;

    if (move_uploaded_file($file_loc, $target_path)) {
        $Q = "INSERT INTO raffles (title, description, date, image, qty_numbers, price_per_number, min_tickets)
        VALUES ('$title', '$description', '$date', '$image', $qty, $price, $min_tickets)";
        mysqli_query($con, $Q);

        $lastID = mysqli_insert_id($con);

        $consulta = "SELECT * FROM raffles WHERE id = $lastID";
        $result = mysqli_query($con, $consulta);

        if ($fila = mysqli_fetch_assoc($result)) {
            $id = $fila["id"];

            $create_numbers = "CREATE TABLE $table_numbers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            number VARCHAR(10),
            status VARCHAR(10) DEFAULT 'activate')";

            if (mysqli_query($con, $create_numbers)) {
                $numeroStr = (string)$qty;
                $longitud = strlen($numeroStr - 1);
                for ($i = 0; $i < $qty; $i++) {
                    $number = sprintf("%0{$longitud}d", $i);
                    $sql = "INSERT INTO $table_numbers (number, status) VALUES ('$number', 'activate')";
                    if ($con->query($sql) !== TRUE) {
                        echo "Error al insertar registro: " . $con->error;
                    }
                }
            };
            $create_tickets = "CREATE TABLE $table_tickets (
            numero VARCHAR(10) PRIMARY KEY,
            nombre VARCHAR(100),
            cedula VARCHAR(20),
            celular VARCHAR(15),
            estado VARCHAR(20),
            correo VARCHAR(100),
            pago VARCHAR(2));";

            mysqli_query($con, $create_tickets);

            $Q = "INSERT INTO `table_raffle` (`id_raffle`, `table_numbers`, `table_tickets`)
            VALUES ('$id', '$table_numbers', '$table_tickets')";
            $conexion = mysqli_query($con, $Q);
        }

        $exist_raffle = mysqli_query($con, "SELECT * FROM raffle_configuration");
        if($exist_raffle->num_rows == 0){
            $create_configuration = mysqli_query($con, "INSERT INTO `raffle_configuration`(`select_raffle`, `number`) VALUES ($lastID,'')");
        }

        header("location: ../admin/rifas.php");
    }
}
