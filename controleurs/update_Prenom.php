<?php 
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$id1=$_POST['id1'];
					$Prenom= $_POST['Prenom']; 
					mysqli_query($mysqli,"UPDATE utilisateur SET Prenom='$Prenom' WHERE id=$id1");
					header('Location: ../index.php?cible=utilisateurs&fonction=Modification_Profil'); 
?>