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
								
		<form method="post" action="trait_ajout_equipe.php">
			
		<?php require_once ('fonctions_utiles.php'); ?>
		
			<fieldset>
				<Legend> Ajouter une équipe</Legend>		
				<label for="nom_club">Nom du club :</label>	
				<input required type="text" name="nom_club" id="nom_club">
				<br>
				<br>
				<label for="ville">Ville :</label>	
				<input type="text" name="ville" id="ville">
				<br>
				<br>
				<label for="stade">Stade :</label>	
				<input type="text" name="stade" id="stade">
				<br>
				<br>	
				<input type="reset" value="Annuler"/>
				<input type="submit" value="Enregistrer"/> 		
			</fieldset>
		</form>
		
	</section>
	
</div>		
	
</body>
</html> 
