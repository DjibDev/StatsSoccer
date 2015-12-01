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
		
		if (isset($_POST['player']))
		{
				
			require ('connexion.php');
			
			$birthday=$_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];
			$poste=$_POST['poste'];
			$num_maillot=$_POST['num_maillot'];
			$ID_joueur=$_POST['player'];
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			
						
			$req = $bdd->prepare('UPDATE effectif SET nom= ?, prenom=?, birthday=?, poste=?, num_maillot=? WHERE ID_joueur=? ');
			$req->execute(array($nom,$prenom,$birthday,$poste,$num_maillot,$ID_joueur)); 

			echo '<p class="ok">Enregistrement bien effectué !</p>';
			echo '<center><p>Souhaitez-vous modifier une autre joueur ? </p>';
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
