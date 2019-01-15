
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
	array("x"=> 10, "y"=> $val2),
	array("x"=> 15, "y"=> $val3),
	array("x"=> 20, "y"=> $val4),
	array("x"=> 23, "y"=> $val5),
);
	
?>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	backgroundColor:"#4a4a4c",
	axisY: {
		title: "Lumière - Nombre Activations",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	axisY2: {
		title: "Température - Nombre Activations",
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E"
	},	
	toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Proven Oil Reserves (bn)",
		legendText: "Proven Oil Reserves",
		showInLegend: true, 
		dataPoints:[
			{ label: "5", y: .$value1.},
			{ label: "10", y: 3 },
			{ label: "15", y: 157.20 },
			{ label: "20", y: 148.77 },
			{ label: "23", y: 101.50 },
			{ label: "UAE", y: 97.8 }
		]
	},
	{
		type: "column",	
		name: "Oil Production (million/day)",
		legendText: "Oil Production",
		axisYType: "secondary",
		showInLegend: true,
		dataPoints:[
			{ label: "5", y: 3 },
			{ label: "10", y: 2.27 },

		]
	}]
});
chart.render();

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>