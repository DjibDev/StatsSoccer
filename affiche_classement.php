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
	
	<?php
	require('connexion.php');
	
	echo '<div id="general"></div>';
	echo '<h2>Le(s) classement(s) en championnat - Groupe C</h2>';
	
	/*
	echo '<table border="0" cellspacing=2 cellspadding=2>';
	echo '<tr class="trcolor0"><td align="center"><a href="#adomicile">A domicile</a></td><td align="center"><a href="#alexterieur">A l\'extérieur</td><td align="center"><a href="#meill_att">Meilleure attaque</a><td align="center"><a href="#meill_def">Meilleure défense</a></tr>';
	echo '</table><br>';
	*/
	
	$req1=$bdd->query('SELECT ID_equipe, nom, favorite, nb_journees, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points
	FROM equipes, classement
	WHERE  equipes.ID_equipe = classement.equipe_id
	AND nb_journees = (SELECT MAX(nb_journees) FROM classement) 
	ORDER BY points DESC, diff DESC, nb_buts_pour DESC, nom ASC ');
	
	$x=0;
	echo '<caption>Classement général</caption>';
	echo '<table border=2 cellspacing=2 cellspadding=2 >';
	echo '<tr class=trheadcolor><th></th><th></th><th width="30">Pts</th><th width="30">J</th><th width="30">V</th><th width="30">N</th><th width="30">D</th><th width="30">F</th><th width="30">Bp</th><th>Bc</th><th width="30">Diff</th><th width="30">Infos</th></tr>';
	
		while ($resultats=$req1->fetch())
		{		
			// le calcul du modulo de "$x" permet d'alterner le resultat : soit "0" soit "1" 
			$x++;
			$altern=$x % 2;
			
			// affichage différent si s'agit de l'équipe favorite 
			
			if ($resultats['favorite'] == true)
			{
				$altern='special';
			}
			else
			{	
				$altern=$x % 2;
			}
		
			echo '<tr class=trcolor'.$altern.'>';
			echo '<td>'.$x.'</td>';
			echo '<td><b>'.$resultats['nom'].'</b></td>';
			echo '<td align="center"><b>'.$resultats['points'].'</b></td>';
			echo '<td align="center">'.$resultats['nb_journees'].'</td>';
			echo '<td align="center">'.$resultats['nb_victoires'].'</td>';
			echo '<td align="center">'.$resultats['nb_nuls'].'</td>';
			echo '<td align="center">'.$resultats['nb_defaites'].'</td>';
			echo '<td align="center">'.$resultats['nb_forfaits'].'</td>';
			echo '<td align="center">'.$resultats['nb_buts_pour'].'</td>';
			echo '<td align="center">'.$resultats['nb_buts_contre'].'</td>';
			echo '<td align="center">'.$resultats['diff'].'</td>';			
			echo '<td align="center"><a href="stats_files/equipes/stats_equipe_'.$resultats['ID_equipe'].'.php">Voir</a></td></tr>';
			
			
		}
		$req1->closeCursor();
		
		
		echo '</table><br>';		
		/*
		echo '<div id="adomicile"></div>';
		
		
		$req2=$bdd->query('SELECT ID_equipe, nom, favorite, nb_journees, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points
		FROM equipes, classement_domicile
		WHERE  equipes.ID_equipe = classement_domicile.equipe_id
		ORDER BY points DESC, diff DESC, nb_buts_pour DESC, nom ASC ');
	
		$x=0;
		
		echo '<caption><a href="#bloc_page"><img src="images/fleche_haut.jpg"></a>Classement à domicile</caption>';
		echo '<table border=2 cellspacing=2 cellspadding=2 >';
		echo '<tr class=trheadcolor><th></th><th></th><th width="30">Pts</th><th width="30">J</th><th width="30">V</th><th width="30">N</th><th width="30">D</th><th width="30">Bp</th><th>Bc</th><th width="30">Diff</th><th width="30">Stats</th></tr>';
	
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
			echo '<td align="center">'.$resultats2['nb_buts_pour'].'</td>';
			echo '<td align="center">'.$resultats2['nb_buts_contre'].'</td>';
			echo '<td align="center">'.$resultats2['diff'].'</td>';			
			echo '<td align="center"><a href="stats_files/equipes/stats_equipe_'.$resultats2['ID_equipe'].'.php">Voir</a></td></tr>';
			
		}
		$req2->closeCursor();
		
		echo '</table><br>';	
		
		echo '<div id="alexterieur"></div>';
		
		$req3=$bdd->query('SELECT ID_equipe, nom, favorite, nb_journees, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points
		FROM equipes, classement_exterieur
		WHERE  equipes.ID_equipe = classement_exterieur.equipe_id
		ORDER BY points DESC, diff DESC, nb_buts_pour DESC, nom ASC ');
	
		$x=0;
		echo '<caption><a href="#bloc_page"><img src="images/fleche_haut.jpg"></a>Classement à l\'extérieur</caption>';
		echo '<table border=2 cellspacing=2 cellspadding=2 >';
		echo '<tr class=trheadcolor><th></th><th></th><th width="30">Pts</th><th width="30">J</th><th width="30">V</th><th width="30">N</th><th width="30">D</th><th width="30">Bp</th><th>Bc</th><th width="30">Diff</th><th width="30">Stats</th></tr>';
	
		while ($resultats3=$req3->fetch())
		{		
			// le calcul du modulo de "$x" permet d'alterner le resultat : soit "0" soit "1" 
			$x++;
			$altern=$x % 2;
			
			// affichage différent si s'agit de l'équipe favorite 
			
			if ($resultats3['favorite'] == true)
			{
				$altern='special';
			}
			else
			{	
				$altern=$x % 2;
			}
		
			echo '<tr class=trcolor'.$altern.'>';
			echo '<td>'.$x.'</td>';
			echo '<td><b>'.$resultats3['nom'].'</b></td>';
			echo '<td align="center"><b>'.$resultats3['points'].'</b></td>';
			echo '<td align="center">'.$resultats3['nb_journees'].'</td>';
			echo '<td align="center">'.$resultats3['nb_victoires'].'</td>';
			echo '<td align="center">'.$resultats3['nb_nuls'].'</td>';
			echo '<td align="center">'.$resultats3['nb_defaites'].'</td>';
			echo '<td align="center">'.$resultats3['nb_buts_pour'].'</td>';
			echo '<td align="center">'.$resultats3['nb_buts_contre'].'</td>';
			echo '<td align="center">'.$resultats3['diff'].'</td>';			
			echo '<td align="center"><a href="stats_files/equipes/stats_equipe_'.$resultats3['ID_equipe'].'.php">Voir</a></td></tr>';
			
		}
		$req3->closeCursor();
		
		echo '</table><br>';	*/
		
                
    ?>    
		</article>	
		
		<aside>
		<?php
			
		echo '<h2>Classements individuels</h2>';
		
		echo '<caption>Classement des buteurs (championnat)</caption>';
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
		
		
		echo '<caption>Classement des passeurs (championnat)</caption>';
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
			
			
						
		</aside>
	</section>
	

</body>
</html>
