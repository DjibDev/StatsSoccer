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
	require('connexion.php');
	
	echo '<div id="general"></div>';
	echo '<h2>Le classement en championnat</h2>';
	
	echo '<table border="0" cellspacing=2 cellspadding=2>';
	echo '<tr class="trcolor0"><td align="center"><a href="#adomicile">A domicile</a></td><td align="center"><a href="#alexterieur">A l\'extérieur</td></tr>';
	echo '</table><br>';
	
	$req1=$bdd->query('SELECT ID_equipe, nom, favorite, nb_journees, nb_victoires, nb_nuls, nb_defaites, nb_buts_pour, nb_buts_contre, diff, points
	FROM equipes, classement
	WHERE  equipes.ID_equipe = classement.equipe_id
	AND nb_journees = (SELECT MAX(nb_journees) FROM classement) 
	ORDER BY points DESC, diff DESC, nb_buts_pour DESC, nom ASC ');
	
	$x=0;
	
	echo '<table border=2 cellspacing=2 cellspadding=2 >';
	echo '<tr class=trheadcolor><th></th><th></th><th width="30">Pts</th><th width="30">J</th><th width="30">V</th><th width="30">N</th><th width="30">D</th><th width="30">Bp</th><th>Bc</th><th width="30">Diff</th><th width="30">Stats</th></tr>';
	
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
			echo '<td>'.$resultats['nom'].'</td>';
			echo '<td align="center"><b>'.$resultats['points'].'</b></td>';
			echo '<td align="center">'.$resultats['nb_journees'].'</td>';
			echo '<td align="center">'.$resultats['nb_victoires'].'</td>';
			echo '<td align="center">'.$resultats['nb_nuls'].'</td>';
			echo '<td align="center">'.$resultats['nb_defaites'].'</td>';
			echo '<td align="center">'.$resultats['nb_buts_pour'].'</td>';
			echo '<td align="center">'.$resultats['nb_buts_contre'].'</td>';
			echo '<td align="center">'.$resultats['diff'].'</td>';			
			echo '<td align="center"><a href="stats_files/equipes/stats_equipe_'.$resultats['ID_equipe'].'.php">Voir</a></td></tr>';
			
		}
		$req1->closeCursor();
		
		echo '</table><br>';		
		
		echo '<div id="adomicile"></div>';
		echo '<div id="alexterieur"></div>';
		
                
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
