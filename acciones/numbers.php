<?php
include('../config/config.php');

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $number = $data["selectedKeys"];
    $configuracion = mysqli_query($con, "SELECT number FROM raffle_configuration WHERE id = 1")->fetch_assoc();

    $nombre = $data["nombre"] ?? "admin";
    $cedula = $data["cedula"] ?? "";
    $email = $data["email"] ?? "";
    $numero = $data["numero"] ?? $configuracion['number'];
    $ubicacion = $data["ubicacion"];
    $id = $data["id"];

    $query = "SELECT * FROM raffles WHERE id= $id";
    $result1 = mysqli_query($con, $query);
    $data1 = mysqli_fetch_assoc($result1);
    $title = $data1["title"];

    $q = "SELECT * FROM table_raffle WHERE id_raffle = $id";
    $result2 = mysqli_query($con, $q);
    $data2 = mysqli_fetch_assoc($result2);
    $table_name = $data2["table_numbers"];
    $table_tickets = $data2["table_tickets"];

    $telefono = "+58" . $configuracion["number"];
    $leido                   = "NO";
    $msj                 = "Hola, soy $nombre, con mi celular, $numero, registre estos numeros: $number en el sorteo $title %0A____________%0A%F0%9F%98%8ABendecido%2Fa%20gracias%20por%20confiar%20en%20mi%20trabajo%2C%20es%20un%20gusto%20para%20m%C3%AD%20que%20formes%20parte%20de%20los%20ganadores%20de%20Sahami%20rifas.%0A%0A%F0%9F%8F%86Estamos%20premiando%20a%20nuestros%20seguidores%20en%20Instagram%20este%20proximo%2010%20de%20diciembre%20con%20%24200%20Dolaritos%20solo%20por%20seguirnos%20y%20comentar%20el%20post%20que%20esta%20anclado%20al%20perfil%20no%20dejes%20de%20participar%20%F0%9F%98%89%0Ahttps%3A%2F%2Fwww.instagram.com%2Fsahamirifas%2Fprofilecard%2F%3Figsh%3DMTEya3kzcXhxYjUyOQ%3D%3D%0A%0ATe%20dejo%20las%20cuentas%E2%AC%87%0A%0AZELLE%0AKarla%20Aguinaga%0APaolaaguinaga.pa%40gmail.com%0ARecuerda%20enviarnos%20el%20nombre%20del%20titular%20de%20la%20cuenta%20del%20Zelle%0A%0APAGO%20M%C3%93VIL%0ABanco%20de%20Venezuela%200102%0A14626887%0A0416-4708085%0ATasa%3A%20MONITOR%0A%0ANequi%0A322%204144038%0A4.200%20pesos%20x%20d%C3%B3lar.%0AZINLI%0Akeiderguerra90%40gmail.com%0A%0ABanco%20de%20chile%0ANombre%3A%20WILBERT%20ALEXIS%20GUERRA%20ORTIZ%0ARUT%3A%2027231360-1%0ABanco%20prepago%20Tenpo%0ATipo%20de%20cuenta%3A%20Cuenta%20Vista%0ANumero%20de%20cuenta%3A%20111127231360%0ACorreo%3A%20guerraortizwilbertalexis%40gmail.com%0A%0ASi%20deseas%20alguna%20otra%20cuenta%20o%20pagar%20en%20efectivo%20me%20lo%20haces%20saber%20y%20con%20todo%20gusto%20te%20ayudo.%0A%0A%28Solo%20tenemos%20motorizado%20activo%20en%20la%20ciudad%20de%20san%20Juan%20de%20Colon%20y%20C%C3%BAcuta%2C%29%0A%28Si%20ya%20realizaste%20el%20pago%20y%20todo%20est%C3%A1%20en%20orden%20vas%20jugando%20%0AEn%20un%20lapso%20no%20mayor%20a%2024%20horas%20las%20asesoras%20verificar%C3%A1n%20tus%20boletos%29%0A%0AAgradecemos%20por%20tu%20paciencia%20si%20demoramos%20un%20poco%20en%20responder";

    $array = explode(',', $number);
    foreach ($array as $elemento) {
        $query = ("UPDATE `$table_name` SET `status`= CASE
    WHEN `status` = 'activate' THEN 'deactivate'
    WHEN `status` = 'deactivate' THEN 'activate'
    ELSE `status` END WHERE number = $elemento");
        $reg = mysqli_query($con, $query);
    }
    foreach ($array as $elemento) {
        $existTicket = mysqli_query($con, "SELECT * FROM `$table_tickets` WHERE numero = $elemento");
        if ($existTicket->num_rows == 0) {
            $addTicketQuery = ("INSERT INTO `$table_tickets` (`numero`, `nombre`, `cedula`, `celular`, `estado`, `correo`, `pago`) VALUES ('$elemento','$nombre','$cedula','$numero','$ubicacion','$email', 'no')");
            $ticketQuery = mysqli_query($con, $addTicketQuery);
        } else {
            mysqli_query($con,  "DELETE FROM `$table_tickets` WHERE numero = $elemento");
        }
    }

    $url = "https://api.whatsapp.com/send?phone=" . $telefono . "&text=" . $msj;

    echo json_encode($url);
}
