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
<h2 align="center">Calendrier et Résultats du Championnat</h2>
	<?php
  	
	include ('fonctions_utiles_users.php');
	require ('connexion.php');
			
	$req=$bdd->query('SELECT date, numero, finished
	FROM journees
	WHERE coupe="0"
	ORDER BY date ASC
	LIMIT 0 , 9');
	
	echo '<center><table><tr class="trcolor0">';
	While ($resultats=$req->fetch())
	{
		$td_bgcolor=''; 
		if ($resultats['finished'] == true)
		{
			$td_bgcolor='bgcolor="grey"'; // affiche en fond gris les journées terminées
		}	
			
		   if ($resultats['numero'] < 50)
		    {
				echo '<td '.$td_bgcolor.'><a href="#match'.$resultats['date'].'">Journée '.$resultats['numero'].'</a></td>';
			}
			else
			{
				echo '<td bgcolor="black"><a href="#match'.$resultats['date'].'">Reportée</a></td>';
			}
	}		
	$req->closeCursor();
	
	$req=$bdd->query('SELECT date, numero, finished
	FROM journees
	WHERE coupe="0"
	ORDER BY date ASC
	LIMIT 9 , 9');

	echo '</tr><tr class="trcolor0">';
	
	While ($resultats=$req->fetch())
	{
		$td_bgcolor=''; 
		if ($resultats['finished'] == true)
		{
			$td_bgcolor='bgcolor="grey"'; // affiche en fond gris les journées terminées
		}	
			
		   if ($resultats['numero'] < 50)
		    {
				echo '<td '.$td_bgcolor.'><a href="#match'.$resultats['date'].'">Journée '.$resultats['numero'].'</a></td>';
			}
			else
			{
				echo '<td bgcolor="black"><a href="#match'.$resultats['date'].'">Reportée</a></td>';
			}
	}
	$req->closeCursor();
	
	$req=$bdd->query('SELECT date, numero, finished
	FROM journees
	WHERE coupe="0"
	ORDER BY date ASC
	LIMIT 18 , 9');

	echo '</tr><tr class="trcolor0">';
	
	While ($resultats=$req->fetch())
	{
		$td_bgcolor=''; 
		if ($resultats['finished'] == true)
		{
			$td_bgcolor='bgcolor="grey"'; // affiche en fond gris les journées terminées
		}	
			
		   if ($resultats['numero'] < 50)
		    {
				echo '<td '.$td_bgcolor.'><a href="#match'.$resultats['date'].'">Journée '.$resultats['numero'].'</a></td>';
			}
			else
			{
				echo '<td bgcolor="black"><a href="#match'.$resultats['date'].'">Reportée</a></td>';
			}
	}
	$req->closeCursor();
	
	$req=$bdd->query('SELECT date, numero, finished
	FROM journees
	WHERE coupe="0"
	ORDER BY date ASC
	LIMIT 27 , 9');
	
	echo '</tr><tr class="trcolor0">';

	While ($resultats=$req->fetch())
	{
		$td_bgcolor=''; 
		if ($resultats['finished'] == true)
		{
			$td_bgcolor='bgcolor="grey"'; // affiche en fond gris les journées terminées
		}	
			
		   if ($resultats['numero'] < 50)
		    {
				echo '<td '.$td_bgcolor.'><a href="#match'.$resultats['date'].'">Journée '.$resultats['numero'].'</a></td>';
			}
			else
			{
				echo '<td bgcolor="black"><a href="#match'.$resultats['date'].'">Reportée</a></td>';
			}
	}
	$req->closeCursor();
	
	$req=$bdd->query('SELECT date, numero, finished
	FROM journees
	WHERE coupe="0"
	ORDER BY date ASC
	LIMIT 36 , 9');
	
	echo '</tr><tr class="trcolor0">';

	While ($resultats=$req->fetch())
	{
		$td_bgcolor=''; 
		if ($resultats['finished'] == true)
		{
			$td_bgcolor='bgcolor="grey"'; // affiche en fond gris les journées terminées
		}	
			
		   if ($resultats['numero'] < 50)
		    {
				echo '<td '.$td_bgcolor.'><a href="#match'.$resultats['date'].'">Journée '.$resultats['numero'].'</a></td>';
			}
			else
			{
				echo '<td bgcolor="black"><a href="#match'.$resultats['date'].'">Reportée</a></td>';
			}
	}
	$req->closeCursor();

	echo '</tr></table>';
	echo '<p>* Si une équipe n\'apparait pas, c\'est qu\'elle est exempte.</p>';
	echo '<p>** Si une confrontation manque, c\'est que le match a été reporté ou sous réserve.</p></center>';
	
	
	$reponse=$bdd->query('SELECT numero, date
	FROM journees 
	WHERE coupe="0" 
	ORDER BY date ASC');
	
	
	while ($resultats=$reponse->fetch())
	{		
		
		$dateFR=FormatDateFR($resultats['date']);
		$date_journee=$resultats['date'];
		$num_journee=$resultats['numero'];
		
		if ($num_journee < 50)
		{
			$texte='Journée N°'.$num_journee;
		}
		else 
		{
			$texte='Journée Reportée';
		}
			
		echo '<div id=match'.$date_journee.'></div>';
		echo '<table align="center" width="600" cellspacing="4" cellspading="4"><tr class="trheadcolor"><th align=left colspan="3"><a href="#bloc_page"><img src="images/fleche_haut.jpg"></a>&nbsp;&nbsp;&nbsp;<b><u>'.$texte.' - le '.$dateFR.'</u></b></th></tr>';
	
				
		$reponse2=$bdd->query('SELECT e1.nom equi1, e2.nom equi2, e1.favorite fav1, e2.favorite fav2, equipe_dom_forfait, equipe_dom_penalite, equipe_vis_forfait, equipe_vis_penalite, but_equipe_dom, but_equipe_vis, finished
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
				echo '<tr class="trcolorspecial"><td width="500"><b>'.$resultats2['equi1'].'</b> <i>'.$e1_msg.'</i> - '.$resultats2['equi2'].' <i>'.$e2_msg.'</i></td><td align=center>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
			}
			else	
			{
				if  ($resultats2['fav2'] == true)
				{
					echo '<tr class="trcolorspecial"><td width="500">'.$resultats2['equi1'].' <i>'.$e1_msg.'</i> - <b>'.$resultats2['equi2'].'</b> <i>'.$e2_msg.'</i></td><td align=center>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
				}	
				else
				{
					echo '<tr><td width="500">'.$resultats2['equi1'].' <i>'.$e1_msg.'</i> - '.$resultats2['equi2'].' <i>'.$e2_msg.'</i></td><td align=center>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
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
