<<<<<<< HEAD

<?php // content="text/plain; charset=utf-8"
require_once ('./jpgraph-4.2.6/src/jpgraph.php');
require ('./jpgraph-4.2.6/src/jpgraph_bar.php');


// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)

// On récupère nos variables de session


// ici les données à importer avec la base de donnée:

$datay=array($GET['val1'],6,10,1);
//define('MYSQL_HOST', 'localhost');
//define('MYSQL_USER', 'root');
//define('MYSQL_PASS', '');
//define('MYSQL_DATABASE', 'sysdom');

//sql:
/*$sql_... = <<<nom
SELECT  
	...( `...` ) AS ..., 
	COUNT( `...` ) AS ..., 
	SUM( `...` ) AS ...
FROM ...
WHERE ...( `...` ) = '...' 
GROUP BY ...
nom;*/

//$mysqlCnx = @mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS) or die('Pb de connxion mysql');

//@mysql_select_db(MYSQL_DATABASE) or die('Pb de sélection de la base');

// Initialiser le tableau à 0 pour chaques jour
/*$tableauVentes2006 = array(0,0,0,0,0,0,0,0,0,0,0,0); 

$mysqlQuery = @mysql_query($sql_ventes_par_mois, $mysqlCnx) or die('Pb de requête');

=======
<?php // content="text/plain; charset=utf-8"
require_once ('./jpgraph-4.2.6/src/jpgraph.php');
require ('./jpgraph-4.2.6/src/jpgraph_bar.php');


// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)

// On récupère nos variables de session


// ici les données à importer avec la base de donnée:

$datay=array(1,6,10,1);
//define('MYSQL_HOST', 'localhost');
//define('MYSQL_USER', 'root');
//define('MYSQL_PASS', '');
//define('MYSQL_DATABASE', 'sysdom');

//sql:
/*$sql_... = <<<nom
SELECT  
	...( `...` ) AS ..., 
	COUNT( `...` ) AS ..., 
	SUM( `...` ) AS ...
FROM ...
WHERE ...( `...` ) = '...' 
GROUP BY ...
nom;*/

//$mysqlCnx = @mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS) or die('Pb de connxion mysql');

//@mysql_select_db(MYSQL_DATABASE) or die('Pb de sélection de la base');

// Initialiser le tableau à 0 pour chaques jour
/*$tableauVentes2006 = array(0,0,0,0,0,0,0,0,0,0,0,0); 

$mysqlQuery = @mysql_query($sql_ventes_par_mois, $mysqlCnx) or die('Pb de requête');

>>>>>>> 39a7e8211f86fac090a5f0ec8c2188952faac3dd
while ($row_mois = mysql_fetch_array($mysqlQuery,  MYSQL_ASSOC)) {
	$tableauVentes2006[$row_mois['MOIS']-1] = $row_mois['PRODUIT_VENTE']; 
}*/


// Create the graph. These two calls are always required
$graph = new Graph(550,250,'auto');
$graph->SetScale("textlin");

// mettre la position des points du graphique
$graph->yaxis->SetTickPositions(array(0,1,2,3,4,5,6,7,8,9,10), array(1,2,3,4,5));
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('0h','12h','16h','23h'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);

//Titre
$graph->title->Set("Nombre de capteurs allumés par jours");

// Display the graph
$graph->Stroke();

include ('./controleurs/comptegraph.php');
?>