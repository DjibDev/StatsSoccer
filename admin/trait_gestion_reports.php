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
?>	
	<section>	

<?php	
		$nb_report=0;  // par defaut pas de report de match
		$nb_report=$ligne;
		
		echo '<form method="post" action="trait2_gestion_reports.php" id="myform">';
		echo '<fieldset>';
		echo '<Legend>Gestion des reports - étape 3/3</Legend>';
		echo '<br>';

		echo '<table border="0">';
		echo '<tr><th width="500">Match(s) reporté(s)</th><th>Dates disponibles</th><th width="50"></th><th width="50">Nouvelle date</th></tr>';

		$nb_report=0;  // par defaut pas de report de match

		for ($ligne=0; $ligne < 10; $ligne++)
		{	
			$report=$_POST['report_'.$ligne]; 

			if ($report == "oui")   // si la case oui a été cochée pour ce match alors on traite le report
			{	
				$match_id=$_POST['match_'.$ligne];
				$equipe_dom=$_POST['e1_'.$ligne];
				$equipe_vis=$_POST['e2_'.$ligne];
				$equipe_dom_id=$_POST['e1_id_'.$ligne];
				$equipe_vis_id=$_POST['e2_id_'.$ligne];
				
				echo '<tr>';
				echo '<td>'.$equipe_dom.' - '.$equipe_vis.'</td>';	
				echo '<input type="hidden" name="equipe_dom_'.$ligne.'" value="'.$equipe_dom.'">';	
				echo '<input type="hidden" name="equipe_vis_'.$ligne.'" value="'.$equipe_vis.'">';
				echo '<input type="hidden" name="equipe_dom_id_'.$ligne.'" value="'.$equipe_dom_id.'">';	
				echo '<input type="hidden" name="equipe_vis_id_'.$ligne.'" value="'.$equipe_vis_id.'">';		
				echo '<input type="hidden" name="match_id_'.$ligne.'" value="'.$match_id.'">';	
				echo '<td><select name="journee_dispo_'.$ligne.'" id="journee">';
				echo '<option selected disabled value="">Sélectionnez</option>';	
				NbrMatchAtteint(); // cette fonction permet d'afficher uniquement les journées incompletes
           		echo '</select></td>';
           		echo '<td></td>';
           		echo '<td><input type="text" size=8 name="journee_new_"'.$ligne.'" id="journee_new"></td>';
           		echo '<tr>';
           		$nb_report++;
			}
		}		
		
		echo '</table>';
		echo '<br>';
		echo '<center>';
		echo '<input type="hidden" name="nb_report" value="'.$nb_report.'" >';
		echo '<input type="button" value="Retour" onclick="history.go(-1)"/>&nbsp;&nbsp;';
		echo '<input type="reset" value="Annuler les sélections"/>&nbsp;&nbsp;';
		echo '<input type="submit" value="Valider" />'; 	
		echo '</center>';
		echo '</fieldset>';
		echo '</form>';

?>	
		
	</section>
	<?php include ('../footer.php'); ?>
</div>
</body>
</html>	
