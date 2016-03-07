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

		for ($ligne=0; $ligne < 10; $ligne++)
		{	
			$report=$_POST['report_'.$ligne]; 

			if ($report == "oui")   // si la case oui a été cochée pour ce match alors on traite le report
			{	
				$match_id=$_POST['match_'.$ligne];
				$equipe_dom=$_POST['e1_'.$ligne];
				$equipe_vis=$_POST['e2_'.$ligne];

			    $suppr_match = $bdd->query('DELETE FROM matchs WHERE ID_match=?';
			    $suppr_match->exec(array($match_id));	


			}	
		}

	?>	
		
	</section>
	<?php include ('../footer.php'); ?>
</div>
</body>
</html>	
