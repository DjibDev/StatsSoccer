<?php
        include_once ("jpgraph/jpgraph.php");
        include_once ("jpgraph/jpgraph_bar.php");

        $datay = array (12,15,18,19,7,11);
       
       $graph = new Graph(600,400,"auto");
       $graph->SetScale('textint');
       $graph->SetShadow();
       
       $bplot = new BarPlot($datay);
       $bplot->SetFillColor("blue");
       $graph->Add($bplot);
       
       $bplot->SetShadow();
       $bplot->value->SetFormat('%d');
       $bplot->value->Show();
       
        $graph->Stroke();
?>
