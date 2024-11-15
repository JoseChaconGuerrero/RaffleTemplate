<?php
include("./config/config.php");

$q = "SELECT * FROM raffles WHERE title LIKE '%$url%'";
$result = mysqli_query($con, $q);
$data = mysqli_fetch_assoc($result);
$number = $data["id"];
$id = $data["id"];
$totalNumbers = $data["qty_numbers"];
$min_tickets = $data["min_tickets"];
$price = $data["price_per_number"];
$query = "SELECT * FROM table_raffle WHERE id_raffle = $id";
$result_one = mysqli_query($con, $query);
$row_one = mysqli_fetch_assoc($result_one);
$table_numbers = $row_one['table_numbers'];
$q = "SELECT * FROM $table_numbers WHERE status = 'deactivate'";
$result_two = mysqli_query($con, $q);
$taken = mysqli_num_rows($result_two);

$porcentaje = ($taken / $totalNumbers) * 100;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sahami rifas</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link rel="icon" type="image/png" href="./assets/imgs/sahami.jpg">
    <meta name="author" content="Sahami">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1243944980272267');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1243944980272267&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '3125536114252256');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=3125536114252256&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    <!-- Booostrap   -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./servi/assets/css/loader.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/landing-527a7dadda8e14dc75554ad9cde4aa164a0a458d3eea46076f460547.css">
    <link rel="stylesheet" href="./assets/css/table_numbers.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        .header {
            background: #4F4F4F;
        }

        .header .header-title,
        .header .header-subtitle,
        .header pre,
        .header p,
        .progress-percent {
            color: #ffffff;
        }

        .navbar {
            border-top: 8px solid #1B263B;
            border-bottom: 8px solid #1B263B;
        }

        .header-scrolled {
            -webkit-box-shadow: 0 5px 6px 0 #1B263B6b;
            box-shadow: 0 5px 6px 0 #1B263B6b;
        }

        a.link {
            color: #1B263B;
        }

        button.magic_button {
            color: #F4C542;
            font-weight: 900;
        }

        .progress-actual {
            background: #1B263B;
        }

        .progress-total {
            border: 2px solid #000000;
        }

        button.magic_button:active,
        button.waves-effect.next:active,
        button.waves-effect.prev:active {
            color: #000000 !important;
        }

        .nav-item .nav-link:hover .nav-link-number {
            color: #1B263B !important;
        }

        .nav-item .nav-link:hover .nav-link-menu {
            color: #F4C542 !important;
        }

        .navbar-toggler:not(:disabled):not(.disabled) {
            color: #1B263B;
        }

        .learn-more-btn,
        button {
            background-color: #1B263B;
            padding: 5px 20px;

        }

        .learn-more-btn {
            border-radius: 25px;
        }

        .learn-more-btn,
        .plusminus button,
        .btn-large,
        button.magic_button,
        #buttfixed,
        #containerSearch {
            box-shadow: 0 0 18px #1B263B4a;
        }

        .learn-more-btn:hover,
        button:hover {
            background-color: #000000;
        }

        .learn-more-btn:hover,
        .btn-large:hover,
        .plusminus button:hover,
        button.magic_button:hover,
        #buttfixed:hover {
            box-shadow: 0 0 18px #0000008a;
        }

        .card .card-body .payment-type .types .type.selected::after {
            color: #F4C542;
            border: 2px solid #F4C542;
        }

        .btn-invert {
            background-color: #1B263B !important;
        }

        .services-accordion .accordion {
            background-color: #1B263B;
        }

        .accordion:active,
        .accordion:hover {
            color: #FFFFF1;
            background-color: #000000 !important;
        }

        .btn-invert:hover {
            background-color: #000000 !important;
            color: #FFFFF1;
        }

        .header-img-section img {
            box-shadow: 0 0 18px #00000069;
        }

        #msjNombre,
        .pricing-head h4,
        .clients-title,
        .contact-title,
        .pricing-title h2,
        .blog-title,
        .services-title,
        .contact-subtitle,
        strong#textSeleccionados,
        strong#total_amount {
            color: #F4C542;
        }

        input[type=range]+.thumb,
        .btn,
        .btn-large,
        .btn-small,
        .btn:focus,
        .btn-large:focus,
        .btn-small:focus,
        .btn-floating:focus,
        .btn_view_selected:hover {
            background-color: #1B263B;
        }

        input[type=range]+.thumb .value,
        .input-field .prefix.active,
        .dropdown-content li>a,
        .dropdown-content li>span {
            color: #000000;
        }

        button.btn-large,
        button.btn-small,
        a.btn-large,
        a.btn-small {
            border: 2px solid transparent;
        }

        .featured_award {
            background: #1B263B;
        }

        .poppuler .btn {
            color: #F4C542;
        }

        .plusminus button:active,
        .plusminus button:focus {
            background: #000000;
            color: #FFFFF1 !important;
        }

        .learn-more-btn,
        button,
        .plusminus button {
            color: #ffffff;
        }

        button.magic_button:hover,
        #page_navigation>button:hover {
            color: #FFFFF1 !important;
        }

        button.magic_button:focus {
            color: #000;
        }

        .learn-more-btn:hover,
        button.btn-large:hover {
            color: #FFFFF1;
        }

        .plusminus button:hover {
            color: #FFFFF1;
        }

        strong#textSeleccionados {
            color: #F4C542;
            background: #f7f7f7
        }

        .teal,
        .teal.lighten-1 {
            background-color: #1B263B !important;
        }

        .teal.lighten-2 {
            background-color: #1B263B !important
        }

        .sidenav-trigger,
        .teal-text.text-lighten-2 {
            color: #1B263B !important;
        }

        input:not([type]):focus:not([readonly])+label,
        input[type=text]:not(.browser-default):focus:not([readonly])+label,
        input[type=password]:not(.browser-default):focus:not([readonly])+label,
        input[type=email]:not(.browser-default):focus:not([readonly])+label,
        input[type=url]:not(.browser-default):focus:not([readonly])+label,
        input[type=time]:not(.browser-default):focus:not([readonly])+label,
        input[type=date]:not(.browser-default):focus:not([readonly])+label,
        input[type=datetime]:not(.browser-default):focus:not([readonly])+label,
        input[type=datetime-local]:not(.browser-default):focus:not([readonly])+label,
        input[type=tel]:not(.browser-default):focus:not([readonly])+label,
        input[type=number]:not(.browser-default):focus:not([readonly])+label,
        input[type=search]:not(.browser-default):focus:not([readonly])+label,
        textarea.materialize-textarea:focus:not([readonly])+label {
            color: #1B263B !important;
        }

        input:not([type]):focus:not([readonly]),
        input[type=text]:not(.browser-default):focus:not([readonly]),
        input[type=password]:not(.browser-default):focus:not([readonly]),
        input[type=email]:not(.browser-default):focus:not([readonly]),
        input[type=url]:not(.browser-default):focus:not([readonly]),
        input[type=time]:not(.browser-default):focus:not([readonly]),
        input[type=date]:not(.browser-default):focus:not([readonly]),
        input[type=datetime]:not(.browser-default):focus:not([readonly]),
        input[type=datetime-local]:not(.browser-default):focus:not([readonly]),
        input[type=tel]:not(.browser-default):focus:not([readonly]),
        input[type=number]:not(.browser-default):focus:not([readonly]),
        input[type=search]:not(.browser-default):focus:not([readonly]),
        textarea.materialize-textarea:focus:not([readonly]) {
            border-bottom: 1px solid #1B263B;
            -webkit-box-shadow: 0 1px 0 0 #1B263B;
            box-shadow: 0 0 6px 0 #1B263B;
        }

        input.valid:not([type]),
        input.valid:not([type]):focus,
        input[type=text].valid:not(.browser-default),
        input[type=text].valid:not(.browser-default):focus,
        input[type=password].valid:not(.browser-default),
        input[type=password].valid:not(.browser-default):focus,
        input[type=email].valid:not(.browser-default),
        input[type=email].valid:not(.browser-default):focus,
        input[type=url].valid:not(.browser-default),
        input[type=url].valid:not(.browser-default):focus,
        input[type=time].valid:not(.browser-default),
        input[type=time].valid:not(.browser-default):focus,
        input[type=date].valid:not(.browser-default),
        input[type=date].valid:not(.browser-default):focus,
        input[type=datetime].valid:not(.browser-default),
        input[type=datetime].valid:not(.browser-default):focus,
        input[type=datetime-local].valid:not(.browser-default),
        input[type=datetime-local].valid:not(.browser-default):focus,
        input[type=tel].valid:not(.browser-default),
        input[type=tel].valid:not(.browser-default):focus,
        input[type=number].valid:not(.browser-default),
        input[type=number].valid:not(.browser-default):focus,
        input[type=search].valid:not(.browser-default),
        input[type=search].valid:not(.browser-default):focus,
        textarea.materialize-textarea.valid,
        textarea.materialize-textarea.valid:focus,
        .select-wrapper.valid>input.select-dropdown {
            border-bottom: 1px solid #1B263B;
            -webkit-box-shadow: 0 1px 0 0 #1B263B;
            box-shadow: 0 0 2px 0 #7d7d7d;
        }

        .chip .close {
            background: #0000009e;
        }

        .chip .close:hover {
            background: #000000;
        }

        .chip.selected_number,
        #pagingBox div.chip.selected {
            background: #1B263B;
        }

        .container_selected_number small>span {
            color: #1B263B;
        }

        .btn:hover,
        .btn-large:hover,
        .btn-small:hover {
            background-color: #000000;
        }

        .chip.misticketsson {
            background: #1B263B;
        }

        @media screen and (min-width: 992px) {
            body widget {
                -webkit-filter: drop-shadow(1px 1px 6px #4F4F4F);
                filter: drop-shadow(1px 1px 6px #4F4F4F);
            }
        }

        body widget[type='ticket'] .top,
        body widget[type='ticket'] .bottom,
        body widget[type='ticket'] .rip {
            background-color: #4F4F4F;
        }

        body widget[type='ticket'] .rip:before,
        body widget[type='ticket'] .rip:after {
            border-top-color: #000000 !important;
            border-right-color: #000000 !important;
        }

        body widget[type='ticket'] .buy,
        body widget[type='ticket'] .bottom>strong {
            color: #4F4F4F;
        }

        body widget[type='ticket'] .top {
            border-left: 2px solid #4F4F4F;
            border-right: 2px solid #4F4F4F;
        }

        body widget[type='ticket'] .bottom>strong {
            border: 2px dashed #4F4F4F;
        }

        body widget[type='ticket'] .mode,
        body widget[type='ticket'] .status {
            color: #4F4F4F;
        }

        body widget .container_banner>div.tourname {
            background: #4F4F4F;
            background: linear-gradient(180deg, #38423dfc 0%, #38423d4a 100%);
        }

        body widget[type='ticket'] .rip {
            box-shadow: 0 1px 0 0 #4F4F4F, 0 -1px 0 0 #4F4F4F;
        }

        .bandname.-bold {
            border-top: 4px solid #000000;
            color: #4F4F4F;
        }

        .switch label input[type=checkbox]:checked+.lever {
            background-color: #1B263B;
        }

        .switch label input[type=checkbox]:checked+.lever:after {
            background-color: #000000;
        }

        .footer-section {
            background-color: #1B263B;
        }

        .footer-sells {
            display: flex;
            justify-content: center;
            background-color: #1B263B;
            margin: auto;
        }

        .footer-sells p {
            color: #fff;
            padding-bottom: 25px;
        }

        .footer-sells p a {
            color: #F4C542;
        }

        .modal i {
            color: #F4C542;
        }

        #randomShuffleNumber {
            transition: all .66s ease-out;
        }

        .generate.number.winner {
            color: #1B263B;
            text-shadow: 0 0 22px #0000004a;
        }

        .generate.number {
            color: #F4C542;
        }

        #buttfixed {
            background: #1B263B;
        }

        #buttfixed:hover {
            background: #000000;
        }

        #buttfixed>span {
            color: #F4C542;
        }

        .modal-overlay {
            background: #F4C542;
        }

        img.loading {
            background: #000000c4;
        }

        .footer-social-media-icon .fa:hover {
            color: #000000;
        }

        body .chip {
            width: 60px;
        }

        #fechaFormateada {
            text-transform: uppercase;
        }
    </style>

    <style>
        .chip>i.close {
            display: none !important
        }

        button#btnMinus {
            background: #1B263B;
        }

        .contact-sectionXXX {
            display: none !important
        }

        #nombres>span:last-child {
            display: none !important
        }

        #btnMinusXX {
            pointer-events: none !important;
        }

        .chip.selected_numberXX>i {
            display: none !important
        }

        .chip.selectedXX {
            pointer-events: none !important;
        }

        .XXcontainerAllVoucher>div,
        .XXcontainerAllVoucher>h4 {
            display: none
        }

        XX.containerAllVoucher>div.nopadding {
            display: block !important
        }


        .navbar,
        .header-scrolled {
            background-color: #161616 !important;
        }

        .nav-link-menu {
            color: #fff
        }

        .nav-link-number {
            display: none !important
        }

        .navbar-toggler:not(:disabled):not(.disabled) {
            color: #ffffff;
        }

        @media screen and (max-width: 991.98px) {
            .navbar-collapse {
                background-color: #161616;
            }

            .navbar-collapse .nav-link-menu {
                color: #fff !important;
            }
        }

        .footer-credits {
            display: none !important
        }

        /* VERIFICATOR */
        .XXXcontact-title-section.text-center.card {
            display: none !important;
        }

        ul, ol{
            margin: 0;
        }
    </style>

    <script src="https://www.google.com/recaptcha/api.js?render=6Lce9REpAAAAAO_mwGdYaHfqe55aa76bTXcdltqT"></script>



