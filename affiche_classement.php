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
	
	$reponse=$bdd->query('SELECT nom, favorite from equipes order by nom ASC');
	
	$x=0;
			
	echo '<table border=2 cellspacing=2 cellspadding=2>';
	echo '<tr class=trheadcolor><th></th><th></th><th>J</th><th>V</th><th>N</th><th>D</th><th>Bp</th><th>Bc</th><th>Diff</th><th>Pts</th></tr>';
	
	while ($resultats=$reponse->fetch())
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
				
			echo '<tr class=trcolor'.$altern.'>';
			echo '<td>'.$x.'</td>';
			echo '<td>'.$resultats['nom'].'</td>';
			echo '<td></td>';
			echo '<td></td>';
			echo '<td></td>';
			echo '<td></td>';
			echo '<td></td>';
			echo '<td></td>';
			echo '<td></td>';
			echo '<td></td></tr>';
			
	}
	
	echo '</table>';	
	
	$reponse->closeCursor();
                
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
