<div id="banniere_image">
		<h1>Saison 
		<?php 

				require ('../../affiche_saison_banniere.php'); 
				$num_saison=AfficheSaisonBanniere();
				
				if ($num_saison != null) 
				{ 
						echo 'Saison '.$num_saison; 
				}
				else
				{
						echo 'En attente de création d\'une nouvelle saison...';		
				} 
		?>
		</h1>	
		<div id="banniere_description">	
			<center>
				<a class="btn" href="../../index.php">Home</a>
				<a class="btn" href="../../affiche_calendrier.php">Calendrier/Résultats</a>
				<a class="btn" href="../../affiche_coupe.php">Coupe</a>
				<a class="btn" href="../../affiche_classement.php">Classements</a>
				<a class="btn" href="../../affiche_effectif.php">Effectif</a>
				<a class="btn" href="#forum">Forum</a>
			</center>	
		</div>
</div>

