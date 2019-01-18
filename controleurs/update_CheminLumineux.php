<?php
include_once('/.controleurs/Configuration.php');
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$idCheminLumineux=$_POST['idCheminLumineux'];
					$switch = (isset($_POST['switch'])) ? 1 : 0;
					$capteur1=$_POST['Capteur1'];
					$capteur2=$_POST['Capteur2'];
					$capteur3=$_POST['Capteur3'];
					$capteur4=$_POST['Capteur4'];
					mysqli_query($mysqli,"UPDATE cheminLumineux SET EtatCheminLumineux='$switch' WHERE idCheminLumineux=$idCheminLumineux");
					mysqli_query($mysqli,"UPDATE equipement SET Etat='$switch' WHERE Nom='$capteur1'&& Type='Éclairage'");
					mysqli_query($mysqli,"UPDATE equipement SET Etat='$switch' WHERE Nom='$capteur2'&& Type='Éclairage'");
					mysqli_query($mysqli,"UPDATE equipement SET Etat='$switch' WHERE Nom='$capteur3'&& Type='Éclairage'");
					mysqli_query($mysqli,"UPDATE equipement SET Etat='$switch' WHERE Nom='$capteur4'&& Type='Éclairage'");
					header('Location: ../index.php?cible=utilisateurs&fonction=Configuration'); 
?>