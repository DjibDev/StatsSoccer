<html>
	<head>
		<title>Les statistiques</title>
		<link rel="stylesheet" href="style_base.css"/>
		<meta charset="utf-8" />
		
	</head>
	
<body>	
<div id="bloc_page">
	<div id="banniere_image">
		<h1>Saison 2015-2016</h1>	
		<div id="banniere_description">	
				<a class="btn" href="index.php">Accueil</a>
				<a class="btn" href="#section">Résultats/Calendrier</a>
				<a class="btn" href="affiche_effectif.php">Effectif</a></a>
				<a class="btn" href="#section">Statistiques</a>
				<a class="btn" href="http://jgefootlb.free.fr">Forum</a>
				<a class="btn" href="http://jgefoot.com">Site officiel</a>
				<a class="btn" href="administrer.php">Administrer</a></p>
		</div>
	</div>
		
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
