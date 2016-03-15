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

$nb_ligne=$_POST['nb_report'];

echo '<p>On denombre '.$nb_ligne.' report(s) de match(s)</p>';

for ($ligne=0; $ligne < $nb_ligne; $ligne++)
{
			$num_match=$ligne+1;
			$equipe_dom_id=$_POST['equipe_dom_id_'.$ligne];
			$equipe_vis_id=$_POST['equipe_vis_id_'.$ligne];
			$equipe_dom=$_POST['equipe_dom_'.$ligne];
			$equipe_vis=$_POST['equipe_vis_'.$ligne];
			$match_id=$_POST['match_id_'.$ligne];

			echo '<p><u>Match reporté N° '.$num_match.'</u> :<b> '.$equipe_dom.' (id: '.$equipe_dom_id.') - '.$equipe_vis.'  (id: '.$equipe_vis_id.').</b></p>'; 

			if (!(empty($_POST['journee_dispo_'.$ligne])) && (!(empty($_POST['journee_new_'.$ligne]))))
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
				if ((empty($_POST['journee_dispo_'.$ligne])) && (empty($_POST['journee_new_'.$ligne])))
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
					
					if (!(empty($_POST['journee_new_'.$ligne])))
					{

						$regex_date='#[0-3]{1}\d{1}+[\/]{1}[0-1]{1}\d{1}[\/][2]{1}[0-1]{1}\d{1}\d{1}#'; // date qui doit etre comprise entre 01/01/2000 et 31/12/2199
						
						if (!(preg_match($regex_date, $_POST['journee_new_'.$ligne])))
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
								 echo '<p> recap:</p>';
								 echo $_POST['journee_new_'.$ligne];

								//AjoutJourneesBase($tab_journees, $saison, 'false') // fonction qui permet d'ajouter une journée dans la base
								//$suppr_match='DELETE FROM matchs WHERE ID_match='.$match_id.' ';
			   					//$bdd->exec($suppr_match);	
						
						}	

					}


					$journee_id=$_POST['journee_dispo_'.$ligne];


					if (AjoutMatchJournee($journee_id, $equipe_dom_id, $equipe_vis_id)) // fonction qui permet d'ajouter le match dans la journee
					{
						SupprMatch($match_id); // fonction qui supprime le match dont l'id est passé en parametre
						echo '<p> sera remis le: <b>'.DateJournee($journee_id).'</b></p>';	
					}
					else
					{
						echo '<p class="nok">Opération annulée car au moins une des 2 équipes est déjà enregistrée sur cette journée !! </p>';
						echo '<center>';
						echo '<form id="myform">';
						echo '<input type="button" value="Retour" onclick="history.go(-1)"/>';
						echo '</form>';
						echo '</center>';
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
