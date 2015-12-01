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
		
		if (isset($_POST['journee_suppr']))
		{
				
			require ('connexion.php');
			
			$journee_id=$_POST['journee_suppr'];	
						
			$req = $bdd->prepare('DELETE FROM matchs WHERE journee_id=? ');
			$req->execute(array($journee_id)); 

			echo '<p class="ok">Suppression bien effectuée!</p>';
			echo '<center><p>Souhaitez-vous supprimer un autre calendrier ? </p>';
			echo '<p><a class="btn" href="admin_calendrier.php">Oui</a> - <a class="btn" href=administrer.php>Non</a></p></center>';
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
