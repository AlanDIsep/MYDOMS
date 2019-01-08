<?php
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$typePanne= $_POST['typePanne'];
				 mysqli_query($mysqli,"INSERT INTO typePanne (typePanne) VALUES '".$typePanne."'");
					header('Location: ../index.php?cible=utilisateurs&fonction=Admin');
?>
