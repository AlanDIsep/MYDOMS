<<<<<<< HEAD
<?php
require_once ('./jpgraph-4.2.6/src/jpgraph.php');
require_once ('./jpgraph-4.2.6/src/jpgraph_line.php');

define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '');
define('MYSQL_DATABASE', 'tuto_jp_graph');

$tableauAnnees = array();
$tableauNombreVentes = array();
$moisFr = array('JAN', 'FEV', 'MAR', 'AVR', 'MAI', 'JUI', 'JUL', 'AOU', 'SEP', 'OCT', 'NOV', 'DEC');

// *********************
// Production de données
// *********************

$sql_ventes_par_mois = <<<EOF
SELECT  
	MONTH( `DTHR_VENTE` ) AS MOIS, 
	COUNT( `ID` ) AS NOMBRE_VENTE, 
	SUM( `PRIX` ) AS PRODUIT_VENTE
FROM VENTES
WHERE YEAR( `DTHR_VENTE` ) = '2006' 
GROUP BY MOIS
EOF;

$mysqlCnx = @mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS) or die('Pb de connxion mysql');

@mysql_select_db(MYSQL_DATABASE) or die('Pb de sélection de la base');

// Initialiser le tableau à 0 pour chaques mois ***********************
$tableauVentes2006 = array(0,0,0,0,0,0,0,0,0,0,0,0); 

$mysqlQuery = @mysql_query($sql_ventes_par_mois, $mysqlCnx) or die('Pb de requête');

while ($row_mois = mysql_fetch_array($mysqlQuery,  MYSQL_ASSOC)) {
	$tableauVentes2006[$row_mois['MOIS']-1] = $row_mois['PRODUIT_VENTE']; 
}

// Contrôler les valeurs du tableau
// printf('<pre>%s</pre>', print_r($tableauVentes2006,1));

// ***********************
// Création du graphique
// ***********************

// Création du conteneur
$graph = new Graph(500,300);

// Fixer les marges
$graph->img->SetMargin(40,30,50,40);    

// Mettre une image en fond
$graph->SetBackgroundImage("images/mael_white.png",BGIMG_FILLFRAME);

// Lissage sur fond blanc (évite la pixellisation)
$graph->img->SetAntiAliasing("white");

// A détailler
$graph->SetScale("textlin");

// Ajouter une ombre
$graph->SetShadow();

// Ajouter le titre du graphique
$graph->title->Set("Graphique 'courbes' : volume des ventes 2006");

// Afficher la grille de l'axe des ordonnées
$graph->ygrid->Show();
// Fixer la couleur de l'axe (bleu avec transparence : @0.7)
$graph->ygrid->SetColor('blue@0.7');
// Des tirets pour les lignes
$graph->ygrid->SetLineStyle('dashed');

// Afficher la grille de l'axe des abscisses
$graph->xgrid->Show();
// Fixer la couleur de l'axe (rouge avec transparence : @0.7)
$graph->xgrid->SetColor('red@0.7');
// Des tirets pour les lignes
$graph->xgrid->SetLineStyle('dashed');

// Apparence de la police
$graph->title->SetFont(FF_ARIAL,FS_BOLD,11);

// Créer une courbes
$courbe = new LinePlot($tableauVentes2006);

// Afficher les valeurs pour chaque point
$courbe->value->Show();

// Valeurs: Apparence de la police
$courbe->value->SetFont(FF_ARIAL,FS_NORMAL,9);
$courbe->value->SetFormat('%d');
$courbe->value->SetColor("red");

// Chaque point de la courbe ****
// Type de point
$courbe->mark->SetType(MARK_FILLEDCIRCLE);
// Couleur de remplissage
$courbe->mark->SetFillColor("green");
// Taille
$courbe->mark->SetWidth(5);

// Couleur de la courbe
$courbe->SetColor("blue");
$courbe->SetCenter();

// Paramétrage des axes
$graph->xaxis->title->Set("Mois");
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->SetTickLabels($moisFr);

// Ajouter la courbe au conteneur
$graph->Add($courbe);

