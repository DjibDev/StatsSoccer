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
		
		if (isset($_POST['joueur_id']))
		{
				
			require ('connexion.php');
			
	
			echo '<center>';
			echo '<p class="ok">Enregistrement bien effectué !</p>';
			echo '<p>Souhaitez-vous modifier une autre joueur ? </p>';
			echo '<p><a class="btn" href="admin_modif_player.php">Oui</a> - <a class="btn" href=administrer.php>Non</a></p></center>';
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