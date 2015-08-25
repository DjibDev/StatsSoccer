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

		if (isset($_POST['pseudo']))
		{
			require ('connexion.php');
			require ('fonctions_utiles.php');
			require ('creation_fiche_stats.php');
			
			$nom=$_POST['nom'];
			$nom=strtoupper($nom);
			$prenom=$_POST['prenom'];
			$pseudo=$_POST['pseudo'];
			$birthday=$_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];
			$email=$_POST['user_email'];
			$poste=$_POST['poste'];
			$num_maillot=$_POST['num_maillot'];
			
							
			$stmt = $bdd->prepare("INSERT INTO effectif (pseudo, nom, prenom, birthday, email, poste, num_maillot) VALUES (?,?,?,?,?,?,?) ");
			$stmt->bindParam(1, $pseudo);
			$stmt->bindParam(2, $nom);
			$stmt->bindParam(3, $prenom); 
			$stmt->bindParam(4, $birthday); 
			$stmt->bindParam(5, $email); 
			$stmt->bindParam(6, $poste); 
			$stmt->bindParam(7, $num_maillot); 
			$stmt->execute();
			
			//recupere l'id_joueur tout juste créé
			$id_player=$bdd->lastInsertId();
						
			//appel de la fonction qui permet de creer la structure de la fiche stats du joueur
			CreerFicheStatsPlayer($id_player);
			
			echo '<p class="ok">Enregistrement bien effectué !</p>';
			echo '<center><p>Souhaitez-vous rajouter un joueur ? </p>';
			echo '<p><a class="btn" href="admin_ajout_player.php">Oui</a> - <a class="btn" href=administrer.php>Non</a></p></center>';
		}
		else
		{
			echo '<p class="nok">Une erreur s\'est produite !</p>';
			echo '<p><a class="btn" href="administrer.php">Retour</a></p>';
		}
		?>
	</section>
	
</div>
</body>
</html>	
