﻿<?php

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

function BirthdayCountdown($birthday)
{	
	$annee = date('Y'); // année d'aujourd'hui
	$birth_j=substr($birthday,8,2); // extraction du jour de naissance
	$birth_m=substr($birthday,5,2); // extraction du mois de naissance
	$next_birth = mktime(0, 0, 0, $birth_m, $birth_j, $annee);
	
	//Si l'anniversaire est déjà passé dans l'année, alors le prochaine est calculé sur l'année prochaine
	if ($next_birth < time())
	{
		$next_birth = mktime(0, 0, 0, $birth_m, $birth_j, ++$annee);
	}
		
	$tps_restant = $next_birth - time();
	$jours_restants=$tps_restant/86400; // il faut retirer les secondes, minutes et heures 60*60*24
	$arron_jours= round($jours_restants,0);
	return $arron_jours;
}

function NombreEffectif()
{
	require('connexion.php');
	
	$Nb_player=0;
	$req=$bdd->query('SELECT count(*) AS Nb_player FROM effectif  where actif=1');
	
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
	
	// recuperation des date de naissance, calcul age , et mise en tableau
	$req=$bdd->query('SELECT birthday 
	FROM effectif
	WHERE birthday != "0000-00-00" 	AND actif=1' );
		
	while ($resultat=$req->fetch())
	{
				$tab_Age[$indice]=CalculerAge($resultat['birthday']);
				$indice++;
			
	}	
	$req->closeCursor();
	
	if ($indice != 0)
	{ 
		$nb_elements=count($tab_Age); // le nombre d'élements dans le tableau 
		$age_total=0; // initialisation de la variable
	
		// boucle qui permet d'additionner tous les ages
		for ($x=0; $x < $nb_elements; $x++)
		{
			$age_total=$age_total+$tab_Age[$x];
		}	
	
		$decimal=$age_total/$nb_elements;
		$decimal_arrondi=round($decimal,2);
		$age_annee=floor($decimal_arrondi);
		$decimal_mois=$decimal_arrondi-$age_annee;
		$age_mois=$decimal_mois*12;
		$age_mois_arondi=round($age_mois);

		$age_moyen_complet=$age_annee.' ans et '.$age_mois_arondi.' mois.';
	
	}
	else
	{
		$age_moyen_complet='N.C.';
	}
	return $age_moyen_complet;

	
}	

function NbGAR()
{
	require('connexion.php');

	$nb_gardien=0; // initialisation de la variable 
	
	$req=$bdd->query('SELECT count(*) AS Nb_gardien
	FROM effectif
	WHERE poste = "GAR" 
	AND actif=1 ');
	
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
	WHERE poste = "DEF" 
	AND actif=1 ');
	
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
	WHERE poste = "MIL" 
	AND actif=1 ');
	
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
	WHERE poste = "ATT" 
	AND actif=1 ');
	
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
	WHERE poste = "XXX" 
	AND actif=1 ');
	
	while ($resultat=$req->fetch())
	{
		$nb_inclassable=$resultat['Nb_inclassable'];
	}	
	$req->closeCursor();
	
	return $nb_inclassable;
	
}


?> 
