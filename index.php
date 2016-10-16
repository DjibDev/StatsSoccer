<html>

<head>
	<title>Les stats des loisirs</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style_base.css"/>
</head>

<body>
	
<div id="bloc_page">
<?php
	include('banniere_menu.php');
?>	
		<article>
	<?php
	require ('connexion.php');
	require ('fonctions_utiles_users.php');
	?>
			
		<?php 
	
		
		echo '<h2 align="center">Derniers résultats</h2>';

		$req_lastJ=$bdd->query('SELECT MAX(date) as DerJ FROM journees WHERE finished=1');
	
		
		// si la derniere journee etait une journée coupe alors je vais chercher les résultats dans la table equipe_coupe, par defaut c'est equipe (championnat)
		while ($result=$req_lastJ->fetch()) {	
				$date_der=($result['DerJ']);
				$der_res=FormatDateFR($result['DerJ']);
			}
			$req_lastJ->CloseCursor();
			
		$req_lastJ2=$bdd->query('SELECT coupe FROM journees WHERE finished=1 AND date="'.$date_der.'" ');	
			
		while ($res=$req_lastJ2->fetch()) {	
				$coupe=$res['coupe'];
			}
			$req_lastJ2->CloseCursor();	
			
			if ($coupe)
			{
				$type_compet="_coupe";	
				$aff_compet="coupe";
			}	
			else
			{
					$type_compet="";
					$aff_compet="championnat";
			}

	if ($der_res != '01/01/1970')
	{
								
				echo '<p align="center"><u><b>En '.$aff_compet.' le '.$der_res.'</b></u></p>';
				echo '<table align="center">';
						
			$reponse2=$bdd->query('SELECT e1.nom equi1, e2.nom equi2, e1.favorite fav1, e2.favorite fav2, equipe_dom_forfait, equipe_dom_penalite, equipe_vis_forfait, equipe_vis_penalite, but_equipe_dom, but_equipe_vis, finished
			FROM matchs, journees, equipes'.$type_compet.' e1, equipes'.$type_compet.' e2
			WHERE date=(SELECT MAX(date) FROM journees WHERE finished=1)
			AND journees.ID_journee=matchs.journee_id
			AND matchs.equipe_dom_id = e1.ID_equipe
			AND matchs.equipe_vis_id = e2.ID_equipe');
	
		while ($resultats2=$reponse2->fetch())
		{
			
				$but_dom=$resultats2['but_equipe_dom'];
				$but_vis=$resultats2['but_equipe_vis'];
			
			
			if ($resultats2['equipe_dom_forfait'] == true)
			{
				$e1_msg='<b>(forfait)</b>.';
			}
			else
			{
				if ($resultats2['equipe_dom_penalite'] == true)
				{
					$e1_msg='<b>(Pénalité)</b>.';
				}
				else
				{
					$e1_msg='';
				}
			}		
				
			if 	($resultats2['equipe_vis_forfait'] == true)
			{
				$e2_msg='<b>(forfait)</b>.';
			}
			else
			{
				if ($resultats2['equipe_vis_penalite'] == true)
				{
					$e2_msg='<b>(Pénalité)</b>.';
				}
				else
				{
					$e2_msg='';
				}	
			}	
			
				
			if ($resultats2['fav1'] == true)
			{
				echo '<tr class="trcolorspecial"><td width="400"><b>'.$resultats2['equi1'].'</b> <i>'.$e1_msg.'</i> - '.$resultats2['equi2'].' <i>'.$e2_msg.'</i></td><td>&nbsp;&nbsp;</td><td align=center>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
			}
			else	
			{
				if  ($resultats2['fav2'] == true)
				{
					echo '<tr class="trcolorspecial"><td width="400">'.$resultats2['equi1'].' <i>'.$e1_msg.'</i> - <b>'.$resultats2['equi2'].'</b> <i>'.$e2_msg.'</i></td>&nbsp;&nbsp;<td></td><td align=center>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
				}	
				else
				{
					echo '<tr><td width="400">'.$resultats2['equi1'].' <i>'.$e1_msg.'</i> - '.$resultats2['equi2'].' <i>'.$e2_msg.'</i></td><td>&nbsp;&nbsp;</td><td align=center>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
				}
			}		
			
		}
		$reponse2->closeCursor(); 

		
		echo '</table>';
	}
	else {
			echo '<p align="center"><b><i>Information non communiquée</b></i></p>';
	}
		echo '<br>';
		
		echo '<h2 align="center">Matchs à venir</h2>';
		
		$req_proJ=$bdd->query('SELECT MIN(date) as ProJ FROM journees WHERE finished=0');

			while ($result2=$req_proJ->fetch()) {	
				$date_venir=$result2['ProJ'];
				$match_venir=FormatDateFR($result2['ProJ']);
			}
			$req_proJ->CloseCursor();
		
		$req_proJ2=$bdd->query('SELECT coupe FROM journees WHERE finished=0 AND date="'.$date_venir.'" ');	
			
			while ($res=$req_proJ2->fetch()) {	
				$coupe=$res['coupe'];
			}
			$req_proJ2->CloseCursor();	
				
			
			if ($coupe == 1)
			{
				$type_compet2="_coupe";	
				$aff_compet2="coupe";
			}
			else
			{
				$type_compet2="";
				$aff_compet2="championnat";
			}

	if ($match_venir != '01/01/1970')
	{
		echo '<p align="center"><b><u>En '.$aff_compet2.' le '.$match_venir.'</b></u></p>';
		echo '<table align="center">';
						
		$req2=$bdd->query('SELECT e1.nom equi1, e2.nom equi2, e1.favorite fav1, e2.favorite fav2, finished
		FROM matchs, journees, equipes'.$type_compet2.' e1, equipes'.$type_compet2.' e2
		WHERE date=(SELECT MIN(date) FROM journees WHERE finished=0)
		AND journees.ID_journee=matchs.journee_id
		AND matchs.equipe_dom_id = e1.ID_equipe
		AND matchs.equipe_vis_id = e2.ID_equipe');
	
		while ($resultats=$req2->fetch())
		{
			
			
			if ($resultats['fav1'] == true)
			{
				echo '<tr class="trcolorspecial"><td width="400" align="center"><b>'.$resultats['equi1'].'</b> - '.$resultats['equi2'].'</td></tr>';
			}
			else	
			{
				if  ($resultats['fav2'] == true)
				{
					echo '<tr class="trcolorspecial"><td width="400" align="center">'.$resultats['equi1'].'  - <b>'.$resultats['equi2'].'</b></td></tr>';
				}	
				else
				{
					echo '<tr><td width="400" align="center">'.$resultats['equi1'].' - '.$resultats['equi2'].'</td></tr>';
				}
			}		
			
		}
		$req2->closeCursor(); 

		
		echo '</table>';
	}
	else {
			echo '<p align="center"><b><i>Information non communiquée</b></i></p>';
	}		
			?>
			<br>
	
		</article>	
		<aside>
			<center>
				<br><br>
				<a href="http://www.jgefoot.com"><img src="images/petit_logo.png" title="Site Officiel de la J.G.E Football" /></a>
				<br><br>
				<br><br>
				<a href="http://foot44.fff.fr/competitions/php/championnat/championnat_resultat.php?sa_no=2016&cp_no=329542&ph_no=1&gp_no=9"><img src="images/ballon.png" title="Site Officiel du district de Loire-Atlantique"/></a>
				<br><br>
				<br><br>
			</center>
		</aside>
		<br>
	<?php include ('footer.php'); ?>
</div>		
		

</body>
</html>
