<?php

function MAJ_Classement()
{
  
	require ('connexion.php');
	
	// Vide le classement
	$req1=$bdd->query('DELETE FROM classement');
	$req1->execute(); 
		
	// requete qui retourne le nombre de journees présentes dans stats_collectives
	$req2=$bdd->query('SELECT COUNT(DISTINCT journee_id) AS nb_journee
	FROM stats_collectives');
	
	while ($resultats2=$req2->fetch())
	{
		$nb_journees=$resultats2['nb_journee'];
	}
	$req2->closeCursor();
	
	
	// extraction des differents id_equipe et mise en tableau
	$tab_id_equipe=Array();
	$indice=0;
	$req3=$bdd->query('SELECT ID_equipe FROM equipes');
	while ($resultats3=$req3->fetch())
	{
		$tab_id_equipe[$indice]=$resultats3['ID_equipe'];
		$indice++;
	}
	$req3->closeCursor();
	
	$nb_equipe=$indice+1;
	
	// calculs cumulatifs par equipe
	
	$x=0;
	
	while ($x < $nb_equipe)
	{
		$nb_victoires=0;
		$nb_nuls=0;
		$nb_defaites=0;
		$nb_buts_pour=0;
		$nb_buts_contre=0;
		$diff=0;
		$points=0;
		$equipe_id=$tab_id_equipe[$x];	
			
			
		// requete faite par equipe
		$req4=$bdd->query('SELECT victoire, defaite, nul ,buts_pour, buts_contre, diff, points
		FROM stats_collectives
		WHERE equipe_id='.$equipe_id.'');
							
		while ($resultats4=$req4->fetch())
		{
	
			if ($resultats4['victoire'] == true)
			{
				$nb_victoires=$nb_victoires+1;
			}
							
			if ($resultats4['nul'] == true)
			{
				$nb_nuls=$nb_nuls+1;
			}
			
			if ($resultats4['defaite'] == true)
			{
				$nb_defaites=$nb_defaites+1;
			}	
					
			$nb_buts_pour=$nb_buts_pour+$resultats4['buts_pour'];
			$nb_buts_contre=$nb_buts_contre+$resultats4['buts_contre'];
			$diff=$diff+$resultats4['diff'];
			$points=$points+$resultats4['points'];
		}
		$req4->closeCursor(); 
	
		//requete pour écrire le nouveau classement
		
		$req5=$bdd->prepare("INSERT INTO classement (nb_journees, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points, equipe_id)
		VALUES (?,?,?,?,?,?,?,?,?)");
		$req5->bindParam(1, $nb_journees); 
		$req5->bindParam(2, $nb_victoires);
		$req5->bindParam(3, $nb_nuls);
		$req5->bindParam(4, $nb_defaites); 
		$req5->bindParam(5, $nb_buts_pour);
		$req5->bindParam(6, $nb_buts_contre);
		$req5->bindParam(7, $diff); 
		$req5->bindParam(8, $points);
		$req5->bindParam(9, $equipe_id);
		$req5->execute(); 
		
		$x++;		
	}	
			
}	

?>
	
