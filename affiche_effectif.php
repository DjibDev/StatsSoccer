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
	<center>
	<h2>L'effectif... Ses Exploits... Ses Devoirs !</h2>
	<?php
  	
	require ('fonctions_utiles_users.php');
	require ('connexion.php');
	
	$reponse=$bdd->query('SELECT * 
	FROM effectif e
	LEFT JOIN classement_players c
	ON e.ID_joueur = c.joueur_id 
	ORDER BY nb_buts DESC, nb_passes DESC, pseudo ASC');
	
	$x=0;
	$altern=$x % 2;
		
		
	echo '<table style="font-size:1em;" border=2 cellspacing=2 cellspadding=2><tr class=trheadcolor><th>Pseudo</th><th>Age</th><th>Poste</th><th>Buts</th><th>Passes</th><th>CleanSheet</th><th><img src="images/raclette.png"/></th><th><img src="images/maillot.png"/></th><th><img src="images/biere_pression.png"/></th></tr>';
	
	
	while ($resultats=$reponse->fetch())
	{		
			/* le calcul du modulo de "$x" permet d'alterner le resultat : soit "0" soit "1" */
			$altern=$x % 2;
			
			$date_naiss=$resultats['birthday'];
			
			
			if ($date_naiss == "0000-00-00")
			{
					$age="N.C.";
					$birthday_countdown="N.C.";
			}	
			else 
			{
				$age=CalculerAge($date_naiss);
				$birthday_countdown=BirthdayCountdown($date_naiss);
			}
					
			if (($birthday_countdown < 30) || ($birthday_countdown == 366))
			{
				if (($birthday_countdown < 1) || ($birthday_countdown == 366))
				{
					$texte_birthday='<td bgcolor="orange" align="center" width="30"><marquee><b>Jour J !</b></marquee></td>';
				}
				else
				{	
					$texte_birthday='<td align="center" width="30"><marquee><b>J-'.$birthday_countdown.'</b></marquee></td>';
				}	
			}	
			else
			{
				$texte_birthday='<td align="center">J-'.$birthday_countdown.'</td>';
			}	
			
			echo '<tr class=trcolor'.$altern.'>';
			echo '<td>'.$resultats['pseudo'].'</td>';
			echo '<td align="center">'.$age.'</td>';
			echo '<td align="center">'.$resultats['poste'].'</td>';
			echo '<td align="center">'.$resultats['nb_buts'].'</td>';
			echo '<td align="center">'.$resultats['nb_passes'].'</td>'; 
			echo '<td align="center">'.$resultats['nb_cleansheets'].'</td>';
			echo '<td align="center">'.$resultats['nb_vestiaires'].'</td>'; 
			echo '<td align="center">'.$resultats['nb_maillots'].'</td>'; 
			echo $texte_birthday;
			echo '</tr>';
			$x++;
	}
	
	echo '</table>';	
	
	$reponse->closeCursor();
                
    ?>
  		</center>
  		</article>	
	
		<aside>
			<p><i>En quelques chiffres...</i></p>
			<p>Effectif:<b> <?php echo NombreEffectif(); ?></b></p>
			<p>Age moyen:<b> <?php echo AgeAVG(); ?></b> </p>
			<p><b><?php echo NbGAR(); ?> </b> gardien(s).</p>
			<p><b><?php echo NbDEF(); ?> </b> défenseur(s). </p>
			<p><b><?php echo NbMIL(); ?> </b> milieu(x). </p>
			<p><b><?php echo NbATT(); ?> </b> attaquant(s).</p>
			<p><b><?php echo NbINC(); ?> </b> inclassable(s).</p>
		</aside>
	</section>
		<?php include ('footer.php'); ?>

</body>
</html>
