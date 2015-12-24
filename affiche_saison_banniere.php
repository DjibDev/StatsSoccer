<?php

function AfficheSaisonBanniere()
{
	require ('connexion.php');

	$saison=date('Y').'/'.(date('Y')+1);

	$req_saison=$bdd->prepare('SELECT min (distinct(saison)) as Num FROM journees');
	$req_saison->execute();
	
	while ($num_saison=$req_saison->fetch())
	{

		$saison=$num_saison['Num'];
	}	

	return $saison;
}

?>
