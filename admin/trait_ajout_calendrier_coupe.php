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
?>	
		
	<section>	

		<?php
		
		if ($_POST['equipe1'] != $_POST['equipe2'])
		{
			// test si n'existe pas de doublon matchs pour la journée choisie
			
			require ('connexion.php');
							
			$reponse=$bdd->query('SELECT equipe_dom_id, equipe_vis_id 
			FROM matchs 
			WHERE coupe ="1" ');
			$matchs_existants=Array();
			$x=0;
			
			while ($resultats=$reponse->fetch())
			{
				$confrontation=$resultats['equipe_dom_id'].'versus'.$resultats['equipe_vis_id'];
				$matchs_existants[$x]=$confrontation;
				$x++;
			}
			$reponse->closeCursor();
			//recupere le nombre d'element dans le tableau 
			$nb=$x+1;
			// Test la condition si la confrontation pour cette journée existe deja dans la table matchs
	
			$match=$_POST['equipe1'].'versus'.$_POST['equipe2'];
		
			$journee_id=$_POST['journee'];
						
			$doublon=false;
						
			for ($z=0;$z<$nb;$z++)
			{
				if ($matchs_existants[$z] == $match)
				{
					$doublon= true;
				} 
			}
			
			if ($doublon == false)
			{
						
				$equipe_dom_id=$_POST['equipe1'];
				$equipe_vis_id=$_POST['equipe2'];
				$coupe=true;
						
				require ('connexion.php');
			
				$stmt = $bdd->prepare("INSERT INTO matchs (equipe_dom_id,equipe_vis_id,journee_id,coupe) VALUES (?,?,?,?)");
				$stmt->bindParam(1, $equipe_dom_id);
				$stmt->bindParam(2, $equipe_vis_id); 
				$stmt->bindParam(3, $journee_id);
				$stmt->bindParam(4, $coupe);
				$stmt->execute();

				echo '<p class="ok">Enregistrement bien effectué !</p><br>';
				echo '<center><p>Souhaitez-vous rajouter une confrontation ? </p>';
				echo '<p><a class="btn" href="admin_calendrier_coupe.php#ajout_team">Oui</a> - <a class="btn" href=administrer.php>Non</a></p></center>';
			}
			else
			{
				echo '<p class="nok">ce match existe déja !!! </p>';
				echo '<p><a class="btn" href="admin_calendrier_coupe.php#ajout_team">Retour</a></p>';
			}	
		}
		else
		{
			echo '<p class="nok">Une équipe ne peut pas jouer contre elle-même !</p>';
			echo '<center><p><a class="btn" href="admin_calendrier_coupe.php#ajout_team">Recommencer !</a></center>';
		}

		?>
	</section>
	<?php include ('footer.php'); ?>
</div>
</body>
</html>	
