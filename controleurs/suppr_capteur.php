<?php 
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$idEquipement= $_POST['idEquipement']; 
					 mysqli_query($mysqli,"DELETE FROM equipement WHERE idEquipement='".$idEquipement."'");
					header('Location: ../index.php?cible=utilisateurs&fonction=Admin'); 
?>