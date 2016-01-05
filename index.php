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
	<section>	
		<article>
			
			<h2 align="center">Derniers résultats</h2>

			<?php 
			require ('connexion.php');
			require ('fonctions_utiles_users.php');
			
		$reponse=$bdd->query('SELECT max(date) as DerJ FROM journees WHERE finished=1');
		$result=$reponse->fetch();
		echo '<p align="center"><u>Le '.FormatDateFR($result['DerJ']).'</u></p>';
		echo '<table align="center">';
						
		$reponse2=$bdd->query('SELECT e1.nom equi1, e2.nom equi2, e1.favorite fav1, e2.favorite fav2, equipe_dom_forfait, equipe_dom_penalite, equipe_vis_forfait, equipe_vis_penalite, but_equipe_dom, but_equipe_vis, finished
		FROM matchs, journees, equipes e1, equipes e2
		WHERE date=(SELECT max(date) FROM journees WHERE finished=1)
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
				echo '<tr class="trcolorspecial"><td width="200"><b>'.$resultats2['equi1'].'</b> <i>'.$e1_msg.'</i> - '.$resultats2['equi2'].' <i>'.$e2_msg.'</i></td><td>&nbsp;&nbsp;</td><td align=center>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
			}
			else	
			{
				if  ($resultats2['fav2'] == true)
				{
					echo '<tr class="trcolorspecial"><td width="200">'.$resultats2['equi1'].' <i>'.$e1_msg.'</i> - <b>'.$resultats2['equi2'].'</b> <i>'.$e2_msg.'</i></td>&nbsp;&nbsp;<td></td><td align=center>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
				}	
				else
				{
					echo '<tr><td width="200">'.$resultats2['equi1'].' <i>'.$e1_msg.'</i> - '.$resultats2['equi2'].' <i>'.$e2_msg.'</i></td><td>&nbsp;&nbsp;</td><td align=center>'.$but_dom.'</b> - '.$but_vis.'</td></tr>';
				}
			}		
			
		}
		$reponse2->closeCursor(); 

		
		echo '</table>';
				
			?>
			<br>
			<br>
			<br>
			<br>
			
		</article>	
		<aside>
			<center>
				<br><br>
				<a href="http://jgefoot.com"><img src="images/petit_logo.png"/></a>
				<br><br>
			</center>
		</aside>
	</section>
	<?php include ('footer.php'); ?>
</div>		
		

</body>
</html>
