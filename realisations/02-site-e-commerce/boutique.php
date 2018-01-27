<?php
	require_once("inc/init.inc.php");


	//AFFICHAGE DES CATEGORIES dans une div avec des ul li
	$categories_des_produits = $pdo->query("SELECT DISTINCT categorie FROM produit");
	$content .= '<div class="boutique-gauche">';
	$content .= '<ul>';
	while($cat = $categories_des_produits->fetch(PDO::FETCH_ASSOC))
	{
		$content .= "<li><a href='?categorie=" . $cat['categorie'] . "'>" . $cat['categorie'] . "</a></li>";
	}
	$content .= '</ul></div>';


	//SI dans le GET on a "categorie = ...." ALORS affichage des produits
	$content .= '<div class="boutique-droite">';
	if(isset($_GET['categorie'])) //Si y'a une categorie en paramètre du GET
	{
		//Recuperation de tous les produits de la categorie en param du GET
		$donnees = $pdo->query("SELECT id_produit,reference,titre,photo,prix FROM produit WHERE categorie='$_GET[categorie]'");
		while($produit = $donnees->fetch(PDO::FETCH_ASSOC))
		{
			$content .= '<div class="boutique-produit">';
			$content .= "<h3>$produit[titre]</h3>";
			$content .= "<a href=\"fiche_produit.php?id_produit=$produit[id_produit]\"><img src =\"$produit[photo]\"width=\"130\" height=\"100\"></a>";
			// EXO
			$content .= "<p>$produit[prix]" . " €" . "</p><br>";
			$content .= "<p><a href=\"fiche_produit.php?id_produit=$produit[id_produit]\">Voir la fiche</a></p>";
			$content .= '</div>'; //fin de boutique produit
		}
	}
	$content .= '</div>'; //fin de boutique droite


	/*
		EXO : 
		Afficher :
		- le prix du produit (Fait au-dessus)
		- creer un lien "voir la fiche" qui renvoie ver la fiche produit (Fait au-dessus)
	*/

	require_once("inc/haut.inc.php");
	echo $content;
	require_once("inc/bas.inc.php");
?>
