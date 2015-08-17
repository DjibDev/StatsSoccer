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
		
		if (isset($_POST['equipe']))
		{
			// tets si la case equipe a suivre a été cochée
			if (isset($_POST['equipe_fav']))
			{
					$favorite=true;
			}
			else
			{
					$favorite=false;
			}
			
			require ('connexion.php');
			
			$ville=$_POST['ville'];
			$stade=$_POST['stade'];
			$ID_equipe=$_POST['equipe'];
			
						
			$req = $bdd->prepare('UPDATE equipes SET ville=?, stade=?, favorite=? WHERE ID_equipe=? ');
			$req->execute(array($ville,$stade,$favorite,$ID_equipe)); 

			echo '<p class="ok">Enregistrement bien effectué !</p>';
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
