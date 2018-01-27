<?php
	require_once("inc/init.inc.php");
	require_once("inc/haut.inc.php");


	// Si produit en param du GET
	if(isset($_GET['id_produit']))
	{
		// On récupère tous les champs du produit
		$resultat = $pdo->query("SELECT * FROM produit WHERE id_produit = '$_GET[id_produit])'");
	}

	//Analyse de la requete faite au-dessus
	if ($resultat->rowCount() <= 0) //Si pas de ligne retournée par requête ci-dessus
	{
		header("location:boutique.php"); //retour à la boutique
		exit();
	}
	else //Afficher le produit
	{
		/*
		EXERCICE :
			Réaliser une fiche produit contenant titre, catégorie, couleur, taille, photo, description, prix
			Prévoir un lien pour retourner à la catégorie du produit
		*/

		//Recup du resultat de la requete sous la forme d'un tableau (cf. $produitSelectionne)
		$produitSelectionne = $resultat->fetch(PDO::FETCH_ASSOC);

		//Creation de la fiche produit
		$content .= "<h3>Titre : $produitSelectionne[titre]</h3><br>";
		$content .= "<p>Catégorie : $produitSelectionne[categorie]</p><br>";
		$content .= "<p>Couleur : $produitSelectionne[couleur]</p><br>";
		$content .= "<p>Taille : $produitSelectionne[taille]</p><br>";
		$content .= "<img src=\"$produitSelectionne[photo]\"><br>";
		$content .= "<p>Description : $produitSelectionne[description]</p><br>";
		$content .= "<p>Prix : $produitSelectionne[prix]" . " €". "</p><br>";

		if($produitSelectionne['stock'] > 0)
		{
			$content .= "<i>Nombre de produit(s) disponible : $produitSelectionne[stock]</i><br><br>";

			// FORMULAIRE pour aller vers le PANIER
			$content .= '<form method="post" action="panier.php">';
				$content .= "<input type='hidden' name='id_produit' value='$produitSelectionne[id_produit]'>";
				//L'id_pdotuit en "hidden" permettra sur la page panier.php de récupérer toutes les infos sur le produit
				$content .= '<label>Quantite : </label>';
				$content .= '<select id="quantite" name="quantite">';
				for($i=1;$i<=$produitSelectionne['stock'] && $i <= 5;$i++) //C'est nouveau la "LIMITE" dans la condition
				{
					$content .= "<option>$i</option>";
				}
				$content .= '</select>';
				$content .= '<input type="submit" name="ajout_panier" value="Ajout au panier">'; //On met un name qui sera évalué sur la page panier.php
			$content .= '</form><br>';
		}
		else
		{
			$content .= "Rupture de stock !<br><br>";
		}

		$content .= "<u><a href=\"boutique.php?categorie=$produitSelectionne[categorie]\">Retour à la catégorie</a></u>";


		//Affichage de la fiche produit
		echo $content;
	}

	require_once("inc/bas.inc.php");
?>
