<html>
	<head>
		<title>Les statistiques</title>
		<link rel="stylesheet" href="style_base.css"/>
		<meta charset="utf-8" />
		
	</head>
	
<body>
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
