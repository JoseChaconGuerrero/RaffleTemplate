<?php
include("./header.php");
include("./sidebar.php");
include('../config/config.php');

if (isset($_GET["number"])) {
    $number = $_GET["number"];
    $result = mysqli_query($con, "SELECT * FROM table_raffle WHERE id_raffle = $number");
    $data =  mysqli_fetch_assoc($result);
    $table_tickets = $data["table_tickets"];
}

$query = "SELECT * FROM $table_tickets";
$result = mysqli_query($con, $query);
$tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="content-wrapper home">
    <div class="hidden" id="ticket"><?= $number ?></div>
    <div class="wrap">
        <div class="cont">
            <i class="bi bi-caret-right-fill"></i>
            <h1 class="fs-3 text-white">Tickets</h1>

            <!-- Barra de búsqueda -->
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Buscar por número de ticket..." onkeyup="filterTable()">
            </div>

            <div class="cont">
                <table class="raffle" id="raffleTable">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            <th>Pago</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php
                        foreach ($tickets as $ticket) {
                        ?>
                            <tr>
                                <td data-label="Numero"><?= $ticket["numero"] ?></td>
                                <td data-label="Nombre"><?= $ticket["nombre"] ?></td>
                                <td data-label="Cedula"><?= $ticket["cedula"] ?></td>
                                <td data-label="Celular"><?= $ticket["celular"] ?></td>
                                <td data-label="Correo"><?= $ticket["correo"] ?></td>
                                <td data-label="Pago"><?= $ticket["pago"] ?></td>
                                <td class="modify">
                                    <?php if ($ticket["pago"] == "no") { ?>
                                        <a href="../acciones/pagar_ticket.php?number=<?= $ticket["numero"] ?>&ticket=<?= $number ?>"><i class="bi bi-cash"></i></a>
                                    <?php } else { ?>
                                        <a href="../acciones/ver_ticket.php?number=<?= $ticket["numero"] ?>&ticket=<?= $number ?>"><i class="bi bi-eye"></i></a>
                                    <?php } ?>
                                    <a href="../acciones/eliminar_ticket.php?number=<?= $ticket["numero"] ?>&ticket=<?= $number ?>"><i class="bi bi-x-circle-fill"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="pagination" id="pagination">
                <!-- Contenido será generado por JavaScript -->
            </div>
        </div>
    </div>
</div>

<script>
    const tickets = <?php echo json_encode($tickets); ?>;
    const ticketNumber = document.getElementById("ticket").innerHTML;
    const resultsPerPage = 10;
    let currentPage = 1;

    function renderTable(page) {
        const start = (page - 1) * resultsPerPage;
        const end = start + resultsPerPage;
        const tableBody = document.getElementById("tableBody");
        tableBody.innerHTML = "";

        const visibleTickets = tickets.slice(start, end);
        visibleTickets.forEach(ticket => {
            const row = `
            <tr>
                <td data-label="Numero">${ticket.numero}</td>
                <td data-label="Nombre">${ticket.nombre}</td>
                <td data-label="Cedula">${ticket.cedula}</td>
                <td data-label="Celular">${ticket.celular}</td>
                <td data-label="Correo">${ticket.correo}</td>
                <td data-label="Pago">${ticket.pago}</td>
                <td class="modify"> 
                    ${ticket.pago === "no" ? `<a href="../acciones/pagar_ticket.php?number=${ticket.numero}&ticket=${ticketNumber}"><i class="bi bi-cash"></i></a>` : `<a href="../acciones/desverificar_ticket.php?number=${ticket.numero}&ticket=<?= $number ?>"><i class="bi bi-x-circle"></i></a>`}
                    <a href="../acciones/eliminar_ticket.php?number=${ticket.numero}&ticket=${ticketNumber}"><i class="bi bi-x-circle-fill"></i></a>
                </td>
            </tr>
        `;
            tableBody.innerHTML += row;
        });
    }

    function renderPagination() {
        const total_pages = Math.ceil(tickets.length / resultsPerPage);
        const pagination = document.getElementById("pagination");
        pagination.innerHTML = "";

        if (currentPage > 1) {
            pagination.innerHTML += `<a href="#" onclick="goToPage(1)"><</a>`;
            pagination.innerHTML += `<a href="#" onclick="goToPage(${currentPage - 1})">&laquo;</a>`;
        }

        for (let i = 1; i <= total_pages; i++) {
            pagination.innerHTML += `<a href="#" onclick="goToPage(${i})"${i === currentPage ? ' class="active"' : ''}>${i}</a>`;
        }

        if (currentPage < total_pages) {
            pagination.innerHTML += `<a href="#" onclick="goToPage(${currentPage + 1})">&raquo;</a>`;
            pagination.innerHTML += `<a href="#" onclick="goToPage(${total_pages})">></a>`;
        }
    }

    function goToPage(page) {
        currentPage = page;
        renderTable(page);
        renderPagination();
    }

    function filterTable() {
        const input = document.getElementById("searchInput").value.toUpperCase();
        const filteredTickets = tickets.filter(ticket => ticket.numero.toUpperCase().indexOf(input) > -1);
        const tableBody = document.getElementById("tableBody");
        tableBody.innerHTML = "";

        filteredTickets.forEach(ticket => {
            const row = `
            <tr>
                <td data-label="Numero">${ticket.numero}</td>
                <td data-label="Nombre">${ticket.nombre}</td>
                <td data-label="Cedula">${ticket.cedula}</td>
                <td data-label="Celular">${ticket.celular}</td>
                <td data-label="Correo">${ticket.correo}</td>
                <td data-label="Pago">${ticket.pago}</td>
                <td class="modify"> 
                    ${ticket.pago === "no" ? `<a href="../acciones/pagar_ticket.php?number=${ticket.numero}&ticket=${ticketNumber}"><i class="bi bi-cash"></i></a>` : `<a href="../acciones/desverificar_ticket.php?number=${ticket.numero}&ticket=<?= $number ?>"><i class="bi bi-x-circle"></i></a>`}
                    <a href="../acciones/eliminar_ticket.php?number=${ticket.numero}&ticket=${ticketNumber}"><i class="bi bi-x-circle-fill"></i></a>
                </td>
            </tr>
        `;
            tableBody.innerHTML += row;
        });

        // Re-render paginated results after filter
        renderPagination();
    }

    window.onload = function() {
        renderTable(currentPage);
        renderPagination();
    }
</script>

<?php
include("./footer.php")
?>