</head>

<body class="loaded">
    <div id="demo-content">
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <div id="content"> </div>
    </div>
    <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-header navbar-mobile">
        <div class="navbar-container container">
            <!-- LOGO -->
            <div class="navbar-brand">
                <a class="navbar-brand-logo" href="./">
                    <img id="clientLogo" src="./assets/imgs/sahami.jpg" width="50px" height="50px" alt="Logo">
                </a>
            </div>
            <button id="buttonNavMobile" class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa fa-th-large" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-around" id="navbarNav">
                <ul class="navbar-nav menu-navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#top">
                            <p class="nav-link-number">Home</p>
                            <p class="nav-link-menu"><i class="fa fa-home" aria-hidden="true"></i> INICIO</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="nav_my_ticket" class="nav-link" href="#tickets">
                            <p class="nav-link-number">Buscar tus números</p>
                            <p class="nav-link-menu"><i class="fa fa-check-circle" aria-hidden="true"></i> VERIFICADOR</p>
                        </a>
                    </li>
                    <li id="btnBuyTicket" class="nav-item">
                        <a class="nav-link" href="#contacto">
                            <p class="nav-link-number">WhatsApp Ayuda</p>
                            <p class="nav-link-menu"><i class="fa fa-user-circle" aria-hidden="true"></i> CONTACTO</p>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a id="btnGetTickets" class="nav-link learn-more-btn large-btn text-center" href="#comprar">LISTA DE BOLETOS</a>
                    </li>
                    <?php if (isset($_SESSION["id"])) { ?> <li class="nav-item">
                            <a href="./servi/acciones/salir.php?id=<?php echo $_SESSION["id"]; ?>" class="trimRight"><i class="bi bi-x"></i></a>
                        </li><?php } else { ?>
                        <li class="nav-item">
                            <a href="./servi/index.php" class="trimRight"><i class="bi bi-arrow-bar-right"></i></a>
                        </li>
                    <?php
                            } ?>

                </ul>
            </div>
        </div>
    </nav>

    <div id="top"></div>
    <div class="wrapper">
        <div class="header pb-5">
            <div class="container header-container">
                <div class="col-lg-6 header-img-section">
                    <img src="./assets/raffle/<?= $data['image'] ?>" id="imagenFormateada" width="550" height="750">
                </div>

                <div class="col-lg-6  offset-lg-0 header-title-section">
                    <p class="header-subtitle">
                        <i class="fa fa-calendar" aria-hidden="true"></i>

                        <?php
                        $fecha = new DateTime($data["date"]);
                        $fecha_formateada = $fecha->format('d M, Y');
                        $hora = $fecha->format('h:i A');


                        ?>
                        <span class="raffleDrawDate" id="fechaFormateada"><?= $fecha_formateada ?></span> &#160
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <span class="raffleDrawHour" id="horaFormateada"><?= $hora ?></span>
                    </p>
                    <div class="progress-contain">
                        <div class="progress-actual" style="width: <?= $porcentaje ?>%;"></div>
                        <div class="progress-total"></div>
                        <div class="progress-percent" style="left: <?= $porcentaje ?>%;"><?= $porcentaje ?>%</div>
                    </div>
                    <h1 id="raffleName" class="header-title mt-2"> <?= $data["title"] ?></h1>
                    <div class="hidden" id="pricePerNumber"><?= $data["price_per_number"] ?></div>
                    <span id="raffleDescription">
                        <div><?= $data["description"] ?></div>
                    </span>
                </div>
            </div>
        </div>

        <div id="comprar"></div>
        <div id="container-get-ticket" class="pricing-section">
            <div class="container pricing-container pricing-head">

                <article class="card">
                    <div class="container">
                        <div class="card-body container-payment">
                            <div class="payment-type">
                                <div class="pricing-title">
                                    <i class="fa fa-ticket fixleft" aria-hidden="true"></i>
                                    <i class="fa fa-ticket fixright" aria-hidden="true"></i>
                                    <h2><span id="formTitle">LISTA DE BOLETOS</span></h2>
                                    <small data-toggle="tooltip" data-placement="bottom" data-original-title="Más boletos, más descuento" class="textDiscounts" style="display:none">Descuentos activados</small>
                                </div>
                                <div id="new-purchase">
                                    <div id="containerBtnTickets" class="col-lg-12 mb-40">
                                        <div class="row">
                                            <div class="input-field col col-lg-12 s12 m12 text-center">
                                                <div class="plusminus horiz">
                                                    <button id="btnMinus"></button>
                                                    <div>
                                                        <input id="ticketQty" type="number" name="productQty" value="<?=$min_tickets?>" min="<?=$min_tickets?>" max="200">
                                                        <span class="ticket_name">BOLETOS</span>
                                                    </div>
                                                    <button id="btnPlus"></button>
                                                </div>
                                            </div>
                                            <div class="col s12 m12 text-center monto-total-compra">
                                                <h3 id="montoTotal" class="bigText">Total: <?=$min_tickets * $price?> USD</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="get-number"><?= $number ?></div>
                                            <div id="getQtyNumbers" class="hidden"><?= $totalNumbers - 1 ?></div>
                                            <div class="raffleOptions">

                                                <div id="containerSearch" class="mb-2">
                                                    <button id="btnSearchTickets" class="magic_button show"><i class="fa fa-search" aria-hidden="true"></i> BUSCAR</button>
                                                    <?php $length = strlen((string)$totalNumbers - 1) ?>
                                                    <input id="inputSearchTicket" style="display: none;" type="tel" class="validate valid" maxlength="<?= $length ?>">
                                                    <button id="resetSearchTicket" style="display: none;" class="magic_button" value="Reset"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                </div>
                                                <button id="btnRandomNumber" class="magic_button show" style=""> <i class="fa fa-star" aria-hidden="true"></i> <small id="formBtnRandom">Elegir a la Suerte</small> <i class="fa fa-star" aria-hidden="true"></i></button>
                                            </div>
                                            <div class="col-12 numbers-container">

                                                <div id="cuerpo" class="tabla-scroll">

                                                </div>

                                                <div class="text-center">
                                                    <h3 class="bigText">Seleccionados</h3>
                                                    <p id="selectedNumbers" class="bigText">0 de <span id="QtyNumber"><?=$min_tickets?></span></p>
                                                    <div class="box-select">
                                                        <div class="n-select">
                                                            ...
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div id="sectionAllPayments">
                                    <h4 class="mt-20"><i class="fa fa-bank" aria-hidden="true"></i> MODOS DE PAGO</h4>
                                    <div class="col-lg-12 mb-10">
                                        <div class="row">
                                            <div class="input-field col s6 m6">
                                                <h6>Transferencia o depósito</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="container-payments" class="types flex justify-space-between payments-options mb-30">
                                        <div id="ZELLE" class="type option-payment selected">
                                            <div class="logo">
                                                <img src="./assets/imgs/usa-zelle-c.png" width="86" alt="ZELLE">
                                            </div>
                                            <div class="text"></div>
                                        </div>

                                        <div id="ZINLI" class="type option-payment">
                                            <div class="logo">
                                                <img src="./assets/imgs/zinli.png" width="86" alt="ZELLE">
                                            </div>
                                            <div class="text"></div>
                                        </div>

                                        <div id="MOVIL" class="type option-payment">
                                            <div class="logo">
                                                <img src="./assets/imgs/pago_movil.png" width="86" alt="ZELLE">
                                            </div>
                                            <div class="text"></div>
                                        </div>

                                        <div id="BANCO_BCI_CHILE" class="type option-payment">
                                            <div class="logo">
                                                <img src="./assets//imgs/chi-banco-bci.png" width="86" alt="Banco BCI - Chile">
                                            </div>
                                            <div class="text"></div>
                                        </div>

                                        <!-- <div id="BANCOLOMBIA_COLOMBIA" class="type option-payment">
                                            <div class="logo">
                                                <img src="./assets/imgs/col-bancocolombia.png" width="86" alt="BANCOLOMBIA - COLOMBIA">
                                            </div>
                                            <div class="text"></div>
                                        </div> -->

                                        <div id="NEQUI_COLOMBIA" class="type option-payment">
                                            <div class="logo">
                                                <img src="./assets/imgs/col-nequi-1.png" width="86" alt="NEQUI - COLOMBIA">
                                            </div>
                                            <div class="text"></div>
                                        </div>

                                        <div id="EFECTIVO" class="type option-payment">
                                            <div class="logo">
                                                <img src="./assets/imgs/p-no-bank-1-1-1.png" width="86" alt="EFECTIVO">
                                            </div>
                                            <div class="text"></div>
                                        </div>
                                    </div>

                                    <div id="datosBanco" class="text-center input-field col s12 m6">
                                        <div>
                                            <h6>
                                                <span data-toggle="tooltip" data-placement="bottom" title="Zelle Venezuela">ZELLE</span>
                                                <span data-toggle="tooltip" data-placement="bottom" title="Cuenta Personal"><i class="help-account fa fa-user" aria-hidden="true"></i></span>
                                            </h6>
                                        </div>
                                        <div>
                                            <span class="nameAccountNumber"><i class="fa fa-" aria-hidden="true"></i> Correo Electrónico </span>
                                            <h3>Paolaaguinaga.pa@gmail.com<button onclick="actionButtonAccounts('copy', this, 'Paolaaguinaga.pa@gmail.com')" class="magic_button" data-toggle="tooltip" data-placement="top" title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></h3>
                                        </div>
                                        <div class="titularBank"><span>TITULAR</span>Karla Aguinaga</div>
                                        <div class="payment-notes"><b></b></div>
                                    </div>

                                </div>

                                <!-- <div class="containerAllVoucher">
                                    <h4 class="mt-40"><i class="fa fa-file-text" aria-hidden="true"></i> COMPROBANTE DE PAGO</h4>
                                    <div class="col-lg-12 mb-10">
                                        <div class="row">
                                            <div class="input-field col s6 m6">
                                                <h6 id="formLblVoucher">Foto o Captura de Pantalla</h6>
                                            </div>

                                            <label class="checkboxPayAfter form-check" for="checkboxPayAfter" content="">
                                                <input id="checkboxPayAfter" class="form-check-input" name="checkboxPayAfter" type="checkbox"><span id="sendVoucherTextOption">Enviar pago al whatsapp</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-30 nopadding">
                                        <div class="row">
                                            <div id="container_voucher_up" class="col col-12 s12 m6 col-lg-12 elegirbanco">
                                                <div id="formimage" class="file-field input-field s-voucher">
                                                    <div class="btn">
                                                        <span><i class="fa fa-upload" aria-hidden="true"></i></span>
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate"
                                                            type="text"
                                                            placeholder="Foto/Captura de Pantalla" />
                                                    </div>
                                                    <input id="files" data-maxwidth="992"
                                                        data-maxheight="992" type="file"
                                                        accept="image/*" />
                                                </div>

                                            </div>
                                            <div class="col s12 m6 elegirbanco">
                                                <div style="display: none;" id="containimagenVoucher">
                                                    <div class="lds-ripple">
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        <div class="col-lg-12 mb-30 text-center">

                            <form id="formulario" action="./acciones/numbers.php" method="POST">
                                <h4 class=" text-start"><i class="fa fa-user" aria-hidden="true"></i> DATOS PERSONALES</h4>
                                <div class="col-lg-12 mb-30 p0 text-start">
                                    <div class="row mbp0">
                                        <div class="input-field col col-lg-6 col-6">
                                            <label for="nombre" class="">Nombres y Apellidos *</label>
                                            <input placeholder="" id="nombre" type="text" class="validate invalid" required>
                                        </div>
                                        <div class="input-field col col-lg-6 col-6 extra_field_identification">
                                            <label id="label_identification" for="identification" class="active">Cedula *</label>
                                            <input placeholder="" id="identification" type="text" class="validate invalid" maxlength="12" minlength="6" required>
                                        </div>
                                        <div class="input-field col col-lg-6 col-6">
                                            <label class="mr20" for="celular" class="">Celular *</label><br>
                                            <select id="country_code" name="country_code" required>
                                                <option value="+1">🇩🇴 +1</option>
                                                <option value="+1">🇺🇸 +1</option>
                                                <option value="+1">🇵🇷 +1</option>
                                                <option value="+34">🇪🇸 +34</option>
                                                <option value="+502">🇬🇹 +502</option>
                                                <option value="+503">🇸🇻 +503</option>
                                                <option value="+504">🇭🇳 +504</option>
                                                <option value="+505">🇳🇮 +505</option>
                                                <option value="+506">🇨🇷 +506</option>
                                                <option value="+507">🇵🇦 +507</option>
                                                <option value="+51">🇵🇪 +51</option>
                                                <option value="+52">🇲🇽 +52</option>
                                                <option value="+53">🇨🇺 +53</option>
                                                <option value="+54">🇦🇷 +54</option>
                                                <option value="+56">🇨🇱 +56</option>
                                                <option value="+57">🇨🇴 +57</option>
                                                <option value="+58" selected>🇻🇪 +58</option>
                                                <option value="+591">🇧🇴 +591</option>
                                                <option value="+593">🇪🇨 +593</option>
                                                <option value="+595">🇵🇾 +595</option>
                                                <option value="+598">🇺🇾 +598</option>
                                            </select>
                                            <input placeholder="" id="celular" type="tel" class="validate invalid" maxlength="14" minlength="8" required="">
                                        </div>
                                        <div class="input-field col col-lg-6 col-6">
                                            <label for="email" class="">Correo electronico*</label>
                                            <input placeholder="" id="email" type="email" class="validate invalid" required>
                                        </div>
                                        <div class="input-field col col-lg-6 col-6 extra_field_location">
                                            <label id="label_location" for="location" class="active">Ubicación</label>
                                            <select id="location" name="location">
                                                <option value="Amazonas">Amazonas</option>
                                                <option value="Anzoátegui">Anzoátegui</option>
                                                <option value="Apure">Apure</option>
                                                <option value="Aragua">Aragua</option>
                                                <option value="Barinas">Barinas</option>
                                                <option value="Bolívar">Bolívar</option>
                                                <option value="Carabobo">Carabobo</option>
                                                <option value="Cojedes">Cojedes</option>
                                                <option value="Delta Amacuro">Delta Amacuro</option>
                                                <option value="Distrito Capital">Distrito Capital</option>
                                                <option value="Falcón">Falcón</option>
                                                <option value="Guárico">Guárico</option>
                                                <option value="Lara">Lara</option>
                                                <option value="Mérida">Mérida</option>
                                                <option value="Miranda">Miranda</option>
                                                <option value="Monagas">Monagas</option>
                                                <option value="Nueva Esparta">Nueva Esparta</option>
                                                <option value="Portuguesa">Portuguesa</option>
                                                <option value="Sucre">Sucre</option>
                                                <option value="Táchira" selected>Táchira</option>
                                                <option value="Trujillo">Trujillo</option>
                                                <option value="Vargas">Vargas</option>
                                                <option value="Yaracuy">Yaracuy</option>
                                                <option value="Zulia">Zulia</option>
                                                <option value="Estados Unidos">Estados Unidos</option>
                                                <option value="Otro País">Otro País</option>
                                            </select>
                                        </div>
                                        <div class="input-field col col-lg-6 col-6 extra_field_address" style="display:none">
                                            <label id="label_address" for="ubicacion" class="active">Dirección</label>
                                            <input placeholder="" id="ubicacion" type="text" class="validate invalid" maxlength="180" minlength="9">
                                        </div>
                                        <div class="input-field col col-lg-6 col-6 extra_field_custom" style="display:none">
                                        </div>
                                        <div class="input-field col col-lg-6 col-6 extra_field_seller" style="display:none">
                                        </div>
                                    </div>
                                </div>

                                <label class="labelPersonalData form-check" content="">
                                    <small>Al confirmar autorizo el uso de <a href="#!" id="openModalUseData" class="link">Mis Datos Personales</a>
                                    </small>
                                </label>
                                <button type="submit" class="button button-submit blue gradient crop ae-3" id="number">Confirmar</button>
                                <input type="hidden" name="selectedKeys" id="selectedKeys">
                                <input type="hidden" name="id" id="id" value=<?= $data["id"] ?>>
                            </form>
                        </div>

                    </div>
                </article>
            </div>
        </div>


        <div id="tickets"></div>
        <div class="contact-section">
            <div class="container contact-container text-center">
                <div class="col-md-6 contact-title-section text-center card">
                    <h2 class="contact-title mt-4">VERIFICADOR</h2>
                    <p class="contact-subtitle mb-2">DE BOLETOS</p>
                    <div id="boxsearchcel" class="row">
                        <div class="input-field col-12 s12 m6">
                            <input placeholder="" id="findTicket" type="tel" class="text-center validate findPhone" maxlength="16" required>
                        </div>
                        <div class="input-field col s12 m6">
                            <button class="btn-large" id="searchTicket"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                        </div>
                    </div>
                    <div class="learn-more-btn-section"></div>
                </div>
                <div id="resultTickets" class="col-md-12 col s12 m12 mt-4" style="display: block;">
                    <h5 style="display: none;">
                        <strong id="msjNombre"></strong>
                        <br>
                        <img id="qrCode" class="qr" src="" alt="QR" width="120" height="120">
                        <br>
                        <span id="msjRptaBusqueda"></span>
                        <div class="switch">
                            <label>
                                <input type="checkbox" onchange="changeViewTicket()">
                                <span class="lever"></span> Sólo números
                            </label>
                        </div>
                    </h5>
                    <div id="misticketsdiv" class="input-field col s12">
                        <div id="numbersContain" style="display:none">
                            <div class="chip misticketsson ">1234</div>
                        </div>
                        <div id="ticketsContain">
                            <div class="container_ticket">

                                <widget id="widgetTicket" type="ticket" class="--flex-column">

                                </widget>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="shuffle"></div>
        <div class="shuffle-section mb-5" style="display:none">
            <div class="container contact-container text-center">
                <div class="col-md-12 contact-title-section text-center">
                    <p class="contact-subtitle">¡ Mucha Suerte !</p>
                    <h2 class="contact-title mb-0">Sorteador de Boletos</h2>
                    <button id="randomNumberTicket" class="generate number" style="display:none"></button>
                    <div id="boxshuffle" class="row">
                        <div class="input-field col s12 m6">
                            <button id="btnShuffleNumber" class="btn-large" onclick="getRaffleTickets()"><i class="fa fa-play-circle" aria-hidden="true"></i> Iniciar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="contacto"></div>
        <div class="footer-section">
            <div class="container footer-container">
                <div class="col-lg-3 col-md-6 footer-subsection">
                    <h3 class="footer-subsection-title clientLegalName">Sahami Rifas</h3>
                    <p class="footer-subsection-text clientDescription"> SORTEOS - PREMIOS🍀
                        Nuestro objetivo es premiarte!
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 footer-subsection">
                    <h3 class="footer-subsection-title">Secciones</h3>
                    <div class="footer-social-media-menu-section">
                        <a href="#top" class="footer-subsection-text">Inicio</a>
                        <a href="#comprar" class="footer-subsection-text">Lista de Boletos</a>
                        <a href="#tickets" class="footer-subsection-text">Verificar mis Boletos</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-subsection">
                    <h3 class="footer-subsection-title">Contacto</h3>
                    <div class="d-flex">
                        <i class="bi bi-telephone-fill"></i>
                        <p>+58 4161902568</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-subsection">
                    <div class="footer-subsection-2-2">
                        <h3 class="footer-subsection-title">Síguenos</h3>
                        <div class="footer-social-media-icons-section">
                            <a href="https://www.instagram.com/sahamirifas/profilecard/?igsh=MTEya3kzcXhxYjUyOQ%3D%3D"><i class="bi bi-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-sells">
                <p>Diseño de paginas web similares, contáctenos a través de WhatsApp: <a href="https://wa.me/584161336408">+58 416-1336408</a></p>
            </div>
        </div>
    </div>

    <!-- Modal Success -->
    <div id="modalSuccess" class="modal center">
        <div class="modal-content">
            <i class="fa fa-check-circle" aria-hidden="true"></i>
            <h4 id="titleSuccess">Boletos registrados correctamente!</h4>
            <p id="modalMgsSuccess">El evento se transmitirá el día <span class="raffleDrawDate">01 NOV 2024</span> a las <span class="raffleDrawHour">11:59 PM</span> en nuestro <a class="linkTransmission" href="#" rel="nofollow noopener noreferrer" target="_blank" class=""></a>.</p>
            <div class="text-center col-12">
                <h5 id="msgTimeVoucherUpload" class="text-center mt-3 mb-4" style="display:none">Podrás subir tu Voucher en el <b>Verificador</b> o enviándolo a <a class="linkCustomWhatsApp" href="#" rel="nofollow noopener noreferrer" target="_blank">WhatsApp <i class="fa fa-external-link" aria-hidden="true"></i></a><br>
                    <small>* En <span class="voucherWaitHours">00</span> horas se liberarán tus números.</small>
                </h5>
                <h5 id="msgRedirectWhats" class="text-center mt-3 mb-4" style="display:none">Serás enviado en <span id="timerRedirect">5</span> segundos a <a class="linkCustomWhatsApp" href="#" rel="nofollow noopener noreferrer" target="_blank">WhatsApp <i class="fa fa-external-link" aria-hidden="true"></i></a><br>
                </h5>
            </div>
        </div>
        <div class="modal-footer row center">
            <button id="btnSuccessModal" onclick="openVerMisTickets()" class="btn-large">Ver mis Boletos</a>
        </div>
    </div>

    <!-- Modal Machine -->
    <div id="modalMachine" class="modal center">
        <div class="modal-content text-center">
            <div class="lds-grid">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <!-- Modal Error -->
    <div id="modalError" class="modal center">
        <div class="modalContainer">
            <div class="modal-content">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                <!-- <h5>Error</h5> -->
                <h5 id="msjerror"></h5>
                <div class="modal-footer">
                    <a href="#!" class="modal-close learn-more-btn large-btn">OK</a>
                </div>
            </div>
        </div>
        <!-- <div class="modal-footer row center">
			</div> -->
    </div>

    <!-- Modal UseData -->
    <div id="modalUseData" class="modal center">
        <div class="modalContainer">
            <div class="modal-content">
                <h4>Uso de sus Datos</h4>
                <p><span class="clientLegalName">Sahami Rifas</span>, con ID N° <span class="clientLegalId"></span>, con domicilio en <span class="clientLegalAddress"></span>, será responsable del uso y el tratamiento de sus datos.</p>
                <br />
                <h4>Transparencia</h4>
                <p>Se tratarán sus datos personales identificativos de manera pública, con la finalidad de garantizar la <b>Transparencia del Evento</b> a través de cualquier medio (web, teléfono, email, SMS y similares).</p>
                <br />
            </div>
            <div class="modal-footer">
                <a id="btnAccepUseData" href="#!" class="modal-close learn-more-btn large-btn">OK</a>
            </div>
        </div>
    </div>

    <!-- Modal Voucher -->
    <div id="modalVoucher" class="modal center">
        <div class="modal-content">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            <h5>Por favor suba el Comprobante de Pago</h5>
        </div>
        <div class="modal-footer">
            <a id="btnAccepTerms" href="#!" class="modal-close learn-more-btn large-btn">OK</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./assets/css/modules-1051e7f905292e1c043352f8c80e4ea2edc102fc57468633ec4362b4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="./js/app.js"></script>
</body>

</html>