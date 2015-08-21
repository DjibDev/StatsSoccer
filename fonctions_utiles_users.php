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



?> 
