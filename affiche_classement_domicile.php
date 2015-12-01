<html>

<head>
	<title>Les stats des loisirs</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style_base.css"/>
</head>

<body>
	
<div id="bloc_page">
<?php
	include('banniere_menu.php');

?>	
		

<section>	
	<article>
	<center>
	<h2>Les classements en championnat - Groupe C</h2>
	<?php
	require('connexion.php');
	
	echo '<table border="0" cellspacing=2 cellspadding=2>';
	echo '<tr class="trcolor0"><td align="center"><a href="affiche_classement.php">Général</a></td><td align="center"><a href="affiche_classement_exterieur.php">Extérieur</a></td><td align="center"><a href="affiche_classement_attaque.php">Attaque</a></td><td align="center"><a href="affiche_classement_defense.php">Défense</a></td></tr>';
	echo '</table><br>';
	
		$req2=$bdd->query('SELECT ID_equipe, nom, favorite, nb_journees, nb_forfaits, nb_penalites, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points
		FROM equipes, classement_domicile
		WHERE  equipes.ID_equipe = classement_domicile.equipe_id
		ORDER BY points DESC, diff DESC, nb_buts_pour DESC, nom ASC ');
	
		$x=0;
		
		echo '<caption>Classement - Domicile</caption>';
		echo '<table border=2 cellspacing=2 cellspadding=2 >';
		echo '<tr class=trheadcolor><th></th><th></th><th width="30">Pts</th><th width="30">J</th><th width="30">V</th><th width="30">N</th><th width="30">D</th><th width="30">F</th><th width="30">Pé</th><th width="30">Bp</th><th width="30">Bc</th><th width="30">Diff</th></tr>';
	
		while ($resultats2=$req2->fetch())
		{		
			// le calcul du modulo de "$x" permet d'alterner le resultat : soit "0" soit "1" 
			$x++;
			$altern=$x % 2;
			
			// affichage différent si s'agit de l'équipe favorite 
			
			if ($resultats2['favorite'] == true)
			{
				$altern='special';
			}
			else
			{	
				$altern=$x % 2;
			}
		
			echo '<tr class=trcolor'.$altern.'>';
			echo '<td>'.$x.'</td>';
			echo '<td><b>'.$resultats2['nom'].'</b></td>';
			echo '<td align="center"><b>'.$resultats2['points'].'</b></td>';
			echo '<td align="center">'.$resultats2['nb_journees'].'</td>';
			echo '<td align="center">'.$resultats2['nb_victoires'].'</td>';
			echo '<td align="center">'.$resultats2['nb_nuls'].'</td>';
			echo '<td align="center">'.$resultats2['nb_defaites'].'</td>';
			echo '<td align="center">'.$resultats2['nb_forfaits'].'</td>';
			echo '<td align="center">'.$resultats2['nb_penalites'].'</td>';
			echo '<td align="center">'.$resultats2['nb_buts_pour'].'</td>';
			echo '<td align="center">'.$resultats2['nb_buts_contre'].'</td>';
			echo '<td align="center">'.$resultats2['diff'].'</td></tr>';			
			
		}
		$req2->closeCursor();
		
		echo '</table><br>';	
	
		?>  
		</center>
		</article>	
		
		<aside>
		<center>
			<h2>Classements individuels</h2>
		<?php
				
		echo '<caption>Classement - Buteurs</caption>';
		echo '<table border=2 cellspacing=2 cellspadding=2 >';
		echo '<tr class=trheadcolor><th></th><th>Pseudo</th><th>Buts</th>';
		
		$req2=$bdd->query('SELECT pseudo, nb_buts 
		FROM classement_players, effectif
		WHERE classement_players.joueur_id = effectif.ID_joueur
		AND nb_buts > "0"
		ORDER BY nb_buts DESC, pseudo ASC
		LIMIT 0, 10 ');
		
		$x=0;
		while ($resultats2=$req2->fetch())
		{
			$x++;
			$altern=$x % 2;
			echo '<tr class=trcolor'.$altern.'>';
			echo '<td>'.$x.'</td>';
			echo '<td><b>'.$resultats2['pseudo'].'</b></td>';
			echo '<td align="center"><b>'.$resultats2['nb_buts'].'</b></td></tr>';
		}
		$req2->closeCursor();
		
		echo '</table>';
		echo '<br>';
		
		
		echo '<caption>Classement - Passeurs</caption><br>';
		echo '<table border=2 cellspacing=2 cellspadding=2 >';
		echo '<tr class=trheadcolor><th></th><th>Pseudo</th><th>Passes</th>';
				
		$req3=$bdd->query('SELECT pseudo, nb_passes
		FROM classement_players, effectif 
		WHERE classement_players.joueur_id = effectif.ID_joueur
		AND nb_passes > "0"
		ORDER BY nb_passes DESC, pseudo ASC
		LIMIT 0, 10 ');
		
		$x=0;
		
		while ($resultats3=$req3->fetch())
		{
			$x++;
			$altern=$x % 2;
			echo '<tr class=trcolor'.$altern.'>';
			echo '<td>'.$x.'</td>';
			echo '<td><b>'.$resultats3['pseudo'].'</b></td>';
			echo '<td align="center"><b>'.$resultats3['nb_passes'].'</b></td></tr>';
		
		}
		$req3->closeCursor();
		
		echo '</table>';
		
		?>
			
			
		</center>				
		</aside>
	</section>
		<?php include ('footer.php'); ?>

</body>
</html>
