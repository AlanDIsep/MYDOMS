<?php 
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$ideq=$_POST['ideq'];
					$switch = (isset($_POST['switch'])) ? 1 : 0;
					mysqli_query($mysqli,"UPDATE equipement SET Etat='$switch' WHERE idEquipement=$ideq");
					header('Location: ../index.php?cible=utilisateurs&fonction=Temperature'); 
?>