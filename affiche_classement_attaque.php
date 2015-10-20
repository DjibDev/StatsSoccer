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
	<h2>Le(s) classement(s) en championnat - Groupe C</h2>
	<?php
	require('connexion.php');
	
	echo '<table border="0" cellspacing=2 cellspadding=2>';
	echo '<tr class="trcolor0"><td align="center"><a href="affiche_classement.php">Général</a></td><td align="center"><a href="affiche_classement_domicile.php">A domicile</a></td><td align="center"><a href="affiche_classement_exterieur.php">A l\'extérieur</a></td><td align="center"><a href="affiche_classement_defense.php">Meilleure défense</a></td></tr>';
	echo '</table><br>';

		
                
    ?>    
		</article>	
		
		<aside>
			<h2>Classements individuels</h2>
		<?php
				
		echo '<caption><u>Classement des buteurs (championnat + coupe) : </u></caption>';
		echo '<table align=center border=2 cellspacing=2 cellspadding=2 >';
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
		
		
		echo '<caption><u>Classement des passeurs (championnat + coupe) : </u></caption><br>';
		echo '<table align=center border=2 cellspacing=2 cellspadding=2 >';
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
