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

		if (isset($_POST['nom_club']))
		{
			require ('connexion.php');
			
			$nom_club=$_POST['nom_club'];
			$ville=$_POST['ville'];
			$stade=$_POST['stade'];
			
									
			$stmt = $bdd->prepare("INSERT INTO equipes (nom,ville,stade) VALUES (?,?,?)");
			$stmt->bindParam(1, $nom_club);
			$stmt->bindParam(2, $ville); 
			$stmt->bindParam(3, $stade);
			$stmt->execute();
			
			echo '<p class="ok">Enregistrement bien effectué !</p>';
			echo '<br>';
			echo '<p>Récapitulatif : </p>';
			echo '<p>'.$nom_club.'</p>';
			echo '<p>'.$ville.'</p>';
			echo '<p>'.$stade.'</p>';
			
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
