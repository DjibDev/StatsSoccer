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
	echo '<center><table border="0" cellspacing="3">';
	echo '<tr class="trcolor0"><td><a href="#match1">Journée 1</a></td><td><a href=#match2>Journée 2</a></td><td><a href=#match3>Journée 3</a></td><td><a href=#match4>Journée 4</a></td><td><a href=#match5>Journée 5</a></td><td><a href=#match6>Journée 6</a></td><td><a href=#match7>Journée 7</a></td><td><a href=#match8>Journée 8</a></td></tr>';
	echo '<tr class="trcolor0"><td><a href=#match9>Journée 9</a></td><td><a href=#match10>Journée 10</a></td><td><a href=#match11>Journée 11</a></td><td><a href=#match12>Journée 12</a></td><td><a href=#match13>Journée 13</a></td><td><a href=#match14>Journée 14</a></td><td><a href=#match15>Journée 15</a></td><td><a href=#match16>Journée 16</a></td></tr>';
	echo '<tr class="trcolor0"><td><a href=#match17>Journée 17</a></td><td><a href=#match18>Journée 18</a></td><td><a href=#match19>Journée 19</a></td><td><a href=#match20>Journée 20</a></td><td><a href=#match21>Journée 21</a></td><td><a href=#match22>Journée 22</a></td><td><a href=#match23>Journée 23</a></td><td><a href=#match24>Journée 24</a></td></tr>';
	echo '<tr class="trcolor0"><td><a href=#match25>Journée 25</a></td><td><a href=#match26>Journée 26</a></td><td><a href=#match27>Journée 27</a></td><td><a href=#match28>Journée 28</a></td><td><a href=#match29>Journée 29</a></td><td><a href=#match30>Journée 30</a></td><td><a href=#match31>Journée 31</a></td><td><a href=#match32>Journée 32</a></td></tr>';
	echo '<tr class="trcolor0"><td><a href=#match33>Journée 33</a></td><td><a href=#match34>Journée 34</a></td><td><a href=#match35>Journée 35</a></td><td><a href=#match36>Journée 36</a></td><td><a href=#match37>Journée 37</a></td><td><a href=#match38>Journée 38</a></td></tr>';
	echo '</table></center>';
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
