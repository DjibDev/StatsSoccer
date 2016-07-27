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
		
		if (!(isset($_POST['reponse']))) 
		{
				
			echo '<form method="post" action="admin_reset_bdd.php" id="myform">';
			echo '<fieldset>';
			echo '<legend> Suppression de la base de données</legend>';
			echo '<center>';
			echo '<label for="reponse">Etes-vous sur de vouloir supprimer l\'intégralité des données ? (opération irrréversible)</label><br><br>';
			echo '<input type="checkbox" name="reponse" value="oui"> Oui';
			echo '<br><br>';
			echo '<input type="reset" value="Annuler"/>';
			echo '<input type="submit" value="Supprimer !"/>';
			echo '</center>';
			echo '</fieldset>';
			echo '</form>';
		}
		else
		{
			require_once ('fonctions_utiles.php');
			SupprBdd();
			
		}

		?>
	</section>
	<?php include ('footer.php'); ?>
</div>
</body>
</html>	
