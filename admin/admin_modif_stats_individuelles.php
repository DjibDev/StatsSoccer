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
	require('connexion.php');
	require('fonctions_utiles.php');
		
	if (!(isset($_POST['player'])))
	{
?>	
	
	<section>	
		
		<form name="modif_stats_ind" method="post" action="admin_modif_stats_individuelles.php" id="myform">
		<fieldset>
		<Legend> Modifier les stats d'un joueur</Legend>		
			<label for="player">Joueur : </label>
			<select required name="player" id="player">
				<option selected disabled value="">Sélectionnez</option>
						
				<?php 
			
				$req_pl=$bdd->query('SELECT * FROM effectif ORDER BY nom ASC');
	
				while ($result_pl=$req_pl->fetch())
				{
					echo '<option value="'.$result_pl['ID_joueur'].'">'.$result_pl['pseudo'].' </option>';
				
				}
			
				$req_pl->closeCursor();
				
				?>
        	
        	</select>
        	<br>
        	<label for="journee">Journée : </label>
			<select name="journee" id="journee">
				<option selected disabled value="">Sélectionnez</option>
						
				<?php 
			
				$req_j=$bdd->query('SELECT * FROM journees order by date ASC');

				$type_journee='';
	
				while ($result_j=$req_j->fetch())
				{
					if ($result_j['coupe'] == false)
					{
						$type_journee='championnat';
					}
					else
					{
						$type_journee='coupe';
					}	

					$date_fr=FormatDateFR($result_j['date']);
					
					echo '<option value="'.$resul_j['ID_journee'].'">Journée de '.$type_journee.' N°'.$result_j['numero'].' le '.$date_fr.'</option>';
				
				}
				$req_j->closeCursor();
				
				?>
        	
        	</select>
        	<br><br>
        	<center>
        	<input type="reset" value="Effacer"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Visualiser"/>
      		</center>
        </fieldset>
        </form>	
    <?php   
     	}
     	else
     	{

			$joueur_id=$_POST['player'];
			$journee_id=$_POST['journee'];

			
			$req_stats=$bdd->query('SELECT * FROM stats_individuelles 
			WHERE joueur_id='.$joueur_id.'
			AND journee_id='.$journee_id.' ');
				
			echo '<form method="post" action="trait_modif_stats_individuelles.php" id="myform">';		
			echo '<fieldset>';			
			
			while ($result_stats=$req_stats->fetch())
			{	

				echo '<input type="hidden" name="joueur_id" value="'.$joueur_id.'" />';
				
				echo '<label for="buts">Buts :</label>';	
				echo '<input type="number" name="buts" id="buts" value="'.$result_stats['buts'].'"/>';
				
				echo '<label for="passes">Passes :</label>';	
				echo '<input type="number" name="passes" id="passes" value="'.$result_stats['passes'].'"/>';	
				
				//echo '<label for="cleansheet">Cleansheet :</label>';	
				//echo '<input type="number" name="cleansheet" id="cleansheet" value="'.$result_stats['cleansheet'].'"/>';
				
				echo '<label for="peno_rate">Péno. raté :</label>';	
				echo '<input type="number" name="peno_rate" id="peno_rate" value="'.$result_stats['peno_rate'].'"/>';

				echo '<label for="peno_arrete">Péno. arreté :</label>';	
				echo '<input type="number" name="peno_arrete" id="peno_arrete" value="'.$result_stats['peno_arrete'].'"/>';

				echo '<label for="csc">CSC :</label>';	
				echo '<input type="number" name="csc" id="csc" value="'.$result_stats['csc'].'"/>';

			}
			$req_stats->CloseCursor();	
				
		?>		

		<br>
		<center>
		<input type="reset" value="Annuler"/>
		<input type="submit" value="Enregistrer"/> 		
		</center>
		
		</fieldset>
		</form>
		<?php 
		}	
		?>

	</section>
	<?php include ('../footer.php'); ?>
</div>		
	
		
	
</body>
</html> 
