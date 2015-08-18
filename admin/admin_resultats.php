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
	require('fonctions_utiles.php');
		
	if (!isset($_POST['journee']))
	{
?>	
	<section>	
	<article>
	<form method="post" action="admin_resultats.php">	
		<fieldset>
		<Legend>Ajout des résultats de la journée</Legend>		
			<label for="journee">Sélectionner la date : </label>
			<select required name="journee" id="journee" onchange="submit();">
				<option selected disabled value="">Sélectionnez</option>
				<?php 
										
					$reponse=$bdd->query('SELECT numero, date, ID_journee
					FROM journees
					ORDER BY numero ASC');
	
					while ($resultats=$reponse->fetch())
					{
						$dateFR=FormatDateFR($resultats['date']);
						echo '<option value='.$resultats['ID_journee'].'>Journée N°'.$resultats['numero'].' - '.$dateFR.'</option>';
					}
					$reponse->closeCursor();
				
				?>
           	</select>
		</fieldset>
		</form>
		
	<?php
	}
	else
	{
			$journee_id=$_POST['journee'];
			
			$reponse2=$bdd->query('SELECT e1.nom equi1, e2.nom equi2, equipe_dom_id, equipe_vis_id, but_equipe_dom, but_equipe_vis 
			FROM matchs, equipes e1, equipes e2
			WHERE matchs.journee_id='.$journee_id.'
			AND matchs.equipe_dom_id = e1.ID_equipe
			AND matchs.equipe_vis_id = e2.ID_equipe');
			
			echo '<form method="post" action="trait_ajout_resultats.php">';
			echo '<input type="hidden" name="journee_id" value="'.$journee_id.'" />';
			
			echo '<table border="0">';

			$ligne=0;
			
			while ($resultats2=$reponse2->fetch())
			{	
				
				echo '<tr>';
				echo '<input type="hidden" name="e1_'.$ligne.'" value="'.$resultats2['equipe_dom_id'].'" >';
				echo '<input type="hidden" name="e2_'.$ligne.'" value="'.$resultats2['equipe_vis_id'].'" >';
				echo '<td>'.$resultats2['equi1'].' - '.$resultats2['equi2'].'</td>';
				echo '<td><b><input type="text" size ="2" maxlength="2" name="but_dom'.$ligne.'" required /></td>';
				echo '<td> - </td>';
				echo '<td><input type="text" size ="2" maxlength="2" name="but_vis'.$ligne.'" required /></td></b>';
				echo '</tr>';
				$ligne++;					
			}
			$reponse2->closeCursor(); 
			
			echo '</table>';
			echo '<br>';
			echo '<input type="reset" value="Annuler" />&nbsp;&nbsp;';
			echo '<input type="submit" value="Enregistrer" />'; 	
			echo '</form>';
				
	}
	?>
		
</div>		
	
</body>
</html> 
