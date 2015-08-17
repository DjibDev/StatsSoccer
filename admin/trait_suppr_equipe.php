<html>
	<head>
		<title>Les statistiques</title>
		<link rel="stylesheet" href="style_admin.css"/>
		<meta charset="utf-8" />
		
	</head>
	
<body>	
<?php
	include('banniere_menu.php');
?>	
		
	<section>	

		<?php
		
		if (isset($_POST['equipe']))
		{
				
			require ('connexion.php');
			
			$ID_equipe=$_POST['equipe'];	
						
			$req = $bdd->prepare('DELETE FROM equipes WHERE ID_equipe=? ');
			$req->execute(array($ID_equipe)); 

			echo '<p class="ok">Suppression bien effectuée!</p>';
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
