<?php

function SupprStatsPlayer($a)
{
	
/* Fichier à supprimer */
   $fichier = '../stats_files/players/stats_player_'.$a.'.php';

   if( file_exists ( $fichier))
     unlink( $fichier ) ;
	
}

function SupprStatsEquipe($a)
{
	
/* Fichier à supprimer */
   $fichier = '../stats_files/equipes/stats_equipe_'.$a.'.php';

   if( file_exists ( $fichier))
     unlink( $fichier ) ;

}


?>
