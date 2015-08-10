<html>
	<head>
		<title>Les statistiques</title>
		<link rel="stylesheet" href="style_base.css"/>
		<meta charset="utf-8" />
		
	</head>
	
	<div id="bloc_page">
	<div id="banniere_image">
		<h1>Saison 2015-2016</h1>	
		<div id="banniere_description">	
				<a class="btn" href="index.php">Accueil</a>
				<a class="btn" href="#section">Résultats/Calendrier</a>
				<a class="btn" href="affiche_effectif.php">Effectif</a></a>
				<a class="btn" href="#section">Statistiques</a>
				<a class="btn" href="http://jgefootlb.free.fr">Forum</a>
				<a class="btn" href="http://jgefoot.com">Site officiel</a>
				<a class="btn" href="administrer.php">Administrer</a></p>
		</div>
	</div>
		
	<section>	
							
		<form method="post" action="modif_fiche_joueur.php">
		<fieldset>
		<Legend> Modifier les données des joueurs</Legend>		
			<label for="player">Sélectionner le nom du joueur : <br></label>
			<select name="player" id="player">
							
				<?php 
				require ('connexion.php');
			
				$reponse=$bdd->query('SELECT ID_joueur,nom, prenom from effectif order by nom ASC');
	
				while ($resultats=$reponse->fetch())
				{
					echo '<option value="'.$resultats['ID_joueur'].'">'.$resultats['nom'].' '.$resultats['prenom'].'</option>';
				}
			
				$reponse->closeCursor();
				
				?>
        	
        	</select>
			<br>
			<br>
			<label for="jour">Date de naissance : <br></label>
			<select name="jour" id="jour">
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
			</select> 
			<select name="mois" id="mois">
					<option value="01">Janvier</option>
					<option value="02">Février</option>
					<option value="03">Mars</option>
					<option value="04">Avril</option>
					<option value="05">Mai</option>
					<option value="06">Juin</option>
					<option value="07">Juillet</option>
					<option value="08">Août</option>
					<option value="09">Septembre</option>
					<option value="10">Octobre</option>
					<option value="11">Novembre</option>
					<option value="12">Décembre</option>
			</select>
	   
			<select name="annee" id="annee">
			<option value="1970">1970</option>
			<option value="1971">1971</option>
			<option value="1972">1972</option>
			<option value="1973">1973</option>
			<option value="1974">1974</option>
			<option value="1975">1975</option>
			<option value="1976">1976</option>
			<option value="1977">1977</option>
			<option value="1978">1978</option>
			<option value="1979">1979</option>
			<option value="1980">1980</option>
			<option value="1981	">1981</option>
			<option value="1982">1982</option>
			<option value="1983">1983</option>
			<option value="1984">1984</option>
			<option value="1985">1985</option>
			<option value="1986">1986</option>
			<option value="1987">1987</option>
			<option value="1988">1988</option>
			<option value="1989">1989</option>
			<option value="1990">1990</option>
			<option value="1991">1991</option>
			<option value="1992">1992</option>
			<option value="1993">1993</option>
			<option value="1994">1994</option>
			<option value="1995">1995</option>
			<option value="1996">1996</option>
			<option value="1997">1997</option>
			<option value="1998">1998</option>
			<option value="1999">1999</option>
		</select>		
		<br><br>	
		<input type="reset" value="Annuler"/>
		<input type="submit" value="Enregistrer"/> 		
		
		</fieldset>
		</form>
			
	</section>
	
</div>		
	
		
	
</body>
</html> 
