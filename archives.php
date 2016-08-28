<html>

<head>
	<title>Les stats des loisirs</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style_base.css"/>
</head>

<body>
	
<div id="bloc_page">
<?php
	include('banniere_menu.php');

?>	
		

<section>	
	<center>
	<h2>Archives</h2>
	<?php
	require('connexion.php');
	require('fonctions_utiles_users.php');

	$repertoire="archives";
	$etat=EtatDuRepertoire($repertoire);
    if ($etat == true)
	{
		AfficheArchives();
	}
	else{
		echo "Aucune archive disponible";
	}
	?>    
		
		</center>				
	</section>
		<?php include ('footer.php'); ?>
	

</body>
</html>
