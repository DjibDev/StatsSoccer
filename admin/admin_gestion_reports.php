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

	<form method="post" action="admin_gestion_reports.php">	
		<fieldset>
		<Legend>Gestion des reports - étape 1/3</Legend>
			<br>		
			<label for="journee">Sélectionner la date : </label>
			<select required name="journee" id="journee" onchange="submit();">
				<option selected disabled value="">Sélectionnez</option>	
				<?php 
					ResultatsDejaRentres();
				?>
           	</select>
		</fieldset>
		</form>
		
	<?php
	}
	else
	{
			$journee_id=$_POST['journee'];
			
			$reponse2=$bdd->query('SELECT e1.ID_equipe e1_id, e2.ID_equipe e2_id, e1.nom equi1, e2.nom equi2, ID_match
			FROM matchs, equipes e1, equipes e2
			WHERE matchs.journee_id='.$journee_id.'
			AND matchs.equipe_dom_id = e1.ID_equipe
			AND matchs.equipe_vis_id = e2.ID_equipe');
			
			echo '<form method="post" action="trait_gestion_reports.php" id="myform">';
			echo '<fieldset>';
			echo '<Legend>Gestion des reports - étape 2/3</Legend>';	
			echo '<input type="hidden" name="journee_id" value="'.$journee_id.'" />';

			echo '<table border="0">';
			echo '<tr><th width="500">Confrontations</th><th align="center" colspan="2" >Reporté ?</th></tr>';

			$ligne=0;
			
			while ($resultats2=$reponse2->fetch())
			{	
				
				echo '<tr>';
				echo '<input type="hidden" name="match_'.$ligne.'" value="'.$resultats2['ID_match'].'" >';
				echo '<td>'.$resultats2['equi1'].' - '.$resultats2['equi2'].'</td>';
				echo '<input type="hidden" name="e1_'.$ligne.'" value="'.$resultats2['equi1'].'" >';
				echo '<input type="hidden" name="e2_'.$ligne.'" value="'.$resultats2['equi2'].'" >';
				echo '<input type="hidden" name="e1_id_'.$ligne.'" value="'.$resultats2['e1_id'].'" >';
				echo '<input type="hidden" name="e2_id_'.$ligne.'" value="'.$resultats2['e2_id'].'" >';
				echo '<td  align="center"><input type="radio" name="report_'.$ligne.'" value="oui"> Oui</td>';
				echo '<td  align="center"><input type="radio" name="report_'.$ligne.'" value="non" checked > Non</td>';
				echo '</tr>';
				$ligne++;					
			}
			$reponse2->closeCursor(); 

			echo '</table>';
			echo '<br>';
			echo '<center>';
			echo '<input type="button" value="Retour" onclick="history.go(-1)"/>&nbsp;&nbsp;';
			echo '<input type="submit" value="Etape suivante >" />'; 	
			echo '</center>';
			echo '</fieldset>';
			echo '</form>';
				
	}
	?>

	</section>		
<?php include ('../footer.php'); ?>
</div>		
	
</body>
</html> 
