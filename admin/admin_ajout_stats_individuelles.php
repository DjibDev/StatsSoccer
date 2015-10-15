<html>
	<head>
		<title>Les statistiques</title>
		<link rel="stylesheet" href="style_admin.css"/>
		<meta charset="utf-8" />
		
	</head>
	
<body>	
	<div id="bloc_page">
<?php
	include ('banniere_menu.php');
	require ('connexion.php');
	require ('fonctions_utiles.php');
	
?>			

	<section>	
		<form method="post" action="trait_ajout_stats_individuelles.php">
		<fieldset>
		<Legend> Entrez les stats par joueur et par journée</Legend>
		<table border="0" cellspacing="4">
		<tr><td align="right">
		<label for="player">Sélectionner le joueur: </label></td>
		<td align="left"><select required name="player" id="player">
			<option selected disabled value="">Sélectionnez</option>
			<?php 
				$reponse=$bdd->query('SELECT * from effectif order by nom ASC');
	
				while ($resultats=$reponse->fetch())
				{
					echo '<option value="'.$resultats['ID_joueur'].'">'.$resultats['pseudo'].'</option>';
				}
				$reponse->closeCursor();
			?>
		</select></td>
		<td></td>
		<td align="right">
		<label for="journee">Sélectionner la journée: </label></td>
		<td align="left"><select required name="journee" id="journee">
			<option selected disabled value="">Sélectionnez</option>
			<?php	
				$reponse2=$bdd->query('SELECT numero, date, ID_journee
				FROM journees
				WHERE saison = "2015/2016"
				AND coupe="0"
				ORDER BY numero ASC');
								
				while ($resultats2=$reponse2->fetch())
				{
					$dateFR=FormatDateFR($resultats2['date']);
					echo '<option value="'.$resultats2['ID_journee'].'">Journéee n° '.$resultats2['numero'].' - le '.$dateFR.'</option>';
				}
				$reponse2->closeCursor();
			?>
		</select></td></tr>
		</table>
		<br>
		<table border="0" cellspacing="4">
		<tr><td align="right"><label for="buts">But(s) marqué(s)</label></td>
		<td align="left"><select required name="buts" id="but">
			<option selected value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
		</select></td>
		<td></td>
		<td></td>
		<td align="right"><label for="passes">Passe(s) décisive(s)</label></td>
		<td align="left"><select required name="passes" id="passes">
			<option selected value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
		</select></td>
		<td></td></tr>
				
		<tr><td align="right"><label for="csc">Csc ?</label></td>
		<td align="left"><select required name="csc" id="csc">
			<option selected value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			</select></td>
		<td></td>
		<td></td>
		<td align="right"><label for="clean">Cleansheet ?</label></td>
		<td align="left"><input type="checkbox" name="clean"/></td></tr>
		
		<tr><td align="right"><label for="peno_rate">Péno(s). raté(s) ?</label></td>
		<td align="left"><select required name="peno_rate" id="peno_rate">
			<option selected value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			</select></td>
		<td></td>	
		<td></td>
		<td align="right"><label for="peno_arret">Péno.(s) arreté(s) ?</label></td>
		<td align="left"><select required name="peno_arret" id="peno_arret">
			<option selected value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			</select></td></tr>
		</table>
		
		<table border="0" cellspacing="4">
		<tr><td align="right"><label for="faits">Fait(s) marquant(s) ?</label></td>
		<td align="left"><input type="checkbox" name="faits"/></td>
		
		<td align="right"><label for="détails_faits">Détails du(es) fait(s) marquant(s)</label></td>
		<td colspan="3" align="left"><TEXTAREA rows="4" cols="60" name="details_faits"></TEXTAREA></td></tr>
		
		</table>
		<br>
		<input type="reset" value="Annuler">
		<input type="submit" value="Enregistrer">
		</fieldset>		
		</form>
	</section>
	
</div>		
	
</body>
</html> 
