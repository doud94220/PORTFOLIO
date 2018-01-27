<?php
	require_once("../inc/init.inc.php");


	//Si on est pas admin et pas connecté => retour à la page de connexion
	if(!internauteEstConnecteEtEstAdmin())
	{
		header('location:../connexion.php');
		exit();
	}


	//// Afficher du POST et du FILES et du SESSION
	//debug($_POST);
	//debug($_FILES);
	//debug($_SESSION);	

	
	//GESTION DES DONNES DU POST
	if (!empty($_POST)) //si y'a qque chose dans le POST
	{
		$url_photo = '';

		//Si on est en GET avec action = 'modification'
		if(isset($_GET['action']) && $_GET['action'] == 'modification')
		{
			$url_photo = $_POST['photo_actuelle']; //on récupère la photo du POST
		}

		if(!empty($_FILES['photo']['name'])) //si y'a qque chose dans le FILES
		{
			//on creer nos variables qui gèrent la photo
			$nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];
			$url_photo = URL . "photo/$nom_photo";
			$url_dossier_photo = RACINE_SITE . "photo/$nom_photo";
			//echo "nom photo  : $nom_photo<br>";
			//echo "url photo  : $url_photo<br>";
			//echo "dossier photo  : $url_dossier_photo<br>";

			//COPIE LE FICHIER du repertoire tmp vers le repertoire photo de notre projet
			copy($_FILES['photo']['tmp_name'], $url_dossier_photo);
		}

		// EXERCICE 2 : Faites en sorte de gérer les apostrophes, et bloquer les failles XSS (CSS)
		foreach ($_POST as $key => $value)
		{
			$_POST[$key] = strip_tags(addslashes($value));
			//Un peu sioux : j'avais mis "$value = strip_tags(addslashes($value))" et ca chiait
		}

		//Recup valeurs du POST pour avoir des variables moins longues
		$id_produit = $_POST['id_produit'];
		$reference = $_POST['reference'];
		$categorie = $_POST['categorie'];
		$titre = $_POST['titre'];
		$description = $_POST['description'];
		$couleur = $_POST['couleur'];
		$taille = $_POST['taille'];
		$public = $_POST['public'];
		$photo = $url_photo;
		$prix = $_POST['prix'];
		$stock = $_POST['stock'];


		// EXERCICE 4 : controler la taille des champs : reference, titre
		if (strlen($reference) < 2 || strlen($reference) > 20)
		{
			$content .= '<div class="erreur">La référence doit comprendre entre 2 et 20 caractères.</div><br>';
		}
		if (strlen($titre) < 10 || strlen($titre) > 100)
		{
			$content .= '<div class="erreur">Le titre doit comprendre entre 10 et 100 caractères.</div><br>';
		}


		// EXERCICE 5 : Controler que les champs prix et stock soient bien numériques
		if (!is_numeric($prix))
		{
			$content .= '<div class="erreur">Le prix doit être une suite de chiffres.</div><br>';
		}
		if (!is_numeric($stock))
		{
			$content .= '<div class="erreur">Le stock doit être une suite de chiffres.</div><br>';
		}

		//SI LES DONNEES DU POST SONT OK => ON INSERE EN BDD
		if($content == '') //Si y'a pas d'erreur de saisie
		{
			//creation et affichage msg ok
			$content .= '<div class="validation">Pas d\'erreur dans votre saisie.</div><br>';


			// EXERCICE 3 : Executer une requete d'insertion permettant d'insérer un produit (requete modifié plus tard en REPLACE INTO)
			// Je fais la technique du statement + prepare + bind + execute
			$req = 
			("
				REPLACE INTO produit (id_produit, reference, categorie, titre, description, couleur, taille, public, photo, prix, stock)
				VALUES (:id_produit, :reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)
			");
			//ON A MIS EN REPLACE INTO POUR GERER L'INSERT OU LU L'UPDATE
			$statement = $pdo->prepare($req);
			$statement->bindValue(':id_produit', $id_produit, PDO::PARAM_STR);
			$statement->bindValue(':reference', $reference, PDO::PARAM_STR);
			$statement->bindValue(':categorie', $categorie, PDO::PARAM_STR);
			$statement->bindValue(':titre', $titre, PDO::PARAM_STR);
			$statement->bindValue(':description', $description, PDO::PARAM_STR);
			$statement->bindValue(':couleur', $couleur, PDO::PARAM_STR);
			$statement->bindValue(':taille', $taille, PDO::PARAM_STR);
			$statement->bindValue(':public', $public, PDO::PARAM_STR);
			$statement->bindValue(':photo', $photo, PDO::PARAM_STR);
			$statement->bindValue(':prix', $prix, PDO::PARAM_STR);
			$statement->bindValue(':stock', $stock, PDO::PARAM_STR);
			$statement->execute();
		}
	} //Fin gestion des données du POST


	////////////// HAUT DE PAGE //////////////
	require_once("../inc/haut.inc.php"); //La navbar pour rappel

	//Ajout des liens AFFICHAGE et AJOUT à $content
	$content .= '<u><a href="?action=affichage">Liste des produits</a></u><br>';
	$content .= '<u><a href="?action=ajout">Ajouter un autre produit</a></u><br><br>';


	//// GESTION DES DONNES DU GET

	// Gestion de action='affichage' => AFFICHER LES PRODUITS DANS UN TABLEAU
	if(isset($_GET['action']) && $_GET['action'] == 'affichage') //Si y'a affichage dans action dans le GET
	{
		/// EXERCICE 6 : Affichage de tous les produits sus la forme de tableau
		$resultat = $pdo->query('select * from produit');
		$nbProduits = $resultat->rowCount();
		echo "<strong>Voici la liste des $nbProduits produits :</strong><br><br>";
		$i = 0; //variable pour gérer l'affichage des <th>
		echo '<table>';
		while($produit = $resultat->fetch(PDO::FETCH_ASSOC))
		{
			//// on met les <th>
			if($i == 0)
			{
				echo '<tr>';
				foreach ($produit as $key => $value)
				{
					echo "<th>$key</th>";
				}
				//je rajoute des <th> pour modification et suppression
				echo "<th>Modification</th>";
				echo "<th>Suppression</th>";
				echo '</tr>';
			}
			echo '<tr>';

			//// on met les <td>
			foreach ($produit as $key => $value)
			{
				if($key == 'photo')
				{
					echo "<td><img src='$value' width='70' height='70'></td>";
				}
				else
				{
					echo "<td>$value</td>";
				}
			}
			// on rajoute des <td> pour modification et suppression
			echo "<td><a href='?action=modification&id_produit=$produit[id_produit]'><img src='../inc/img/edit.png' width='20' height='20'></a></td>";
			echo "<td><a href='?action=suppression&id_produit=$produit[id_produit]' OnClick='return(confirm(\"En etes vous certain\"));'><img src='../inc/img/delete.png' width='20' height='20'></a></td>";
			//un peu galère le javascript au dessus : faut pas d'espace après OnClick= et avant 'return
			echo '</tr>';

			//// on incrémente variable $i
			$i++;
		}
		echo '</table><br><hr><br>';
	}


	// Gestion de action='suppression'

	if(isset($_GET['action']) && $_GET['action'] == 'suppression') //Si y'a suppression dans action dans le GET
	{
		$req = "delete from produit where id_produit = $_GET[id_produit]";
		$pdo->exec($req);
		$content .= '<div class="validation">Suppression terminée.</div><br>';
	}


	//Si (y'a qque chose dans GET ET action = (ajout OU modification))
	if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification'))
	{
		//Définition des variable qui seront mentionnées dans le formulaire un peu plus bas
		$id_produit="";
		$reference="";
		$categorie="";
		$titre="";
		$description="";
		$couleur="";
		$taille="";
		$public="";
		$photo="";
		$prix="";
		$stock="";

		//Traitement du cas ou on MODIFIE UN PRODUIT => remplissage des champs du form avec les donnes du GET
		if(isset($_GET['id_produit']))
		{
			//Requete et mise des data dans un array
			$resultat = $pdo->query("SELECT * FROM produit WHERE id_produit = $_GET[id_produit]");
			$produitPasseEnParam = $resultat->fetch(PDO::FETCH_ASSOC);

			//Creation de variables pour ne pas surcharger la partie formulaire
			$id_produit = (isset($produitPasseEnParam['id_produit']))?$produitPasseEnParam['id_produit'] : '';
			$reference = (isset($produitPasseEnParam['reference']))?$produitPasseEnParam['reference'] : '';
			$categorie = (isset($produitPasseEnParam['categorie']))?$produitPasseEnParam['categorie'] : '';
			$titre = (isset($produitPasseEnParam['titre']))?$produitPasseEnParam['titre'] : '';
			$description = (isset($produitPasseEnParam['description']))?$produitPasseEnParam['description'] : '';
			$couleur = (isset($produitPasseEnParam['couleur']))?$produitPasseEnParam['couleur'] : '';
			$taille = (isset($produitPasseEnParam['taille']))?$produitPasseEnParam['taille'] : '';
			$public = (isset($produitPasseEnParam['public']))?$produitPasseEnParam['public'] : '';
			$photo = (isset($produitPasseEnParam['photo']))?$produitPasseEnParam['photo'] : '';
			$prix = (isset($produitPasseEnParam['prix']))?$produitPasseEnParam['prix'] : '';
			$stock = (isset($produitPasseEnParam['stock']))?$produitPasseEnParam['stock'] : '';

			//EXERCICE : Faites en sorte d'afficher les données du produit dans les champs input
			//=> Ca va se passer dans le formulaire

		}

		// EXERCICE 1 : Réaliser un formulaire HTML permettant d'enregister un produit (entretemps le formulaire a été enrichi par du code php)
		// On arrive sur le formulaire dans le cas du GET 'ajout', ou dans le cas du GET 'modifiication' (et là faut remplir les champs => cf. value= dans form)

		echo '
			<h1>Formulaire produit</h1><br><br>

			<form method="post" action="" enctype="multipart/form-data">

				<label for="reference">Id Produit : </label><br>
				<input type="hidden" id="id_produit" name="id_produit" required value="'. $id_produit . '"><br><br>

				<label for="reference">Reference : </label><br>
				<input type="text" id="reference" name="reference" required value="'. $reference . '"><br><br>

				<label for="categorie">Categorie : </label><br>
				<input type="text" id="categorie" name="categorie" required value="'. $categorie . '"><br><br>

				<label for="titre">Titre : </label><br>
				<textarea id="titre" name="titre">' . $titre . '</textarea><br><br>

				<label for="description">Description : </label><br>
				<textarea id="description" name="description">' . $description . '</textarea><br><br>

				<label for="couleur">Couleur : </label><br>
				<input type="text" id="couleur" name="couleur" required value="'. $couleur . '"><br><br>

				<label for="taille">Taille : </label><br>
				<input type="text" id="taille" name="taille" required value="'. $taille . '"><br><br>

				<label for="public">Public : </label><br>
				<select name="public">
					<option value="">Faites un choix</option>
					<option value="m"';if($public == 'm') echo 'selected'; echo'>Homme</option>
					<option value="f"';if($public == 'f') echo 'selected'; echo'>Femme</option>
					<option value="mixte"';if($public == 'mixte') echo 'selected'; echo'>Mixte</option>
				</select><br><br>

				<label for="photo">Photo : </label><br>
				<input type="file" id="photo" name="photo" value="'. $photo . '"><br><br>';
				if(!empty($photo)) //Si y'a une photo
				{
					echo '<i>Vous pouvez uploader une nouvelle photo si vous souhaitez la changer</i><br>';
					echo '<img src = "' . $photo . '" width="90" height="90"><br>';
				}
				//On creer un champ en 'hidden' pour mettre la photo actuelle dans le POST
				echo '<input type="hidden" id="photo_actuelle" name="photo_actuelle" value="'. $photo . '">';

				//On reprend le echo du form
				echo ' 
				<label for="prix">Prix : </label><br>
				<textarea id="prix" name="prix">'. $prix . '</textarea><br><br>

				<label for="stock">Stock : </label><br>
				<textarea id="stock" name="stock">'. $stock . '</textarea><br><br>

				<input type="submit" value="Valider"><br><br>

			</form>
		';

		/*
			Les NOUVEAUTES dans le form --> upload de la photo qui nécésitte de mettre :
			   - enctype="multipart/form-data" dans <form>
			   - un <input type="file"

			A noter :
			=> les infos de la photo (cf. input type="file") vont aller dans $_FILES, et le fichier ira dans un dossier temp

			A noter 2 :
			=> les infos de la photo ne seront pas dans POST puisqu'elles seront dans FILES
		*/
	}


	//AFFICHAGE DE $CONTENT (cad msgs de valisation ou msgs d'erreur ET les liens 'ajout produits' et 'afficher produits')
	echo $content;


	require_once("../inc/bas.inc.php");
?>
