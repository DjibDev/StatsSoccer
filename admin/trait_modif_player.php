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
			
						
			$req = $bdd->prepare('UPDATE effectif SET birthday=?, poste=?, num_maillot=? WHERE ID_joueur=? ');
			$req->execute(array($birthday,$poste,$num_maillot,$ID_joueur)); 

			echo '<p class="ok">Enregistrement bien effectué !</p>';
			echo '<br>';
			echo '<p>Récapitulatif : </p>';
			echo '<p>'.$birthday.'</p>';
			echo '<p>'.$poste.'</p>';
			echo '<p>'.$num_maillot.'</p>';
		}
		
		else
		{
			echo '<p class="nok">Une erreur s\'est produite !</p>';
		}

		?>
	</section>
	
</div>
</body>
</html>	
