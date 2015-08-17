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

?> 
