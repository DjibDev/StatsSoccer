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

		if ($current_saison == null)
		{
			$current_saison=date('Y').'/'.(date('Y')+1);
		}	
		$saison_future='20'.(substr($current_saison,2,2)+1).'/20'.(substr($current_saison,7,2)+1);
		
		if (!(isset($_POST['number_j'])))
		{
			echo '<form method="post" action="trait_nouveau_champ.php" id="myform">';
			echo '<fieldset>';
			echo '<Legend>Création d\'un nouveau championnat</Legend>';
			echo '<label for="saison">Prochaine saison :</label>';
			echo '<select name="saison" required>';
			echo '<option value="" disabled selected >Sélectionnez</option>';
			echo '<option value="'.$current_saison.'">'.$current_saison.'</option>';
			echo '<option value="'.$saison_future.'">'.$saison_future.'</option>';
			echo '</select>';
			echo '<label for="number_j">Nombre de journées :</label>';
			echo '<input type="number" required min="1" max="99" name="number_j" id="number_j"/><br><br>';
			echo '<label for="sav_effectif">Souhaitez-vous reconduire le même effectif ?</label>&nbsp;&nbsp;&nbsp;';
			echo 'Oui <input type="radio" name="sav_effectif" id="sav_effectif" value="oui" checked/>';
			echo 'Non <input type="radio" name="sav_effectif" id="sav_effectif" value="non"/><br><br>';
			echo '<label for="bareme"><u> Barème :</u></label><br><br>';
			echo '<label for="victoire">Victoire : </label>';
			echo '<input type="number" name="victoire" required><br>';
			echo '<label for="nul">Nul : </label>';
			echo '<input type="number" name="nul" required><br>';
			echo '<label for="defaite">Défaite : </label>';
			echo '<input type="number" name="defaite" required><br>';
			echo '<label for="forfait">Forfait : </label>';
			echo '<input type="number" name="forfait" required><br>';
			echo '<label for="penalite">Pénalité : </label>';
			echo '<input type="number" name="penalite" required>';
			echo '<br><br>';
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
