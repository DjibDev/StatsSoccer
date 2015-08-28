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
	
	$reponse=$bdd->query('SELECT count(*) AS nb, numero, date, ID_journee
	FROM matchs, journees
	WHERE journees.ID_journee = matchs.journee_id
	AND saison="2015/2016"
	AND journees.coupe="0"
	GROUP BY ID_journee
	ORDER BY numero ASC');
	
	$tab_match=Array();
	$i=0;
	
	while ($resultats=$reponse->fetch())
	{
		if ($resultats['nb'] == 10) 
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
	
	$reponse2=$bdd->query('SELECT numero, date, ID_journee
	FROM journees
	WHERE saison="2015/2016"
	AND coupe="0"
	ORDER BY numero ASC');
	
	
	while ($resultats2=$reponse2->fetch())
	{
		$dateFR=FormatDateFR($resultats2['date']);
		
		if ($tab_match[$resultats2['ID_journee']] == true)
		{	
			echo '<option value='.$resultats2['ID_journee'].' disabled >Journée N°'.$resultats2['numero'].' - '.$dateFR.'</option>';
		}
		else
		{
			echo '<option value='.$resultats2['ID_journee'].'>Journée N°'.$resultats2['numero'].' - '.$dateFR.'</option>';
		}	
	}
	$reponse2->closeCursor();
}




function ResultatsDejaRentres()
{
	require ('connexion.php');

	$reponse=$bdd->query('SELECT DISTINCT numero
	FROM stats_collectives, journees
	WHERE stats_collectives.journee_id = journees.ID_journee
	AND saison="2015/2016"
	AND coupe="0" ');
	
	$deja_fait=Array();
	$x=0;
		
	while ($resultats=$reponse->fetch())
	{
		$deja_fait[$x]=$resultats['numero'];
		$x++;
	}
	$reponse->closeCursor();
	
	$reponse2=$bdd->query('SELECT numero, date, ID_journee
	FROM journees
	WHERE saison="2015/2016"
	AND coupe="0"
	ORDER BY numero ASC');
	
	$nb_elements=$x+1;
		
	
	while ($resultats2=$reponse2->fetch())
	{
		$indice=0;
		$adesactiver=false;
		$dateFR=FormatDateFR($resultats2['date']);
		
		
		while ($indice < $nb_elements)
		{	
				if ($deja_fait[$indice] == $resultats2['numero'])
				{
					$adesactiver=true;
				
				}
				$indice++;		
		}		
				
		if ($adesactiver == true)
		{
				
				echo '<option value='.$resultats2['ID_journee'].' disabled >Journée N°'.$resultats2['numero'].' - '.$dateFR.'</option>';
		}			
		else
		{
				echo '<option value='.$resultats2['ID_journee'].'>Journée N°'.$resultats2['numero'].' - '.$dateFR.'</option>';
		}						
		
	}
	$reponse->closeCursor();
							
	
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




?> 
