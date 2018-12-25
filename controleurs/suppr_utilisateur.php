<?php 
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$id= $_POST['id']; 
					 mysqli_query($mysqli,"DELETE FROM utilisateur WHERE id='".$id."'");
					header('Location: ../index.php?cible=utilisateurs&fonction=Admin'); 
?>