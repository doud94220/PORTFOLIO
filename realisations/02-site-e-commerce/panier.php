<?php
	require_once("inc/init.inc.php");


	//// CREATION PANIER SI QQUE CHOSE DANS POST
	if(isset($_POST['ajout_panier'])) //Si y'a ajout_panier dans le POST donc si on est bien passé par la fiche_produit
	{
				///// Affichage données du POST
				//echo "Affichage données du POST : <br>";debug($_POST);

		///// Ramener infos produits suite à requete en BDD
		$resultat = $pdo->query("SELECT * FROM produit WHERE id_produit = $_POST[id_produit]");
		$produit = $resultat->fetch(PDO::FETCH_ASSOC);

				///// Affichage données produit suite à requete en BDD
				//echo "Affichage données produit suite à requete en BDD : <br>";debug($produit);

		///// Creation panier
		creationDuPanier();

				///// Affichage données SESSION
				//echo "Affichage données SESSION après avoir créé panier : <br>";debug($_SESSION);
		
				///// Affichage id_produit dans variable produit
				//echo "id_produit dans variable produit : " . $produit['id_produit'];

		///// Ajouter infos produit dans panier
		ajouterProduitDansPanier($produit['titre'], $produit['id_produit'], $_POST['quantite'], $produit['prix']);

				///// Affichage données SESSION apres ajout produit dans panier
				//echo "<br>Affichage données SESSION apres ajout produit dans panier : <br>";debug($_SESSION);
	}


	require_once("inc/haut.inc.php");


	///// VIDER PANIER SI VIDER DANS GET
	if(isset($_GET['action']) && $_GET['action'] == 'vider') //Si y'a action = 'vider' dans le GET
	{
		unset($_SESSION['panier']);
	}


	///// PAIEMENT SI PAYER DANS POST

	if(isset($_POST['payer'])) // Y'a payer dans le POST
	{
		// On boucle sur tous les produits en session
		for($i=0 ; $i<count($_SESSION['panier']['id_produit']) ; $i++)
		{
			// Recup des données dans un array $produit
			$resultat = $pdo->query("SELECT * FROM produit WHERE id_produit = " . $_SESSION['panier']['id_produit'][$i]);
			$produit = $resultat->fetch(PDO::FETCH_ASSOC);

			// Verif du stock en BDD par rapport a la quantite demandée, et si prbms on alimente $content
			if($produit['stock'] < $_SESSION['panier']['quantite'][$i]) //Si stock insuffisant
			{
				$content .= '<hr><div class="erreur">Stock restant : ' . $produit['stock'] . '</div>';
				$content .= '<hr><div class="erreur">Quantite demandée : ' . $produit['panier']['quantite'][$i] . '</div>';

				if($produit['stock'] > 0) // Si y'a quand même du stock (mais stock insuffisant)
				{
					$content .= '<div class="erreur">La quantite du produit' . $produit['panier']['id_produit'][$i] . 'a été réduite depuis votre sélection de produit dans le panier et notre stock est à cet instant insuffisant. Veuillez vérifier vos achats</div>';
					$_SESSION['panier']['quantite'][$i] = $produit['stock'];
				}
				else // Si y'a plus de stock du tout
				{
					// Afficher que y'a plus de stock pour le produit
					$content .= '<div class="erreur">Le produit : ' . $_SESSION['panier']['produit'][$i] . 'a été retiré de votre panier car nous sommes carrément en rupture de stock, veuillez vérifier vos achats.</div>';

					// Retirer le produit du panier
					retirerProduitDuPanier($_SESSION['panier']['id_produit'][$i]);
					$i--; //On revient en arrière pour revenir sur le même indice après le prochain tour de boucle car au même indice on aura un autre produit qui aura pris la place de celui qu'on vient de supprimer
				}
				$erreur = true; // Y'a des erreurs
			}
		}

		// Si y'a pas d'erreur, on insère la commande en BDD
		if(!isset($erreur)) // Si y'a pas d'erreur
		{
			// Insertion commande en BDD dans table commande
			$pdo->query("INSERT INTO commande (id_membre,montant,date_enregistrement) VALUES (" . $_SESSION['membre']['id_membre'] . "," . montantTotal() . ", NOW())");

			// Insertion(s) dans table details_commande ET Update(s) du stock dans table produit
			$id_commande = $pdo->lastInsertId(); //recup de l'id_commande de la table commande
			for($i=0 ; $i<count($_SESSION['panier']['id_produit']) ; $i++)
			{
				// Insertion dans table details_commande
				$pdo->query("INSERT INTO details_commande (id_commande,id_produit,quantite,prix) VALUES ($id_commande," . $_SESSION['panier']['id_produit'][$i] . "," . $_SESSION['panier']['quantite'][$i] . "," . $_SESSION['panier']['prix'][$i] . ")");
				
				// Maj du stock dans table produit (atte,tion syntaxe décrémentation du stock)
				$pdo->query("UPDATE produit SET stock = stock - " . $_SESSION['panier']['quantite'][$i] . " WHERE id_produit = " .  $_SESSION['panier']['id_produit'][$i]);
			}

			// Vidage du panier
			unset($_SESSION['panier']);

			// Envoie mail (mais ca chie donc je commente la ligne dessous)
			// mail($_SESSION['membre']['email'], "Confirmation de la commande", "Merci, votre n de suivi est le &id_commande", "From:vendeur@site.com");

			// Ajout à $content msg OK
			$content .= "<div class='validation'>Merci pour votre commande. Votre n° de suivi est le $id_commande</div>";
		}
	}

	//Affichage de $content (erreurs ou pas)
	echo $content;


	///// AFFICHAGE HTML DU PANIER DANS UN TABLEAU

	echo "<table border='1' style='border-collapse:collapse;cellpadding='7'>";

		// Le <th> du haut
		echo "<tr><th>Titre</th><th>Produit</th><th>Quantite</th><th>Prix unitaire</th></tr>"; //<th>Action</th>

		// Les <td>
		if(empty($_SESSION['panier']['id_produit'])) // Si y'a pas d'id_produit
		{
			echo "<tr><td colspan='5'>Votre panier est vide !</td></tr>"; // On affiche que le panier est vide
		}
		else //Si y'a au moins 1 produit
		{
			for($i=0 ; $i<count($_SESSION['panier']['id_produit']) ; $i++) //On boucle et on affiche tout
			{
				echo "<tr>";
				echo "<td>" . $_SESSION['panier']['titre'][$i] . "</td>";
				echo "<td>" . $_SESSION['panier']['id_produit'][$i] . "</td>";
				echo "<td>" . $_SESSION['panier']['quantite'][$i] . "</td>";
				echo "<td>" . $_SESSION['panier']['prix'][$i] . " €</td>";
				//echo "<td></td>"; //On verra plus tard
				echo "</tr>";
			}
		
			// Affichage montant total panier dans un <th> en bas
			echo "<tr><th colspan='5'>Total : <strong>" . montantTotal() . "<strong> €</th></tr>";

			// Proposition de PAYER le panier dans un mini-formulaire
			if(internauteEstConnecte()) // Si internaute est connecté, on peut lui proposer de payer le panier
			{
				echo '<form method="post" action="">';
					echo '<tr><td colspan="5"><input type="submit" name="payer" value="Valider et déclarer le paiement"></td></tr>';
				echo '</form>';
			}
			else // Si internaute pas connecte, on lui met des liens pour se connecter ou s'inscrire
			{
				echo '<tr><td colspan="5">Veuillez vous <a href="inscription.php">inscrire !</a> ou vous <a href = "connexion.php">connecter</a> afin de pouvoir payer.</td></tr>';
			}

			// Lien pour vider panier
			echo '<tr><td colspan="5"><a href=\'?action=vider\' style="color:orange">Vider mon panier</a></td></tr>';
		}
	echo "</table>";

	// Lien pour retourner à la boutique
	echo "<br><br><p><u><a href='boutique.php'>Retour à boutique</a></u></p>";


	require_once("inc/bas.inc.php");
?>
