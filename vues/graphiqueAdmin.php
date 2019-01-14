
<?php
include_once('Admin.php');
?>
<hr width= 100% color=#dce649><?php

$dataPoints = array(
  array("x"=> 5, "y"=> $nb_maisons, "indexLabel"=> "Maisons"),
	array("x"=> 10, "y"=> $nb_utilisateurs,"indexLabel"=> "Comptes"),
	array("x"=> 15, "y"=> $nb_connectes, "indexLabel"=> "Utilisateurs connectés"),
	array("x"=> 20, "y"=> $nb_panne,"indexLabel"=> "Panne"),
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
	theme: "light1", // "light1", "light2", "dark1", "dark2"

	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</html>      