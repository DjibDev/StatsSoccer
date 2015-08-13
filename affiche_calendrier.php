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
	
	echo '<h2>Le calendrier 2015/2016</h2>';
	echo '<br>';
	
	$reponse=$bdd->query('SELECT * from journees where saison="2015/2016" order by date ASC');
		
	while ($resultats=$reponse->fetch())
	{		
			
			$datejournee=FormatDateFR($resultats['date']);
			echo '<p><u><b>Journée N° '.$resultats['numero'].' - le '.$datejournee.': </b></u></p><br>';	
			
	}
	
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
