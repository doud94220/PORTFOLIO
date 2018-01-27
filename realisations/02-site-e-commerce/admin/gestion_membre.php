<?php
	require_once("../inc/init.inc.php");


	// Partie 1 : Si on est pas admin et pas connecté => retour à la page de connexion
	if(!internauteEstConnecteEtEstAdmin())
	{
		header('location:../connexion.php');
		exit();
	}


	// Partie 2 : GESTION DES DONNES DU POST (cf. ajout ou modification d'un nouveau membre par un admin)
	if (!empty($_POST)) //si y'a qque chose dans le POST
	{
 		//Faire en sorte de gérer les apostrophes, et bloquer les failles XSS (CSS)
		foreach ($_POST as $key => $value)
		{
			$_POST[$key] = strip_tags(addslashes($value));
		}

		// Recup valeurs du POST pour avoir des variables moins longues
		$id_membre = $_POST['id_membre'];
		$pseudo = $_POST['pseudo'];
		$mdp = $_POST['mdp'];
		$mdp = password_hash($mdp, PASSWORD_DEFAULT); //Hashage du mot de pass
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$civilite = $_POST['civilite'];
		$ville = $_POST['ville'];
		$code_postal = $_POST['codePostal'];
		$adresse = $_POST['adresse'];
		$statut = $_POST['statut'];

		// ON INSERE EN BDD
		// Executer une requete REPLACE permettant d'insérer ou modifier un membre
		// Je fais la technique du statement + prepare + bind + execute
		$req = 
		("
			REPLACE INTO membre (id_membre, pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut)
			VALUES (:id_membre, :pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, :statut)
		");

		$statement = $pdo->prepare($req);
		$statement->bindValue(':id_membre', $id_membre, PDO::PARAM_STR);
		$statement->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$statement->bindValue(':mdp', $mdp, PDO::PARAM_STR);
		$statement->bindValue(':nom', $nom, PDO::PARAM_STR);
		$statement->bindValue(':prenom', $prenom, PDO::PARAM_STR);
		$statement->bindValue(':email', $email, PDO::PARAM_STR);
		$statement->bindValue(':civilite', $civilite, PDO::PARAM_STR);
		$statement->bindValue(':ville', $ville, PDO::PARAM_STR);
		$statement->bindValue(':code_postal', $code_postal, PDO::PARAM_STR);
		$statement->bindValue(':adresse', $adresse, PDO::PARAM_STR);
		$statement->bindValue(':statut', $statut, PDO::PARAM_STR);
		$statement->execute();

		$content .= "<div class='validation'>Le membre a bien été ajouté/modifié.</div><br>";

	} //Fin gestion des données du POST



	////////////// HAUT DE PAGE //////////////
	require_once("../inc/haut.inc.php");
	//Ajout des liens AFFICHAGE et AJOUT à $content
	$content .= '<u><a href="?action=affichage">Liste des membres</a></u><br>';
	$content .= '<u><a href="?action=ajout">Ajouter un autre membre</a></u><br><br>';



	//// GESTION DES DONNES DU GET

	//  Partie 3 : Gestion de action='affichage' => AFFICHER LES MEMBRES DANS UN TABLEAU

	if(isset($_GET['action']) && $_GET['action'] == 'affichage') //Si y'a affichage dans action dans le GET
	{
		//Affichage de tous les membres sus la forme de tableau
		$resultat = $pdo->query('select * from membre');
		$nbMembres = $resultat->rowCount();
		echo "<strong>Voici la liste des $nbMembres membres :</strong><br><br>";
		$i = 0; //variable pour gérer l'affichage des <th>
		echo '<table>';
		while($membre = $resultat->fetch(PDO::FETCH_ASSOC))
		{
			//// on met les <th>
			if($i == 0)
			{
				echo '<tr>';
				foreach ($membre as $key => $value)
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
			foreach ($membre as $key => $value)
			{
				if($key == 'mdp')
				{
					echo "<td>CONFIDENTIEL</td>";
				}
				else
				{
					echo "<td>$value</td>";
				}
			}
			// on rajoute des <td> pour modification et suppression
			echo "<td><a href='?action=modification&id_membre=$membre[id_membre]'><img src='../inc/img/edit.png' width='20' height='20'></a></td>";
			echo "<td><a href='?action=suppression&id_membre=$membre[id_membre]' OnClick='return(confirm(\"En etes vous certain\"));'><img src='../inc/img/delete.png' width='20' height='20'></a></td>";
			echo '</tr>';

			//// on incrémente variable $i
			$i++;
		}
		echo '</table><br><hr><br>';
	}


	// Partie 4 : Gestion de action='suppression' => SUPPRESSION DU MEMBRE

	if(isset($_GET['action']) && $_GET['action'] == 'suppression') //Si y'a suppression dans action dans le GET
	{
		$req = "delete from membre where id_membre = $_GET[id_membre]";
		$pdo->exec($req);
		$content .= '<div class="validation">Suppression terminée.</div><br>';
	}


	// Partie 5 : Si (y'a qque chose dans GET ET action =  (AJOUT ou MODIFICATION))

	if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification'))
	{
		// Définition des variable qui seront mentionnées dans le formulaire un peu plus bas
		$id_membre="";
		$pseudo="";
		$mdp="";
		$nom="";
		$prenom="";
		$email="";
		$civilite="";
		$ville="";
		$codePostal=0;
		$adresse="";
		$statut="";

		// Traitement du cas ou on MODIFIE un membre => remplissage des champs du form avec les donnes du GET
		if(isset($_GET['id_membre']))
		{
			$resultat = $pdo->query("SELECT * FROM membre WHERE id_membre = $_GET[id_membre]");
			$membrePasseEnParam = $resultat->fetch(PDO::FETCH_ASSOC);

			//Creation de variables pour ne pas surcharger la partie formulaire
			$id_membre = (isset($membrePasseEnParam['id_membre']))?$membrePasseEnParam['id_membre'] : '';
			$pseudo = (isset($membrePasseEnParam['pseudo']))?$membrePasseEnParam['pseudo'] : '';
			$mdp = (isset($membrePasseEnParam['mdp']))?$membrePasseEnParam['mdp'] : '';
			$nom = (isset($membrePasseEnParam['nom']))?$membrePasseEnParam['nom'] : '';
			$prenom = (isset($membrePasseEnParam['prenom']))?$membrePasseEnParam['prenom'] : '';
			$email = (isset($membrePasseEnParam['email']))?$membrePasseEnParam['email'] : '';
			$civilite = (isset($membrePasseEnParam['civilite']))?$membrePasseEnParam['civilite'] : '';
			$ville = (isset($membrePasseEnParam['ville']))?$membrePasseEnParam['ville'] : '';
			$codePostal = (isset($membrePasseEnParam['code_postal']))?$membrePasseEnParam['code_postal'] : '';
			$adresse = (isset($membrePasseEnParam['adresse']))?$membrePasseEnParam['adresse'] : '';
			$statut = (isset($membrePasseEnParam['statut']))?$membrePasseEnParam['statut'] : '';
		}

		// Formulaire HTML permettant d'enregister un membre
		// On arrive sur le formulaire dans le cas du GET 'ajout', ou dans le cas du GET 'modifiication' (et là faut remplir les champs => cf. value= dans form)

		echo '
			<h1>Formulaire membre</h1><br><br>

			<form method="post" action="gestion_membre.php" enctype="multipart/form-data">

				<input type="hidden" id="id_membre" name="id_membre" required value="'. $id_membre . '"><br><br>

				<label for="pseudo">Pseudo : </label><br>
				<input type="text" id="pseudo" name="pseudo" required value="'. $pseudo . '"><br><br>

				<label for="mdp">Mot de pass : </label><br>
				<input type="password" id="mdp" name="mdp" required value="'. $mdp . '"><br><br>

				<label for="pseudo">nom : </label><br>
				<input type="text" id="nom" name="nom" required value="'. $nom . '"><br><br>

				<label for="prenom">Prénom : </label><br>
				<input type="text" id="prenom" name="prenom" required value="'. $prenom . '"><br><br>

				<label for="email">Email : </label><br>
				<input type="email" id="email" name="email" required value="'. $email . '"><br><br>
				
				<label for="civilite">Civilite : </label><br>
				<select name="civilite">
					<option value="">Faites un choix</option>
					<option value="h"';if($civilite == 'h') echo 'selected'; echo'>Monsieur</option>
					<option value="f"';if($civilite == 'f') echo 'selected'; echo'>Madame</option>
				</select><br><br>

				<label for="ville">Ville : </label><br>
				<input type="text" id="ville" name="ville" required value="'. $ville . '"><br><br>

				<label for="codePostal">Code postal : </label><br>
				<input type="text" id="codePostal" name="codePostal" required value="'. $codePostal . '"><br><br>

				<label for="adresse">Adresse : </label><br>
				<input type="text" id="adresse" name="adresse" required value="'. $adresse . '"><br><br>

				<label for="statut">Statut : </label><br>
				<input type="text" id="statut" name="statut" required value="'. $statut . '"><br><br>

				<input type="submit" value="Valider"><br><br>

			</form>
		';
	}


	// AFFICHAGE DE $CONTENT (cad msgs de valisation ou msgs d'erreur ET les liens 'ajout produits' et 'afficher produits')
	echo $content;


	require_once("../inc/bas.inc.php");
?>
