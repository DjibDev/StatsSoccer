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
			<article>
				<?php
					require_once ("../fonctions_affiche_stats.php");
					AfficheStatsEquipe(1);
				?>
			</article>
			<aside>
				<?php 
					AfficheHistoMatchs(1);
				?>	
			</aside>
			</section>	
			</div>
			</body>
			</html>