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
				<a class="btn" href="affiche_classement.php">Classement</a>
				<a class="btn" href="affiche_effectif.php">Effectif</a></a>
				<a class="btn" href="#section">Statistiques</a>
				<a class="btn" href="http://jgefootlb.free.fr">Forum</a>
				<a class="btn" href="http://jgefoot.com">Site officiel</a>
				<a class="btn" href="administrer.php">Administrer</a></p>
		</div>
	</div>
		
	<section>	
								
		<form method="post" action="trait_ajout_player.php">
			
		<?php require_once ('fonctions_utiles.php'); ?>
		
		<fieldset>
		<Legend> Ajouter un joueur</Legend>		
			<label for="nom">Entrer le nom</label>	
			<input type="text" name="nom">
			
		</fieldset>
		</form>
		
	</section>
	
</div>		
	
		
	
</body>
</html> 
