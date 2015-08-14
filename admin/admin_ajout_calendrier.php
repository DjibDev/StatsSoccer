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
				
		<form method="post" action="trait_ajout_calendrier.php">	
		<fieldset>
		<Legend>Ajout d'une confrontation</Legend>		
			<label for="journee">Sélectionner la date : </label>
			<select required name="journee" id="journee">
				<option selected disabled value="">Sélectionnez</option>
						
				<?php 
				require ('connexion.php');
				require ('fonctions_utiles.php');
			
				$reponse=$bdd->query('SELECT * from journees order by numero ASC');
	
				while ($resultats=$reponse->fetch())
				{
					$dateFR=FormatDateFR($resultats['date']);
					echo '<option value="'.$resultats['ID_journee'].'">Journée N°'.$resultats['numero'].' - '.$dateFR.'</option>';
				}
			
				$reponse->closeCursor();
				
				?>
           	</select>
           	<br>
           	<br>
         	<select required name="equipe1" id="equipe1">
				<option selected disabled value="">Sélectionnez</option>
						
				<?php 
						
				$reponse=$bdd->query('SELECT * from equipes order by nom ASC');
	
				while ($resultats=$reponse->fetch())
				{
				
					echo '<option value="'.$resultats['ID_equipe'].'">'.$resultats['nom'].'</option>';
				}
			
				$reponse->closeCursor();
				
				?>
           	</select>
           	
           	<?php echo ' contre '; ?>
           	
			<select required name="equipe2" id="equipe2">
				<option selected disabled value="">Sélectionnez</option>
						
				<?php 
				
				$reponse=$bdd->query('SELECT * from equipes order by nom ASC');
	
				while ($resultats2=$reponse->fetch())
				{
				
					echo '<option value="'.$resultats2['ID_equipe'].'">'.$resultats2['nom'].'</option>';
				}
			
				$reponse->closeCursor();
				
				?>
           	</select>
			<br>
			<br>
			<input type="reset" value="Annuler"/>
			<input type="submit" value="Ajouter"/> 	
        </fieldset>
		</form>
		
		</section>
		
</div>		
	
</body>
</html> 
