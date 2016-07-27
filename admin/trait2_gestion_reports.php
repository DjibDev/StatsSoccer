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
						$verif_date= FormatDateSaisie($_POST['journee_new_'.$ligne]);// fontion qui permet de vérifier la saisie de la date jj/mm/aaaa
						
						if (!($verif_date))
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
								$coupe=0;
								$date=$_POST['journee_new_'.$ligne];


								//fonction qui va permettre d'ajouter une nouvelle journee si celle ci n'existe pas déja, et retourne l'ID de la journée créée
								$journee_id=CreerJournee($date,$coupe);	
								echo $journee_id;

								if ($journee_id != null)	
								{	
									$insert_m = $bdd->prepare("INSERT INTO matchs (equipe_dom_id, equipe_vis_id, coupe, journee_id) VALUES (?,?,?,?)");
									$insert_m->bindParam(1, $equipe_dom_id);
									$insert_m->bindParam(2, $equipe_vis_id);
									$insert_m->bindParam(3, $coupe);
									$insert_m->bindParam(4, $journee_id);
									$insert_m->execute();

									echo '==> sera remis le: <b>'.DateJournee($journee_id).'</b></p>';	

									SupprMatch($match_id); // fonction qui supprime le match dont l'id est passé en parametre
								}
								else
								{
									echo '<center>';
									echo '<p class="nok">La date saisie existe déjà en base !</p>';
									echo '<form id="myform">';
									echo '<input type="button" value="Retour" onclick="history.go(-1)"/>';
									echo '</form>';
									echo '</center>';
								}	
						
						}	

					}
					else
					{	

						$journee_id=$_POST['journee_dispo_'.$ligne];
						$coupe=0;
						
						if (AjoutMatchJournee($journee_id, $equipe_dom_id, $equipe_vis_id, $coupe))// fonction qui permet d'ajouter le match dans la journee
						{
							$insert_m = $bdd->prepare("INSERT INTO matchs (equipe_dom_id, equipe_vis_id, coupe, journee_id) VALUES (?,?,?,?)");
							$insert_m->bindParam(1, $equipe_dom_id);
							$insert_m->bindParam(2, $equipe_vis_id);
							$insert_m->bindParam(3, $coupe);
							$insert_m->bindParam(4, $journee_id);
							$insert_m->execute();
							SupprMatch($match_id); // fonction qui supprime le match dont l'id est passé en parametre
							echo '==> sera remis le: <b>'.DateJournee($journee_id).'</b></p>';		
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

}			
			
?>	
	
	</section>
	<?php include ('footer.php'); ?>
</div>
</body>
</html>	
