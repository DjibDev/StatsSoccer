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

	<?php
  	
	include ('fonctions_utiles_users.php');
	require ('connexion.php');

	echo '<h2>Coupe - Groupe N</h2>';
	
	$req1=$bdd->query('SELECT ID_equipe, nom, favorite, nb_journees, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points
	FROM equipes_coupe, classement_coupe
	WHERE  equipes_coupe.ID_equipe = classement_coupe.equipe_id
	AND nb_journees = (SELECT MAX(nb_journees) FROM classement_coupe) 
	ORDER BY points DESC, diff DESC, nb_buts_pour DESC, nom ASC ');
	
	$x=0;
	echo '<table border=2 cellspacing=2 cellspadding=2 >';
	echo '<tr class=trheadcolor><th></th><th></th><th width="30">Pts</th><th width="30">J</th><th width="30">V</th><th width="30">N</th><th width="30">D</th><th width="30">Bp</th><th>Bc</th><th width="30">Diff</th></tr>';
	
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
			echo '<td align="center">'.$resultats['nb_buts_pour'].'</td>';
			echo '<td align="center">'.$resultats['nb_buts_contre'].'</td>';
			echo '<td align="center">'.$resultats['diff'].'</td></tr>';
			
		}
		$req1->closeCursor();
		
		
		echo '</table><br>';	
	/*		
	$req=$bdd->query('SELECT numero 
	FROM journees
	WHERE saison="2015/2016"
	AND coupe="1"
	ORDER BY numero ASC
	LIMIT 0 , 9');
	
	echo '<center><table border="0" cellspacing="3"><tr class="trcolor0">';
	While ($resultats2=$req->fetch())
	{
			echo '<td><a href="#match'.$resultats2['numero'].'">Journée '.$resultats2['numero'].'</a></td>';
	}
	$req->closeCursor();
	

	echo '</tr></table></center>';

	*/
	
	$reponse=$bdd->query('SELECT numero, date FROM journees WHERE saison="2015/2016" AND coupe="1" ORDER BY numero ASC');
	
	
	while ($resultats=$reponse->fetch())
	{		
		
		$dateFR=FormatDateFR($resultats['date']);
		$num_journee=$resultats['numero'];
		
		echo '<div id=match'.$num_journee.'></div>';
		echo '<table cellspacing="4" cellspading="4"><tr class="trheadcolor"><th colspan="3"><a href="#bloc_page"><img src="images/fleche_haut.jpg"></a>&nbsp;&nbsp;&nbsp;<b><u>Journée n° '.$num_journee.' - le '.$dateFR.'</u></b></th></tr>';
	
				
		$reponse2=$bdd->query('SELECT e1.nom equi1, e2.nom equi2, e1.favorite fav1, e2.favorite fav2, but_equipe_dom, but_equipe_vis, finished 
		FROM matchs, journees, equipes_coupe e1, equipes_coupe e2
		WHERE numero='.$num_journee.'
		AND journees.ID_journee=matchs.journee_id
		AND matchs.equipe_dom_id = e1.ID_equipe
		AND matchs.equipe_vis_id = e2.ID_equipe
		AND journees.coupe = "1" ');
	
		while ($resultats2=$reponse2->fetch())
		{
			
			if ($resultats2['finished'] == false)
			{
				$but_dom=" ";
				$but_vis=" ";
				
			}	
			else 
			{
				$but_dom=$resultats2['but_equipe_dom'];
				$but_vis=$resultats2['but_equipe_vis'];
			}	
			
			if ($resultats2['fav1'] == true)
			{ 
				echo '<tr class="trcolorspecial"><td><b>'.$resultats2['equi1'].'</b> - '.$resultats2['equi2'].'</td><td>&nbsp;&nbsp;</td><td>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
			}
			else	
			{
				if  ($resultats2['fav2'] == true)
				{
					echo '<tr class="trcolorspecial"><td>'.$resultats2['equi1'].' - <b>'.$resultats2['equi2'].'</b></td>&nbsp;&nbsp;<td></td><td>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
				}	
				else
				{
					echo '<tr><td>'.$resultats2['equi1'].' - '.$resultats2['equi2'].'</td><td>&nbsp;&nbsp;</td><td>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
				}
			}		
			
		}
		$reponse2->closeCursor(); 

		
		echo '</table>';
		echo '<br>';
		
	}
	
	$reponse->closeCursor();

    ?>


</section>
	

</body>
</html>
