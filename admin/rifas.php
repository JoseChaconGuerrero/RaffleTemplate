<?php
include("./header.php");
include("./sidebar.php");
include('../config/config.php');
$q = "SELECT * FROM raffles";
$result = mysqli_query($con, $q);
?>
<div class="content-wrapper home">
    <div class="wrap">
        <div class="cont">
            <i class="bi bi-caret-right-fill"></i>
            <h1 class="fs-3 text-white">Rifas</h1>
            <a href="./agregar_rifas.php" class="btn btn-custom">Agregar Rifa</a>
            <div class="cont">
                <table class="raffle">
                    <thead>
                        <tr>
                            <th>ID rifa</th>
                            <th>Nombre</th>
                            <th>Cantidad de numeros</th>
                            <th>Tomados</th>
                            <th>Precio por tickets</th>
                            <th>Modificar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../config/config.php');
                        $q = "SELECT * FROM raffles";
                        $result = mysqli_query($con, $q);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row["id"];
                            $query = "SELECT * FROM table_raffle WHERE id_raffle = $id";
                            $result_one = mysqli_query($con, $query);
                            $row_one = mysqli_fetch_assoc($result_one);
                            $table_numbers = $row_one['table_numbers'];
                            $q = "SELECT * FROM $table_numbers WHERE status = 'deactivate'";
                            $result_two = mysqli_query($con, $q);
                            $taken = mysqli_num_rows($result_two);
                        ?>
                            <tr>
                                <td data-label="ID rifa"><?= $row["id"] ?></td>
                                <td data-label="Nombre"><?= $row["title"] ?></td>
                                <td data-label="Cantidad de numeros"><?= $row["qty_numbers"] ?></td>
                                <td data-label="Tomados"><?= $taken ?></td>
                                <td data-label="Precio por tickets"><?= $row["price_per_number"] ?></td>
                                <td data-label="Modificar" class="modify"><a href="./ver_tickets.php?number=<?= $row['id'] ?>"><i class="bi bi-eye"></i></a><a href="./agregar_rifas.php?number=<?= $row['id'] ?>"><i class="bi bi-app-indicator"></i> </a> <a href="../acciones/eliminar_rifa.php?number=<?= $row['id'] ?>"><i class="bi bi-x-circle-fill"></i> </a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="cont">
            <?php include("./rifa_principal.php") ?>
        </div>
        <div class="cont">
            <?php include("./numero_principal.php") ?>
        </div>
    </div>
</div>
<?php
include("./footer.php")
?>