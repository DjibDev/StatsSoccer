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
				
		<form method="post" action="trait_modif_equipe.php">	
		<fieldset>
		<Legend> Modifier les données des clubs</Legend>		
			<label for="equipe">Sélectionner le nom du club : </label>
			<select required name="equipe" id="equipe">
				<option selected disabled value="">Sélectionnez</option>
						
				<?php 
				require ('connexion.php');
			
				$reponse=$bdd->query('SELECT * from equipes order by nom ASC');
	
				while ($resultats=$reponse->fetch())
				{
					echo '<option value="'.$resultats['ID_equipe'].'">'.$resultats['nom'].'</option>';
				}
			
				$reponse->closeCursor();
				
				?>
           	</select>
           	<br>
           	<br>
           	<label for="equipe_fav">Définir en équipe à suivre ? :</label>
           	<input type="checkbox" name="equipe_fav" id="equipe_fav">
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
		
		<br>
		
		</fieldset>
		</form>
		<form method="post" action="trait_suppr_equipe.php">
		<fieldset>
		<Legend>Supprimer une equipe</Legend>		
			<label for="equipe">Nom du club: </label>
			<select required name="equipe" id="equipe">
				<option selected disabled value="">Sélectionnez</option>
						
			<?php 
				require ('connexion.php');
			
				$reponse=$bdd->query('SELECT * from equipes order by nom ASC');
	
				while ($resultats=$reponse->fetch())
				{
					echo '<option value="'.$resultats['ID_equipe'].'">'.$resultats['nom'].'</option>';
				}
			
				$reponse->closeCursor();
				
				?>
        	
        	</select>
			
			<br>
			<br>
				<input type="reset" value="Annuler"/>
				<input type="submit" value="Supprimer"/> 	
			</fieldset>
			</form>

	</section>
	
</div>		
	
		
	
</body>
</html> 
