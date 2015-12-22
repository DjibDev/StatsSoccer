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
		echo '<form method="post" action="trait_nouveau_champ.php" id="myform">';
		echo '<fieldset>';
		echo '<legend>Ajouter les dates au calendrier de la saison '.$saison.'</legend>';
		echo '<input type="hidden" name="saison_select" value="'.$saison.'">';
		
		if ($_POST['sav_effectif'] == "oui")
		{
			echo '<input type="hidden" name="effectif_idem" value="oui">';	
			
			// si lutilisateur souhaite reconduire le même effectif dans la saison future, alors on sauvegarde le fichier effectif
			$sub_saison=substr($saison,0,4); // ne garder que la premiere "année" de la saison
			$user="root";
			$password="root";
			$host="localhost";
			$dbname="stats";
			SaveEffectif($user,$password,$host,$dbname,$sub_saison); //appel de la fonction qui permet d'exporter les valeurs de la table effectif dans un fichier avant suppression
		}			
		
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
		
		// nettoyage de la base précedente + creation de la nouvelle
		SupprBdd();
		CreateBdd();
		
		if ($_POST['effectif_idem'] == "oui")
		{
			// on recharge le fichier d'effectif précedement sauvegardé
			$sub_saison=substr($_POST['saison_select'],0,4); // ne garder que la premiere "année" de la saison
			ReloadEffectif($sub_saison);
		}	

		// suppression du fichier effectif
		SupprFichierEffectif();

		// ajout des journées dans la nouvelle base
		AjoutJourneesBase($tab_journees, $_POST['saison_select'], 'false');
		
		
		
	}	
	
	?>

	</section>
	<?php include ('../footer.php'); ?>
	
</div>		
	
</body>
</html> 
