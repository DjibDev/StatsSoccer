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
	
		
	// mise a jour du classement à domicile
	MAJ_Classement_domicile();
	

	echo '<center><p class="ok">La mise à jour des classements à domicile et extérieur s\'est bien déroulée!</p>';			
	echo '<p><a class="btn" href="administrer.php">Retour</a></p></center>';
?>	


</div>		
	
</body>
</html> 
