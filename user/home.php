<?php
include("./config/config.php");

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<!-- META DATA -->
	<title>Sahami rifas</title>

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
	<!-- FAVICON -->
	<link rel="icon" type="image/png" href="./assets/imgs/sahami.jpg">
	<!-- Booostrap   -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="./assets/css/style_sahami.css">
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
		.header p {
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


		.nav-item .nav-link:hover .nav-link-menu {
			color: #F4C542 !important;
		}

		.nav-item .nav-link:hover .nav-link-number {
			color: #F4C542 !important;
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
		}

		.learn-more-btn,
		.btn-large {
			box-shadow: 0 0 18px #1B263B4a;
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

		.learn-more-btn:hover,
		button:hover {
			background-color: #000000;
			color: #F4C542
		}

		.learn-more-btn:hover,
		.btn-large:hover {
			box-shadow: 0 0 18px #0000008a;
		}

		.card .card-body .payment-type .types .type.selected::after {
			color: #38423d;
			border: 2px solid #38423d;
		}

		.btn-invert {
			background-color: #1B263B !important;
		}

		.services-accordion .accordion {
			background-color: #1B263B;
		}

		.accordion:active,
		.accordion:hover {
			background-color: #000000 !important;
		}

		.btn-invert:hover {
			background-color: #000000 !important;
		}

		.header-img-section img {
			box-shadow: 0 0 18px #1B263B69;
		}

		.header-title,
		.pricing-head h4,
		.clients-title,
		.contact-title,
		.pricing-title h2,
		.blog-title,
		.services-title {
			color: #38423d;
		}

		input[type=range]+.thumb,
		.btn,
		.btn-large,
		.btn-small,
		.btn:focus,
		.btn-large:focus,
		.btn-small:focus,
		.btn-floating:focus {
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

		.poppuler .btn {
			color: #38423d;
		}

		.learn-more-btn,
		button {
			color: #ffffff;
		}

		.learn-more-btn:hover,
		button.btn-large:hover {
			color: #F4C542;
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

		.btn:hover,
		.btn-large:hover,
		.btn-small:hover {
			background-color: #000000;
		}

		.bandname.-bold {
			border-top: 4px solid #000000;
			color: #38423d;
		}

		#buttfixed {
			background: #1B263B;
		}

		#buttfixed:hover {
			background: #000000;
		}

		#buttfixed>span {
			color: #38423d;
		}

		.footer-section {
			background-color: #1B263B;
		}

		.footer-social-media-icon .fa:hover {
			color: #000000;
		}
	</style>
	<style>
		.container.header-container {
			display: none;
		}



		.owl-item.active {
			zoom: .98;
			transition: all 0.5s ease;
		}

		.owl-item.active:hover {
			zoom: 1;
		}

		.blog-post-card:hover {
			box-shadow: -5px 6px 24px #F4C542;
		}

		body {
			background: #000;
			color: #fff;
		}

		.header-title,
		.pricing-head h4,
		.clients-title,
		.contact-title,
		.pricing-title h2,
		.blog-title,
		.services-title {
			color: #F4C542;
		}

		.contact-text {
			color: #fff;
		}

		.clients-section .clients-subtitle {
			display: none !important
		}



		.navbar,
		.header-scrolled {
			background-color: #161616 !important;
		}

		.nav-link-menu {
			color: #fff
		}

		.nav-link-menu:hover {
			color: #F4C542;
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

		.blog-section {
			display: none !important
		}

		.footer-credits {
			display: none !important
		}
	</style>



</head>

<body>
	<div class="chat">
		<?php if (isset($_SESSION["id"]) && $_SESSION["cargoAdm"] == 1) {
		?>
			<a href="./admin/rifas.php"><i class="bi bi-list"></i></a>
		<?php
		} ?>

		<a href="https://wa.me/584161902568" target="_blank"><i class="bi bi-whatsapp"></i></a>
	</div>

	<!-- NAVBAR -->
	<nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-header navbar-mobile">
		<div class="navbar-container container">
			<!-- LOGO -->
			<div class="navbar-brand">
				<a class="navbar-brand-logo" href="#">
					<img src="./assets/imgs/sahami.jpg" style="width:100px" width="220px">
				</a>
			</div>
			<button class="navbar-toggler"
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
							<p class="nav-link-menu">INICIO</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#pagos">
							<p class="nav-link-menu">CUENTAS DE PAGO</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#footer">
							<p class="nav-link-menu">CONTACTO</p>
						</a>
					</li>


				</ul>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link learn-more-btn btn-invert" href="#eventos">Eventos</a>
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
	<!-- SECTION LABEL -->
	<div id="top"></div>
	<!-- WRAPPER -->
	<div class="wrapper">
		<div class="header">
			<div class="container header-container">
				<div class="col-lg-6 header-img-section">
					<img src="./index.php">
				</div>
				<div class="col-lg-5 offset-lg-1 header-title-section">
					<p class="header-subtitle">Táchira, Venezuela</p>
					<h1 class="header-title">Sahami Rifas</h1>
					<p class="header-title-text">
					<pre> SORTEOS - PREMIOS🍀
Nuestro objetivo es premiarte!
</pre>
					</p>
					<div class="learn-more-btn-section principal-link">
						<a class="nav-link learn-more-btn btn-invert" href="/fortunerlexus">LISTA DE DISPONIBLES</a>
					</div>
				</div>
			</div>
		</div>


		<!-- SECTION LABEL -->
		<div id="eventos"></div>
		<!-- CLIENTS -->
		<div class="clients-section">
			<div class="container clients-container pt-5">
				<div class="clients-title-section">
					<p class="clients-subtitle">¡ Participa !</p>
					<h2 class="clients-title">Disponibles</h2>
				</div>
				<!-- Set up your HTML -->
				<div class="owl-carousel">
					<?php
					$q = "SELECT * FROM raffles";
					$result = mysqli_query($con, $q);
					while ($row = mysqli_fetch_assoc($result)) {
						$fecha = new DateTime($row["date"]);
						$fecha_formateada = $fecha->format('d M, Y');
						$hora = $fecha->format('h:i A');
						$_SESSION['raffle_id'] = $row["id"];
						$partes = explode(' ', $row["title"]);
						$primeraPalabra = strtolower($partes[0]);
					?>

						<div class="containerRaffle">
							<a href="<?= $primeraPalabra ?>" class="card">
								<img src="./assets/raffle/<?= $row['image'] ?>" alt="img" draggable="false">
								<div class="card-content">
									<h2 class="huge"><?= $row["title"] ?></h2>
									<div class="date">
										<p><svg class="is grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
												<path d="M96 32l0 32L48 64C21.5 64 0 85.5 0 112l0 48 448 0 0-48c0-26.5-21.5-48-48-48l-48 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32L160 64l0-32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192L0 192 0 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-272z" />
											</svg> <b class="grey"><?= $fecha_formateada ?></b><svg class="is grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
												<path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
											</svg><b class="grey"><?= $hora ?></b></p>
									</div>
								</div>
							</a>
						</div>
					<?php
					}
					?>

				</div>

			</div>
		</div>
		<!-- SECTION LABEL -->
		<div id="news"></div>
		<!-- NEWS -->

		<!-- SECTION LABEL -->
		<div id="contact"></div>
		<!-- CONTACT -->
		<div id="pagos" class="contact-section">
			<div class="container contact-container">
				<div class="col-md-12 contact-title-section">
					<h2 class="contact-title">Cuentas de Pago</h2>
					<div>
						<p class="contact-text"><img src="./assets/imgs/usa-zelle-c.png" style="width:60px" width="60px"></p>
						<p class="contact-text bank_name">ZELLE</p>
						<pre class="contact-text number_alias"><strong>Correo Electrónico </strong></pre>
						<pre class="contact-text number">Paolaaguinaga.pa@gmail.com<button onclick="actionButtonAccounts('copy', this, 'Paolaaguinaga.pa@gmail.com')" class="magic_button" data-toggle="tooltip" data-placement="top" title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></pre>
						<p class="contact-text"><strong>Titular:</strong> Karla Aguinaga</p>
					</div>
					<br>
					<div>
						<p class="contact-text"><img src="./assets/imgs/pago_movil.png" style="width:60px" width="60px"></p>
						<p class="contact-text bank_name">PAGO MOVIL</p>
						<pre class="contact-text number_alias"><strong>Banco de Venezuela</strong></pre>
						<pre class="contact-text number">14626887<button onclick="actionButtonAccounts('copy', this, '14626887')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></pre>
						<pre class="contact-text number">0416-4708085<button onclick="actionButtonAccounts('copy', this, '04164708085')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></pre>
						<p class="contact-text"><strong>Tasa:</strong> MONITOR</p>
					</div>
					<br>
					<!-- <div id="BANCOLOMBIA_COLOMBIA-2076-container">
						<p class="contact-text"><img src="./assets/imgs/col-bancocolombia.png" style="width:60px" width="60px"></p>
						<p class="contact-text bank_name">BANCOLOMBIA - COLOMBIA</p>
						<pre class="contact-text number_alias"><strong>Cta Ahorro Bancolombia</strong></pre>
						<pre class="contact-text number">86364652498<button onclick="actionButtonAccounts('copy', this, '86364652498')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></pre>
						<pre class="contact-text link_alias mt-2"><strong></strong></pre>
						<pre class="contact-text link">4.000 pesos x DOLAR</pre>
						<p class="contact-text"><strong>Titular:</strong> Jeane Rodriguez </p>
					</div>
					<br> -->
					<div>
						<p class="contact-text"><img src="./assets/imgs/col-nequi-1.png" style="width:60px" width="60px"></p>
						<p class="contact-text bank_name">NEQUI - COLOMBIA</p>
						<pre class="contact-text number_alias"><strong></strong></pre>
						<pre class="contact-text number"> 322 4144038<button onclick="actionButtonAccounts('copy', this, ' 3224144038')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></pre>
						<pre class="contact-text interbank_alias mt-2"><strong></strong></pre>
						<pre class="contact-text interbank">4.200 pesos x DÓLAR </pre>
					</div>
					<br>
					<div>
						<p class="contact-text"><img src="./assets/imgs/zinli.png" style="width:60px" width="60px"></p>
						<p class="contact-text bank_name">ZINLI</p>
						<pre class="contact-text number_alias"><strong>Correo Electrónico </strong></pre>
						<pre class="contact-text number">keiderguerra90@gmail.com <button onclick="actionButtonAccounts('copy', this, 'keiderguerra90@gmail.com')" class="magic_button" data-toggle="tooltip" data-placement="top" title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></pre>
					</div>
					<br>
					<div>
						<p class="contact-text"><img src="./assets/imgs/p-no-bank-1-1-1.png" style="width:60px" width="60px"></p>
						<p class="contact-text bank_name">EFECTIVO</p>
						<pre class="contact-text number_alias"><strong>PAGO EN</strong></pre>
						<pre class="contact-text number">EFECTIVO</pre>
						<p class="contact-text"><strong>San juan de colon y Cucuta </p>
					</div>
					<br>
					<div id="BANCO_BCI_CHILE">
						<p class="contact-text"><img src="./assets//imgs/chi-banco-bci.png" style="width:60px" width="60px"></p>
						<p class="contact-text bank_name">Banco BCI - Chile</p>
						<pre class="contact-text number_alias"><strong>CUENTA VISTA</strong></pre>
						<pre class="contact-text number">111127231360<button onclick="actionButtonAccounts('copy', this, '111127231360')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></pre>
						<pre class="contact-text interbank_alias mt-2"><strong>RUT</strong></pre>
						<pre class="contact-text interbank">27231360-1<button onclick="actionButtonAccounts('copy', this, '27231360-1')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></pre>
						<pre class="contact-text link_alias mt-2"><strong>CORREO ELECTRÓNICO</strong></pre>
						<pre class="contact-text link">guerraortizwilbertalexis@gmail.com<button onclick="actionButtonAccounts('copy', this, 'guerraortizwilbertalexis@gmail.com')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></pre>
						<p class="contact-text"><strong>Titular:</strong> WILBERT ALEXIS GUERRA ORTIZ<button onclick="actionButtonAccounts('copy', this, 'WILBERT ALEXIS GUERRA ORTIZ')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></p>
					</div>

					<div class="learn-more-btn-section">
						<a class="nav-link learn-more-btn btn-invert" rel="nofollow noopener noreferrer" target="_blank" href="https://wa.me/584161902568"> WhatsApp</a>
					</div>
				</div>
			</div>
		</div>
		<!-- FOOTER -->
		<div id="footer" class="footer-section">
			<div class="container footer-container">
				<div class="col-lg-3 col-md-6 footer-logo">
					<h3 class="footer-subsection-title clientLegalName">Sahami Rifas</h3>
					<p class="footer-susection-text"><img src="./assets/imgs/sahami.jpg" style="width:180px" width="180px"></p>
				</div>
				<div class="col-lg-3 col-md-6 footer-subsection">
					<div class="footer-subsection-2-1">
						<h3 class="footer-subsection-title">Nosotros</h3>
						<pre><p class="footer-subsection-text"> SORTEOS - PREMIOS🍀
Nuestro objetivo es premiarte!
</p></pre>
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

	<script src="./js/app.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script>
		$(document).ready(function() {
			$(".owl-carousel").owlCarousel({
				margin: 20,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: false,
						dots: true,
						dotsEach: true,
					},
					600: {
						items: 3,
						nav: false,

					},

				}
			});
		});

		const faq_section = ``

		var divToMove2xx = $(".blog-section");
		divToMove2xx.after(faq_section);

		$(document).ready(function() {
			var divToMove = $("#pagos");
			var targetDiv = $(".clients-section");

		});
	</script>

</body>

</html>