<?php

function AfficheStatsPlayer($a)
{
					require ('connexion.php');
					require ('../fonctions_utiles_users.php');
					
					$req=$bdd->query('SELECT pseudo, nom , prenom, birthday, poste, num_maillot
					FROM effectif
					WHERE ID_joueur= '.$a.' ');
					
					while ($resultats=$req->fetch())
					{
						echo '<h2>Fiche stat de '.$resultats['pseudo'].' </h2>';
						echo '<p>Nom: <b>'.$resultats['nom'].'</b></p>';
						echo '<p>Prénom: <b>'.$resultats['prenom'].'</b></p>';
						$date_naiss=FormatDateFR($resultats['birthday']);
						echo '<p>Date de naissance: <b>'.$date_naiss.'</b></p>';
						echo '<p>Poste: <b>'.$resultats['poste'].'</b></p>';
						echo '<p>Numéro maillot: <b>'.$resultats['num_maillot'].'</b></p>';
						echo '<br>';
					}
					$req->closeCursor();
					
					$req2=$bdd->query('SELECT * 
					FROM stats_individuelles, journees, effectif
					WHERE stats_individuelles.joueur_id = '.$a.'
					AND stats_individuelles.joueur_id = effectif.ID_joueur
					AND stats_individuelles.journee_id = journees.ID_journee
					AND saison = "2015/2016"
					ORDER BY numero ASC ');
												
					echo '<table border=2 cellspacing=2 cellspadding=2><tr class=trheadcolor><th>Journée</th><th>Date</th><th>Buts</th><th>Passes Déc.</th><th>Cleansheet</th>
					<th>Pénalty manqué</th><th>Pénalty arrêté</th><th>Csc</th><th>Faits marquants</th></tr>';						
					
					while ($resultats2=$req2->fetch())
					{
						/* le calcul du modulo de "$x" permet d'alterner le resultat : soit "0" soit "1" */
						$altern=$x % 2;	
						
						echo '<tr class=trcolor'.$altern.'><td>'.$resultats2['numero'].'</td>';
						echo '<td>'.$resultats2['date'].'</td>';
						echo '<td align=center>'.$resultats2['buts'].'</td>';
						echo '<td align=center>'.$resultats2['passes'].'</td>';
						echo '<td align=center>'.$resultats2['cleansheet'].'</td>';
						echo '<td align=center>'.$resultats2['peno_rate'].'</td>';
						echo '<td align=center>'.$resultats2['peno_arrete'].'</td>';
						echo '<td align=center>'.$resultats2['csc'].'</td>';
						echo '<td align=center>'.$resultats2['faits_marquants'].'</td></tr>';			
						$x++;			
					}	
					$req2->closeCursor();
					
					echo '</table>';
					
}

function AfficheStatsEquipe($a)
{
					require_once ('connexion.php');
					
					$req=$bdd->query('SELECT *
					FROM equipes
					WHERE ID_equipe= '.$a.' ');
					
					while ($resultats=$req->fetch())
					{
						echo '<h2>Fiche stat de '.$resultats['nom'].' </h2>';
						echo '<p>ville: <b>'.$resultats['ville'].'</b></p>';
						echo '<p>Stade: <b>'.$resultats['stade'].'</b></p>';
					}
					$req->closeCursor();
					
					// requete qui retourne le nombre de victoire de l'équipe
					$reqv=$bdd->query('SELECT  COUNT(victoire) AS NB_V
					FROM stats_collectives
					WHERE  victoire =1 
					AND equipe_id='.$a.' ');
										
					while ($victoire=$reqv->fetch())
					{
							$nb_v=$victoire['NB_V'];
					}
					$reqv->closeCursor();
					
					// requete qui retourne le npmbre de nuls de l'équipe
					$reqn=$bdd->query('SELECT  COUNT(nul) AS NB_N
					FROM stats_collectives
					WHERE  nul =1 
					AND equipe_id='.$a.' ');
										
					while ($nul=$reqn->fetch())
					{
							$nb_n=$nul['NB_N'];
					}
					$reqn->closeCursor();
					
					// requete qui retourne le nombre de défaites de l'équipe
					$reqd=$bdd->query('SELECT  COUNT(defaite) AS NB_D
					FROM stats_collectives
					WHERE  defaite =1 
					AND equipe_id='.$a.' ');
										
					while ($defaite=$reqd->fetch())
					{
							$nb_d=$defaite['NB_D'];
					}
					$reqd->closeCursor();
					
					// requete qui retourne le nombre de forfait de l'équipe
					$reqf=$bdd->query('SELECT  COUNT(forfait) AS NB_F
					FROM stats_collectives
					WHERE  forfait =1 
					AND equipe_id='.$a.' ');
										
					while ($forfait=$reqf->fetch())
					{
							$nb_f=$forfait['NB_F'];
					}
					$reqf->closeCursor();
					
					//requete qui retourne le nombre de journee de l'équipe
					$reqj=$bdd->query('
					SELECT COUNT(journee_id) AS NB_J
					FROM stats_collectives
					WHERE equipe_id='.$a.' ');
						
					while ($journee=$reqj->fetch())
					{
							$nb_j=$journee['NB_J'];
					}
					$reqj->closeCursor();		
					
					$Pourcentage_V= round (($nb_v/$nb_j)*100,2); // arrondi le résultat à 2 decimals
					$Pourcentage_N= round (($nb_n/$nb_j)*100,2);
					$Pourcentage_D= round (($nb_d/$nb_j)*100,2);
					$Pourcentage_F= round (($nb_f/$nb_j)*100,2);
					
					echo '<p>Victoire(s): <b>'.$Pourcentage_V.'%</b>.&nbsp;&nbsp;&nbsp; Nul(s): <b>'.$Pourcentage_N.'%</b>.&nbsp;&nbsp;&nbsp; Défaite(s): <b>'.$Pourcentage_D.'%</b>.&nbsp;&nbsp;&nbsp; Forfait(s): <b>'.$Pourcentage_F.'%</b>.</p>';
					/*echo '<p>Nul(s): <b>'.$Pourcentage_V.'%</b>.</p>';
					echo '<p>Défaite(s): <b>'.$Pourcentage_V.'%</b>.</p>';
					echo '<p>Forfait(s): <b>'.$Pourcentage_V.'%</b>.</p>'; */
					/*
					$req2=$bdd->query('SELECT * 
					FROM stats_collectives, journees, equipes
					WHERE stats_collectives.equipe_id = '.$a.'
					AND stats_collectives.equipe_id = equipes.ID_equipe
					AND stats_collectives.journee_id = journees.ID_journee
					AND saison = "2015/2016"
					ORDER BY numero ASC ');
					
					echo '<table border="2" cellspacing="4"><tr class=trheadcolor><th>J.</th><th>V.</th><th>N.</th><th>D.</th>
					<th>Bp</th><th>Bc</th><th>Diff.</th><th>Points</th></tr>';						
					
					while ($resultats2=$req2->fetch())
					{
						// le calcul du modulo de "$x" permet d'alterner le resultat : soit "0" soit "1"
						$altern=$x % 2;	
						
						echo '<tr class=trcolor'.$altern.'><td>'.$resultats2['numero'].'</td>';
						echo '<td align=center>'.$resultats2['victoire'].'</td>';
						echo '<td align=center>'.$resultats2['nul'].'</td>';
						echo '<td align=center>'.$resultats2['defaite'].'</td>';
						echo '<td align=center>'.$resultats2['buts_pour'].'</td>';
						echo '<td align=center>'.$resultats2['buts_contre'].'</td>';
						echo '<td align=center>'.$resultats2['diff'].'</td>';
						echo '<td align=center>'.$resultats2['points'].'</td></tr>';	
						$x++;
											
					}	
					$req2->closeCursor();
					
					echo '</table>';
					echo '<br>'; */
					
	
	echo '<p><u>Historique des matchs en championnat:</u></p>';	
			
	$req3=$bdd->query('SELECT e1.nom equipe1, e2.nom equipe2, but_equipe_dom, but_equipe_vis, date, numero
	FROM equipes e1, equipes e2, matchs, journees
	WHERE matchs.equipe_dom_id = e1.ID_equipe
	AND matchs.equipe_vis_id = e2.ID_equipe
	AND journees.ID_journee = matchs.journee_id
    AND journees.coupe=0
    AND journees.finished= 1
	AND e1.ID_equipe = '.$a.'
	UNION
	SELECT e1.nom equipe1, e2.nom equipe2, but_equipe_dom, but_equipe_vis, date, numero
	FROM equipes e1, equipes e2, matchs, journees
	WHERE matchs.equipe_dom_id = e1.ID_equipe
	AND matchs.equipe_vis_id = e2.ID_equipe
	AND journees.ID_journee = matchs.journee_id
    AND journees.coupe=0
    AND journees.finished= 1
	AND e2.ID_equipe = '.$a.'
    ORDER BY numero ');
				
	while ($resultats3=$req3->fetch())
	{
			echo '<p><b>'.$resultats3['numero'].'</b>. '.$resultats3['equipe1'].' - '.$resultats3['equipe2'].': <b>'.$resultats3['but_equipe_dom'].' - '.$resultats3['but_equipe_vis'].'</b></p>';
	}
	$req3->closeCursor();
}

/*function CreateJPGraphEquipe($a)
{
	require_once ('jpgraph/jpgraph.php');
	require_once ('jpgraph/jpgraph_line.php');
	require_once ('connexion.php');

	// requete que retourne la position au classement, axe des ordonnées
	$datay1=Array(16,17,15,10);
	
	// requete compte le nombre de journees, axe des abscisses
	$req=$bdd->query('SELECT count(DISTINCT journee_id) AS nb_journees, nom 
	FROM stats_collectives, equipes
	WHERE stats_collectives.equipe_id = equipes.ID_equipe
	AND equipes.ID_equipe = '.$a.' ');
	
	while ($resultats=$req->fetch())
	{
		$nb_journees=$resultats['nb_journees'];
		$nom_equipe=$resultats['nom'];
	}
	$req->closeCursor();

	
	$datay2 = Array();
	for ($x=0; $x < $nb_journees; $x++)
	{
		$datay2[$x]=$x++;
	}
	
	
	// initialisation du graph
	$graph = new Graph(300,250);
	$graph->SetScale("textlin");

	$theme_class=new UniversalTheme;

	$graph->SetTheme($theme_class);
	$graph->img->SetAntiAliasing(false);
	$graph->title->Set('Evolution dans le classement');
	$graph->SetBox(false);

	$graph->img->SetAntiAliasing();

	$graph->yaxis->HideZeroLabel();
	$graph->yaxis->HideLine(false);
	$graph->yaxis->HideTicks(false,false);

	$graph->xgrid->Show();
	$graph->xgrid->SetLineStyle("solid");
	$graph->xaxis->SetTickLabels(array('A','B','C','D'));
	$graph->xgrid->SetColor('#E3DDE2');

	// tracage de la courbe
	$p1 = new LinePlot($datay1);
	$graph->Add($p1);
	$p1->SetColor("#426A38");
	$p1->SetLegend($nom_equipe);

	$graph->legend->SetFrameWeight(1);

	// finalisation du graph
	$graph->Stroke();

} */

?>					
