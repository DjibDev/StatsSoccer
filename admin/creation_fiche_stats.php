<?php		
		
			
function CreerFicheStatsPlayer($a)
{
			// création du fichier stats du joueur et appel de la fonction pour écrire dedans
			$filename='../stats_files/players/stats_player_'.$a.'.php';
			$fichier_stats = fopen($filename,"a+") or die("Impossible de créer le fichier Stats du joueur !"); 
			
			$script_complet='<html>
			<head>
				<title>Statistique de joueur</title>
				<meta charset="utf-8" />
				<link rel="stylesheet" href="../../style_base.css"/>
			</head>
			<body>
			<div id="bloc_page">
				<?php 
				include("../banniere_menu_fiche.php"); 
				?>	
				
				<?php
					
					require ("../fonctions_affiche_stats.php");
					AfficheStatsPlayer('.$a.');

				?>
				
			</div>
			</body>
			</html>';
			
			// écriture dans le fichier
			fputs($fichier_stats, $script_complet);
			// fermeture du fichier
			fclose($fichier_stats); 

}

function CreerFicheStatsEquipe($a)
{
			// création du fichier stats de l'équipe et appel de la fonction pour écrire dedans
			$filename='../stats_files/equipes/stats_equipe_'.$a.'.php';
			$fichier_stats = fopen($filename,"a+") or die("Impossible de créer le fichier Stats du joueur !"); 
			
			$script_complet='<html>
			<head>
				<title>Statistique d\'équipe</title>
				<meta charset="utf-8" />
				<link rel="stylesheet" href="../../style_base.css"/>
			</head>
			<body>
			<div id="bloc_page">
				<?php 
				include("../banniere_menu_fiche.php"); 
				?>	
				
				<?php
					
					require ("../fonctions_affiche_stats.php");
					AfficheStatsEquipe('.$a.');

				?>
				
			</div>
			</body>
			</html>';
			
			// écriture dans le fichier
			fputs($fichier_stats, $script_complet);
			// fermeture du fichier
			fclose($fichier_stats); 

}



?>
