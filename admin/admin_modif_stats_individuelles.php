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
	if (!(isset($_POST['player'])))
	{
		echo '<form method="post" action="admin_modif_stats_individuelles.php" id="myform">';
		echo '<fieldset>';
		echo '<Legend> Modifier les stats d\'un joueur</Legend>';		
		echo '<label for="player">Joueur : </label>';
		echo '<select required name="player" id="player" onchange="submit()">';
		echo '<option selected disabled value="">Sélectionnez</option>';
									
				$req_pl=$bdd->query('SELECT * FROM effectif ORDER BY nom ASC');
	
				while ($result_pl=$req_pl->fetch())
				{
					echo '<option value="'.$result_pl['ID_joueur'].'">'.$result_pl['pseudo'].' </option>';
			
				}
			
				$req_pl->closeCursor();
				

        echo '</select>';
        echo '</fieldset>';
        echo '</form>';

     }
     else
     {		
    		$player_id=$_POST['player'];
 			$pseudo=RetournePseudo($player_id);

 			echo '<form method="post" action="trait_modif_stats_individuelles.php" id="myform">';
			echo '<fieldset>';
			echo '<Legend>Modifications des stats de <b>'.$pseudo.'</b> </Legend>';
			echo '<input type="hidden" name="pseudo_id" value="'.$player_id.'">';
			echo '<br>';
        	echo '<label for="journee">Journée : </label>';
			echo '<select name="journee_test" onchange="submit()">';
			echo '<option selected disabled value="">Sélectionnez</option>';
			
				$req_j=$bdd->query('SELECT *
									FROM stats_individuelles, journees
									WHERE joueur_id ='.$player_id.'
									AND stats_individuelles.journee_id = journees.ID_journee
									ORDER BY date ASC ');

				$type_journee='';
	
				while ($result_j=$req_j->fetch())
				{
					if ($result_j['coupe'] == false)
					{
						$type_journee='championnat';
					}
					else
					{
						$type_journee='coupe';
					}	

					$date_fr=FormatDateFR($result_j['date']);
					
					echo '<option value="'.$result_j['ID_journee'].'">Journée de '.$type_journee.' N°'.$result_j['numero'].' le '.$date_fr.'</option>';
				
				}
				$req_j->closeCursor();
				
			echo '</select>';
        	echo '<br><br>';
        	echo '<center>';
        	echo '<input type="button" value="Retour" onclick="history.go(-1)"/>';
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