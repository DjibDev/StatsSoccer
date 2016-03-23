<?php

function AfficheSaisonBanniere()
{
	require ('connexion.php');

	$req_saison=$bdd->query('SELECT saison 
		FROM journees 
		WHERE ID_journee= (SELECT MIN(ID_journee) FROM journees)');

	while ($num_saison=$req_saison->fetch())
	{
		$saison=$num_saison['saison'];
	}	
	$req_saison->CloseCursor();
	
	return $saison;
}

?>
