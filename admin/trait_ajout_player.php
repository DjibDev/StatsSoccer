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

		if (isset($_POST['nom']))
		{
			require ('connexion.php');
			
			$nom=$_POST['nom'];
			$nom=strtoupper($nom);
			$prenom=$_POST['prenom'];
			$birthday=$_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];
			$poste=$_POST['poste'];
			$num_maillot=$_POST['num_maillot'];
									
			$stmt = $bdd->prepare("INSERT INTO effectif (nom,prenom,birthday,poste,num_maillot) VALUES (?,?,?,?,?)");
			$stmt->bindParam(1, $nom);
			$stmt->bindParam(2, $prenom); 
			$stmt->bindParam(3, $birthday); 
			$stmt->bindParam(4, $poste); 
			$stmt->bindParam(5, $num_maillot); 
			$stmt->execute();
			
			echo '<p class="ok">Enregistrement bien effectué !</p>';
			echo '<br>';
			echo '<p>Récapitulatif : </p>';
			echo '<p>'.$nom.'</p>';
			echo '<p>'.$prenom.'</p>';
			echo '<p>'.$birthday.'</p>';
			echo '<p>'.$poste.'</p>';
			echo '<p>'.$num_maillot.'</p>';
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
