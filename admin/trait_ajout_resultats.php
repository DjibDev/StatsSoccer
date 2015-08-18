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
				
				/*echo $journee_id;
				echo $equipe_dom_id;
				echo $equipe_vis_id;
				echo $but_equipe_dom;
				echo $but_equipe_vis;*/
				
				
								
			$req = $bdd->prepare('UPDATE matchs SET but_equipe_dom=?, but_equipe_vis=? 
			WHERE journee_id=? 
			AND equipe_dom_id=? 
			AND equipe_vis_id=? ');
			$req->execute(array($but_equipe_dom, $but_equipe_vis,$journee_id,$equipe_dom_id,$equipe_vis_id));
			
			}
			
			echo '<p class="ok">Enregistrement bien effectué !</p>';
			echo '<center><p>Souhaitez-vous rentrer d\'autres scores ? </p>';
			echo '<p><a class="btn" href="admin_resultats.php">Oui</a> - <a class="btn" href=administrer.php>Non</a></p></center>';
	
		?>
	</section>
	
</div>
</body>
</html>	
