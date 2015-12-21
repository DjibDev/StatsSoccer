<?php

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
	echo '<p>Une sauvegarde a, nénamoins, bien été effectuée.</p></center>';
	
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
		echo '<center><p class="ok">La nouvelle saison est créée, il vous reste a créer les équipes et définir les rencontres</p></center>';
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
	$numero=1;
	
	foreach ($tab_journees as $value)
	{
		$req_values=$req_values.'('.$values.','.$saison.','.$numero.','. $coupe.', 0),';
		$numero++;
	}	
	
	echo $requete.$req_values;
	
}	
?> 
