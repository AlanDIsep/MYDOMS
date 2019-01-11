<?php 
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$id1=$_POST['id1'];
					$MDP= $_POST['MDP']; 
					mysqli_query($mysqli,"UPDATE utilisateur SET password='$MDP' WHERE id=$id1");
					header('Location: ../index.php?cible=utilisateurs&fonction=Modification_Profil'); 
?>