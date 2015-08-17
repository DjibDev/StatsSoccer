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
		
		if (isset($_POST['player']))
		{
				
			require ('connexion.php');
			
			$ID_joueur=$_POST['player'];	
						
			$req = $bdd->prepare('DELETE FROM effectif WHERE ID_joueur=? ');
			$req->execute(array($ID_joueur)); 

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
