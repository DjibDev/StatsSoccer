<html>
	<head>
	<title>Les statistiques</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style_base.css"/>
	</head>

<body>
	<p>Veuillez entrer le mot de passe pour obtenir les droits d'administation</p>

	<form action="administrer.php" method="post">
	<p>
		<input type="password" name="mot_de_passe" />
		<input type="submit" value="Valider" />
	</p>
	</form>

		<?php
		if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] == "djibdev")
		{
			echo '<p class="ok">Mot de passe correct</p>';
		}
		
		else
		{
			echo '<p class="nok">Mot de passe incorrect !</p>';
		}
		?>
</body>
</html> 
