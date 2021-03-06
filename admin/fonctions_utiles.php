<?php

// tranbsfforme une date en format jj/mm/aaaa en aaaa-mm-jj
function FormatDateMySQL($datefr)
{
    
    $dateMySQL=substr($datefr,-4).'-'.substr($datefr, 3, 2).'-'.substr($datefr, 0, 2);
    return $dateMySQL;
}

function FormatDateFR($dateMySQL)
{
    $dateMySQL=strtotime($dateMySQL);
    $dateFR=date("d/m/Y",$dateMySQL);
    return $dateFR;
}

function FormatDateSaisie($date)
{
	// date qui doit etre comprise entre 01/01/2000 et 31/12/2199
	$regex_date='#^[0-3]{1}\d{1}+[\/]{1}[0-1]{1}\d{1}[\/][2]{1}[0-1]{1}\d{1}\d{1}$#'; 

	if (preg_match($regex_date, $date))
	{
		return true;
	}
	else
	{
		return false;
	}	

}

function RetournePseudo($id_joueur)
{
	require ('connexion.php');
	
	$pseudo='PSEUDO NON TROUVE';

	$req_eff=$bdd->query('SELECT pseudo 
							FROM effectif
							WHERE ID_joueur='.$id_joueur.' ');
								
	while ($aff_pseudo=$req_eff->fetch())
	{
		$pseudo=$aff_pseudo['pseudo'];
	}	
	$req_eff->closeCursor();

	return $pseudo;
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
	$format_req=substr($req_complete,0,($long_req-1)); // retire la derniere virgule = (sous chaine de base - le dernier caractere)

	$req_insert=$bdd->prepare($format_req); 
	$req_insert->execute(); // execution de la requete d'insertion
	
}	

function AjoutMatchJournee($journee_id, $equipe_dom_id, $equipe_vis_id, $coupe)
{
	require ('connexion.php');

	//vérification de l'absence de doublon avant MAJ de la base
	$tab_equipe_id=array();
	$x=0;
	$success=true;

	$req_existant=$bdd->query('SELECT equipe_dom_id, equipe_vis_id FROM matchs WHERE journee_id='.$journee_id.' ');
	
	while ($result_existant=$req_existant->fetch())
	{
		$tab_equipe_id[$x]=$result_existant['equipe_dom_id'];
		$x++;
		$tab_equipe_id[$x]=$result_existant['equipe_vis_id'];
		$x++;
	}	
	$req_existant->closeCursor();

	if (in_array($equipe_dom_id, $tab_equipe_id))
	{	
		$success=false;
	}
	
	if	(in_array($equipe_vis_id, $tab_equipe_id))
	{	
		$success=false;
	}

	return $success;
	
}	

function DateJourneeMatch($match_id)
{
	//requete qui retourne la date (en format FR) de la journee auquelle le match passé en parametre appartient (id)
	require ('connexion.php');

	$date_journee='';

	$req_j=$bdd->query('SELECT DISTINCT(date) FROM journees j 
	INNER JOIN matchs m ON j.ID_journee = m.journee_id 
	AND m.journee_id ='.$match_id.' ');

	while ($result_j=$req_j->fetch())
	{
		$date_journee=$result_j['date'];
	}	
	$req_j->CloseCursor();

	$date_journee=FormatDateFR($date_journee);  // appel de la fontion pour remlettre la date en format FR

	return $date_journee;

}

function DateJournee($journee_id)
{
	//requete qui retourne la date (en format FR) de la journee selon l'ID journée passé en parametre
	require ('connexion.php');

	$date_journee='';

	$req_j=$bdd->query('SELECT date FROM journees
	WHERE ID_journee='.$journee_id.'');

	while ($result_j=$req_j->fetch())
	{
		$date_journee=$result_j['date'];
	}	
	$req_j->CloseCursor();

	$date_journee=FormatDateFR($date_journee);  // appel de la fontion pour remlettre la date en format FR

	return $date_journee;

}


function CreerJournee($date, $coupe)       // permet de créer une nouvelle journée, pricipalement pour les reports de matchs, retourne l'id de la journee si tout est ok
{

	// intialisation de la variable
	$id_data=null;

	require_once ('../affiche_saison_banniere.php');
	$saison=AfficheSaisonBanniere(); 

	// remise de la date en format MySQL AAAA-MM-JJ
	$date=FormatDateMySQL($date);
	
	// test si la date rentrée exsite deja dans la base
	$tab_date_exist=array();

	require ('connexion.php'); 

	$req_check_date=$bdd->query('SELECT date FROM journees');
	
	$x=0;

	while ($result_check_date=$req_check_date->fetch())
	{

			$tab_date_exist[$x]=$result_check_date['date'];
			$x++;

	}	
	$req_check_date->CloseCursor();


	if (!(in_array($date, $tab_date_exist)))
	{	
		$max_num_j=$bdd->query('SELECT MAX(numero) AS N_max 
		FROM journees 
		WHERE coupe='.$coupe.' ');

		while ($result_num_max=$max_num_j->fetch())
		{
			$numero_new=$result_num_max['N_max'];	
		}	
		$max_num_j->CloseCursor();

		$numero_new++;

		$insert_J = $bdd->prepare("INSERT INTO journees (date, saison, numero, coupe) VALUES (?,?,?,?)");
		$insert_J->bindParam(1, $date);
		$insert_J->bindParam(2, $saison);
		$insert_J->bindParam(3, $numero_new);
		$insert_J->bindParam(4, $coupe);
		$insert_J->execute();

		$id_data = $bdd->lastInsertId();

	}	

	return $id_data; 
}

function SupprMatch($match_id)
{
		require ('connexion.php');

		$suppr_match=$bdd->query('DELETE FROM matchs WHERE ID_match='.$match_id.' ');
		$suppr_match->execute();	
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

	$requete='INSERT INTO baremes (pts_victoire, pts_nul, pts_defaite, pts_forfait, pts_penalite, coupe) VALUES ';
	$values=' ('.$v.','.$n.','.$d.','.$f.','.$p.','.$c.')';
	$req_complete=$requete.$values;
	$req_insert_bareme=$bdd->prepare($req_complete);
	$req_insert_bareme->execute();
} 


?> 
