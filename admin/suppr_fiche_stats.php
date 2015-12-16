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

function SupprAllStats()
{
		/* Fichiers à supprimer sous le dossier players */
		
		$folder="..\stats_files\players";
        $dossier=opendir($folder);

        while ($fichier = readdir($dossier))
        {
                if ($fichier != "." && $fichier != "..")
                {
                        $Vidage= $folder.$fichier;
                        unlink($Vidage);
                }
        }
        closedir($dossier);
		
		/* Fichiers à supprimer sous le dossier equipes */
		
		$folder="..\stats_files\equipes";
        $dossier=opendir($folder);

        while ($fichier = readdir($dossier))
        {
                if ($fichier != "." && $fichier != "..")
                {
                        $Vidage= $folder.$fichier;
                        unlink($Vidage);
                }
        }

        closedir($dossier);
}

?>
