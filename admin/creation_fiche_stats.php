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
				include("../../banniere_menu.php"); 
				require("../../connexion.php");
				?>	
				<section>
				<h2>ID du joueur:'.$a.' </h2>

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
