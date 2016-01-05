<br>
	<footer>
	
		<table>
			<tr>
				<td><p>Le site a été entièrement conçu avec un éditeur de texte, et est écrit en PHP/HTML5, utilise les feuilles de style CSS, ainsi qu'une base de donnée MySQL.
			Pour ceux que ça intéresse, les sources du site sont disponibles <a href=https://github.com/DjibDev/StatsSoccer>ici</a>.</p></td>
				<td width="150"></td>
				<td width="200"><p>Développé par J.BLOT<p>
				<p>Dernière mise à jour le 
					<?php 
					
					$getLastModDir = filemtime("modifs.txt"); 
					
					if (date("d/m/Y",$getLastModDir) == "01/01/1970")
					{
						$getLastModDir = filemtime("../modifs.txt"); 
					}	
						echo date("d/m/Y.", $getLastModDir);
							
					?></p></td>
			</tr>	
			
		</table>
			
    </footer>
