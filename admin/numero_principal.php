<?php
$configuracion = mysqli_query($con, "SELECT number FROM raffle_configuration");
$numero["number"] = "";
if ($configuracion->num_rows > 0){
    $numero = $configuracion->fetch_assoc();
}

?>

<h2 class="fs-3 text-white">Cambiar numero principal</h2>
<form method="POST" action="../acciones/cambiar_numero.php">
    <div class="d-flex flex-column gap-2">
        <input type="text" name="number" class="change" value="0<?= $numero["number"]?>">
        <button type="submit" class="btn btn-custom">Cambiar numero</button>
    </div>
</form>