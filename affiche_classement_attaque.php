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
		echo '<tr class="trcolor0"><td align="center"><a href="affiche_classement.php">Général</a></td><td align="center"><a href="affiche_classement_domicile.php">Domicile</a></td><td align="center"><a href="affiche_classement_exterieur.php">Extérieur</a></td><td align="center"><a href="affiche_classement_defense.php">Défense</a></td></tr>';
		echo '</table><br>';
        
        $affiche_bareme=$bdd->query('SELECT * FROM baremes WHERE coupe=0');
	    $result_bareme=$affiche_bareme->fetch();

	   echo '<p>Victoire: <b class=forme_v>'.$result_bareme['pts_victoire'].'pts</b>. - Nul: <b class=forme_n>'.$result_bareme['pts_nul'].'pt(s)</b>. - Défaite: <b class=forme_d>'.$result_bareme['pts_defaite'].'pt(s)</b>. - Forfait: <b class=forme_f>'.$result_bareme['pts_forfait'].'pt (- 3 buts)</b>. - Pénalité: <b class=forme_p>'.$result_bareme['pts_penalite'].'pt (-3 buts)</b>.</p>';
	   $affiche_bareme->CloseCursor();
         echo '<br />';
        
		echo '<caption>Classement - Attaque</caption>';	
		
		$x=0;
		echo '<table>';
		echo '<tr class=trheadcolor><th></th><th></th><th width="30">Pts</th><th width="30">J</th><th width="30">V</th><th width="30">N</th><th width="30">D</th><th width="30">F</th><th width="30">Pé</th><th width="30">Bp</th><th width="30">Bc</th><th width="30">Diff</th></tr>';
	
		$req1=$bdd->query('SELECT ID_equipe, nom, favorite, nb_journees, nb_forfaits, nb_penalites,nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points
		FROM equipes, classement
		WHERE  equipes.ID_equipe = classement.equipe_id
		AND nb_journees = (SELECT MAX(nb_journees) FROM classement) 
		ORDER BY nb_buts_pour DESC, points DESC, diff DESC, nom ASC ');
		
		while ($resultats=$req1->fetch())
		{		
			// le calcul du modulo de "$x" permet d'alterner le resultat : soit "0" soit "1" 
			$x++;
			$altern=$x % 2;
			$id_equipe=$resultats['ID_equipe'];
			
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
			echo '<td width="30px" align="center">'.$x.'</td>';
			echo '<td><b>'.$resultats['nom'].'</b></td>';
			echo '<td align="center"><b>'.$resultats['points'].'</b></td>';
			
					// requete qui affiche le nombre de match joué par l'équipe
					$reqjournee=$bdd->query('SELECT COUNT(*) AS NB_J
					FROM stats_collectives 
					WHERE equipe_id='.$id_equipe.' ');
					while ($resultatsnbj=$reqjournee->fetch())
					{
						echo '<td align="center">'.$resultatsnbj['NB_J'].'</td>';
					}
					$reqjournee->closeCursor();
					
			echo '<td align="center">'.$resultats['nb_victoires'].'</td>';
			echo '<td align="center">'.$resultats['nb_nuls'].'</td>';
			echo '<td align="center">'.$resultats['nb_defaites'].'</td>';
			echo '<td align="center">'.$resultats['nb_forfaits'].'</td>';
			echo '<td align="center">'.$resultats['nb_penalites'].'</td>';
			echo '<td align="center">'.$resultats['nb_buts_pour'].'</td>';
			echo '<td align="center">'.$resultats['nb_buts_contre'].'</td>';
			echo '<td align="center">'.$resultats['diff'].'</td></tr>';		
			
			}
		$req1->closeCursor();
		echo '</table><br>';		
                
    ?>    
    	</center>
	</section>
		<?php include ('footer.php'); ?>

</body>
</html>