$graph->Stroke();
=======
<?php
require_once ('./jpgraph-4.2.6/src/jpgraph.php');
require_once ('./jpgraph-4.2.6/src/jpgraph_line.php');

define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '');
define('MYSQL_DATABASE', 'tuto_jp_graph');

$tableauAnnees = array();
$tableauNombreVentes = array();
$moisFr = array('JAN', 'FEV', 'MAR', 'AVR', 'MAI', 'JUI', 'JUL', 'AOU', 'SEP', 'OCT', 'NOV', 'DEC');

// *********************
// Production de données
// *********************

$sql_ventes_par_mois = <<<EOF
SELECT  
	MONTH( `DTHR_VENTE` ) AS MOIS, 
	COUNT( `ID` ) AS NOMBRE_VENTE, 
	SUM( `PRIX` ) AS PRODUIT_VENTE
FROM VENTES
WHERE YEAR( `DTHR_VENTE` ) = '2006' 
GROUP BY MOIS
EOF;

$mysqlCnx = @mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS) or die('Pb de connxion mysql');

@mysql_select_db(MYSQL_DATABASE) or die('Pb de sélection de la base');

// Initialiser le tableau à 0 pour chaques mois ***********************
$tableauVentes2006 = array(0,0,0,0,0,0,0,0,0,0,0,0); 

$mysqlQuery = @mysql_query($sql_ventes_par_mois, $mysqlCnx) or die('Pb de requête');

while ($row_mois = mysql_fetch_array($mysqlQuery,  MYSQL_ASSOC)) {
	$tableauVentes2006[$row_mois['MOIS']-1] = $row_mois['PRODUIT_VENTE']; 
}

// Contrôler les valeurs du tableau
// printf('<pre>%s</pre>', print_r($tableauVentes2006,1));

// ***********************
// Création du graphique
// ***********************

// Création du conteneur
$graph = new Graph(500,300);

// Fixer les marges
$graph->img->SetMargin(40,30,50,40);    

// Mettre une image en fond
$graph->SetBackgroundImage("images/mael_white.png",BGIMG_FILLFRAME);

// Lissage sur fond blanc (évite la pixellisation)
$graph->img->SetAntiAliasing("white");

// A détailler
$graph->SetScale("textlin");

// Ajouter une ombre
$graph->SetShadow();

// Ajouter le titre du graphique
$graph->title->Set("Graphique 'courbes' : volume des ventes 2006");

// Afficher la grille de l'axe des ordonnées
$graph->ygrid->Show();
// Fixer la couleur de l'axe (bleu avec transparence : @0.7)
$graph->ygrid->SetColor('blue@0.7');
// Des tirets pour les lignes
$graph->ygrid->SetLineStyle('dashed');

// Afficher la grille de l'axe des abscisses
$graph->xgrid->Show();
// Fixer la couleur de l'axe (rouge avec transparence : @0.7)
$graph->xgrid->SetColor('red@0.7');
// Des tirets pour les lignes
$graph->xgrid->SetLineStyle('dashed');

// Apparence de la police
$graph->title->SetFont(FF_ARIAL,FS_BOLD,11);

// Créer une courbes
$courbe = new LinePlot($tableauVentes2006);

// Afficher les valeurs pour chaque point
$courbe->value->Show();

// Valeurs: Apparence de la police
$courbe->value->SetFont(FF_ARIAL,FS_NORMAL,9);
$courbe->value->SetFormat('%d');
$courbe->value->SetColor("red");

// Chaque point de la courbe ****
// Type de point
$courbe->mark->SetType(MARK_FILLEDCIRCLE);
// Couleur de remplissage
$courbe->mark->SetFillColor("green");
// Taille
$courbe->mark->SetWidth(5);

// Couleur de la courbe
$courbe->SetColor("blue");
$courbe->SetCenter();

// Paramétrage des axes
$graph->xaxis->title->Set("Mois");
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->SetTickLabels($moisFr);

// Ajouter la courbe au conteneur
$graph->Add($courbe);

$graph->Stroke();
>>>>>>> 827770976f5e133af40697174f6d732eae574d87
?>