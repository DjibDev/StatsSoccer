<?php
		require ('connexion.php');

		echo '<h2 align="center">Classements individuels</h2>';
		
		echo '<table align="center">';  // super tableau qui englobe les sous tableaux
		echo '<tr><td>';

		echo '<table>';
		echo '<tr><th colspan="3">Classement - Buteurs</th></tr>';
		
		$req_but=$bdd->query('SELECT pseudo, nb_buts 
		FROM classement_players, effectif
		WHERE classement_players.joueur_id = effectif.ID_joueur
		AND nb_buts > "0"
		ORDER BY nb_buts DESC, pseudo ASC ');

		$x=1; // variable qui servira a faire l'atrernance de couleur des lignes du tableau
		$position='1'; // variable qui permettra d'afficher dans le tableau la position du buteur
		$indice=0; // varibale qui va permettre de compltetr notre tableau
		$class_buteurs=Array(); // le tableau permettra de dire s'il existe des egalités
		$nb_buts_current=0; // valeur de comparaison
		
		while ($aff_but=$req_but->fetch())
		{
			
			$nb_buts_current=$aff_but['nb_buts'];
			// mise en tableau des résultats pour traitement ultérieur
			
			if (in_array($nb_buts_current, $class_buteurs))
			{
				$position='-';
			}	
			else
			{
				$position=strval($x); // permet de caster la variable qui est un integer en string
			}	

			$altern=$x % 2;

			$class_buteurs[$indice]=$aff_but['nb_buts'];  // remplit le tableau de l'element suivant

			echo '<tr class=trcolor'.$altern.'>';
			echo '<td width="50" align="center">'.$position.'</td>';
			echo '<td width="100"><b>';
			echo utf8_decode($aff_but['pseudo']);
			echo '</b></td>';
			echo '<td width="50" align="center"><b>'.$nb_buts_current.'</b></td></tr>';

			$x++;
			$indice++;
	
		}
		$req_but->closeCursor();

		echo '</table>';

		echo '</td>';
		echo '<td width="100"></td>';
		echo '<td>';

		echo '<table>';
		echo '<tr><th colspan="3">Classement - Passeurs</th></tr>';
				
		$req_pass=$bdd->query('SELECT pseudo, nb_passes
		FROM classement_players, effectif 
		WHERE classement_players.joueur_id = effectif.ID_joueur
		AND nb_passes > "0"
		ORDER BY nb_passes DESC, pseudo ASC ');
		
		$x=1; // variable qui servira a faire l'atrernance de couleur des lignes du tableau
		$position='1'; // variable qui permettra d'afficher dans le tableau la position du joueur
		$indice=0; // varibale qui va permettre de compltetr notre tableau
		$class_passeurs=Array(); // le tableau permettra de dire s'il existe des egalités
		$nb_pass_current=0; // valeur de comparaison
		
		while ($aff_pass=$req_pass->fetch())
		{
			
			$nb_pass_current=$aff_pass['nb_passes'];
			// mise en tableau des résultats pour traitement ultérieur
			
			if (in_array($nb_pass_current, $class_passeurs))
			{
				$position='-';
			}	
			else
			{
				$position=strval($x);
			}	

			$altern=$x % 2;

			$class_passeurs[$indice]=$aff_pass['nb_passes']; // remplit le tableau de l'element suivant

			echo '<tr class=trcolor'.$altern.'>';
			echo '<td width="50" align="center">'.$position.'</td>';
			echo '<td width="100"><b>';
			echo utf8_decode($aff_pass['pseudo']);
			echo '</b></td>';
			echo '<td width="50" align="center"><b>'.$nb_pass_current.'</b></td></tr>';

			$x++;
			$indice++;
	
		}
		$req_pass->closeCursor();
		
		echo '</table>';

		echo '</td>';
		echo '<td width="100"></td>';
		echo '<td>';

		echo '<table>';
		echo '<tr><th colspan="3">Classement - Faits de match</th></tr>';

				
		$req_faits=$bdd->query('SELECT pseudo, nb_faits_marquants
		FROM classement_players, effectif 
		WHERE classement_players.joueur_id = effectif.ID_joueur
		AND nb_faits_marquants > "0"
		ORDER BY nb_faits_marquants DESC, pseudo ASC ');
		
		$x=1; // variable qui servira a faire l'atrernance de couleur des lignes du tableau
		$position='1'; // variable qui permettra d'afficher dans le tableau la position du joueur
		$indice=0; // varibale qui va permettre de compltetr notre tableau
		$class_faits=Array(); // le tableau permettra de dire s'il existe des egalités
		$nb_faits_current=0; // valeur de comparaison
		
		while ($aff_faits=$req_faits->fetch())
		{
			
			$nb_faits_current=$aff_faits['nb_faits_marquants'];
			// mise en tableau des résultats pour traitement ultérieur
			
			if (in_array($nb_faits_current, $class_faits))
			{
				$position='-';
			}	
			else
			{
				$position=strval($x);
			}	

			$altern=$x % 2;

			$class_faits[$indice]=$aff_faits['nb_faits_marquants']; // remplit le tableau de l'element suivant

			echo '<tr class=trcolor'.$altern.'>';
			echo '<td width="50" align="center">'.$position.'</td>';
			echo '<td width="100"><b>';
			echo utf8_decode($aff_faits['pseudo']);
			echo '</b></td>';
			echo '<td width="50" align="center"><b>'.$nb_faits_current.'</b></td></tr>';

			$x++;
			$indice++;
	
		}
		$req_faits->closeCursor();
		
		echo '</table>';

		echo '</td></tr>';
		echo '</table>';   
?>