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
				<legend>Statistiques de l'équipe</legend>
				<li><a class="adm" href="admin_stats_modif_equipe.php">Modifier/Supprimer</a></li>
				<li><a class="adm" href="admin_stats_ajout_equipe.php">Ajouter</a></li>	
			</fieldset>	
			<fieldset>
				<legend>Statistiques individuelles</legend>
				<li><a class="adm" href="admin_stats_modif_player.php">Modifier/Supprimer</a></li>
				<li><a class="adm" href="admin_stats_ajout_player.php">Ajouter</a></li>	
			</fieldset>
			
		</article>		
			
		<aside>
			<fieldset>
				<legend>Calendrier/Résultats</legend>
				<li><a class="adm" href="admin_calendrier.php#ajout_team">Calendrier</a></li>
				<li><a class="adm" href="admin_resultats.php">Résultats</a></li>
			</fieldset>
			<fieldset>
				<legend>Effectif</legend>
				<li><a class="adm" href="admin_modif_player.php">Modifier/Supprimer</a></li>
				<li><a class="adm" href="admin_ajout_player.php">Ajouter</a></li>	
			</fieldset>
			<fieldset>
				<legend>Equipe</legend>
				<li><a class="adm" href="admin_modif_equipe.php">Modifier/Supprimer</a></li>
				<li><a class="adm" href="admin_ajout_equipe.php">Ajouter</a></li>	
			</fieldset>
		</aside>	

	</section>	
</div>		
	
</body>
</html> 
