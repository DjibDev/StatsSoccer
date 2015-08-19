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
  
	require ('admin/MAJ_Classement.php');
	require ('connexion.php');
	
	// appel de la fonction 
	MAJ_Classement();

	/*echo '<h2>Le classement</h2>';
	
	$req1=$bdd->query('SELECT nom_equipe, favorite, victoire, defaite, nul, buts_pour, buts_contre, diff, points
	FROM equipes, stats_collectives
	WHERE  equipes.ID_equipe = stats_collectives.equipe_id
	ORDER BY points DESC, diff DESC, buts_pour ASC ');
	
	$x=0;
	echo '<table border=2 cellspacing=2 cellspadding=2>';
	echo '<tr class=trheadcolor><th></th><th></th><th>J</th><th>V</th><th>N</th><th>D</th><th>Bp</th><th>Bc</th><th>Diff</th><th>Pts</th></tr>';
	
		while ($resultats=$req1->fetch())
		{		
			/* le calcul du modulo de "$x" permet d'alterner le resultat : soit "0" soit "1" 
			$x++;
			$altern=$x % 2;
			
			/* affichage différent si s'agit de l'équipe favorite 
			
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
			echo '<td>'.$resultats['nom'].'</td>';
			echo '<td>'.$x.'</td>';
			echo '<td>'.$resultats['victoire'].'</td>';
			echo '<td>'.$resultats['nul'].'</td>';
			echo '<td>'.$resultats['defaite'].'</td>';
			echo '<td>'.$resultats['buts_pour'].'</td>';
			echo '<td>'.$resultats['buts_contre'].'</td>';
			echo '<td>'.$resultats['diff'].'</td>';
			echo '<td>'.$resultats['points'].'</td></tr>';
			
		}
		$req1->closeCursor();

			
			echo '</table>';	*/
			
			
                
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
