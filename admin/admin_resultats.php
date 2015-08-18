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
	if (!isset($_POST['journee']))
	{
	?>	
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
			
			$reponse2=$bdd->query('SELECT e1.nom equi1, e2.nom equi2, but_equipe_dom, but_equipe_vis 
			FROM matchs, equipes e1, equipes e2
			WHERE matchs.journee_id='.$journee_id.'
			AND matchs.equipe_dom_id = e1.ID_equipe
			AND matchs.equipe_vis_id= e2.ID_equipe');
			
			echo '<form method="post" action="admin_resultats.php">';
			echo '<table border="0" cellspacing="2" >';
		
			while ($resultats2=$reponse2->fetch())
			{	
				echo '<tr><td>'.$resultats2['equi1'].' - '.$resultats2['equi2'].'</td><td><b><input type"text" size ="2" maxlength="2" name="'.$resultats2['but_equipe_dom'].'" required /></td><td> - </td><td><input type="text" size ="2" maxlength="2" name="'.$resultats2['but_equipe_vis'].'" required /></td></b></tr>';
									
			}
			$reponse2->closeCursor(); 
			
			echo '</table>';
			echo '<br>';
			echo '<input type="reset" value="Annuler"/>&nbsp;&nbsp;';
			echo '<input type="submit" value="Enregistrer"/>'; 	
				
	}
	?>	
	</section>
		
</div>		
	
</body>
</html> 
