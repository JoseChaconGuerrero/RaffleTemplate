<?php

$rifas = mysqli_query($con, "SELECT * From raffles");
$configuracion = mysqli_query($con, "SELECT select_raffle FROM raffle_configuration")->fetch_assoc();

?>

<h2 class="fs-3 text-white">Cambiar rifa principal</h2>
<form method="POST" action="../acciones/cambiar_rifa.php">
    <div class="d-flex flex-column gap-2">
        <select id="select_raffle" name="select_raffle" class="change">
            <?php while ($rifa = $rifas->fetch_assoc()): ?>
                <option value="<?= $rifa['id'] ?>" <?= $rifa['id'] == $configuracion['select_raffle'] ? 'selected' : '' ?>>
                    <?= $rifa['title'] ?>
                </option>
            <?php endwhile; ?>
        </select>
        <button type="submit" class="btn btn-custom">Cambiar rifa</button>
    </div>
    </form>