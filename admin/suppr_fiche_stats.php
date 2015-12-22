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
	// Fichiers à supprimer sous le dossier equipes
	$dossier_traite = "../stats_files/equipes";
	$repertoire = opendir($dossier_traite); // On définit le répertoire dans lequel on souhaite travailler.

	while (false !== ($fichier = readdir($repertoire))) // On lit chaque fichier du répertoire dans la boucle.
	{
		$chemin = $dossier_traite."/".$fichier; // On définit le chemin du fichier à effacer.

		// Si le fichier n'est pas un répertoire…
		if ($fichier != ".." AND $fichier != "." AND !is_dir($fichier))
		{
		      unlink($chemin); // On efface.

		}
	}
	closedir($repertoire); // Ne pas oublier de fermer le dossier
	
	
	// Fichiers à supprimer sous le dossier players
	$dossier_traite = "../stats_files/players";
	$repertoire = opendir($dossier_traite); // On définit le répertoire dans lequel on souhaite travailler.

	while (false !== ($fichier = readdir($repertoire))) // On lit chaque fichier du répertoire dans la boucle.
	{
		$chemin = $dossier_traite."/".$fichier; // On définit le chemin du fichier à effacer.

		// Si le fichier n'est pas un répertoire…
		if ($fichier != ".." AND $fichier != "." AND !is_dir($fichier))
		{
		      unlink($chemin); // On efface.

		}
	}
	closedir($repertoire); // Ne pas oublier de fermer le dossier
}

?>
