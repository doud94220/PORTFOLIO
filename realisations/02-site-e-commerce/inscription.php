<?php
	require_once("inc/init.inc.php");
	require_once("inc/haut.inc.php");
	//Test appel fonction debug() déclarée dans le fichier 'fonction.inc.php'
	//if($_POST) debug($_POST, 1);

	/* 
	EXERCICE 1 : Controle des champs	
		pseudo : entre 3 et 20 caractères
		nom : entre 3 et 20 caractères
		email : controler le format de l'email
		code postal : controler que les saisies sont numériques

	EXERCICE 2 : S'il n'y a pas d'erreur ds le ctrl des chps, executez une requete d'insertion en BDD

	EXERCICE 3 : Controler la dispo du pseudo

	EXERCICE 4 : Controler les champs du formulaire afin d'ajouter des antislashs lorsqu'on saisit un champ ave cune apostrophe
	*/

	/////GO EXO
	if($_POST)
	{
		////////////// Pour exo 4 //////////////
		$pseudo = addslashes($_POST['pseudo']);
		$mdp = addslashes($_POST['mdp']);
		$mdp = password_hash($mdp, PASSWORD_DEFAULT); //hashage du mdp suivant l'algo bcrypt étiqueté par PASSWORD_DEFAULT
		$nom = addslashes($_POST['nom']);
		$prenom = addslashes($_POST['prenom']);
		$email = $_POST['email'];
		$civilite = $_POST['civilite'];
		$ville = addslashes($_POST['ville']);
		$codePostal = $_POST['codePostal'];
		$adresse = addslashes($_POST['adresse']);


		////////////// Pour exo 1 //////////////

		//ctrl pseudo
		if (strlen($pseudo) < 3 || strlen($pseudo) > 20)
		{
			$content .= '<div class="erreur">Merci de renseigner un pseudo entre 3 et 20 caractères</div><br>';
		}

		//ctrl nom
		if (strlen($nom) < 3 || strlen($nom) > 20)
		{
			$content .= '<div class="erreur">Merci de renseigner un nom entre 3 et 20 caractères</div><br>';
		}

		//ctrl email
		if (!(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)))
		{
			$content .= "<div class='erreur'>Votre email n'est pas au format #^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#</div><br>";
		}

		//ctrl code postal
		if (!(preg_match("#^[0-9]{5}$#", $codePostal)))
		{
			$content .= "<div class='erreur'>Votre code postal doit contenir 5 chiffres</div><br>";
		}

		////////////// Pour exo 3 //////////////

		//ctrl dispo pseudo
		$resultat = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");
		if($resultat->fetch(PDO::FETCH_ASSOC))
		{
			$content .= "<div class='erreur'>Votre pseudo est déjà pris</div><br>";
		}

		//méthode du prof pour ctrl dispo pseudo
		$resultat = $pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
		$nbResultat = $resultat->rowCount();
		if ($nbResultat > 0)
		{
			$content .= "<div class='erreur'>Votre pseudo est déjà pris</div><br>";
		}

		//test que pas de msg d'erreur (même si on n'a pas tout controlé pake pas le temps)
		if(empty($content)) //ATTENTION : J'AVAIS MIS UN ELSE QUI N'ETAIT RELIE QU'AU DERNIER IF
		{
			$content = "<div class='validation'>Vous êtes inscrit sur le site ! <a href=\"connexion.php\"><u><strong>Page de connexion</strong></u></a></div><br>";

			////////////// Pour exo 2 //////////////
			//Requete d'insertion
			$pdo->exec("
					INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut)
					VALUES ('$pseudo', '$mdp', '$nom', '$prenom', '$email', '$civilite', '$ville', '$codePostal', '$adresse', 0)
					");
		}

		//Afficher le message, qui peut être un msg d'erreur ou un message ok
		echo $content;
	}
?>

<form method="post" action="">

	<label for="pseudo">Pseudo : </label><br>
	<input type="text" id="pseudo" name="pseudo" required><br><br>
	<!--   Je sors le pattern (et son title) pour pas de conflit avec le PHP   -->
	<!--   pattern="[a-zA-Z0-9-_.]{3,20}" title="caractères acceptés : a-zA-Z0-9-_."   -->

	<label for="mdp">Mot de passe : </label><br>
	<input type="text" name="mdp" id="mdp" required><br><br>

	<label for="nom">NOM : </label><br>
	<input type="text" name="nom"><br><br>
	
	<label for="prenom">Prénom : </label><br>
	<input type="text" name="prenom"><br><br>
	
	<label for="email">Email : </label><br>
	<input type="text" name="email"><br><br>

	<label for="civilite">Civilite : </label><br>
	<select name="civilite">
		<option value="">Faites un choix</option>
		<option value="m">Homme</option>
		<option value="f">Femme</option>
	</select><br><br>

	<label for="ville">Ville : </label><br>
	<input type="text" name="ville"><br><br>

	<label for="codePostal">Code postal : </label><br>
	<input type="text" name="codePostal"><br><br>

	<label for="adresse">Adresse : </label><br>
	<textarea id="adresse" name="adresse"></textarea><br><br>

	<input type="submit" value="Valider"><br><br>

</form>

<?php
	require_once("inc/bas.inc.php");
?>
