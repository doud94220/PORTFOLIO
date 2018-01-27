<?php
	///////////////////// CONNEXION BDD
	$pdo = new PDO(	'mysql:host=localhost;dbname=id2888034_boutique',
					'id2888034_root',
					'root94220',
					array(
						PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
						PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
						)
					);


	///////////////////// SESSION
	session_start();


	///////////////////// CHEMINS

	///// Définir Chemin Root
	//echo'<mark>Data de $_SERVER : </mark><br>';echo"<pre>";print_r($_SERVER);echo"</pre>";
	define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . "/realisations/02-site-e-commerce/");
	//echo'<mark>Constante RACINE_SITE : </mark><br>';echo RACINE_SITE;echo "<br><br>";

	///// Définir Chemin Url
	define("URL", "https://portfolio-ea.000webhostapp.com/realisations/02-site-e-commerce/");
	//echo'<mark>Constante URL : </mark><br>';echo URL;echo "<br><br>";


	///////////////////// VARIABLES
	$content = ''; //variable qui servira à mettre des messages pour l'utilisateur du site e-commerce

	///////////////////// INCLUSION NDES FONCTIONS
	require_once('fonction.inc.php');
?>
