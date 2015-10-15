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
		
		
	echo '<table border=2 cellspacing=2 cellspadding=2><tr class=trheadcolor><th>Pseudo</th><th>Age</th><th>Poste</th><th>Stats</th></tr>';
	
	
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
			echo '<td>'.$resultats['pseudo'].'</td>';
			echo '<td>'.$age.'</td>';
			echo '<td>'.$resultats['poste'].'</td>';
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
			<p><i>En quelques chiffres...</i></p>
			<p>Effectif:<b> <?php echo NombreEffectif(); ?></b></p>
			<p>Age moyen:<b> <?php echo AgeAVG(); ?></b> </p>
			<p><b><?php echo NbGAR(); ?> </b> gardien(s).</p>
			<p><b><?php echo NbDEF(); ?> </b> défenseur(s). </p>
			<p><b><?php echo NbMIL(); ?> </b> milieu(x). </p>
			<p><b><?php echo NbATT(); ?> </b> attaquant(s).</p>
			<p><b><?php echo NbINC(); ?> </b> inclassable(s).</p>
			
			</center>
		</aside>
	</section>
	

</body>
</html>
