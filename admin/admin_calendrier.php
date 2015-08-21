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
	require('connexion.php');
?>	

<div id="ajout_team">	
		<section>		
		<form method="post" action="trait_ajout_calendrier.php">	
		<fieldset>
		<Legend>Ajout d'une confrontation dans le calendrier</Legend>		
			<label for="journee">Sélectionner la date : </label>
			<select required name="journee" id="journee">
				<option selected disabled value="">Sélectionnez</option>
				<?php 
				require ('fonctions_utiles.php');
				NbrMatchAtteint();
				?>
           	</select>
           	<br>
           	<br>
            <label for="equipe1">Equipe à domicile</label><br>
         	<select required size="21" name="equipe1" id="equipe1">
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
           	
			<select required size="21" name="equipe2" id="equipe2">
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
		<br>
		<form method="post" action="trait_suppr_calendrier.php">	
		<fieldset>
		<Legend>Supprimer tous les matchs d'une journée</Legend>		
			<label for="journee_suppr">Sélectionner la date : </label>
			<select required name="journee_suppr" id="journee_suppr">
				<option selected disabled value="">Sélectionnez</option>
				
				<?php
				
				$reponse3=$bdd->query('SELECT numero, date, ID_journee
				FROM journees
				ORDER BY numero ASC');
	
	
				while ($resultats3=$reponse3->fetch())
				{
				$dateFR=FormatDateFR($resultats3['date']);
				echo '<option value='.$resultats3['ID_journee'].'>Journée N°'.$resultats3['numero'].' - '.$dateFR.'</option>';
				}
				$reponse3->closeCursor();
	
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
</div>		
	
</body>
</html> 
