<?php

function FormatDateMySQL($datefr)
{
    $datefr=strtotime($datefr);
    $dateMySQL=date("YYYY-mm-dd",$datefr);
    return $dateMySQL;
}

function FormatDateFR($dateMySQL)
{
    $dateMySQL=strtotime($dateMySQL);
    $dateFR=date("d/m/Y",$dateMySQL);
    return $dateFR;
}

function NumMaillotDispo()
{
	require ('connexion.php');
	
	$reponse=$bdd->query('SELECT num_maillot from effectif');
	
	$reserve=Array();
	$x=0;
	
	while ($resultats=$reponse->fetch())
	{
		$reserve[$x]=$resultats['num_maillot'];
		$x++;
	}	
	
	$reponse->closeCursor();
	
	//recupere le nombre d'element dans le tableau 
	
	$nb=$x+1;
	
	// Test la condition si le numero est déja pris par un autre joueur
		
	for ($y=1;$y < 100;$y++)
	{
		$doublon=false;
		
		for ($z=0;$z<$nb;$z++)
		{
			if ($reserve[$z] == $y)
			{
				$doublon=true;
			}
		} 
		
		if ($doublon == true)
		{
			echo '<option value='.$y.' disabled>'.$y.'</option>';		
		}
		else
		{
			echo '<option value='.$y.'>'.$y.'</option>';
		}
	}

}	


