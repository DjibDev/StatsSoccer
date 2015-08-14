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

function RefuserDoublonMatch($journee,$match)
{
	require ('connexion.php');
	
	$reponse=$bdd->query('SELECT * from matchs where journee_id='.$journee.' and coupe=0 ');
	
	$matchs_existants=Array();
	$x=0;
	
	
	while ($resultats=$reponse->fetch())
	{
		$confrontation=$resultats['equipe_dom_id'].'versus'.$resultats['equipe_vis_id'];
		$matchs_existants[$x]=$confrontation;
		$x++;
	}	
	
	$reponse->closeCursor();
	
	//recupere le nombre d'element dans le tableau 
	
	$nb=$x+1;
	
	// Test la condition si la confrontation pour cette journée existe deja dans la table matchs
	
	$doublon=false;
		
	for ($z=0;$z<$nb;$z++)
	{
		if ($matchs_existants[$z] == $match)
		{
			$doublon= true;

		}
		else
		{
			$doublon=false;
		}
	} 
	
	return $doublon;
	
}	
?> 
