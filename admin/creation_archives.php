<?php

function CreerArchive($saison)
{
			// création du fichier archive de la saison passée en parametre
			$filename='../archives/saison_'.$a.'.php';
			$fichier_stats = fopen($filename,"a+") or die("Impossible de créer le fichier archive !"); 
			
			$script_complet='<html>
			<head>
				<title>Statistique d\'équipe</title>
				<meta charset="utf-8" />
				<link rel="stylesheet" href="../style_base.css"/>
			</head>
			<body>
			<div id="bloc_page">
				<?php 
				include("../banniere_menu_fiche.php"); 
				?>	
			<section>
				<?php
					require_once ("../fonctions_affiche_stats.php");
					AfficheStatsEquipe('.$saison.');
				?>
			</section>	
			</div>
			</body>
			</html>';
			
			// écriture dans le fichier
			fputs($fichier_stats, $script_complet);
			// fermeture du fichier
			fclose($fichier_stats); 

}

?>