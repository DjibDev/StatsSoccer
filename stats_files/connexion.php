<?php
			try
			{
			$bdd = new PDO('mysql:host=localhost;dbname=stats;charset=utf8','root', 'root');
			}
			catch (Exception $e)
			{
			die('Erreur détectée lors de la connexion à la base: ' . $e->getMessage());
			}
?>			
