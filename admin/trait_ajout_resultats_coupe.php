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

		require ('connexion.php');
			
		$journee_id=$_POST['journee_id'];
			
		for ($ligne=0; $ligne < 10;$ligne++)
		{
				
			$equipe_dom_id=$_POST['e1_'.$ligne];
			$equipe_vis_id=$_POST['e2_'.$ligne];
			$but_equipe_dom=$_POST['but_dom'.$ligne];
			$but_equipe_vis=$_POST['but_vis'.$ligne];
							
			// ajout dans la table matchs des résultats									
			$req = $bdd->prepare('UPDATE matchs SET but_equipe_dom=?, but_equipe_vis=?, coupe= "1" 
			WHERE journee_id=? 
			AND equipe_dom_id=? 
			AND equipe_vis_id=? ');
			$req->execute(array($but_equipe_dom, $but_equipe_vis,$journee_id,$equipe_dom_id,$equipe_vis_id));
			
			// mise a jour de la table journees, pour passer la journee en cours en 'finished'
			$req4 = $bdd->prepare('UPDATE journees SET finished=1 
			WHERE ID_journee=?
			AND coupe = "1" ');
			$req4->execute(array($journee_id));
				
			// tratement pour l'équipe a domicile
				
			$equipe_id=$equipe_dom_id;
			$buts_pour=$but_equipe_dom;
			$buts_contre=$but_equipe_vis;
			$diff=$buts_pour-$buts_contre;
			$domicile=true;
			
			if ($diff > "O")
			{
				$victoire=true;
				$nul=false;
				$defaite=false;
				$points=4;
			}
			else
			{
				if ($diff == "0")
				{
					$victoire=false;
					$nul=true;
					$defaite=false;
					$points=2;
				}
				else
				{
					
					$victoire=false;
					$nul=false;
					$defaite=true;
					$points=1;
				}	
			}
			
			$req2 = $bdd->prepare("INSERT INTO stats_collectives_coupe (victoire,defaite,nul,buts_pour,buts_contre,diff,points,domicile,journee_id,equipe_id) 
			VALUES (?,?,?,?,?,?,?,?,?,?)");
			$req2->bindParam(1, $victoire);
			$req2->bindParam(2, $defaite); 
			$req2->bindParam(3, $nul);
			$req2->bindParam(4, $buts_pour);
			$req2->bindParam(5, $buts_contre); 
			$req2->bindParam(6, $diff);
			$req2->bindParam(7, $points);
			$req2->bindParam(8, $domicile); 
			$req2->bindParam(9, $journee_id);
			$req2->bindParam(10, $equipe_id);
			$req2->execute();
			
			
		
			// traitement pour equipe visiteur
			
			$equipe_id=$equipe_vis_id; 
			$buts_pour=$but_equipe_vis;
			$buts_contre=$but_equipe_dom;
			$diff=$buts_pour-$buts_contre;
			$domicile=false;
			
			if ($diff > "O")
			{
				$victoire=true;
				$nul=false;
				$defaite=false;
				$points=4;
			}
			else
			{
				if ($diff == "0")
				{
					$victoire=false;
					$nul=true;
					$defaite=false;
					$points=2;
				}
				else
				{
					$victoire=false;
					$nul=false;
					$defaite=true;
					$points=1;
				}	
			}
			
			
			$req3 = $bdd->prepare("INSERT INTO stats_collectives_coupe (victoire,defaite,nul,buts_pour,buts_contre,diff,points,domicile,journee_id,equipe_id) 
			VALUES (?,?,?,?,?,?,?,?,?,?)");
			$req3->bindParam(1, $victoire);
			$req3->bindParam(2, $defaite); 
			$req3->bindParam(3, $nul);
			$req3->bindParam(4, $buts_pour);
			$req3->bindParam(5, $buts_contre); 
			$req3->bindParam(6, $diff);
			$req3->bindParam(7, $points);
			$req3->bindParam(8, $domicile); 
			$req3->bindParam(9, $journee_id);
			$req3->bindParam(10, $equipe_id);
			$req3->execute();

		}
				
		echo '<p class="ok">Enregistrement bien effectué !</p>';
		echo '<center><p>Souhaitez-vous rentrer d\'autres scores ? </p>';
		echo '<p><a class="btn" href="admin_resultats.php">Oui</a> - <a class="btn" href=administrer.php>Non</a></p>';
	    
		// appel de la fonction MAJ_classement_Coupe, pour générer le nouveau classement	et mettre a jour les classement domicile et extérieur
		require_once ('MAJ_Classement.php');
		MAJ_Classement_Coupe();
		
		?>
		
		
	</section>
	
</div>
</body>
</html>	
