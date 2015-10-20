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
<h2>Calendrier et Résultats du Championnat</h2>
	<?php
  	
	include ('fonctions_utiles_users.php');
	require ('connexion.php');
			
	$req=$bdd->query('SELECT numero 
	FROM journees
	WHERE saison="2015/2016"
	AND coupe="0"
	ORDER BY numero ASC
	LIMIT 0 , 9');
	
	echo '<center><table border="0" cellspacing="3"><tr class="trcolor0">';
	While ($resultats=$req->fetch())
	{
			echo '<td><a href="#match'.$resultats['numero'].'">Journée '.$resultats['numero'].'</a></td>';
	}
	$req->closeCursor();
	
	$req=$bdd->query('SELECT numero 
	FROM journees
	WHERE saison="2015/2016"
	AND coupe="0"
	ORDER BY numero ASC
	LIMIT 9 , 9');

	echo '</tr><tr class="trcolor0">';
	
	While ($resultats=$req->fetch())
	{
			echo '<td><a href="#match'.$resultats['numero'].'">Journée '.$resultats['numero'].'</a></td>';
	}
	$req->closeCursor();
	
	$req=$bdd->query('SELECT numero 
	FROM journees
	WHERE saison="2015/2016"
	AND coupe="0"
	ORDER BY numero ASC
	LIMIT 18 , 9');

	echo '</tr><tr class="trcolor0">';
	
	While ($resultats=$req->fetch())
	{
			echo '<td><a href="#match'.$resultats['numero'].'">Journée '.$resultats['numero'].'</a></td>';
	}
	$req->closeCursor();
	
	$req=$bdd->query('SELECT numero 
	FROM journees
	WHERE saison="2015/2016"
	AND coupe="0"
	ORDER BY numero ASC
	LIMIT 27 , 9');
	
	echo '</tr><tr class="trcolor0">';

	While ($resultats=$req->fetch())
	{
			echo '<td><a href="#match'.$resultats['numero'].'">Journée '.$resultats['numero'].'</a></td>';
	}
	$req->closeCursor();
	
	$req=$bdd->query('SELECT numero 
	FROM journees
	WHERE saison="2015/2016"
	AND coupe="0"
	ORDER BY numero ASC
	LIMIT 36 , 9');
	
	echo '</tr><tr class="trcolor0">';

	While ($resultats=$req->fetch())
	{
			echo '<td><a href="#match'.$resultats['numero'].'">Journée '.$resultats['numero'].'</a></td>';
	}
	$req->closeCursor();

	echo '</tr></table></center>';
	echo '<p>* si une équipe n\'apparait pas, c\'est qu\'elle est exempte.</p>';
	
	
	$reponse=$bdd->query('SELECT numero, date FROM journees WHERE saison="2015/2016" AND coupe="0" ORDER BY numero ASC');
	
	
	while ($resultats=$reponse->fetch())
	{		
		
		$dateFR=FormatDateFR($resultats['date']);
		$num_journee=$resultats['numero'];
		
		echo '<div id=match'.$num_journee.'></div>';
		echo '<table cellspacing="4" cellspading="4"><tr class="trheadcolor"><th colspan="3"><a href="#bloc_page"><img src="images/fleche_haut.jpg"></a>&nbsp;&nbsp;&nbsp;<b><u>Journée n° '.$num_journee.' - le '.$dateFR.'</u></b></th></tr>';
	
				
		$reponse2=$bdd->query('SELECT e1.nom equi1, e2.nom equi2, e1.favorite fav1, e2.favorite fav2, equipe_dom_forfait, equipe_vis_forfait,but_equipe_dom, but_equipe_vis, finished
		FROM matchs, journees, equipes e1, equipes e2
		WHERE numero='.$num_journee.'
		AND journees.ID_journee=matchs.journee_id
		AND matchs.equipe_dom_id = e1.ID_equipe
		AND matchs.equipe_vis_id = e2.ID_equipe');
	
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
				$e1_forfait='<b>(forfait)</b>.';
			}
			else
			{
				$e1_forfait='';
			}	
				
			if 	($resultats2['equipe_vis_forfait'] == true)
			{
				$e2_forfait='<b>(forfait)</b>.';
			}
			else
			{
				$e2_forfait='';
			}	
				
			if ($resultats2['fav1'] == true)
			{
				echo '<tr class="trcolorspecial"><td><b>'.$resultats2['equi1'].'</b><i>'.$e1_forfait.'</i> - '.$resultats2['equi2'].' <i>'.$e2_forfait.'</i></td><td>&nbsp;&nbsp;</td><td>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
			}
			else	
			{
				if  ($resultats2['fav2'] == true)
				{
					echo '<tr class="trcolorspecial"><td>'.$resultats2['equi1'].'<i>'.$e1_forfait.'</i> - <b>'.$resultats2['equi2'].'</b> <i>'.$e2_forfait.'</i></td>&nbsp;&nbsp;<td></td><td>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
				}	
				else
				{
					echo '<tr><td>'.$resultats2['equi1'].'<i>'.$e1_forfait.'</i> - '.$resultats2['equi2'].' <i>'.$e2_forfait.'</i></td><td>&nbsp;&nbsp;</td><td>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
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
