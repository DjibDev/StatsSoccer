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
					
					require ("../fonctions_affiche_stats.php");
					AfficheStatsEquipe(46);

				?>
				
				</article>
				<aside>
					<center>
					<img src="../../images/petit_logo.png"/>
					</center>
				</aside>
				</section>
			</div>
			</body>
			</html>