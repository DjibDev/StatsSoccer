<html>
			<head>
				<title>Statistique d'équipe</title>
				<meta charset="utf-8" />
				<link rel="stylesheet" href="../../style_base.css"/>
			</head>
			<body>
			<div id="bloc_page">
				<?php 
				include("../banniere_menu_fiche.php"); 
				?>	
			<section>
				<?php
					require_once ("../fonctions_affiche_stats.php");
					AfficheStatsEquipe(9);
				?>
			</section>	
			</div>
			</body>
			</html>