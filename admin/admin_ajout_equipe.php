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
								
		<form method="post" action="trait_ajout_equipe.php" id="myform">
			
		<?php require_once ('fonctions_utiles.php'); ?>
		
			<fieldset>
				<Legend> Ajouter une équipe en Championnat</Legend>		
				<label for="nom_club">Nom du club :</label>	
				<input required type="text" name="nom_club" id="nom_club">
				<br>
				<label for="ville">Ville :</label>	
				<input type="text" name="ville" id="ville">
				<br>
				<label for="stade">Stade :</label>	
				<input type="text" name="stade" id="stade">
				<br>
				<center>
				<input type="reset" value="Annuler"/>
				<input type="submit" value="Enregistrer"/> 	
				</center>
			</fieldset>
		</form>
			
		<form method="post" action="trait_ajout_equipe_coupe.php" id="myform">	
			<fieldset>
				<Legend> Ajouter une équipe pour la coupe</Legend>		
				<label for="nom_club">Nom du club :</label>	
				<input required type="text" name="nom_club" id="nom_club">
				<br>
				<label for="ville">Ville :</label>	
				<input type="text" name="ville" id="ville">
				<br>
				<label for="stade">Stade :</label>	
				<input type="text" name="stade" id="stade">
				<br>
				<center>
				<input type="reset" value="Annuler"/>
				<input type="submit" value="Enregistrer"/> 		
				</center>
			</fieldset>
		</form>
	</section>
		<?php include ('footer.php'); ?>
	
</div>		
	
</body>
</html> 
