<html>
	<head>
		<title>Les statistiques</title>
		<link rel="stylesheet" href="style_admin.css"/>
		<meta charset="utf-8" />
		
	</head>
	
<body>	
	<div id="bloc_page">
<?php
	include('banniere_menu.php');
	require('fonctions_utiles.php');
?>			

	<section>	
	
	<?php

	if (isset($_POST['journee']) || (isset ($_POST['amical']))) 
	{
		if (isset($_POST['journee']) && (isset ($_POST['amical'])))
		{
			echo '<center><p class="nok">Enregistrement impossible ! <br>Veuillez selectionner soit une journée soit un match amical, mais pas les deux !</p>';
			echo '<p><a class="btn" href="administrer.php">Retour</a></p></center>';
		}
		else
		{
			require ('connexion.php');
			
			$joueur_id=$_POST['player'];
			
			if (isset ($_POST['amical']))
			{
				$journee_id=rand(10000,99999);
			}
			else
			{
				$journee_id=$_POST['journee'];
			}
				
			$buts=$_POST['buts'];
			$passes=$_POST['passes'];
			
		
			$cleansheet=false;
			if (isset($_POST['clean']))
			{
				$cleansheet=true;
			}
		
			$csc=$_POST['csc'];
			$peno_rate=$_POST['peno_rate'];			
			$peno_arrete=$_POST['peno_arret'];		
		
			$faits_marquants=false;
			if (isset($_POST['faits']))
			{
				$cleansheet=true;
			}

			$description_faitmarquant=$_POST['details_faits'];
		
			if (isset($_POST['nettoyage_vestiaires']))
			{
				$nettoyage_vestiaires=true;
			}
			else
			{
				$nettoyage_vestiaires=false;
			}
		
		
			if (isset($_POST['lavage_maillots']))
			{
				$lavage_maillots=true;
			}
			else
			{
				$lavage_maillots=false;
			}
		
			// test si presence d'un doublon
			$doublon=DoublonStatsPlayer($journee_id,$joueur_id);
		
			if ($doublon == true)
			{
				echo '<center><p class="nok">Enregistrement impossible ! Les données de ce joueur pour cette journée ont déjà été saisis !</p>';
				echo '<p><a class="btn" href="admin_ajout_stats_individuelles.php">Retour</a></p></center>';
			}	
			else
			{
				//requete d'intégration des stats des joueurs.
				$stmt = $bdd->prepare("INSERT INTO stats_individuelles(joueur_id, buts, passes, cleansheet, peno_rate, peno_arrete, csc, faits_marquants, description_faitmarquant, nettoyage_vestiaires, lavage_maillots, journee_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
				$stmt->bindParam(1, $joueur_id);
				$stmt->bindParam(2, $buts); 
				$stmt->bindParam(3, $passes);
				$stmt->bindParam(4, $cleansheet);
				$stmt->bindParam(5, $peno_rate);
				$stmt->bindParam(6, $peno_arrete);
				$stmt->bindParam(7, $csc); 
				$stmt->bindParam(8, $faits_marquants); 
				$stmt->bindParam(9, $description_faitmarquant);
				$stmt->bindParam(10, $nettoyage_vestiaires);
				$stmt->bindParam(11, $lavage_maillots);
				$stmt->bindParam(12, $journee_id);
				$stmt->execute(); 
			
				echo '<p class="ok">Enregistrement bien effectué !</p>';
				echo '<center><p>Souhaitez-vous rajouter une autre stat joueur ? </p>';
				echo '<p><a class="btn" href="admin_ajout_stats_individuelles.php">Oui</a> - <a class="btn" href=administrer.php>Non</a></p></center>';
		
				// appel de la fonction MAJ_classement, pour générer le nouveau classement	
				require('MAJ_Classement.php');
				MAJ_Classement_players($joueur_id);	
		
			}
		}
	}	
	else
	{
			echo '<center><p class="nok">Enregistrement impossible ! <br>Veuillez selectionner une journée ou un match amical !</p>';
			echo '<p><a class="btn" href="administrer.php">Retour</a></p></center>';
	}
	
	?>
	</section>
	
</div>		
	
</body>
</html> 
