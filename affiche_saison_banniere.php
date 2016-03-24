<?php

function AfficheSaisonBanniere()
{
	$mysqlDatabaseName ='stats';
	$mysqlUserName ='root';
	$mysqlPassword ='root';
	$mysqlHostName ='localhost';
	$mysqlImportFilename ='../database/stats.sql';

	$command='mysql -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' < ' .$mysqlImportFilename;
	exec($command,$output=array(),$worked);
	switch($worked)
	{
		case 0:
				$req_saison=$bdd->query('SELECT saison 
				FROM journees 
				WHERE ID_journee= (SELECT MIN(ID_journee) FROM journees)');

				while ($num_saison=$req_saison->fetch())
				{
					$saison=$num_saison['saison'];
				}	
				$req_saison->CloseCursor();
		break;		

		case 1:	$saison=null;
		break;

	}
	
	return $saison;
}

?>
