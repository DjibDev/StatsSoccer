<html>
	<head>
		<title>Les statistiques</title>
		<link rel="stylesheet" href="style_admin.css"/>
		<meta charset="utf-8" />
		
	</head>
	
<body>	
<?php
	include('banniere_menu.php');
?>	
		
	<section>	

		<?php
		
		if (isset($_POST['player']))
		{
				
			require ('connexion.php');
			
			$ID_joueur=$_POST['player'];	
						
			$req = $bdd->prepare('DELETE FROM effectif WHERE ID_joueur=? ');
			$req->execute(array($ID_joueur)); 
			
			require ('suppr_fiche_stats.php');
			SupprStatsPlayer($ID_joueur);
			
			echo '<p class="ok">Suppression bien effectuée!</p>';
			echo '<center><p>Souhaitez-vous supprimer un autre joueur ? </p>';
			echo '<p><a class="btn" href="admin_modif_player.php#suppr">Oui</a> - <a class="btn" href=administrer.php>Non</a></p></center>';
		}
		
		else
		{
			echo '<p class="nok">Une erreur s\'est produite !</p>';
			echo '<p><a class="btn" href="admin_calendrier.php">Retour</a></p>';
		}

		?>
	</section>
	<?php include ('../footer.php'); ?>
</div>
</body>
</html>	
