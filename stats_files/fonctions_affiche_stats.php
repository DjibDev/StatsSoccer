<?php

function AfficheStatsPlayer($a)
{
					require ('connexion.php');
					
					$req=$bdd->query('SELECT pseudo, nom , prenom
					FROM effectif
					WHERE ID_joueur= '.$a.' ');
					
					while ($resultats=$req->fetch())
					{
						echo '<h2>Fiche stat de '.$resultats['pseudo'].' </h2>';
					}
					$req->closeCursor();
					
					$req2=$bdd->query('SELECT * 
					FROM stats_individuelles, journees, effectif
					WHERE stats_individuelles.joueur_id = '.$a.'
					AND stats_individuelles.joueur_id = effectif.ID_joueur
					AND stats_individuelles.journee_id = journees.ID_journee
					ORDER BY numero ASC ');
					
					echo '<table border="2" cellspacing="4"><tr><th>Journée</th><th>Buts</th><th>Passes Déc.</th><th>Cleansheet</th>
					<th>Pénalty manqué</th><th>Pénalty arrêté</th><th>Csc</th><th>Faits marquants</th></tr>';						
					
					while ($resultats2=$req2->fetch())
					{
						echo '<tr><td>'.$resultats2['numero'].'</td>';
						echo '<td>'.$resultats2['buts'].'</td>';
						echo '<td>'.$resultats2['passes'].'</td>';
						echo '<td>'.$resultats2['cleansheet'].'</td>';
						echo '<td>'.$resultats2['peno_rate'].'</td>';
						echo '<td>'.$resultats2['peno_arrete'].'</td>';
						echo '<td>'.$resultats2['csc'].'</td>';
						echo '<td>'.$resultats2['description_faitmarquant'].'</td></tr>';						
					}	
					$req2->closeCursor();
					
					echo '</table>';
					
}

function AfficheStatsEquipe($a)
{
					require ('connexion.php');
					
					$req=$bdd->query('SELECT nom
					FROM equipes
					WHERE ID_equipe= '.$a.' ');
					
					while ($resultats=$req->fetch())
					{
						echo '<h2>Fiche stat de '.$resultats['nom'].' </h2>';
					}
					$req->closeCursor();
					
					$req2=$bdd->query('SELECT * 
					FROM stats_collectives, journees, equipes
					WHERE stats_collectives.equipe_id = '.$a.'
					AND stats_collectives.equipe_id = equipes.ID_equipe
					AND stats_collectives.journee_id = journees.ID_journee
					ORDER BY numero ASC ');
					
					echo '<table border="2" cellspacing="4"><tr><th>Journée</th><th>Buts</th><th>Passes Déc.</th><th>Cleansheet</th>
					<th>Pénalty manqué</th><th>Pénalty arrêté</th><th>Csc</th><th>Faits marquants</th></tr>';						
					
					while ($resultats2=$req2->fetch())
					{
						echo '<tr><td>'.$resultats2['numero'].'</td>';
						echo '<td>'.$resultats2['buts'].'</td>';
						echo '<td>'.$resultats2['passes'].'</td>';
						echo '<td>'.$resultats2['cleansheet'].'</td>';
						echo '<td>'.$resultats2['peno_rate'].'</td>';
						echo '<td>'.$resultats2['peno_arrete'].'</td>';
						echo '<td>'.$resultats2['csc'].'</td>';
						echo '<td>'.$resultats2['description_faitmarquant'].'</td></tr>';						
					}	
					$req2->closeCursor();
					
					echo '</table>';
					
}
?>					
