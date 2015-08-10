<html>

<head>
	<title>Les stats des loisirs</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style_base.css"/>
</head>

<body>
	
<div id="bloc_page">
<div id="banniere_image">
		<h1>Saison 2015-2016</h1>	
		<div id="banniere_description">	
				<a class="btn" href="index.php">Accueil</a>
				<a class="btn" href="affiche_effectif.php">Effectif</a>
				<a class="btn" href="#section">Championnat</a>
				<a class="btn" href="#section">Coupe</a>
				<a class="btn" href="#section">Statistiques d'équipe</a>
				<a class="btn" href="#section">Statistiques individuelles</a>
				<a class="btn" href="http://jgefootlb.free.fr">Forum</a>
				<a class="btn" href="http://jgefoot.com">Site officiel</a>
				<a class="btn" href="log_admin.php">Administrer</a></p>
		</div>
	</div>
		
		
	
<h2>L'effectif</h2>
	
<?php
   
  
	include ('fonctions_utiles.php');
	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=stats;charset=utf8','root', 'root');
	}
	catch (Exception $e)
	{
        die('Erreur détectée: ' . $e->getMessage());
	}
	
	
	$reponse=$bdd->query('SELECT * from effectif');
	
	$x=0;
	$altern=$x % 2;
		
		
	echo '<table border=2 cellspacing=2 cellspadding=2><tr class=trheadcolor><th>Pseudo</th><th>Age</th><th>Poste</th></tr>';
	
	
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
			echo '</tr>';
			$x++;
	}
	
	echo '</table>';	
	
	$reponse->closeCursor();
                
    ?>
                
</body>
</html>
