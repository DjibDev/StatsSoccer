<html>
	<head>
		<title>Les statistiques</title>
			<link rel="stylesheet" href="style_admin.css"/>
		<meta charset="utf-8" />
		
	</head>
	
<body>	
	<div id="bloc_page">
<?php
	include('banniere_menu.php');
?>	
		
	<section>	
	<article>
	
	<?php
	if (!isset($_POST['equipe']))
	{
	?>
		<form method="post" action="admin_modif_equipe.php">	
		<fieldset>
		<Legend> Modifier les données des clubs (championnat)</Legend>		
			<label for="equipe">Sélectionner le nom du club : </label>
			<select required name="equipe" id="equipe" onchange="submit();" >
				<option selected disabled value="">Sélectionnez</option>
						
				<?php 
				require ('connexion.php');
				
				$reponse=$bdd->query('SELECT ID_equipe, nom
				 FROM equipes ORDER bY nom ASC');
	
				while ($resultats=$reponse->fetch())
				{
					echo '<option value="'.$resultats['ID_equipe'].'">'.$resultats['nom'].'</option>';
				}
			
				$reponse->closeCursor();
				?>
				
			</select>
		</fieldset>
		</form>

		<?php			
	}
	else				
	{				
			$team=$_POST['equipe'];
			
			require_once ('connexion.php');
						
			$req_equip=$bdd->query('SELECT * 
			FROM equipes
			WHERE ID_equipe='.$team.' ');
			
			echo '<form method="post" action="trait_modif_equipe.php" id="myform">';
			echo '<fieldset>';
						
			while ($result_equip=$req_equip->fetch())
			{	
				
				echo '<Legend> CHAMPIONNAT - Modifier les données du club <b>'.$result_equip['nom'].'</b></Legend>';		
				echo '<input type="hidden" name="team" value="'.$team.'" />';
				
				echo '<label for="nom">Nom du club :</label>';	
				echo '<input type="text" name="nom" id="nom" value="'.$result_equip['nom'].'"/>';
				echo '<br>';
				
				echo '<label for="nom">Ville :</label>';	
				echo '<input type="text" name="ville" id="ville" value="'.$result_equip['ville'].'"/>';
				echo '<br>';
				
				echo '<label for="prenom">Stade :</label>';	
				echo '<input type="text" name="stade" id="stade" value="'.$result_equip['stade'].'"/>';	
				echo '<br>';
				
				echo '<label for="equipe_fav">Equipe à suivre ? :</label>';	
				echo '<input type="checkbox" name="equipe_fav" id="equipe_fav" ';
				if ($result_equip['favorite'] == true ) { echo 'checked'; }
				echo '/>';	
				echo '<br><br>';

			}
			$req_equip->CloseCursor();
			
			echo '<center>';
			echo '<input type="reset" value="Annuler" />';
			echo '<input type="submit" value="Enregistrer" />';
			echo '</center>';
			
			echo '</form>';
			echo '</fieldset>';
	}	

	if (!isset($_POST['equipe_coupe']))
	{
	?>
		<form method="post" action="admin_modif_equipe.php">	
		<fieldset>
		<Legend> Modifier les données des clubs (coupe)</Legend>		
			<label for="equipe">Sélectionner le nom du club : </label>
			<select required name="equipe_coupe" id="equipe_coupe" onchange="submit();" >
				<option selected disabled value="">Sélectionnez</option>
						
				<?php 
				require ('connexion.php');
				
				$reponse2=$bdd->query('SELECT ID_equipe, nom
				 FROM equipes_coupe ORDER bY nom ASC');
	
				while ($resultats2=$reponse2->fetch())
				{
					echo '<option value="'.$resultats2['ID_equipe'].'">'.$resultats2['nom'].'</option>';
				}
			
				$reponse->closeCursor();
				?>
				
			</select>
		</fieldset>
		</form>

		<?php			
	}
	else				
	{				
			$team_coupe=$_POST['equipe_coupe'];
			
			require_once ('connexion.php');
						
			$req_equip_coupe=$bdd->query('SELECT * 
			FROM equipes_coupe
			WHERE ID_equipe='.$team_coupe.' ');
			
			echo '<form method="post" action="trait_modif_equipe_coupe.php" id="myform">';
			echo '<fieldset>';
						
						
			while ($result_equip_coupe=$req_equip_coupe->fetch())
			{	
				echo '<Legend>COUPE - Modifier les données du club <b>'.$result_equip_coupe['nom'].'</b></Legend>';		
				echo '<input type="hidden" name="team_coupe" value="'.$team_coupe.'" />';
				
				echo '<label for="nom">Nom du club :</label>';	
				echo '<input type="text" name="nom_coupe" id="nom_coupe" value="'.$result_equip_coupe['nom'].'"/>';
				echo '<br>';
				
				echo '<label for="nom">Ville :</label>';	
				echo '<input type="text" name="ville_coupe" id="ville_coupe" value="'.$result_equip_coupe['ville'].'"/>';
				echo '<br>';
				
				echo '<label for="prenom">Stade :</label>';	
				echo '<input type="text" name="stade_coupe" id="stade_coupe" value="'.$result_equip_coupe['stade'].'"/>';	
				echo '<br>';
				
				echo '<label for="equipe_fav">Equipe à suivre ? :</label>';	
				echo '<input type="checkbox" name="equipe_fav_coupe" id="equipe_fav_coupe" ';
				if ($result_equip_coupe['favorite'] == true ) { echo 'checked'; }
				echo '/>';	
				echo '<br><br>';

			}
			$req_equip_coupe->CloseCursor();
			
			echo '<center>';
			echo '<input type="reset" value="Annuler" />';
			echo '<input type="submit" value="Enregistrer" />';
			echo '</center>';
			
			echo '</form>';
			echo '</fieldset>';
	}	
	?>
		
		</article>
		
		<aside>
		<form method="post" action="trait_suppr_equipe.php" id="myform">
		<fieldset>
		<Legend>Supprimer une equipe (championnat)</Legend>		
			<select required name="equipe" id="equipe">
				<option selected disabled value="">Sélectionnez</option>
						
			<?php 
				require ('connexion.php');
			
				$reponse=$bdd->query('SELECT * from equipes order by nom ASC');
	
				while ($resultats=$reponse->fetch())
				{
					echo '<option value="'.$resultats['ID_equipe'].'">'.$resultats['nom'].'</option>';
				}
			
				$reponse->closeCursor();
				
				?>
        	
        	</select>
			
			<br>
			<br>
				<input type="reset" value="Annuler"/>
				<input type="submit" value="Supprimer"/> 	
			</fieldset>
			</form>
		<br>
		
			<form method="post" action="trait_suppr_equipe_coupe.php"  id="myform">
			<fieldset>
			<Legend>Supprimer une equipe (coupe)</Legend>		
			<select required name="equipe" id="equipe">
				<option selected disabled value="">Sélectionnez</option>
						
			<?php 
				require ('connexion.php');
			
				$reponse=$bdd->query('SELECT * from equipes_coupe order by nom ASC');
	
				while ($resultats=$reponse->fetch())
				{
					echo '<option value="'.$resultats['ID_equipe'].'">'.$resultats['nom'].'</option>';
				}
			
				$reponse->closeCursor();
				
				?>
        	
        	</select>
			
			<br>
			<br>
				<input type="reset" value="Annuler"/>
				<input type="submit" value="Supprimer"/> 	
			</fieldset>
			</form>
		</aside>
	</section>
	<?php include ('../footer.php'); ?>
</div>		
	
		
	
</body>
</html> 
