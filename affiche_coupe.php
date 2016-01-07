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
	<h2>Coupe</h2>
	<?php
	require ('connexion.php');
	
	$affiche_bareme=$bdd->query('SELECT * FROM baremes WHERE coupe=1');
	$result_bareme=$affiche_bareme->fetch();

	echo '<p>Victoire: <b class=forme_v>'.$result_bareme['pts_victoire'].'pts</b>. - Nul: <b class=forme_n>'.$result_bareme['pts_nul'].'pt(s)</b>. - Défaite: <b class=forme_d>'.$result_bareme['pts_defaite'].'pt(s)</b>. - Forfait: <b class=forme_f>'.$result_bareme['pts_forfait'].'pt(s)</b>. - Pénalité: <b class=forme_p>'.$result_bareme['pts_penalite'].'pt(s)</b>.</p>';
	$affiche_bareme->CloseCursor();

	$req1=$bdd->query('SELECT ID_equipe, nom, favorite, nb_journees, nb_forfaits, nb_penalites, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points
	FROM equipes, classement
	WHERE  equipes.ID_equipe = classement.equipe_id
	AND nb_journees = (SELECT MAX(nb_journees) FROM classement) 
	ORDER BY points DESC, diff DESC, nb_buts_pour DESC, nom ASC ');

	$req1=$bdd->query('SELECT ID_equipe, nom, favorite, nb_journees, nb_forfaits, nb_penalites, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points
	FROM equipes_coupe, classement_coupe
	WHERE  equipes_coupe.ID_equipe = classement_coupe.equipe_id
	AND nb_journees = (SELECT MAX(nb_journees) FROM classement_coupe) 
	ORDER BY points DESC, diff DESC, nb_buts_pour DESC, nom ASC ');
	
	$x=0;
	echo '<table border=2 cellspacing=2 cellspadding=2 style=font-size:14px>';
	echo '<tr class=trheadcolor><th></th><th></th><th width="30">Pts</th><th width="30">J</th><th width="30">V</th><th width="30">N</th><th width="30">D</th><th width="30">F</th><th width="30">Pé.</th><th width="30">Bp</th><th>Bc</th><th width="30">Diff</th><th>Enjeux</th></tr>';
	
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
		
			if ($x == 1)
			{
				$qualif='Qualifié en Coupe Loisir';
			}
			else 
			{
				if ($x == 2)
				{
					$qualif='Qualifié en Challenge Loisir';
				}
				else
				{
					$qualif='Eliminé';
				}
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
			echo '<td align="center">'.$resultats['nb_penalites'].'</td>';
			echo '<td align="center">'.$resultats['nb_buts_pour'].'</td>';
			echo '<td align="center">'.$resultats['nb_buts_contre'].'</td>';
			echo '<td align="center">'.$resultats['diff'].'</td>';
			echo '<td>'.$qualif.'</td></tr>';
			
		}
		$req1->closeCursor();
		
		
		echo '</table><br>';	
	
	require ('fonctions_utiles_users.php');
	$reponse=$bdd->query('SELECT numero, date FROM journees WHERE coupe="1" ORDER BY numero ASC');
	
	
	while ($resultats=$reponse->fetch())
	{		
		
		$dateFR=FormatDateFR($resultats['date']);
		$num_journee=$resultats['numero'];
		
		echo '<div id=match'.$num_journee.'></div>';
		echo '<table width="600" cellspacing="4" cellspading="4"><tr align="left" class="trheadcolor"><th colspan="3"><a href="#bloc_page"><img src="images/fleche_haut.jpg"></a>&nbsp;&nbsp;&nbsp;<b><u>Journée n° '.$num_journee.' - le '.$dateFR.'</u></b></th></tr>';
	
				
		$reponse2=$bdd->query('SELECT e1.nom equi1, e2.nom equi2, e1.favorite fav1, e2.favorite fav2, equipe_dom_forfait, equipe_dom_penalite, equipe_vis_forfait, equipe_vis_penalite, but_equipe_dom, but_equipe_vis, finished 
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
			
			if ($resultats2['equipe_dom_forfait'] == true)
			{
				$e1_msg='<b>(forfait)</b>.';
			}
			else
			{
				if ($resultats2['equipe_dom_penalite'] == true)
				{
					$e1_msg='<b>(Pénalité)</b>.';
				}
				else
				{
					$e1_msg='';
				}
			}		
				
			if 	($resultats2['equipe_vis_forfait'] == true)
			{
				$e2_msg='<b>(forfait)</b>.';
			}
			else
			{
				if ($resultats2['equipe_vis_penalite'] == true)
				{
					$e2_msg='<b>(Pénalité)</b>.';
				}
				else
				{
					$e2_msg='';
				}	
			}	
			
			if ($resultats2['fav1'] == true)
			{
				echo '<tr class="trcolorspecial"><td width="500"><b>'.$resultats2['equi1'].'</b> <i>'.$e1_msg.'</i> - '.$resultats2['equi2'].' <i>'.$e2_msg.'</i></td><td>&nbsp;&nbsp;</td><td align=center>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
			}
			else	
			{
				if  ($resultats2['fav2'] == true)
				{
					echo '<tr class="trcolorspecial"><td width="500">'.$resultats2['equi1'].' <i>'.$e1_msg.'</i> - <b>'.$resultats2['equi2'].'</b> <i>'.$e2_msg.'</i></td>&nbsp;&nbsp;<td></td><td align=center>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
				}	
				else
				{
					echo '<tr><td width="500">'.$resultats2['equi1'].' <i>'.$e1_msg.'</i> - '.$resultats2['equi2'].' <i>'.$e2_msg.'</i></td><td>&nbsp;&nbsp;</td><td align=center>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
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
		<?php include ('footer.php'); ?>

</body>
</html>
