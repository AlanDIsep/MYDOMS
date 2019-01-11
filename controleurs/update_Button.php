<?php
include_once('/.controleurs/Temperature.php');
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$ideq=$_POST['ideq'];
					$switch = (isset($_POST['switch'])) ? 1 : 0;
					mysqli_query($mysqli,"UPDATE equipement SET Etat='$switch' WHERE idEquipement=$ideq");


					$temp= $_POST['range'];
				if(isset($temp))
					{
				 $SQL = "UPDATE equipement SET consigne='$temp' where idEquipement='$ideq'";
				  mysqli_query($mysqli,$SQL);
					}


					
					header('Location: ../index.php?cible=utilisateurs&fonction=Temperature'); 
?>