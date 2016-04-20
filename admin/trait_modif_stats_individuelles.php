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
?>	
		
	<section>	

		<?php
		
		if (!(isset($_POST['modif_ok'])))
		{	

			$joueur_id=$_POST['pseudo_id'];
			$journee_id=$_POST['journee_test'];
			$pseudo=RetournePseudo($joueur_id);
			$date_j=DateJournee($journee_id);

			echo '<form method="post" action="trait_modif_stats_individuelles.php" id="myform">';	
			echo '<fieldset>';	
			echo '<legend>Modification stats individuelles de <b>'.$pseudo.'</b> pour la journée du <b>'.$date_j.'</b></legend>';
			echo '<br>';

			$req_stats_indiv=$bdd->prepare('SELECT * FROM stats_individuelles 
			WHERE joueur_id='.$joueur_id.'
			AND journee_id='.$journee_id.' ');
				
			$req_stats_indiv->execute();	
			
			while ($result_stats=$req_stats_indiv->fetch())
			{	

				echo '<input type="hidden" name="joueur_id" value="'.$joueur_id.'" />';

				echo '<label for="buts">Buts :</label>';	
				echo '<input type="number" name="buts" id="buts" value="'.$result_stats['buts'].'"/>';
				
				echo '<label for="passes">Passes :</label>';	
				echo '<input type="number" name="passes" id="passes" value="'.$result_stats['passes'].'"/>';	
				
				echo '<label for="cleansheet">Cleansheet :</label>';
				if ($result_stats['cleansheet'])
				{		
					echo '<input type="checkbox" name="cleansheet" id="cleansheet" checked/>';
				}
				else
				{
					echo '<input type="checkbox" name="cleansheet" id="cleansheet" />';
				}	

				echo '<label for="peno_rate">Péno. raté :</label>';	
				echo '<input type="number" name="peno_rate" id="peno_rate" value="'.$result_stats['peno_rate'].'"/>';

				echo '<label for="peno_arrete">Péno. arreté :</label>';	
				echo '<input type="number" name="peno_arrete" id="peno_arrete" value="'.$result_stats['peno_arrete'].'"/>';

				echo '<label for="csc">CSC :</label>';	
				echo '<input type="number" name="csc" id="csc" value="'.$result_stats['csc'].'"/>';

				echo '<label for="faits_marquants">Faits marquants :</label>';
				if ($result_stats['faits_marquants'])
				{		
					echo '<input type="checkbox" name="faits_marquants" id="faits_marquants" checked/>';
				}
				else
				{
					echo '<input type="checkbox" name="faits_marquants" id="faits_marquants" />';
				}	
				
				echo '<label for="description_faitmarquant">Détails :</label>';
				echo '<TEXTAREA rows="4" cols="40" name="description_faitmarquant">'.$result_stats['description_faitmarquant'].'</TEXTAREA>';
			    
				echo '<label for="nettoyage_vestiaires">Nettoyage Vestiaires :</label>';
				if ($result_stats['nettoyage_vestiaires'])
				{		
					echo '<input type="checkbox" name="nettoyage_vestiaires" id="nettoyage_vestiaires" checked/>';
				}
				else
				{
					echo '<input type="checkbox" name="nettoyage_vestiaires" id="nettoyage_vestiaires" />';
				}	
                
                echo '<label for="lavage_maillots">Nettoyage Vestiaires :</label>';
				if ($result_stats['lavage_maillots'])
				{		
					echo '<input type="checkbox" name="lavage_maillots" id="lavage_maillots" checked/>';
				}
				else
				{
					echo '<input type="checkbox" name="lavage_maillots" id="lavage_maillots" />';
				}

			}
			$req_stats_indiv->CloseCursor();	
			

			echo '<br><br>';
			echo '<center>';
			echo '<input type="hidden" name="modif_ok" value="ok">';
			echo '<input type="button" value="Retour" onclick="history.go(-1)"/>&nbsp;&nbsp;<input type="submit" value="Enregistrer"/>'; 		
			echo '</center>';
			echo '</fieldset>';
			echo '</form>';
		}
		else
		{
				echo '<p class="ok">Enregistrement bien effectué</p>';
		}	
	
	?>	
	</section>
	<?php include ('../footer.php'); ?>
</div>
</body>
</html>