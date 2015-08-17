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
  	
	include ('fonctions_utiles.php');
	require ('connexion.php');
	
	echo '<h2>Le calendrier</h2>';
	
	$reponse=$bdd->query('SELECT numero, date FROM journees WHERE saison="2015/2016" ORDER BY numero ASC');
	
	while ($resultats=$reponse->fetch())
	{		
		$dateFR=FormatDateFR($resultats['date']);
		$num_journee=$resultats['numero'];
		
		echo '<p><b><u>Journée n° '.$num_journee.' - le '.$dateFR.'</u></b></p>';
				
		$reponse2=$bdd->query('SELECT e1.nom equi1, e2.nom equi2, e1.favorite fav1, e2.favorite fav2 
		FROM matchs, journees, equipes e1, equipes e2
		WHERE numero='.$num_journee.'
		AND journees.ID_journee=matchs.journee_id
		AND matchs.equipe_dom_id = e1.ID_equipe
		AND matchs.equipe_vis_id=e2.ID_equipe');
	
		while ($resultats2=$reponse2->fetch())
		{
			echo '<p>'.$resultats2['equi1'].' - '.$resultats2['equi2'].'</p>';
		}	
		$reponse2->closeCursor(); 
		
			echo '<br>'; 
	}
	
	$reponse->closeCursor();
                
    ?>

</section>
	

</body>
</html>
