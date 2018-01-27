<?php

	function debug($var, $mode=2)
	{
		////// Mumuse avec debug_backtrace()
		// debug_backtrace() nous permettra d'avoir des infos dans le fichier qui utilise la focntion debug()

		//sans array_shift
		// $trace = debug_backtrace();
		// echo "<strong>debug demandé dans le fichier <mark>" . $trace[0]['file'] . "</mark> en ligne : <mark>" . $trace[0]['line'] . "</mark></strong>";
		//Rq sur ligne du dessus : obligé de concaténer avec des '.' avec un tableau multidimensionnel
		// echo "<br><br><u>Test du debug_backtrace() : </u><br><br>";echo"<pre>";print_r($trace);echo"</pre><br>";

		//avec array_shift
		// $trace2 = debug_backtrace();
		// $traceSansIndice = array_shift($trace2);
		// echo "<strong>debug demandé dans le fichier <mark>$traceSansIndice[file]</mark> en ligne : <mark>$traceSansIndice[line]</mark></strong>";
		// echo "<br><br><u>Test du debug_backtrace() : </u><br><br>";echo"<pre>";print_r($traceSansIndice);echo"</pre><br>";


		////// Affichage de l'argument $var
		if ($mode == 1)
		{
			echo "<br><br><strong>DEBUG : Affichage de la variable passée en argument : </strong><br><br>";
			echo '<pre>'; var_dump($var); echo '</pre><br><br>';		
		}
		else
		{
			echo "<br><br><u>DEBUG : Affichage de la variable passée en argument : </u><br><br>";
			echo '<pre>'; print_r($var); echo '</pre><br><br>';				
		}
	}


	function internauteEstConnecte()
	{
		if(isset($_SESSION['membre'])) //isset() détermine si une variable est définie et est différente de NULL
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function internauteEstConnecteEtEstAdmin()
	{
		if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1)
		{
			return true;
		}
		else
		{
			return false;		
		}
	}



	//////////// PANIER ////////////


	function creationDuPanier()
	{
		if(!isset($_SESSION['panier'])) // Si y'a pas de panier on le créer en "array imbriqué"
		{
			$_SESSION['panier'] = array();
			$_SESSION['panier']['titre'] = array();
			$_SESSION['panier']['id_produit'] = array();
			$_SESSION['panier']['quantite'] = array();
			$_SESSION['panier']['prix'] = array();
		}
	}
	/*
		On ne stock jamais le panier en BDD, 90% des paniers n'aboutissent jamais, on créer donc un espace directement dans le fichier SESSION
	*/


	function ajouterProduitDansPanier($titre, $id_produit, $quantite, $prix)
	{
		// INITIALISATION DU PANIER en appelant la fonction qui s'en charge
		creationDuPanier();

		///// VERIF DOUBLON PRODUIT DANS PANIER
		// Recherche position produit dans $_SESSION['panier']['id_produit']
		// array_search recherche dans un tableau la clé associée à une valeur (si pas de clé => retourne FALSE)
		$position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);
			//echo "<br><br>Id produit en argument : ";debug($id_produit);echo "<br><br>";
			//echo "Id produit dans SESSION : ";debug($_SESSION['panier']['id_produit']);echo "<br><br>";
			//echo "Position produit : " . $position_produit;

		//Verif de doublon de produit (cf. quantite > 1)
		if ($position_produit !== false) //Si on trouve le produit avec la clé
		{
			//on ajoute en SESSION la quantité en arguments
			$_SESSION['panier']['quantite'][$position_produit] += $quantite;
		}
		else //on ne trouve pas le produit avec la clé
		{
			// On met en SESSION les champ passés en arguments de la fonction
			$_SESSION['panier']['titre'][] = $titre; //Les [] à la fin permettent de prendre la prochaine occurence dispo
			$_SESSION['panier']['id_produit'][] = $id_produit;
			$_SESSION['panier']['quantite'][] = $quantite;
			$_SESSION['panier']['prix'][] = $prix;
		}
	}


	function montantTotal()
	{
		$total = 0;
		for($i=0 ; $i < count($_SESSION['panier']['id_produit']) ; $i++)
		{
			$total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
		}
		return round($total, 2);
	}


	function retirerProduitDuPanier($id_produit_a_supprimer)
	{
		$position_produit = array_search($id_produit_a_supprimer, $_SESSION['panier']['id_produit']);
		if($position_produit !== false)
		{
			//array_splice() efface du tableau "$_SESSION[panier]"" à la position demandée (car plus de stock pour rappel)
			//attention y'a array_slice qui existe aussi et qui fait pas la même chose
			array_splice($_SESSION['panier']['titre'],$position_produit,1);
			array_splice($_SESSION['panier']['id_produit'],$position_produit,1);
			array_splice($_SESSION['panier']['quantite'],$position_produit,1);
			array_splice($_SESSION['panier']['prix'],$position_produit,1);
		}
	}

?>