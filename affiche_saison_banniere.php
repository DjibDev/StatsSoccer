<?php

function AfficheSaisonBanniere()
{

	require ('connexion.php');

	try
      {
      			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    			$req_saison=$bdd->query('SELECT saison 
				FROM journees 
				WHERE ID_journee= (SELECT MIN(ID_journee) FROM journees)');

				while ($num_saison=$req_saison->fetch())
				{
					$saison=$num_saison['saison'];
				}	
				$req_saison->CloseCursor();

      }
      
    catch(Exception $e)
     {
            $saison=null;
     }
	
		
	return $saison;
}

?>