function NbrMatchAtteint()
{
	require ('connexion.php');

	// calcul du nombre de matchs par journee maximum, selon le nombre d'équipes inscrites
	
	$reponse2=$bdd->query('SELECT count(*) AS Nb_equipes
	FROM equipes');
	while ($resultats2=$reponse2->fetch())
	{
			$nb_equipes=$resultats2['Nb_equipes'];
	}		
	$reponse2->closeCursor();
	
	$matchs_max=$nb_equipes/2;
	$matchs_max=floor($matchs_max); // arrondi à l'entier inférieur
	
		
	// calcul du nombre de matchs par journees rentrés
	$reponse=$bdd->query('SELECT count(*) AS nb, numero, date, ID_journee
	FROM matchs, journees
	WHERE journees.ID_journee = matchs.journee_id
	AND journees.coupe="0"
	GROUP BY ID_journee
	ORDER BY numero ASC');
	
	//mise en tableau des résultat de la requête
	$tab_match=Array();
	$i=0;
	
	while ($resultats=$reponse->fetch())
	{
		if ($resultats['nb'] == $matchs_max) 
		{	
			$tab_match[$resultats['ID_journee']]=true;
		}
		else
		{
			$tab_match[$resultats['ID_journee']]=false;
		}
		$i++;
	}	
	$reponse->closeCursor();
	
	$reponse3=$bdd->query('SELECT numero, date, ID_journee
	FROM journees
	WHERE coupe="0"
	ORDER BY numero ASC');
		
	while ($resultats3=$reponse3->fetch())
	{
		$dateFR=FormatDateFR($resultats3['date']);
		
		if ($tab_match[$resultats3['ID_journee']] == true)
		{	
			echo '<option value='.$resultats3['ID_journee'].' disabled >Journée N°'.$resultats3['numero'].' - '.$dateFR.'</option>';
		}
		else
		{
			echo '<option value='.$resultats3['ID_journee'].'>Journée N°'.$resultats3['numero'].' - '.$dateFR.'</option>';
		}	
	}
	$reponse3->closeCursor();
}


function NbrMatchAtteintCoupe()
{
	require ('connexion.php');

	// calcul du nombre de matchs par journee maximum, selon le nombre d'équipes inscrites
	
	$reponse2=$bdd->query('SELECT count(*) AS Nb_equipes
	FROM equipes_coupe');
	while ($resultats2=$reponse2->fetch())
	{
			$nb_equipes=$resultats2['Nb_equipes'];
	}		
	$reponse2->closeCursor();
	
	$matchs_max=$nb_equipes/2;
	$matchs_max=floor($matchs_max); // arrondi à l'entier inférieur
	
		
	// calcul du nombre de matchs par journees rentrés
	$reponse=$bdd->query('SELECT count(*) AS nb, numero, date, ID_journee
	FROM matchs, journees
	WHERE journees.ID_journee = matchs.journee_id
	AND journees.coupe="1"
	GROUP BY ID_journee
	ORDER BY numero ASC');
	
	//mise en tableau des résultat de la requête
	$tab_match=Array();
	$i=0;
	
	while ($resultats=$reponse->fetch())
	{
		if ($resultats['nb'] == $matchs_max) 
		{	
			$tab_match[$resultats['ID_journee']]=true;
		}
		else
		{
			$tab_match[$resultats['ID_journee']]=false;
		}
		$i++;
	}	
	$reponse->closeCursor();
	
	$reponse3=$bdd->query('SELECT numero, date, ID_journee
	FROM journees
	WHERE coupe="1"
	ORDER BY numero ASC');
		
	while ($resultats3=$reponse3->fetch())
	{
		$dateFR=FormatDateFR($resultats3['date']);
		
		if ($tab_match[$resultats3['ID_journee']] == true)
		{	
			echo '<option value='.$resultats3['ID_journee'].' disabled >Journée N°'.$resultats3['numero'].' - '.$dateFR.'</option>';
		}
		else
		{
			echo '<option value='.$resultats3['ID_journee'].'>Journée N°'.$resultats3['numero'].' - '.$dateFR.'</option>';
		}	
	}
	$reponse3->closeCursor();
}


function ResultatsDejaRentres()
{
	require ('connexion.php');
	
	$req=$bdd->query('SELECT numero, date, ID_journee, finished
	FROM journees
	WHERE coupe="0"
	ORDER BY numero ASC');
	
	
	while ($resultats=$req->fetch())
	{
		$dateFR=FormatDateFR($resultats['date']);
				
		if ($resultats['finished'] == true)
		{
				
				echo '<option value='.$resultats['ID_journee'].' disabled >Journée N°'.$resultats['numero'].' - '.$dateFR.'</option>';
		}			
		else
		{
				echo '<option value='.$resultats['ID_journee'].'>Journée N°'.$resultats['numero'].' - '.$dateFR.'</option>';
		}						
		
	}
	$req->closeCursor();
							
	
}	

function ResultatsDejaRentresCoupe()
{
	require ('connexion.php');
	
	$req=$bdd->query('SELECT numero, date, ID_journee, finished
	FROM journees
	WHERE coupe="1"
	ORDER BY numero ASC');
	
	
	while ($resultats=$req->fetch())
	{
		$dateFR=FormatDateFR($resultats['date']);
				
		if ($resultats['finished'] == true)
		{
				
				echo '<option value='.$resultats['ID_journee'].' disabled >Journée N°'.$resultats['numero'].' - '.$dateFR.'</option>';
		}			
		else
		{
				echo '<option value='.$resultats['ID_journee'].'>Journée N°'.$resultats['numero'].' - '.$dateFR.'</option>';
		}						
		
	}
	$req->closeCursor();
	
}

function DoublonStatsPlayer($a,$b)
{
	require ('connexion.php');
		
	$reponse=$bdd->query('SELECT count(*) as Existe	
	FROM stats_individuelles
	WHERE stats_individuelles.journee_id = '.$a.'
	AND stats_individuelles.joueur_id = '.$b.' ');
		
	while ($resultats=$reponse->fetch())
	{
		$doublon=$resultats['Existe'];
	}
	$reponse->closeCursor();
	
	if ($doublon == 1)
	{
		return true;
	}
	else
	{
		return false;
	}	
}

function save_database($user,$password,$host,$dbname) 
{
        $folder = 'backup/save_';
        $realpath = str_replace(__FILE__,'',realpath(__FILE__));
        $filename = date("Y-m-d_H:i:s").'.sql';
        $file = $realpath.$folder.$filename;
        exec('mysqldump --user='.$user.' --password='.$password.' --host='.$host.' '.$dbname.' > '.$file);
}

function SaveEffectif($user,$password,$host,$dbname,$saison)
{
	require ('connexion.php');
	$folder = 'backup/effectif/effectif_';
    $realpath = str_replace(__FILE__,'',realpath(__FILE__));
    $filename = $saison.'.sql';
    $file = $realpath.$folder.$filename;
    exec('mysqldump --user='.$user.' --password='.$password.' --host='.$host.' '.$dbname.' effectif > '.$file);
    
}

function ReloadEffectif($saison)
{
	$mysqlDatabaseName ='stats';
	$mysqlUserName ='root';
	$mysqlPassword ='root';
	$mysqlHostName ='localhost';
	$mysqlImportFilename ='backup/effectif/effectif_'.$saison.'.sql';

	$command='mysql -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' < ' .$mysqlImportFilename;
	exec($command,$output=array(),$worked);
	switch($worked)
	{
    case 0:
		echo '<center><p class="ok">L\'effectif a correctement été rechargé dans la base.</p></center>';
        break;
    case 1:
        echo '<center><pclass="nok">Une erreur s\'est rpoduite lors de lu rechargement de l\'effectif, veuillez contacter votre administrateur</p></center>';
        break;
	}
    
}

function SupprFichierEffectif()
{
	// Fichiers à supprimer sous le dossier equipes
	$dossier_traite = "backup/effectif";
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

function SupprBdd()
{
	
	require_once ('suppr_fiche_stats.php');
	require ('connexion.php');
			
	// sauvegarde de la base avant suppression
	$user="root";
	$password="root";
	$host="localhost";
	$dbname="stats";
	save_database($user,$password,$host,$dbname);
			
	// suppression des fiches stats equipes et players
	SupprAllStats();
	
	// suppression de la base 
	$req = $bdd->prepare('DROP DATABASE IF EXISTS stats');
	$req->execute(); 
	
	try
	{
		$bdd = new PDO('mysql:host='.$host, $user, $password);
	}
	catch (Exception $e)
	{
		die('Erreur détectée: ' . $e->getMessage());
	}
	
	// creation de la nouvelle base mais vide
	$creation_base = 'CREATE DATABASE IF NOT EXISTS `stats` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci';
	$bdd->prepare($creation_base)->execute();
	
	
	echo '<center><p class="ok"> La base de données a été INTEGRALEMENT supprimée.</p>';
	echo '<p>Une sauvegarde a néanmoins été effectuée.</p></center>';
	
}

function CreateBdd()
{	
	$mysqlDatabaseName ='stats';
	$mysqlUserName ='root';
	$mysqlPassword ='root';
	$mysqlHostName ='localhost';
	$mysqlImportFilename ='../database/stats.sql';

	$command='mysql -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' < ' .$mysqlImportFilename;
	exec($command,$output=array(),$worked);
	switch($worked)
	{
    case 0:
		echo '<center><p class="ok">La nouvelle saison est créée, il vous reste a créer les équipes et définir les rencontres.</p></center>';
        break;
    case 1:
        echo '<center><pclass="nok">Une erreur s\'est rpoduite lors de la creation de la nouvelle base, veuillez contacter votre administrateur</p></center>';
        break;
	}
}	
		
function AjoutJourneesBase($tab_journees,$saison,$coupe)
{
	require ('connexion.php');
	
	$requete='INSERT INTO journees (date, saison, numero, coupe, finished) VALUES';
	$req_values=' ';
	$len_tab=count($tab_journees); // calcul du nombre d'elements dans tableau
	$numero=1;
	
	for ($x=0; $x < $len_tab; $x++)
	{
		$req_values=$req_values.'("'.$tab_journees[$x].'", "'.$saison.'", '.$numero.', '. $coupe.', false),';
		$numero++;
	}	
	
	$req_complete=$requete.$req_values; // concaténation de la requete
	$long_req=strlen($req_complete); // calcul de la longeur de chaine
	$format_req=substr($req_complete,0,($long_req-1)); // retire la derniere virgule = sous chaine de base - le dernier caractere

	$req_insert=$bdd->prepare($format_req); 
	$req_insert->execute(); // execution de la requete d'insertion
	
}	

function SupprCoupe()
{
	require ('connexion.php');

	$req_suppr_class_coupe=$bdd->query('DELETE FROM classement_coupe');
	$req_suppr_class_coupe->execute();

	echo '<center><p class="ok"> Le classement coupe a bien été supprimé.</p>';

	$req_suppr_stats_coupe=$bdd->query('DELETE FROM stats_collectives_coupe');
	$req_suppr_stats_coupe->execute();

	echo '<center><p class="ok"> Les stats collectives coupe ont bien été supprimées.</p>';

	$req_suppr_equipes_coupe=$bdd->query('DELETE FROM equipes_coupe');
	$req_suppr_equipes_coupe->execute();

	echo '<center><p class="ok"> Les equipes coupe ont bien été supprimées.</p>';

	$req_suppr_matchs_coupe=$bdd->query('DELETE FROM matchs WHERE coupe=1');
	$req_suppr_matchs_coupe->execute();

	echo '<center><p class="ok"> Les matchs de coupe ont bien été supprimés.</p>';

	$req_suppr_journees_coupe=$bdd->query('DELETE FROM journees WHERE coupe=1');
	$req_suppr_journees_coupe->execute();

	echo '<center><p class="ok"> Les journées de coupe ont bien été supprimées.</p>'; 

}


function RemplirBareme($v,$n,$d,$f,$p,$c) // permet de remplir le bareme selon les parametres victoire, nul, défaite, forfait, pénalité et coupe
{

	require ('connexion.php');

	$requete=('INSERT INTO baremes (pts_victoire, pts_nul, pts_defaite, pts_forfait, pts_penalite, coupe) VALUES ');
	$values=' ('.$v.','.$n.','.$d.','.$f.','.$p.','.$c.')';
	$req_complete=$requete.$values;
	$req_insert_bareme=$bdd->prepare($req_complete);
	$req_insert_bareme->execute();
} 


?> 
