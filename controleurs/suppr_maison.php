<?php 
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$idHabitation= $_POST['idHabitation']; 
					mysqli_query($mysqli,"DELETE FROM habitation WHERE idHabitation='".$idHabitation."'");
					header('Location: ../index.php?cible=utilisateurs&fonction=Admin'); 
?>