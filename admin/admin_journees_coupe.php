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
	
		$current_saison=AfficheSaisonBanniere();
		$saison_future='20'.(substr($current_saison,2,2)+1).'/20'.(substr($current_saison,7,2)+1);
		
		if (!(isset($_POST['number_j'])))
		{
			echo '<form method="post" action="trait_nouvelle_coupe.php" id="myform">';
			echo '<fieldset>';
			echo '<Legend>Création d\'un nouvelle coupe</Legend>';
			echo '<label for="saison">Prochaine saison :</label>';
			echo '<select name="saison" required>';
			echo '<option value="" disabled selected >Sélectionnez</option>';
			echo '<option value="'.$current_saison.'">'.$current_saison.'</option>';
			echo '<option value="'.$saison_future.'">'.$saison_future.'</option>';
			echo '</select>';
			echo '<label for="number_j">Nombre de journées :</label>';
			echo '<input type="number" required min="1" max="99" name="number_j" id="number_j"/><br><br>';
			echo '<br>';
			echo '<center>';
			echo '<input type="reset" value="Effacer">&nbsp;';
			echo '<input type="submit" value="Créer !"></center>';
			echo '</fieldset>';
			echo '</form>';
		}
	
	?>		
	</section>
		<?php include ('../footer.php'); ?>
	
</div>		
	
</body>
</html> 
