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
		
		if (isset($_POST['equipe']))
		{
				
			require ('connexion.php');
			
			$ID_equipe=$_POST['equipe'];	
						
			$req = $bdd->prepare('DELETE FROM equipes WHERE ID_equipe=? ');
			$req->execute(array($ID_equipe)); 
			
			require ('suppr_fiche_stats.php');
			SupprStatsEquipe($ID_equipe);

			echo '<p class="ok">Suppression bien effectuée!</p>';
			echo '<center><p>Souhaitez-vous supprimer une autre équipe ? </p>';
			echo '<p><a class="btn" href="admin_modif_equipe.php">Oui</a> - <a class="btn" href=administrer.php>Non</a></p></center>';
		}
		
		else
		{
			echo '<p class="nok">Une erreur s\'est produite !</p>';
			echo '<p><a class="btn" href="admin_calendrier.php">Retour</a></p>';
		}

		?>
	</section>
	<?php include ('footer.php'); ?>
</div>
</body>
</html>	
