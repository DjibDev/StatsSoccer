<?php

function AfficheSaisonBanniere()
{
	require ('connexion.php');

	$saison='En attente de création d\'une nouvelle saison...';

	$req_saison=$bdd->prepare('SELECT DISTINCT(saison) AS Num FROM journees');
	$req_saison->execute();
	
	while ($num_saison=$req_saison->fetch())
	{

		$saison='Saison '.$num_saison['Num'];
	}	
	$req_saison->CloseCursor();
	
	return $saison;
}

?>
