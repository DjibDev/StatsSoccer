<html>

<head>
	<title>Les stats des loisirs</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style_admin.css"/>
</head>

<body>
	
<div id="bloc_page">
<?php
	include('banniere_menu.php');

	require ('MAJ_Classement.php');
	MAJ_Classement_domicile();

	echo '<p class=ok>Mise à jour du classement à domicile bien realisée</p>';

?>

</body>
</html>
