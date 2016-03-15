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
	<center>
	<h2>Les classements en championnat</h2>
	<?php
	require('connexion.php');

	echo '<table border="0" cellspacing=2 cellspadding=2>';
	echo '<tr class="trcolor0"><td align="center"><a href="affiche_classement.php">Général</a></td><td align="center"><a href="affiche_classement_domicile.php">Domicile</a></td><td align="center"><a href="affiche_classement_attaque.php">Attaque</a><td align="center"><a href="affiche_classement_defense.php">Défense</a></td></tr>';
	echo '</table><br>';

	
		$req3=$bdd->query('SELECT ID_equipe, nom, favorite, nb_journees, nb_forfaits, nb_penalites, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points
		FROM equipes, classement_exterieur
		WHERE  equipes.ID_equipe = classement_exterieur.equipe_id
		ORDER BY points DESC, diff DESC, nb_buts_pour DESC, nom ASC ');
	
		$x=0;
		echo '<caption>Classement - Extérieur</caption>';
		echo '<table border=2 cellspacing=2 cellspadding=2 >';
		echo '<tr class=trheadcolor><th></th><th></th><th width="30">Pts</th><th width="30">J</th><th width="30">V</th><th width="30">N</th><th width="30">D</th><th width="30">F</th><th width="30">Pé</th><th width="30">Bp</th><th width="30">Bc</th><th width="30">Diff</th></tr>';
	
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
			echo '<td align="center">'.$resultats3['nb_forfaits'].'</td>';
			echo '<td align="center">'.$resultats3['nb_penalites'].'</td>';
			echo '<td align="center">'.$resultats3['nb_buts_pour'].'</td>';
			echo '<td align="center">'.$resultats3['nb_buts_contre'].'</td>';
			echo '<td align="center">'.$resultats3['diff'].'</td></tr>';			
			
		}
		$req3->closeCursor();
		
		echo '</table><br>';
		

                
		?>    
		
		</center>				
	</section>
		<?php include ('footer.php'); ?>
	

</body>
</html>
