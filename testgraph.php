<?php 

function CreateJPGraphEquipe($a)
{
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('connexion.php');

// requete compte le nombre de journee
$req=$bdd->query('SELECT count(DISTINCT journee_id) AS nb_journees 
FROM stats_collectives ');
while ($resultat=$req->fetch())
{
	$nb_journees=$resultats['nb_journees'];
}
$req->closeCusrsor();

$datay1 = array();
for ($x=0; $x < $nb_journees; $x++)
{
	$datay1[$x]=$resultats
}

// Setup the graph
$graph = new Graph(300,250);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Evolution dans le classement');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->xgrid->SetColor('#E3DDE2');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#426A38");
$p1->SetLegend($nom_equipe);

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

}

?>
