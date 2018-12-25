<?php 
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$idPanne= $_POST['idPanne']; 
					 mysqli_query($mysqli,"DELETE FROM panne WHERE idPanne='".$idPanne."'");
					header('Location: ../index.php?cible=utilisateurs&fonction=Admin'); 
?>