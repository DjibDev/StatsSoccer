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
  	
	include ('fonctions_utiles_users.php');
	require ('connexion.php');
	
	echo '<h2>L\'effectif</h2>';
	
	$reponse=$bdd->query('SELECT * from effectif order by nom ASC');
	
	$x=0;
	$altern=$x % 2;
		
		
	echo '<table border=2 cellspacing=2 cellspadding=2><tr class=trheadcolor><th>Nom</th><th>Prénom</th><th>Age</th><th>Poste</th><th>Numéro</th><th>Stats</th></tr>';
	
	
	while ($resultats=$reponse->fetch())
	{		
			/* le calcul du modulo de "$x" permet d'alterner le resultat : soit "0" soit "1" */
			$altern=$x % 2;
			
			$date_naiss=$resultats['birthday'];
			
			if ($date_naiss == "0000-00-00")
			{
					$age="N.C.";
			}	
			else 
			{
				$age=CalculerAge($date_naiss);
			}
			
			echo '<tr class=trcolor'.$altern.'>';
			echo '<td>'.$resultats['nom'].'</td>';
			echo '<td>'.$resultats['prenom'].'</td>';
			echo '<td>'.$age.'</td>';
			echo '<td>'.$resultats['poste'].'</td>';
			echo '<td align=center>'.$resultats['num_maillot'].'</td>';
			echo '<td><a href="stats_files/players/stats_player_'.$resultats['ID_joueur'].'.php">Voir</a></td>';
			echo '</tr>';
			$x++;
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
