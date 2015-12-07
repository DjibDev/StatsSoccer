<?php


function CalculerAge($date)
{
//On déclare les dates à comparer
$dateNais = new DateTime($date);
$dateJour = new DateTime();

//On calcule la différence
$difference = $dateNais->diff($dateJour);
return $difference->format('%y');
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
	AND saison="2015/2016"
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
	WHERE saison="2015/2016"
	AND coupe="0"
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
	AND saison="2015/2016"
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
	WHERE saison="2015/2016"
	AND coupe="1"
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
	WHERE saison="2015/2016"
	AND coupe="0"
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
	WHERE saison="2015/2016"
	AND coupe="1"
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
        $folder = 'backup/sql/save_';
        $realpath = str_replace(__FILE__,'',realpath(__FILE__));
        $filename = date("Y-m-d_H:i:s").'.sql';
        $file = $realpath.$folder.$filename;
        exec('mysqldump --user='.$user.' --password='.$password.' --host='.$host.' '.$dbname.' > '.$file);
}


?> 
