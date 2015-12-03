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
	require('connexion.php');
	require('fonctions_utiles.php');
		
	if (!isset($_POST['player']))
	{
?>	
	
	<section>	
		
		<form name="modif_player" method="post" action="admin_modif_player.php">
		<fieldset>
		<Legend> Modifier les données des joueurs</Legend>		
			<label for="player">Sélectionner le nom du joueur : </label>
			<select required name="player" id="player" onchange="submit();" >
				<option selected disabled value="">Sélectionnez</option>
						
				<?php 
			
				$reponse=$bdd->query('SELECT * from effectif order by nom ASC');
	
				while ($resultats=$reponse->fetch())
				{
					echo '<option value="'.$resultats['ID_joueur'].'">'.$resultats['pseudo'].' </option>';
				
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

			$joueur_id=$_POST['player'];
			
			$req_pl=$bdd->query('SELECT * 
			FROM effectif
			WHERE ID_joueur='.$joueur_id.' ');
					
			echo '<fieldset>';
			echo '<Legend> Modifier les données des joueurs</Legend>';		
			echo '<form method="post" action="trait_modif_player.php">';
			echo '<input type="hidden" name="joueur_id" value="'.$joueur_id.'" />';
			
						
			while ($result_pl=$req_pl->fetch())
			{	

				// découpage du birthday en jour, mois, année séparés
				// format date : aaaa-mm-jj
				$decoupe=explode('-',$result_pl['birthday']);
				$a=$decoupe[0];
				$m=$decoupe[1];
				$j=$decoupe[2];
				
				echo '<label for="pseudo">Pseudo :</label>';	
				echo '<input type="text" name="pseudo" id="pseudo" value="'.$result_pl['pseudo'].'"/>';
				
				echo '<label for="nom">Nom :</label>';	
				echo '<input type="text" name="nom" id="nom" value="'.$result_pl['nom'].'"/>';
				
				echo '<label for="prenom">Prénom :</label>';	
				echo '<input type="text" name="prenom" id="prenom" value="'.$result_pl['prenom'].'"/>';	
				echo '<br><br>';
				
				echo '<label for="email">Email :</label>';	
				echo '<input type="email" name="email" id="email" value="'.$result_pl['email'].'"/>';	
				echo '<br><br>';
				?>
				
				<label for="poste">Poste : </label>
				<select name="poste" id="poste">
					  	<option value="GAR" <?php if ($result_pl['poste'] == "GAR") { echo 'selected';} ?> >Gardien</option>
						<option value="DEF" <?php if ($result_pl['poste'] == "DEF") { echo 'selected';} ?> >Défenseur</option>
						<option value="MIL" <?php if ($result_pl['poste'] == "MIL") { echo 'selected';} ?> >Milieu</option>
						<option value="ATT" <?php if ($result_pl['poste'] == "ATT") { echo 'selected';} ?> >Attaquant</option>
						<option value="XXX" <?php if ($result_pl['poste'] == "XXX") { echo 'selected';} ?> >Inclassable</option>
        	   	</select>
        		<br><br>

				<label for="jour">Date de naissance : </label>
				<select name="jour" id="jour">
					<option value="01" <?php if ($j == "01") { echo 'selected';} ?> >01</option>
					<option value="02" <?php if ($j == "02") { echo 'selected';} ?> >02</option>
					<option value="03" <?php if ($j == "03") { echo 'selected';} ?> >03</option>
					<option value="04" <?php if ($j == "04") { echo 'selected';} ?> >04</option>
					<option value="05" <?php if ($j == "05") { echo 'selected';} ?> >05</option>
					<option value="06" <?php if ($j == "06") { echo 'selected';} ?> >06</option>
					<option value="07" <?php if ($j == "07") { echo 'selected';} ?> >07</option>
					<option value="08" <?php if ($j == "08") { echo 'selected';} ?> >08</option>
					<option value="09" <?php if ($j == "09") { echo 'selected';} ?> >09</option>
					<option value="10" <?php if ($j == "10") { echo 'selected';} ?> >10</option>
					<option value="11" <?php if ($j == "11") { echo 'selected';} ?> >11</option>
					<option value="12" <?php if ($j == "12") { echo 'selected';} ?> >12</option>
					<option value="13" <?php if ($j == "13") { echo 'selected';} ?> >13</option>
					<option value="14" <?php if ($j == "14") { echo 'selected';} ?> >14</option>
					<option value="15" <?php if ($j == "15") { echo 'selected';} ?> >15</option>
					<option value="16" <?php if ($j == "16") { echo 'selected';} ?> >16</option>
					<option value="17" <?php if ($j == "17") { echo 'selected';} ?> >17</option>
					<option value="18" <?php if ($j == "18") { echo 'selected';} ?> >18</option>
					<option value="19" <?php if ($j == "19") { echo 'selected';} ?> >19</option>
					<option value="20" <?php if ($j == "20") { echo 'selected';} ?> >20</option>
					<option value="21" <?php if ($j == "21") { echo 'selected';} ?> >21</option>
					<option value="22" <?php if ($j == "22") { echo 'selected';} ?> >22</option>
					<option value="23" <?php if ($j == "23") { echo 'selected';} ?> >23</option>
					<option value="24" <?php if ($j == "24") { echo 'selected';} ?> >24</option>
					<option value="25" <?php if ($j == "25") { echo 'selected';} ?> >25</option>
					<option value="26" <?php if ($j == "26") { echo 'selected';} ?> >26</option>
					<option value="27" <?php if ($j == "27") { echo 'selected';} ?> >27</option>
					<option value="28" <?php if ($j == "28") { echo 'selected';} ?> >28</option>
					<option value="29" <?php if ($j == "29") { echo 'selected';} ?> >29</option>
					<option value="30" <?php if ($j == "30") { echo 'selected';} ?> >30</option>
					<option value="31" <?php if ($j == "31") { echo 'selected';} ?> >31</option>
			</select> 

			<select name="mois" id="mois">
					<option value="01" <?php if ($m == "01") { echo 'selected';} ?> >Janvier</option>
					<option value="02" <?php if ($m == "02") { echo 'selected';} ?> >Février</option>
					<option value="03" <?php if ($m == "03") { echo 'selected';} ?> >Mars</option>
					<option value="04" <?php if ($m == "04") { echo 'selected';} ?> >Avril</option>
					<option value="05" <?php if ($m == "05") { echo 'selected';} ?> >Mai</option>
					<option value="06" <?php if ($m == "06") { echo 'selected';} ?> >Juin</option>
					<option value="07" <?php if ($m == "07") { echo 'selected';} ?> >Juillet</option>
					<option value="08" <?php if ($m == "08") { echo 'selected';} ?> >Août</option>
					<option value="09" <?php if ($m == "09") { echo 'selected';} ?> >Septembre</option>
					<option value="10" <?php if ($m == "10") { echo 'selected';} ?> >Octobre</option>
					<option value="11" <?php if ($m == "11") { echo 'selected';} ?> >Novembre</option>
					<option value="12" <?php if ($m == "12") { echo 'selected';} ?> >Décembre</option>
			</select>
			
			<select name="annee" id="annee">
				<option value="1970" <?php if ($a == "1970") { echo 'selected';} ?> >1970</option>
				<option value="1971" <?php if ($a == "1971") { echo 'selected';} ?> >1971</option>
				<option value="1972" <?php if ($a == "1972") { echo 'selected';} ?> >1972</option>
				<option value="1973" <?php if ($a == "1973") { echo 'selected';} ?> >1973</option>
				<option value="1974" <?php if ($a == "1974") { echo 'selected';} ?> >1974</option>
				<option value="1975" <?php if ($a == "1975") { echo 'selected';} ?> >1975</option>
				<option value="1976" <?php if ($a == "1976") { echo 'selected';} ?> >1976</option>
				<option value="1977" <?php if ($a == "1977") { echo 'selected';} ?> >1977</option>
				<option value="1978" <?php if ($a == "1978") { echo 'selected';} ?> >1978</option>
				<option value="1979" <?php if ($a == "1979") { echo 'selected';} ?> >1979</option>
				<option value="1980" <?php if ($a == "1980") { echo 'selected';} ?> >1980</option>
				<option value="1981" <?php if ($a == "1981") { echo 'selected';} ?> >1981</option>
				<option value="1982" <?php if ($a == "1982") { echo 'selected';} ?> >1982</option>
				<option value="1983" <?php if ($a == "1983") { echo 'selected';} ?> >1983</option>
				<option value="1984" <?php if ($a == "1984") { echo 'selected';} ?> >1984</option>
				<option value="1985" <?php if ($a == "1985") { echo 'selected';} ?> >1985</option>
				<option value="1986" <?php if ($a == "1986") { echo 'selected';} ?> >1986</option>
				<option value="1987" <?php if ($a == "1987") { echo 'selected';} ?> >1987</option>
				<option value="1988" <?php if ($a == "1988") { echo 'selected';} ?> >1988</option>
				<option value="1989" <?php if ($a == "1989") { echo 'selected';} ?> >1989</option>
				<option value="1990" <?php if ($a == "1990") { echo 'selected';} ?> >1990</option>
				<option value="1991" <?php if ($a == "1991") { echo 'selected';} ?> >1991</option>
				<option value="1992" <?php if ($a == "1992") { echo 'selected';} ?> >1992</option>
				<option value="1993" <?php if ($a == "1993") { echo 'selected';} ?> >1993</option>
				<option value="1994" <?php if ($a == "1994") { echo 'selected';} ?> >1994</option>
				<option value="1995" <?php if ($a == "1995") { echo 'selected';} ?> >1995</option>
				<option value="1996" <?php if ($a == "1996") { echo 'selected';} ?> >1996</option>
				<option value="1997" <?php if ($a == "1997") { echo 'selected';} ?> >1997</option>
				<option value="1998" <?php if ($a == "1998") { echo 'selected';} ?> >1998</option>
				<option value="1999" <?php if ($a == "1999") { echo 'selected';} ?> >1999</option>
				
		</select>
			
		<br>
		<br>
		<?php
				echo '<label for="num_maillot">Numéro de maillot :</label>';
				echo '<select name="num_maillot" id="num_maillot" value="'.$result_pl['num_maillot'].'"/>';
				NumMaillotDispo();
				echo '</select>';
		?>		
				
		<br>
		<br>
		
		<input type="reset" value="Annuler"/>
		<input type="submit" value="Enregistrer"/> 		
		
		</fieldset>
		</form>	
			<?php 
			}
			$req_pl->CloseCursor();
		}	
		?>
	<br>

	<div id="suppr">
		<form method="post" action="trait_suppr_player.php">
		<fieldset>
		<Legend>Supprimer un joueur</Legend>		
			<label for="player">Nom du joueur : </label>
			<select required name="player" id="player">
				<option selected disabled value="">Sélectionnez</option>
						
				<?php 
				require ('connexion.php');
			
				$reponse=$bdd->query('SELECT * from effectif order by nom ASC');
	
				while ($resultats=$reponse->fetch())
				{
					echo '<option value="'.$resultats['ID_joueur'].'">'.$resultats['pseudo'].'</option>';
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
			</div>

	</section>
	<?php include ('../footer.php'); ?>
</div>		
	
		
	
</body>
</html> 
