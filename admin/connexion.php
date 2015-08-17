<?php
			try
			{
			$bdd = new PDO('mysql:host=localhost;dbname=stats;charset=utf8','root', 'root');
			}
			catch (Exception $e)
			{
			die('Erreur détectée: ' . $e->getMessage());
			}
?>			
