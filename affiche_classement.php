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
		<article>
	
	
	<?php
  	
	include ('fonctions_utiles.php');
	require ('connexion.php');
	
	echo '<h2>Le classement</h2>';
	
	//requete qui retourne le nombre de journee présentent dans stats_collectives
	$req2=$bdd->query('SELECT COUNT(DISTINCT journee_id) AS nb_journee
	FROM stats_collectives');
	
	while ($resultats2=$req2->fetch())
	{
		$nb_journee=$resultats2['nb_journee'];
	}
	$req2->closeCursor();
	
	// calculs cumulatifs 
					
	$cumul_v=Array();
	$cumul_n=Array();
	$cumul_d=Array();
	$cumul_bp=Array();
	$cumul_bc=Array();
	$cumul_diff=Array();
	$cumul_pts=Array();
			
	for ($x=0;$x < $nb_journee;$x++)
	{		
		
		$req1=$bdd->query('SELECT nom, favorite, victoire, defaite, nul, buts_pour, buts_contre, diff, points
		FROM equipes, stats_collectives
		WHERE  equipes.ID_equipe = stats_collectives.equipe_id
		AND equipe_id='.$equipe_id.'
		ORDER BY points DESC, diff DESC, buts_pour ASC ');
	
		if ($victoire == true)
		{
				$v="1";
		}
		else
		{
				$v="0";
		}
		
		if ($nul == true)
		{
				$n="1";
		}
		else
		{
				$n="0";
		}	
		
		if ($defaite == true)
		{
				$d="1";
		}
		else
		{
				$d="0";
		}
		
		$cumul_v[$x]=$cumul_v[$x]+1;
			
	
	
	
	$x=0;
	echo '<table border=2 cellspacing=2 cellspadding=2>';
	echo '<tr class=trheadcolor><th></th><th></th><th>J</th><th>V</th><th>N</th><th>D</th><th>Bp</th><th>Bc</th><th>Diff</th><th>Pts</th></tr>';
	
		while ($resultats=$req1->fetch())
		{		
			/* le calcul du modulo de "$x" permet d'alterner le resultat : soit "0" soit "1" */
			$x++;
			$altern=$x % 2;
			
			/* affichage différent si s'agit de l'équipe favorite */
			
			if ($resultats['favorite'] == true)
			{
				$altern='special';
			}
			else
			{	
				$altern=$x % 2;
			}
			
		}
		$req1->closeCursor();
					
			echo '<tr class=trcolor'.$altern.'>';
			echo '<td>'.$x.'</td>';
			echo '<td>'.$resultats['nom'].'</td>';
			echo '<td>'.$nb_journee.'</td>';
			echo '<td>'.$resultats['victoire'].'</td>';
			echo '<td>'.$resultats['nul'].'</td>';
			echo '<td>'.$resultats['defaite'].'</td>';
			echo '<td>'.$resultats['buts_pour'].'</td>';
			echo '<td>'.$resultats['buts_contre'].'</td>';
			echo '<td>'.$resultats['diff'].'</td>';
			echo '<td>'.$resultats['points'].'</td></tr>';
			
			echo '</table>';	
                
    ?>
        
		</article>	
	
		<aside>
			<center>
				<img src="images/petit_logo.png"/>
			</center>
			
		</aside>
	</section>
	

</body>
</html>
