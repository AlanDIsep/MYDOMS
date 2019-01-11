<?php
include_once('/.controleurs/Configuration.php');
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$idCheminLumineux=$_POST['idCheminLumineux'];
					$switch = (isset($_POST['switch'])) ? 1 : 0;
					mysqli_query($mysqli,"UPDATE cheminLumineux SET EtatCheminLumineux='$switch' WHERE idCheminLumineux=$idCheminLumineux");
					header('Location: ../index.php?cible=utilisateurs&fonction=Configuration'); 
?>