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
	require('MAJ_Classement.php');
	
	// la mise a jour du classement général est traité dans la validation des résultats de la journée
				
	echo '<center><p class="nok">La mise à jour des classements s\'est correctement déroulée!</p>';
	echo '<p><a class="btn" href="administrer.php">Retour</a></p></center>';
	
	// mise a jour du classement à domicile
	MAJ_Classement_exterieur();
	MAJ_Classement_domicile();

?>	


</div>		
	
</body>
</html> 
