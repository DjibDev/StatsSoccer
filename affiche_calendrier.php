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

	echo '<h2>Calendrier et Résultats</h2>';
			
	$req=$bdd->query('SELECT numero 
	FROM journees
	WHERE saison="2015/2016"
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
	ORDER BY numero ASC
	LIMIT 36 , 9');
	
	echo '</tr><tr class="trcolor0">';

	While ($resultats=$req->fetch())
	{
			echo '<td><a href="#match'.$resultats['numero'].'">Journée '.$resultats['numero'].'</a></td>';
	}
	$req->closeCursor();

	echo '</tr></table></center>';
	echo '<br>';

	
	$reponse=$bdd->query('SELECT numero, date FROM journees WHERE saison="2015/2016" ORDER BY numero ASC');
	
	
	while ($resultats=$reponse->fetch())
	{		
		
		$dateFR=FormatDateFR($resultats['date']);
		$num_journee=$resultats['numero'];
		
		echo '<div id=match'.$num_journee.'></div>';
		echo '<table cellspacing="4" cellspading="4"><tr class="trheadcolor"><th colspan="3"><a href="#bloc_page"><img src="images/fleche_haut.jpg"></a>&nbsp;&nbsp;&nbsp;<b><u>Journée n° '.$num_journee.' - le '.$dateFR.'</u></b></th></tr>';
	
				
		$reponse2=$bdd->query('SELECT e1.nom equi1, e2.nom equi2, e1.favorite fav1, e2.favorite fav2, but_equipe_dom, but_equipe_vis 
		FROM matchs, journees, equipes e1, equipes e2
		WHERE numero='.$num_journee.'
		AND journees.ID_journee=matchs.journee_id
		AND matchs.equipe_dom_id = e1.ID_equipe
		AND matchs.equipe_vis_id=e2.ID_equipe');
	
		while ($resultats2=$reponse2->fetch())
		{
				
			if ($resultats2['fav1'] == true)
			{
				echo '<tr class="trcolorspecial"><td><b>'.$resultats2['equi1'].'</b> - '.$resultats2['equi2'].'</td><td>&nbsp;&nbsp;</td><td>'.$resultats2['but_equipe_dom'].'</b> - '.$resultats2['but_equipe_vis'].'</td></tr>';
			}
			else	
			{
				if  ($resultats2['fav2'] == true)
				{
					echo '<tr class="trcolorspecial"><td>'.$resultats2['equi1'].' - <b>'.$resultats2['equi2'].'</b></td>&nbsp;&nbsp;<td></td><td>'.$resultats2['but_equipe_dom'].'</b> - '.$resultats2['but_equipe_vis'].'</td></tr>';
				}	
				else
				{
					echo '<tr><td>'.$resultats2['equi1'].' - '.$resultats2['equi2'].'</td><td>&nbsp;&nbsp;</td><td>'.$resultats2['but_equipe_dom'].'</b> - '.$resultats2['but_equipe_vis'].'</td></tr>';
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
