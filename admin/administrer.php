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
				<legend>Statistiques individuelles</legend>
				<li><a class="adm" href="admin_ajout_stats_individuelles.php">Ajouter</a></li>	
				<li><a class="adm" href="admin_stats_modif_player.php">Modifier/Supprimer</a></li>	
			</fieldset>
			<br>
			<fieldset>
				<legend>Championnat</legend>
				<li><a class="adm" href="admin_calendrier.php#ajout_team">Calendrier</a></li>
				<li><a class="adm" href="admin_resultats.php">Résultats</a></li>
			</fieldset>
			<br>
			<fieldset>
				<legend>Coupe</legend>
				<li><a class="adm" href="admin_calendrier_coupe.php#ajout_team">Calendrier</a></li>
				<li><a class="adm" href="admin_resultats_coupe.php">Résultats</a></li>
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

	</section>	
</div>		
	
</body>
</html> 
