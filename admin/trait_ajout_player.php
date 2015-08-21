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
			$filename='..\stats_files\players\stats_player_'.$nom.'.php';
									
			$stmt = $bdd->prepare("INSERT INTO effectif (nom,prenom,birthday,poste,num_maillot) VALUES (?,?,?,?,?)");
			$stmt->bindParam(1, $nom);
			$stmt->bindParam(2, $prenom); 
			$stmt->bindParam(3, $birthday); 
			$stmt->bindParam(4, $poste); 
			$stmt->bindParam(5, $num_maillot); 
			$stmt->execute();
			
			//appel de la fonction qui permet de créer le fichier stat du joueur tout juste ajouté
			$fichier = fopen($filename,"w+"); 
			
			echo $filename;
			echo '<p class="ok">Enregistrement bien effectué !</p>';
			echo '<center><p>Souhaitez-vous rajouter un joueur ? </p>';
			echo '<p><a class="btn" href="admin_ajout_player.php">Oui</a> - <a class="btn" href=administrer.php>Non</a></p></center>';
		}
		else
		{
			echo '<p class="nok">Une erreur s\'est produite !</p>';
			echo '<p><a class="btn" href="admin_calendrier.php">Retour</a></p>';
		}
		?>
	</section>
	
</div>
</body>
</html>	
