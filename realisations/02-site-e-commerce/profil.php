<?php
	require_once("inc/init.inc.php");

	//Si le membre n'est pas connecté, il ne doit pas avoir accès à la page profil
	if(!internauteEstConnecte())
	{
		header('location:connexion.php');
		exit();
	}

	require_once("inc/haut.inc.php");

	//Afficher les données de session
	//debug($_SESSION);

	////// EXO 1 : Afficher les infos du membre
	//j'avais fait un truc mais j'ai supprimé pour mettre le code du prof
	$content .= "<p class='center'>Bonjour <strong>".$_SESSION['membre']['pseudo']."</strong>.</p>";
	$content .= "<div class='cadre'><h2>Voici les infos du profil</h2>";
	$content .= "<p>Votre email est <span style='color:blue'>".$_SESSION['membre']['email']."</span><br>";
	$content .= "Votre ville est <span style='color:blue'>".$_SESSION['membre']['ville']."</span><br>";
	$content .= "Votre code postal est <span style='color:blue'>".$_SESSION['membre']['codePostal']."</span><br>";
	$content .= "Votre adresse est <span style='color:blue'>".$_SESSION['membre']['adresse']."</span></p></div><br>";


	////// EXO 2 : Informer les internautes si c'est un simple membre ou un admin

	//Ma méthode
	$statut = $_SESSION['membre']['statut'];
	// if ($statut == 0)
	// {
	// 	$content .= "Votre n'êtes pas admin";
	// }
	// else
	// {
	// 	$content .= "Votre êtes ADMIN";
	// }

	//Méthode du prof
	if(internauteEstConnecteEtEstAdmin())
	{
		$content .= "Votre êtes ADMIN";
	}
	else
	{
		$content .= "Votre n'êtes pas admin";	
	}

	//Afficher le $content
	echo $content;
?>

<?php
	require_once("inc/bas.inc.php");
?>
