<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Welcome to my e-commerce site</title>
		<link rel="stylesheet" href="\realisations\02-site-e-commerce\inc\css\style.css" type="text/css">
		<!-- On met le href du css en asbolu pake on s'en sert dans des fichiers d'arborescence différente -->
		<!-- Css Boostrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<header>
			<div class="conteneur">
				<span>
					<!-- <a href="" title="Mon Site">Welcome to my e-commerce site</a> -->
					Welcome to my e-commerce site
				</span>
				<nav>
					<?php
						if(internauteEstConnecteEtEstAdmin())
						{
							//Menu pour ADMIN
							echo '<a href="'.URL.'admin/gestion_membre.php">Gestion des membres</a>';
							echo '<a href="'.URL.'admin/gestion_commande.php">Gestion des commandes</a>';
							echo '<a href="'.URL.'admin/gestion_boutique.php">Gestion des produits</a>';
						}
						if(internauteEstConnecte())
						{
							//Menu pour utilisateur standard
							echo '<a href="'.URL.'profil.php">Voir votre profil</a>';
							echo '<a href="'.URL.'boutique.php">Accès à la boutique</a>';
							echo '<a href="'.URL.'panier.php">Voir votre panier</a>';
							echo '<a href="'.URL.'connexion.php?action=deconnexion">Se déconnecter</a>';		
						}
					?>
				</nav>
			</div>
		</header>
		<section>
			<div class="conteneur">