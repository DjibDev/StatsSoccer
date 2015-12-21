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
	?>	
	
	<section>	
	<?php

	if (!($_POST['j_1']))
	{	
		echo '<form method="post" action="trait_nouveau_champ.php" id="myform">';
		echo '<fieldset>';
		echo '<legend>Ajouter les dates au calendrier de la saison '.$_POST['saison'].'</legend>';
		
		for ($ligne=1; $ligne <= $_POST['number_j']; $ligne++)
		{
			echo '<label for="j_'.$num_j.'">Journée '.$ligne.' </label>';
			echo '<input type="date" name="j_'.$num_j.'" required ><br>';
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
		
		foreach ($tab_journees as $value)
		{
			$value=$_POST['j_'.$num];
		}	
		
		require('fonctions_utiles.php');
		// nettoyage de la base précedente + creation de la nouvelle
		SupprBdd();
		CreateBdd();
		
		// ajpout des journées dans la base
		require ('fonctions_utiles.php');
		AjoutJourneesBase($tab_journees, $_POST['saison'],0);
		
	}	
	
	?>

	</section>
	<?php include ('../footer.php'); ?>
	
</div>		
	
</body>
</html> 
