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

			if ((isset($_POST['journee_dispo'])) && (isset($_POST['journee_new'])))
			{
				echo '<center>';
				echo '<p class="nok">Vous ne pouvez pas à la fois sélectionner une date existante et créer une nouvelle journée pour un même report !</p>';
				echo '<form id="myform">';
				echo '<input type="button" value="Retour" onclick="history.go(-1)"/>';
				echo '</form>';
				echo '</center>';
			}	
			else
			{
				if (!(isset($_POST['journee_dispo'])) && (!(isset($_POST['journee_new']))))
				{
					echo '<center>';
					echo '<p class="nok">Vous devez au minimum choisir une date pour ce report !</p>';
					echo '<form id="myform">';
					echo '<input type="button" value="Retour" onclick="history.go(-1)"/>';
					echo '</form>';
					echo '</center>';
				}
				else
				{
					
					if ((isset($_POST['journee_new'])))
					{

						$regex_date='#[0-3]{1}\d{1}+[\/]{1}[0-1]{1}\d{1}[\/][2]{1}[0-1]{1}\d{1}\d{1}#'; // date qui doit etre comprise entre 01/01/2000 et 31/12/2199
						
						if (!(preg_match($regex_date, $_POST['journee_new'])))
						{
							echo '<center>';
							echo '<p class="nok">La date saisie n\'est pas conforme !</p>';
							echo '<form id="myform">';
							echo '<input type="button" value="Retour" onclick="history.go(-1)"/>';
							echo '</form>';
							echo '</center>';
						}
						else
						{

								//require_once('../affiche_saison_banniere.php');
								//$saison=AfficheSaisonBanniere(); // fonction qui retourne la saison en cours format "aaaa/aaaa"
								//AjoutJourneesBase($tab_journees, $saison, 'false') // fonction qui permet d'ajouter une journée dans la base
								echo '<center>';
								echo '<p class="ok">BRAVO</p>';
								echo '<form id="myform">';
								echo '<input type="button" value="Retour" onclick="history.go(-1)"/>';
								echo '</form>';
								echo '</center>';
								//$suppr_match='DELETE FROM matchs WHERE ID_match='.$match_id.' ';
			   					//$bdd->exec($suppr_match);	

						}	

					}
				}

			}

?>	
		
	</section>
	<?php include ('../footer.php'); ?>
</div>
</body>
</html>	
