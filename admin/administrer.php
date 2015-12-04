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
		<article>
			<fieldset>	
				<legend>Championnat</legend>
				<li><a class="adm" href="admin_journees_champ.php">Créer un nouveau Championnat</a></li>
				<li><a class="adm" href="admin_calendrier.php#ajout_team">Définir les rencontres</a></li>
				<li><a class="adm" href="admin_resultats.php">Rentrer les résultats</a></li>
			</fieldset>
			<br>
			<fieldset>
				<legend>Coupe</legend>
				<li><a class="adm" href="admin_journees_coupe.php">Créer une nouvelle coupe</a></li>
				<li><a class="adm" href="admin_calendrier_coupe.php#ajout_team">Définir les rencontres</a></li>
				<li><a class="adm" href="admin_resultats_coupe.php">Rentrer les résultats</a></li>
			</fieldset>		
			<br>
			<fieldset>
				<legend>Statistiques individuelles</legend>
				<li><a class="adm" href="admin_ajout_stats_individuelles.php">Ajouter une ou plusieurs stats joueurs</a></li>	
			</fieldset>			
		</article>		
			
		<aside>
			<fieldset>
				<legend>Effectif</legend>
				<li><a class="adm" href="admin_ajout_player.php">Ajouter</a></li>	
				<li><a class="adm" href="admin_modif_player.php">Modifier/Supprimer</a></li>
			</fieldset>
			<br>
			<fieldset>
				<legend>Equipe</legend>
				<li><a class="adm" href="admin_ajout_equipe.php">Ajouter</a></li>	
				<li><a class="adm" href="admin_modif_equipe.php">Modifier/Supprimer</a></li>
			</fieldset>
		</aside>
		<br>
		<br>
		<article>
			<fieldset>
				<legend>Réinitialiser la base</legend>
				<li><a href="admin_reset_bdd.php">Supprimer toutes les données</a></li>
			</fieldset>
		</article>	
		</section>
	<?php include ('../footer.php'); ?>
</div>		
	
</body>
</html> 
