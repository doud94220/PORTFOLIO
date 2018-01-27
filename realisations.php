<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">
		<title>Réalisations</title>
		<!-- VIEWPORT pour Responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style-realisations.css">
	</head>

	<body>

		<?php
			require_once("navbar.html");
		?>

		<h1>Quelques Réalisations</h1>

		<div class="container"> <!-- Container des réalisations -->

			<!-- <div class="row" id="ligne1"> --> <!-- row 1 -->

				<div class="realisation col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<img id='vers-licornes' class="center-block" src='img/apercu-licornes.png' alt='realisation-licornes'>
					<h2>Page en HTML/CSS responsive à partir d'une maquette</h2>
				</div>

				<div class="realisation col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<img id='vers-photos-vacances' class="center-block" src='img/apercu-photos-vacances.png' alt='realisation-photos-vacances'>
					<h2>Page en HTML/CSS jQuery Ajax Json</h2>
				</div>				

			<!-- </div> -->

			<!-- <div class="row"> --> <!-- row 2 -->

				<div class="realisation col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<img id='vers-ecommerce' class="center-block" src='img/apercu-site-ecommerce.png' alt='realisation-site-ecommerce'>
					<h2>Site en PHP procédural avec utilisation de SQL</h2>
				</div>

				<div class="realisation col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<img id='vers-custom-shirt' class="center-block" src='img/apercu-custom-shirt.png' alt='realisation-custom-shirt'>
					<h2>Site en PHP Objet sous Silex (en groupe)</h2>
				</div>

			<!-- </div> -->

			<!-- <div class="row"> --> <!-- row 3 -->

				<div class="realisation col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<img id='vers-mini-api-rest' class="center-block" src='img/apercu-mini-api-rest.png' alt='realisation-mini-api-rest'>
					<h2>Api REST qui communique avec la page front en Ajax et Json</h2>
				</div>

			<!-- </div> -->			

		</div> <!-- Fin du container -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script-realisations.js"></script>

	</body>

</html>