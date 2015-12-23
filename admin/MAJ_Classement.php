<?php

function MAJ_Classement()
{
 
	require ('connexion.php');
	
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
		$nb_forfaits=0;
		$nb_penalites=0;
		$nb_victoires=0;
		$nb_nuls=0;
		$nb_defaites=0;
		$nb_buts_pour=0;
		$nb_buts_contre=0;
		$diff=0;
		$points=0;
		$equipe_id=$tab_id_equipe[$x];	
			
			
		// requete faite par equipe
		$req4=$bdd->prepare('SELECT forfait, penalite, victoire, defaite, nul ,buts_pour, buts_contre, diff, points
		FROM stats_collectives
		WHERE equipe_id='.$equipe_id.'');
		$req4->execute();
							
		while ($resultats4= $req4->fetch())
		{
			if ($resultats4['forfait'] == true)
			{
				$nb_forfaits=$nb_forfaits+1;
			}
			
			if ($resultats4['penalite'] == true)
			{
				$nb_penalites=$nb_penalites+1;
			}
			
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
		$req5=$bdd->prepare("INSERT INTO classement (nb_journees, nb_forfaits, nb_penalites, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points, equipe_id)
		VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		$req5->bindParam(1, $nb_journees); 
		$req5->bindParam(2, $nb_forfaits);
		$req5->bindParam(3, $nb_penalites);
		$req5->bindParam(4, $nb_victoires);
		$req5->bindParam(5, $nb_nuls);
		$req5->bindParam(6, $nb_defaites); 
		$req5->bindParam(7, $nb_buts_pour);
		$req5->bindParam(8, $nb_buts_contre);
		$req5->bindParam(9, $diff); 
		$req5->bindParam(10, $points);
		$req5->bindParam(11, $equipe_id);
		$req5->execute(); 

		$x++;		
	}	
	
}

function MAJ_Classement_Coupe()
{
 
	require ('connexion.php');
	
	// requete qui retourne le nombre de journees présentes dans stats_collectives
	$req2=$bdd->query('SELECT COUNT(DISTINCT journee_id) AS nb_journee
	FROM stats_collectives_coupe ');
	
	while ($resultats2=$req2->fetch())
	{
		$nb_journees=$resultats2['nb_journee'];
	}
	$req2->closeCursor();
	
	
	// extraction des differents id_equipe et mise en tableau
	$tab_id_equipe=Array();
	$indice=0;
	$req3=$bdd->query('SELECT ID_equipe FROM equipes_coupe');
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
		$nb_forfaits=0;
		$nb_penalites=0;
		$nb_victoires=0;
		$nb_nuls=0;
		$nb_defaites=0;
		$nb_buts_pour=0;
		$nb_buts_contre=0;
		$diff=0;
		$points=0;
		$equipe_id=$tab_id_equipe[$x];	
			
			
		// requete faite par equipe
		$req4=$bdd->prepare('SELECT forfait, penalite, victoire, defaite, nul ,buts_pour, buts_contre, diff, points
		FROM stats_collectives_coupe
		WHERE equipe_id='.$equipe_id.'');
		$req4->execute();
							
		while ($resultats4= $req4->fetch())
		{
			
			if ($resultats4['forfait'] == true)
			{
				$nb_forfaits=$nb_forfaits+1;
			}
			
			if ($resultats4['penalite'] == true)
			{
				$nb_penalites=$nb_penalites+1;
			}
			
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
		$req5=$bdd->prepare("INSERT INTO classement_coupe (nb_journees, nb_forfaits, nb_penalites, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points, equipe_id)
		VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		$req5->bindParam(1, $nb_journees); 
		$req5->bindParam(2, $nb_forfaits);
		$req5->bindParam(3, $nb_penalites);
		$req5->bindParam(4, $nb_victoires);
		$req5->bindParam(5, $nb_nuls);
		$req5->bindParam(6, $nb_defaites); 
		$req5->bindParam(7, $nb_buts_pour);
		$req5->bindParam(8, $nb_buts_contre);
		$req5->bindParam(9, $diff); 
		$req5->bindParam(10, $points);
		$req5->bindParam(11, $equipe_id);
		$req5->execute(); 

		$x++;		
	}	
	
}

function MAJ_Classement_domicile()
{
	require('connexion.php');
	
	// requete qui vide le classement a domicile
	$reqdeld=$bdd->prepare('DELETE FROM classement_domicile ');
	$reqdeld->execute();
	
	// extraction des differents id_equipe et mise en tableau
	$tab_id_equipe_dom=Array();
	$indice=0;
	$reqnbe=$bdd->query('SELECT ID_equipe FROM equipes');
	
	while ($resultatsnbe=$reqnbe->fetch())
	{
		$tab_id_equipe_dom[$indice]=$resultatsnbe['ID_equipe'];
		$indice++;
	}
	$reqnbe->closeCursor();
	
	$nb_equipe_dom=$indice+1;
	
	// calculs cumulatifs par equipe
	
	$x=0;
	
	while ($x < $nb_equipe_dom)
	{
		$nb_forfaits=0;
		$nb_penalites=0;
		$nb_victoires=0;
		$nb_nuls=0;
		$nb_defaites=0;
		$nb_buts_pour=0;
		$nb_buts_contre=0;
		$diff=0;
		$points=0;
		$equipe_id=$tab_id_equipe_dom[$x];	
			
			
		// requete faite par equipe
		$reqdom=$bdd->prepare('SELECT forfait, penalite, victoire, defaite, nul ,buts_pour, buts_contre, diff, points
		FROM stats_collectives
		WHERE equipe_id='.$equipe_id.'
		AND domicile=true ');
		$reqdom->execute();
							
		while ($resultatsdom= $reqdom->fetch())
		{
			if ($resultatsdom['forfait'] == true)
			{
				$nb_forfaits=$nb_forfaits+1;
			}
				
			if ($resultatsdom['penalite'] == true)
			{
				$nb_penalites=$nb_penalites+1;
			}
	
			if ($resultatsdom['victoire'] == true)
			{
				$nb_victoires=$nb_victoires+1;
			}
							
			if ($resultatsdom['nul'] == true)
			{
				$nb_nuls=$nb_nuls+1;
			}
			
			if ($resultatsdom['defaite'] == true)
			{
				$nb_defaites=$nb_defaites+1;
			}	
					
			$nb_buts_pour=$nb_buts_pour+$resultatsdom['buts_pour'];
			$nb_buts_contre=$nb_buts_contre+$resultatsdom['buts_contre'];
			$diff=$diff+$resultatsdom['diff'];
			$points=$points+$resultatsdom['points'];

		}
		$reqdom->closeCursor(); 
		
		// requete pour définir le nombre de journées que cette equipe a joué à domicile
		$reqnbj=$bdd->prepare('SELECT count(*) AS nb_journees
		FROM stats_collectives
		WHERE equipe_id='.$equipe_id.'
		AND domicile=true ');
		$reqnbj->execute();
		
		while ($resultatsnbj=$reqnbj->fetch())
		{
			$nb_journees=$resultatsnbj['nb_journees'];
		}	
		$reqnbj->closeCursor();
		
		//requete pour écrire le nouveau classement
		
		$reqinsertclad=$bdd->prepare("INSERT INTO classement_domicile (nb_journees, nb_victoires, nb_forfaits, nb_penalites, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points, equipe_id)
		VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		$reqinsertclad->bindParam(1, $nb_journees);
		$reqinsertclad->bindParam(2, $nb_victoires);
		$reqinsertclad->bindParam(3, $nb_forfaits);
		$reqinsertclad->bindParam(4, $nb_penalites);
		$reqinsertclad->bindParam(5, $nb_nuls);
		$reqinsertclad->bindParam(6, $nb_defaites); 
		$reqinsertclad->bindParam(7, $nb_buts_pour);
		$reqinsertclad->bindParam(8, $nb_buts_contre);
		$reqinsertclad->bindParam(9, $diff); 
		$reqinsertclad->bindParam(10, $points);
		$reqinsertclad->bindParam(11, $equipe_id);
		$reqinsertclad->execute();

		$x++;		
	}	
	
}

function MAJ_Classement_exterieur()
{

	require ('connexion.php');

	// requete qui vide le classement a l'extérieur
	$reqdelc=$bdd->prepare('DELETE FROM classement_exterieur ');
	$reqdelc->execute();
	

	// extraction des differents id_equipe et mise en tableau
	$tab_id_equipe_ext=Array();
	$indice=0;
	$reqnbe=$bdd->query('SELECT ID_equipe FROM equipes');
	while ($resultatsnbe=$reqnbe->fetch())
	{
		$tab_id_equipe_ext[$indice]=$resultatsnbe['ID_equipe'];
		$indice++;
	}
	$reqnbe->closeCursor();
	
	$nb_equipe_ext=$indice+1;
	
	// calculs cumulatifs par equipe
	
	$x=0;
	
	while ($x < $nb_equipe_ext)
	{
		$nb_forfaits=0;
		$nb_penalites=0;
		$nb_victoires=0;
		$nb_nuls=0;
		$nb_defaites=0;
		$nb_buts_pour=0;
		$nb_buts_contre=0;
		$diff=0;
		$points=0;
		$equipe_id=$tab_id_equipe_ext[$x];	
			
			
		// requete faite par equipe
		$reqext=$bdd->prepare('SELECT forfait, penalite, victoire, defaite, nul ,buts_pour, buts_contre, diff, points
		FROM stats_collectives
		WHERE equipe_id='.$equipe_id.'
		AND domicile=false ');
		$reqext->execute();
							
		while ($resultatsext= $reqext->fetch())
		{
			
			if ($resultatsext['forfait'] == true)
			{
				$nb_forfaits=$nb_forfaits+1;
			}
			
			if ($resultatsext['penalite'] == true)
			{
				$nb_penalites=$nb_penalites+1;
			}
	
			if ($resultatsext['victoire'] == true)
			{
				$nb_victoires=$nb_victoires+1;
			}
							
			if ($resultatsext['nul'] == true)
			{
				$nb_nuls=$nb_nuls+1;
			}
			
			if ($resultatsext['defaite'] == true)
			{
				$nb_defaites=$nb_defaites+1;
			}	
					
			$nb_buts_pour=$nb_buts_pour+$resultatsext['buts_pour'];
			$nb_buts_contre=$nb_buts_contre+$resultatsext['buts_contre'];
			$diff=$diff+$resultatsext['diff'];
			$points=$points+$resultatsext['points'];
		}
		$reqext->closeCursor(); 
		
		// requete pour définir le nombre de journées que cette equipe a joué à l'extérieur
		$reqnbj=$bdd->prepare('SELECT count(*) AS nb_journees
		FROM stats_collectives
		WHERE equipe_id='.$equipe_id.'
		AND domicile=false ');
		$reqnbj->execute();
		
		while ($resultatsnbj=$reqnbj->fetch())
		{
			$nb_journees=$resultatsnbj['nb_journees'];
		}	
		$reqnbj->closeCursor();
	
		//requete pour écrire le nouveau classement extérieur
		
		$reqinsertclae=$bdd->prepare("INSERT INTO classement_exterieur (nb_journees, nb_forfaits, nb_penalites, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points, equipe_id)
		VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		$reqinsertclae->bindParam(1, $nb_journees); 
		$reqinsertclae->bindParam(2, $nb_forfaits); 
		$reqinsertclae->bindParam(3, $nb_penalites); 
		$reqinsertclae->bindParam(4, $nb_victoires);
		$reqinsertclae->bindParam(5, $nb_nuls);
		$reqinsertclae->bindParam(6, $nb_defaites); 
		$reqinsertclae->bindParam(7, $nb_buts_pour);
		$reqinsertclae->bindParam(8, $nb_buts_contre);
		$reqinsertclae->bindParam(9, $diff); 
		$reqinsertclae->bindParam(10, $points);
		$reqinsertclae->bindParam(11, $equipe_id);
		$reqinsertclae->execute(); 

		$x++;		
	}	

}	

function MAJ_Classement_players($joueur_id)
{
	require ('connexion.php');
	
	//suppression du classement du joueur
	$req=$bdd->query('DELETE FROM classement_players
	WHERE joueur_id='.$joueur_id.' ');
		
	// requete qui retourne le nombre de journees présentes dans stats_individuelles
	$req2=$bdd->query('SELECT COUNT(DISTINCT journee_id) AS nb_journee
	FROM stats_individuelles');
	
	while ($resultats2=$req2->fetch())
	{
		$nb_journees=$resultats2['nb_journee'];
	}
	$req2->closeCursor();

	// calculs cumulatifs par joueur
	
	$x=0;
	$cleansheet=0;
	$maillots=0;
	$vestiaires=0;
	
	while ($x < $nb_journees)
	{
		$nb_buts=0;
		$nb_passes=0;
		$nb_cleansheets=0;
		$nb_vestiaires=0;
		$nb_maillots=0;
								
		// requete faite par joueur
		$req3=$bdd->query('SELECT buts, passes, cleansheet, nettoyage_vestiaires, lavage_maillots
		FROM stats_individuelles
		WHERE joueur_id='.$joueur_id.' ');
							
		while ($resultats3=$req3->fetch())
		{
			$nb_buts=$nb_buts+$resultats3['buts'];
			$nb_passes=$nb_passes+$resultats3['passes'];
			
			if ($resultats3['cleansheet'] == true )
			{
				$cleansheet=1;
			}
			else 
			{
				$cleansheet=0;
			}	
			
			$nb_cleansheets=$nb_cleansheets+$cleansheet;
			
			if ($resultats3['nettoyage_vestiaires'] == true )
			{
				$vestiaires=1;
			}
			else
			{
				$vestiaires=0;
			}
			
			$nb_vestiaires=$nb_vestiaires+$vestiaires;
			
			if ($resultats3['lavage_maillots'] == true )
			{
				$maillots=1;
			}
			else
			{
				$maillots=0;
			}
			
			$nb_maillots=$nb_maillots+$maillots;

		}
		$req3->closeCursor(); 
		
		$x++;		

	}
	
		//force les valeurs a passer NULL si = 0, par soucis d'affichage de propreté d'affichage dans effectif
		
		if ($nb_buts == 0)
		{
			$nb_buts=NULL;
		}
		
		if ($nb_passes == 0)
		{
			$nb_passes=NULL;
		}
		
		if ($nb_cleansheets == 0)
		{
			$nb_cleansheets=NULL;
		}
		
		if ($nb_vestiaires == 0)
		{
			$nb_vestiaires=NULL;
		}
		
		if ($nb_maillots == 0)
		{
			$nb_maillots=NULL;
		}
		
		
		//requete pour écrire le nouveau classement	joueur	
		$req5=$bdd->prepare("INSERT INTO classement_players (nb_journees, nb_buts, nb_passes, nb_cleansheets, nb_vestiaires, nb_maillots, joueur_id)
		VALUES (?,?,?,?,?,?,?)");
		$req5->bindParam(1, $nb_journees); 
		$req5->bindParam(2, $nb_buts);
		$req5->bindParam(3, $nb_passes);
		$req5->bindParam(4,	$nb_cleansheets);
		$req5->bindParam(5,	$nb_vestiaires); 
		$req5->bindParam(6,	$nb_maillots);
		$req5->bindParam(7, $joueur_id);
		$req5->execute(); 
	
			
}
	
?>
	
