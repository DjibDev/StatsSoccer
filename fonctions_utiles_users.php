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

function NombreEffectif()
{
	require('connexion.php');
	
	$Nb_player=0;
	$req=$bdd->query('SELECT count(*) AS Nb_player FROM effectif ');
	
	while ($resultat=$req->fetch())
	{
			$Nb_player=$resultat['Nb_player'];
	}	
	$req->closeCursor();
	
	return $Nb_player;
	
}	

function AgeAVG()
{
	require('connexion.php');
	
	$indice=0;
	$tab_Age=Array(); // tableau qui contiendra tous les ages calculés
	$Age_moyen=0; // initialisation de la variable 
	
	// recuperation des date de naissance, calcul age , et mise en tableau
	$req=$bdd->query('SELECT birthday 
	FROM effectif
	WHERE birthday != "0000-00-00" ');
	
	while ($resultat=$req->fetch())
	{
				$tab_Age[$indice]=CalculerAge($resultat['birthday']);
				$indice++;
			
	}	
	$req->closeCursor();
	
	$nb_elements=$indice; // le nombre d'élements dans le tableau correspond a la derniere valeur de l'indice +1
	
	$age_total=0; // initialisation de la variable
	
	// boucle qui permet d'additionner tous les ages
	for ($x=0; $x <= $nb_elements; $x++)
	{
			$age_total=$age_total+$tab_Age[$x];
	}	
	
	$Age_moyen=$age_total/$nb_elements;
	
	return round($Age_moyen,1);
	
}	

function NbGAR()
{
	require('connexion.php');

	$nb_gardien=0; // initialisation de la variable 
	
	$req=$bdd->query('SELECT count(*) AS Nb_gardien 
	FROM effectif
	WHERE poste = "GAR" ');
	
	while ($resultat=$req->fetch())
	{
		$nb_gardien=$resultat['Nb_gardien'];
	}	
	$req->closeCursor();
	
	return $nb_gardien;
	
}

function NbDEF()
{
	require('connexion.php');

	$nb_defenseur=0; // initialisation de la variable 
	
	$req=$bdd->query('SELECT count(*) AS Nb_defenseur 
	FROM effectif
	WHERE poste = "DEF" ');
	
	while ($resultat=$req->fetch())
	{
		$nb_defenseur=$resultat['Nb_defenseur'];
	}	
	$req->closeCursor();
	
	return $nb_defenseur;
	
}

function NbMIL()
{
	require('connexion.php');

	$nb_milieu=0; // initialisation de la variable 
	
	$req=$bdd->query('SELECT count(*) AS Nb_milieu
	FROM effectif
	WHERE poste = "MIL" ');
	
	while ($resultat=$req->fetch())
	{
		$nb_milieu=$resultat['Nb_milieu'];
	}	
	$req->closeCursor();
	
	return $nb_milieu;
	
}

function NbATT()
{
	require('connexion.php');

	$nb_attaquant=0; // initialisation de la variable 
	
	$req=$bdd->query('SELECT count(*) AS Nb_attaquant
	FROM effectif
	WHERE poste = "ATT" ');
	
	while ($resultat=$req->fetch())
	{
		$nb_attaquant=$resultat['Nb_attaquant'];
	}	
	$req->closeCursor();
	
	return $nb_attaquant;
	
}

function NbINC()
{
	require('connexion.php');

	$nb_inclassable=0; // initialisation de la variable 
	
	$req=$bdd->query('SELECT count(*) AS Nb_inclassable
	FROM effectif
	WHERE poste = "XXX" ');
	
	while ($resultat=$req->fetch())
	{
		$nb_inclassable=$resultat['Nb_inclassable'];
	}	
	$req->closeCursor();
	
	return $nb_inclassable;
	
}


?> 
