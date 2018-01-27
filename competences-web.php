<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">
		<title>Compétences Web</title>
		<!-- VIEWPORT pour Responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style-competences.css">
	</head>

	<body>

		<?php
			require_once("navbar.html");
		?>

		<h1>Compétences Web : Langages, Frameworks, CMS</h1>

		<div class="container"> <!-- Container des langages -->

			<!-- <div class="row"> --> <!-- row 1 -->

				<div class='langage col-lg-3 col-md-3 col-sm-4 col-xs-6'>
					<strong>HTML5</strong>
					<div class="circle HTML5">
						<img src="img/logos/HTML5.png" alt="HTML5" class="logo">
					</div>
				</div>

				<div class='langage col-lg-3 col-md-3 col-sm-4 col-xs-6'>
					<strong>CSS3</strong>
					<div class="circle CSS3">
						<img src="img/logos/CSS3.png" alt="CSS3" class="logo">
					</div>
				</div>

				<div class='langage col-lg-3 col-md-3 col-sm-4 col-xs-6'>
					<strong>Javascript</strong>
					<div class="circle Javascript">
						<img src="img/logos/Javascript.png" alt="Javascript" class="logo">
					</div>
				</div>

				<div class='langage col-lg-3 col-md-3 col-sm-4 col-xs-6'>
					<strong>jQuery</strong>
					<div class="circle jQuery">
						<img src="img/logos/jQuery.png" alt="jQuery" class="logo">
					</div>
				</div>

			<!-- </div> --> <!-- Fin de la row 1 -->

			<!-- <div class="row"> --> <!-- row 2 -->

				<div class='langage col-lg-3 col-md-3 col-sm-4 col-xs-6'>
					<strong>AJAX</strong>
					<div class="circle AJAX">
						<img src="img/logos/AJAX.png" alt="AJAX" class="logo">
					</div>
				</div>

				<div class='langage col-lg-3 col-md-3 col-sm-4 col-xs-6'>
					<strong>Bootstrap</strong>
					<div class="circle Bootstrap">
						<img src="img/logos/Bootstrap.png" alt="Bootstrap" class="logo">
					</div>
				</div>		

				<div class='langage col-lg-3 col-md-3 col-sm-4 col-xs-6'>
					<strong>PHP</strong>
					<div class="circle PHP">
						<img src="img/logos/PHP.png" alt="PHP" class="logo">
					</div>
				</div>

				<div class='langage col-lg-3 col-md-3 col-sm-4 col-xs-6'>
					<strong>SQL</strong>
					<div class="circle SQL">
						<img src="img/logos/SQL.png" alt="SQL" class="logo">
					</div>
				</div>

			<!-- </div> --> <!-- Fin de la row 2 -->

			<!-- <div class="row">  --><!-- row 3 -->

				<div class='langage col-lg-3 col-md-3 col-sm-4 col-xs-6'>
					<strong>SILEX</strong>
					<div class="circle Silex">
						<img src="img/logos/Silex.png" alt="Silex" class="logo">
					</div>
				</div>

				<div class='langage col-lg-3 col-md-3 col-sm-4 col-xs-6'>
					<strong>WordPress</strong>
					<div class="circle WordPress">
						<img src="img/logos/WordPress.png" alt="WordPress" class="logo">
					</div>
				</div>

			<!-- </div> --> <!-- Fin de la row 3 -->

		</div> <!-- Fin du container des langages -->


		<!-- Appels des scripts javascript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/circle-progress.js"></script>
		<script src="js/script-competences.js"></script>

	</body>

</html>