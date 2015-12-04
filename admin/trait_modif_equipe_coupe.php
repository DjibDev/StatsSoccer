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
		
		if (isset($_POST['team_coupe']))
		{
			// test si la case equipe a suivre a été cochée
			if (isset($_POST['equipe_fav_coupe']))
			{
					$favorite=true;
			}
			else
			{
					$favorite=false;
			}
			
			require ('connexion.php');
			
			$ville=$_POST['ville_coupe'];
			$stade=$_POST['stade_coupe'];
			$nom=$_POST['nom_coupe'];
			$ID_equipe=$_POST['team_coupe'];
			
						
			$req = $bdd->prepare('UPDATE equipes_coupe SET nom=?, ville=?, stade=?, favorite=? WHERE ID_equipe=? ');
			$req->execute(array($nom,$ville,$stade,$favorite,$ID_equipe)); 

			echo '<p class="ok">Enregistrement bien effectué !</p>';
			echo '<center><p>Souhaitez-vous modifier une autre équipe ? </p>';
			echo '<p><a class="btn" href="admin_modif_equipe.php">Oui</a> - <a class="btn" href=administrer.php>Non</a></p></center>';
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
