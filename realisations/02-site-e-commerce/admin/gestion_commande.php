<?php
	require_once("../inc/init.inc.php");


	// Partie 1 : Si on est pas admin et pas connecté => retour à la page de connexion
	if(!internauteEstConnecteEtEstAdmin())
	{
		header('location:../connexion.php');
		exit();
	}


	require_once("../inc/haut.inc.php");


	// Partie 2 : Si y' a rien dans le GET => Affichage de toutes les commandes sous la forme d'un tableau
	if(empty($_GET))
	{
		$resultat = $pdo->query('select * from commande');
		$nbCmds = $resultat->rowCount();
		echo "<strong>Voici la liste des $nbCmds commandes du site :</strong><br><br>";
		$i = 0; //variable pour gérer l'affichage des <th>
		echo '<table>';
		while($commande = $resultat->fetch(PDO::FETCH_ASSOC))
		{
			//// on met les <th>
			if($i == 0)
			{
				echo '<tr>';
				foreach ($commande as $key => $value)
				{
					echo "<th>$key</th>";
				}
				//je rajoute des <th> pour modification et suppression
				echo "<th>Suppression</th>";
				echo '</tr>';
			}
			echo '<tr>';

			//// on met les <td>
			foreach ($commande as $key => $value)
			{
				if($key == 'id_commande')
				{
					echo "<td><u><a href='?action=detail_cmd&id_commande=$value'>$value</a></u></td>";
				}
				else
				{
					echo "<td>$value</td>";
				}
			}
			// on rajoute des <td> pour modification et suppression
			echo "<td><a href='?action=suppression&id_commande=$commande[id_commande]' OnClick='return(confirm(\"En etes vous certain\"));'><img src='../inc/img/delete.png' width='20' height='20'></a></td>";
			echo '</tr>';

			//// on incrémente variable $i
			$i++;
		}
		echo '</table><br>';
	}


	// Partie 3 : Si y'a action=detail_cmd dans le GET => On affiche le détail de la commande en param du GET
	if(!empty($_GET) && ($_GET['action'] == 'detail_cmd'))
	{
		$resultat = $pdo->query("select * from details_commande where id_commande = $_GET[id_commande]");
		$nbArticleDansCmd = $resultat->rowCount();
		echo "<strong>Voici la liste des $nbArticleDansCmd article de la commande $_GET[id_commande] :</strong><br><br>";
		$i = 0; //variable pour gérer l'affichage des <th>
		echo '<table>';
		while($detail_commande = $resultat->fetch(PDO::FETCH_ASSOC))
		{
			//// on met les <th>
			if($i == 0)
			{
				echo '<tr>';
				foreach ($detail_commande as $key => $value)
				{
					echo "<th>$key</th>";
				}
				echo '</tr>';
			}
			echo '<tr>';

			//// on met les <td>
			foreach ($detail_commande as $key => $value)
			{
				echo "<td>$value</td>";
			}
			echo '</tr>';

			//// on incrémente variable $i
			$i++;
		}
		echo '</table><br>';

		//Lien retour à la liste des cmds
		echo "<p><u><a href='gestion_commande.php'>Retour à la liste des commandes</a></u></p>";
	}


	// Partie 4 : Gestion de action='suppression' dans le GET

	if(isset($_GET['action']) && $_GET['action'] == 'suppression') //Si y'a suppression dans action dans le GET
	{
		$requete_table_commande = "delete from commande where id_commande = $_GET[id_commande]";
		$pdo->exec($requete_table_commande);
		$requete_table_details_commande = "delete from details_commande where id_commande = $_GET[id_commande]";
		$pdo->exec($requete_table_details_commande);
		$content .= '<div class="validation">Suppression terminée.</div><br>';
	}


	//AFFICHAGE DE $CONTENT (cad msgs de valisation ou msgs d'erreur ET les liens 'ajout produits' et 'afficher produits')
	echo $content;


	require_once("../inc/bas.inc.php");
?>



<!-- J'AI PAS FAIT LA MODIF DE LA COMMANDE POUR POUVOIR INVESTIR DU TEMPS SUR AUTRE CHOSE -->