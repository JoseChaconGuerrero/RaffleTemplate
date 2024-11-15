<?php
$idConectado        = $_SESSION['id'];
?>

<nav class="navbar navbar-expand-lg bg-first shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="../"> <img src="../assets/imgs/sahami.jpg" alt="Bootstrap" width="70" height="70"></a>
        <div class=" justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active color-text" href="../servi/acciones/salir.php?id=<?php echo $idConectado; ?>">
                    Salir
                </a>
            </div>
        </div>
    </div>
</nav>