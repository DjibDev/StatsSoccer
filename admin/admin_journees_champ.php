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
	
		$doublon=false;

		require_once ('connexion.php');
		$req_saison=$bdd->query('SELECT DISTINCT(saison) AS S FROM journees');
		
		while ($result_saison=$req_saison->fetch())
		{
			if (($result_saison['S']) == ($_POST['saison']))
			{
				$doublon=true;
			}	
		}
		$req_saison->CloseCursor();
		
		if (($doublon == true) || !(isset($_POST['number_j'])))
		{
			echo '<form method="post" action="admin_journees_champ.php" id="myform">';
			echo '<fieldset>';
			echo '<Legend>Création d\'un nouveau championnat</Legend>';
			echo '<label for="saison">Saison :</label>';
			echo '<select required name="saison">';
			echo '<option value="2015/2016" selected >2015/2016</option>';
			echo '<option value="2016/2017">2016/2017</option>';
			echo '<option value="2017/2018">2017/2018</option>';
			echo '<option value="2018/2019">2018/2019</option>';
			echo '<option value="2019/2020">2019/2020</option>';
			echo '</select>';
			echo '<label for="number_j">Nombre de journées :</label>';
			echo '<input type="number" required min="1" max="99" name="number_j" id="number_j"/>';
			echo '<br>';
			echo '<center><input type="submit" value="Valider"></center>';
			echo '</fieldset>';
			echo '</form>';
			echo '<p class="nok">Cette saison existe déjà ! </p>';
		}
	?>		
	</section>
		<?php include ('../footer.php'); ?>
	
</div>		
	
</body>
</html> 
