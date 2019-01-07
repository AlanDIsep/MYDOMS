
<?php
include_once('Accueil.php');

 // On récupère tout le contenu de la table utilisateur
 $datetime = date("Y-m-d");
 $from_date = "$datetime 00:00:00";
$to_date = "$datetime 04:59:59";
$table = "graph";
 $reponse = $bdd->query("SELECT SUM(CompteurLum) AS sums FROM graph WHERE idUser=$id1 AND Date >= '". $from_date . "' AND Date <= '" . $to_date . "'");
 $donnees = $reponse->fetch()?>
 <?php $val1= $donnees['sums'];?>
 <?php  $reponse->closeCursor(); ?>
 <?php
 $from_date2 = "$datetime 05:00:00";
$to_date2 = "$datetime 09:59:59";
$table = "graph";
 $reponse = $bdd->query("SELECT SUM(CompteurLum) AS sums FROM graph WHERE idUser=$id1 AND Date >= '". $from_date2 . "' AND Date <= '" . $to_date2 . "'");
 $donnees = $reponse->fetch()?>
 <?php $val2= $donnees['sums'];?>
 <?php  $reponse->closeCursor(); ?>

 <?php
 $from_date3 = "$datetime 10:00:00";
$to_date3 = "$datetime 14:59:59";
$table = "graph";
 $reponse = $bdd->query("SELECT SUM(CompteurLum) AS sums FROM graph WHERE idUser=$id1 AND Date >= '". $from_date3 . "' AND Date <= '" . $to_date3 . "'");
 $donnees = $reponse->fetch()?>
 <?php $val3= $donnees['sums'];?>
 <?php  $reponse->closeCursor(); ?>

 <?php
 $from_date4 = "$datetime 15:00:00";
$to_date4 = "$datetime 20:59:59";
$table = "graph";
 $reponse = $bdd->query("SELECT SUM(CompteurLum) AS sums FROM graph WHERE idUser=$id1 AND Date >= '". $from_date4 . "' AND Date <= '" . $to_date4 . "'");
 $donnees = $reponse->fetch()?>
 <?php $val4= $donnees['sums'];?>
 <?php  $reponse->closeCursor(); ?>

 <?php
 $from_date5 = "$datetime 21:00:00";
$to_date5 = "$datetime 23:59:59";
$table = "graph";
 $reponse = $bdd->query("SELECT SUM(CompteurLum) AS sums FROM graph WHERE idUser=$id1 AND Date >= '". $from_date5 . "' AND Date <= '" . $to_date5 . "'");
 $donnees = $reponse->fetch()?>
 <?php $val5= $donnees['sums'];?>
 <?php  $reponse->closeCursor(); ?>


<hr width= 100% color=#dce649><?php

$dataPoints = array(
  array("x"=> 5, "y"=> $val1),
	array("x"=> 10, "y"=> $val2,"indexLabel"=> "Lumière"),
	array("x"=> 15, "y"=> $val3, "indexLabel"=> "Lumière"),
	array("x"=> 20, "y"=> $val4,"indexLabel"=> "Lumière"),
	array("x"=> 23, "y"=> $val5,"indexLabel"=> "Lumière"),
);
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "dark1", // "light1", "light2", "dark1", "dark2"

	data: [{
		type: "bar", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#deea32",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>      