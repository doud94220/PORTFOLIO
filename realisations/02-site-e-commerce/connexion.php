<?php
	require_once("inc/init.inc.php");

	// Si l'utilisateur s'est déconnecté, on fait "unset de la session"
	if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
	{
		unset($_SESSION['membre']);
		unset($_SESSION['panier']);
	}

	// Si l'utilisateur est déjà connecté (et vient sur la page de connexion of course) => on l'envoie sur la page de profil
	if(internauteEstConnecte())
	{
		header('location:profil.php');
		exit();
	}

	if($_POST) //on check le post du petit formulaire de cette même page
	{
		$result = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'"); //requete de recherche du pseudo dans POST
		if($result->rowCount() >= 1) //si je trouve le pseudo en BDD c'est ok l'utilisateur ne s'est pas trompé
		{
			$membre = $result->fetch(PDO::FETCH_ASSOC); //on recup toutes les infos du (premier) resultat de la requete dans un array
			//echo"<pre>";print_r($membre);echo"</pre>";
			// echo $_POST['mdp'].'<br>';
			// echo $membre['mdp'];

			if(password_verify($_POST['mdp'], $membre['mdp']))
			//on vérifie que le mdp issu du POST est le même que celui en résultat de la requete HASHE
			{
				//on met dans $content que pseudo et mdp ok
				$content .= '<div class="validation">Pseudo et pass reconnus</div>';
				//echo"<pre>";print_r($_SESSION);echo"</pre>";

				//on met dans SESSION toutes les infos du membre qu'on trouve dans le resultat de la requete MAIS AVEC 2 ARRAY IMBRIQUES
				$_SESSION['membre']['id_membre'] = $membre['id_membre'];
				$_SESSION['membre']['pseudo'] = $membre['pseudo'];
				$_SESSION['membre']['nom'] = $membre['nom'];
				$_SESSION['membre']['prenom'] = $membre['prenom'];
				$_SESSION['membre']['email'] = $membre['email'];
				$_SESSION['membre']['civilite'] = $membre['civilite'];
				$_SESSION['membre']['ville'] = $membre['ville'];
				$_SESSION['membre']['codePostal'] = $membre['code_postal'];
				$_SESSION['membre']['adresse'] = $membre['adresse'];
				$_SESSION['membre']['statut'] = $membre['statut'];		
				//echo"<pre>";print_r($_SESSION);echo"</pre>";

				//Go to page profil
				header("location:profil.php");
			}
			else //mdp saisi KO
			{
				$content .= '<div class="erreur">Pass non reconnu...</div>';
			}
		}
		else //si y'a rien en BDD, on met une erreur de pseudo
		{
			$content .= '<div class="erreur">Pseudo inconnu...</div>';
		}

		echo $content;
	}

	require_once("inc/haut.inc.php");
?>

<div id="container-page-connexion">

	<form method="post" action="">

		<label for="pseudo">Pseudo : </label><br>
		<input type="text" name="pseudo" required><br><br>

		<label for="mdp">Password : </label><br>
		<input type="password" name="mdp" required><br><br>

		<input type="submit" value="Connexion">

	</form><br><br>

	<a href="inscription.php"><u>Creer un compte</u></a><br><br>

	<!-- CARROUSSEL -->
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="photo/vert.png" alt="thisrt vert">
		      <div class="carousel-caption">
		        	Super thisrt vert !
		      </div>
		    </div>
		    <div class="item">
		      <img src="photo/rouge.png" alt="tshirt rouge">
		      <div class="carousel-caption">
		        	Super thisrt rouge !
		      </div>
		    </div>
	    	<div class="item">
		      <img src="photo/jaune.png" alt="tshirt jaune">
		      <div class="carousel-caption">
		        	Super thisrt jaune !
		      </div>
		    </div>
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	<!-- Fin carroussel -->
</div> <!-- Fin container -->


<?php
	require_once("inc/bas.inc.php");
?>
