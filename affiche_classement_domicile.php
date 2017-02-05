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
	
	echo '<table>';
	echo '<tr class="trcolor0"><td align="center"><a href="affiche_classement.php">Général</a></td><td align="center"><a href="affiche_classement_exterieur.php">Extérieur</a></td><td align="center"><a href="affiche_classement_attaque.php">Attaque</a></td><td align="center"><a href="affiche_classement_defense.php">Défense</a></td></tr>';
	echo '</table><br>';
	
    $affiche_bareme=$bdd->query('SELECT * FROM baremes WHERE coupe=0');
	$result_bareme=$affiche_bareme->fetch();

	echo '<p>Victoire: <b class=forme_v>'.$result_bareme['pts_victoire'].'pts</b>. - Nul: <b class=forme_n>'.$result_bareme['pts_nul'].'pt(s)</b>. - Défaite: <b class=forme_d>'.$result_bareme['pts_defaite'].'pt(s)</b>. - Forfait: <b class=forme_f>'.$result_bareme['pts_forfait'].'pt (- 3 buts)</b>. - Pénalité: <b class=forme_p>'.$result_bareme['pts_penalite'].'pt (-3 buts)</b>.</p>';
	$affiche_bareme->CloseCursor();
     echo '<br />';
        
		$req2=$bdd->query('SELECT ID_equipe, nom, favorite, nb_journees, nb_forfaits, nb_penalites, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points
		FROM equipes, classement_domicile
		WHERE  equipes.ID_equipe = classement_domicile.equipe_id
		ORDER BY points DESC, diff DESC, nb_buts_pour DESC, nom ASC ');
	
		$x=0;
		
		echo '<caption>Classement - Domicile</caption>';
		echo '<table>';
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
			echo '<td width="30px" align="center">'.$x.'</td>';
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
	</section>
		<?php include ('footer.php'); ?>

</body>
</html>
