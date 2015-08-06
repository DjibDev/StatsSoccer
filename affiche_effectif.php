<html>

<head>
	<title>Les statistiques</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style_base.css"/>
</head>


<body>
	
		<h2>Effectif</h2>	

 <?php
   
  
    require "fonctions_utiles.php";
	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=stats;charset=utf8', 'root', 'root');
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
