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
			echo '<form method="post" action="trait_modif_stats_individuelles.php" id="myform">';	
			echo '<fieldset>';	
			echo '<legend>Modification stats individuelles</legend>';
	

			$joueur_id=$_POST['pseudo_id'];
			$journee_id=$_POST['journee_test'];
			echo $joueur_id;
			echo $_POST['journee_test'];

			/*$req_stats_indiv=$bdd->prepare('SELECT * FROM stats_individuelles 
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
				echo '<input type="number" name="cleansheet" id="cleansheet" value="'.$result_stats['cleansheet'].'"/>';
				
				echo '<label for="peno_rate">Péno. raté :</label>';	
				echo '<input type="number" name="peno_rate" id="peno_rate" value="'.$result_stats['peno_rate'].'"/>';

				echo '<label for="peno_arrete">Péno. arreté :</label>';	
				echo '<input type="number" name="peno_arrete" id="peno_arrete" value="'.$result_stats['peno_arrete'].'"/>';

				echo '<label for="csc">CSC :</label>';	
				echo '<input type="number" name="csc" id="csc" value="'.$result_stats['csc'].'"/>';

			}
			$req_stats_indiv->CloseCursor();	
			*/	

			echo '<br>';
			echo '<center>';
			echo '<input type="hidden" name="modif_ok" value="ok">';
			echo '<input type="reset" value="Annuler"/>&nbsp;&nbsp;<input type="submit" value="Enregistrer"/>'; 		
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