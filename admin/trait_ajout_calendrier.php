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
?>	
		
	<section>	

		<?php
		
		if (isset($_POST['equipe1']))
		{
			// test si n'existe pas de doublon matchs pour la journée choisie
			
			require ('fonctions_utiles');
			
			$match=$_POST['equipe1'].'versus'.$_POST['equipe2'];
			$journee_id=$_POST['journee'];
		
			$doublon_match=RechDoublonMatch($journee_id,$match);
						
			if ($doublon_match == true)
			{
				echo '<p class="nok">L\'enregistrement a été annulé, car le match a deja été rentré pour cette journée</p>';
			}
			else
			{ 
				$equipe_dom_id=$_POST['equipe1'];
				$equipe_vis_id=$_POST['equipe2'];
						
				require ('connexion.php');
			
				$stmt = $bdd->prepare("INSERT INTO matchs (equipe_dom_id,equipe_vis_id,journee_id) VALUES (?,?,?)");
				$stmt->bindParam(1, $equipe_dom_id);
				$stmt->bindParam(2, $equipe_vis_id); 
				$stmt->bindParam(3, $journee_id);
				$stmt->execute();

				echo '<p class="ok">Enregistrement bien effectué !</p>';
			}*/
		}
		else
		{
			echo '<p class="nok">Une erreur s\'est produite !</p>';
		}

		?>
	</section>
	
</div>
</body>
</html>	
