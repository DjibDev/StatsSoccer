<?php		
			
			
function CreerFicheStatsPlayer()
{
			//creation du fichier stats du joueur et appel de la fonction pour écrire dedans
			$filename='../stats_files/players/stats_player_'.$id_joueur.'.php';
			$fichier_stats = fopen($filename,"a+") or die("Impossible de créer le fichier Stats du joueur !"); 
			$script_complet='<html><head><title>Statistique de joueur</title><meta charset="utf-8" /><link rel="stylesheet" href="style_base.css"/>
			</head><body><section>	<div id="bloc_page"><?php include('banniere_menu.php'); ?><h2>ID du joueur: </h2></section></body></html>';
			fputs($fichier_stats, $script_complet);
			fclose($fichier_stats); 

}

/*

function CreerFicheStatsEquipe()
{

}

*/

?>
