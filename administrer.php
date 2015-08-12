<html>
	<head>
		<title>Les statistiques</title>
		<link rel="stylesheet" href="style_admin.css"/>
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
		
		<?php
		if (!isset($_POST['mot_de_passe']) OR $_POST['mot_de_passe'] != "djibdev")
		{
		?>
			<br>
			<br>
			<center>
			<form action="administrer.php" method="post">
				<p>
				<label for="password">Entrer le mot de passe administrateur<br></label>
				<input type="password" name="mot_de_passe" />
				<input type="submit" value="Valider" />
				</p>
			</form>
			</center>
		<?php
		}
		else
		{
		?>
		<article>
				<fieldset>
				<legend>Statistiques de l'équipe</legend>
				<li><a class="adm" href="admin_stats_modif_equipe.php">Modifier</a></li>
				<li><a class="adm" href="admin_stats_ajout_equipe.php">Ajouter</a></li>	
			</fieldset>	
			<fieldset>
				<legend>Statistiques individuelles</legend>
				<li><a class="adm" href="admin_stats_modif_player.php">Modifier</a></li>
				<li><a class="adm" href="admin_stats_	ajout_player.php">Ajouter</a></li>	
			</fieldset>
			
		</article>		
			
		<aside>
			<fieldset>
				<legend>Calendrier/Résultats</legend>
				<li><a class="adm" href="admin_calendrier.php">Calendrier</a></li>
				<li><a class="adm" href="admin_resulats.php">Résultats</a></li>
			</fieldset>
			<fieldset>
				<legend>Effectif</legend>
				<li><a class="adm" href="admin_modif_player.php">Modifier</a></li>
				<li><a class="adm" href="admin_ajout_player.php">Ajouter</a></li>	
			</fieldset>
			<fieldset>
				<legend>Equipe</legend>
				<li><a class="adm" href="admin_modif_equipe.php">Modifier</a></li>
				<li><a class="adm" href="admin_ajout_equipe.php">Ajouter</a></li>	
			</fieldset>
		</aside>	
		<?php
		}
		?>		
		
	</section>	
</div>		
	
		
	
</body>
</html> 
