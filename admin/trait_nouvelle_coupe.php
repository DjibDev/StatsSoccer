<html>
	<head>
		<title>Les statistiques</title>
		<link rel="stylesheet" href="style_admin.css"/>
		<meta charset="utf-8" />
		
	</head>
	
<body>	
	<div id="bloc_page">
	<?php
	include('banniere_menu.php');
	require('fonctions_utiles.php');
	?>	
	
	<section>	
	<?php

	$saison=$_POST['saison'];
	

	if (!($_POST['j_1']))
	{	
		echo '<form method="post" action="trait_nouvelle_coupe.php" id="myform">';
		echo '<fieldset>';
		echo '<legend>Ajouter les dates de oucpe au calendrier de la saison '.$saison.'</legend>';
		echo '<input type="hidden" name="saison_select" value="'.$saison.'">';
		
		for ($ligne=1; $ligne <= $_POST['number_j']; $ligne++)
		{
			echo '<label for="j_'.$ligne.'">Journée '.$ligne.' &nbsp; ==>&nbsp;</label>';
			echo '<input type="date" name="j_'.$ligne.'" required ><br>';
		}	
		
		echo '<br>';
		echo '<center><input type="reset" value="Effacer !" />';
		echo '<input type="submit" value="Ajouter !" /></center>';
		echo '</fieldset>';
		echo '</form>';
		
	}
	else
	{	
		
		// declaration du tableau qui va stocker les differentes date des journées avant insertion en base
		$tab_journees=array();
		$num=1;
		$x=0;
		
		while (isset($_POST['j_'.$num]))
		{
			$tab_journees[$x]=$_POST['j_'.$num];
			$num++;
			$x++;
		}	
		
		// nettoyage des données de l'ancienne coupe
		SupprCoupe();
	

		// ajout des journées "coupe" dans la nouvelle base
		AjoutJourneesBase($tab_journees, $_POST['saison_select'], 'true');
		
	}	
	
	?>

	</section>
	<?php include ('../footer.php'); ?>
	
</div>		
	
</body>
</html> 
