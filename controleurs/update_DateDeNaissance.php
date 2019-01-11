<?php 
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$id1=$_POST['id1'];
					$DateDeNaissance= $_POST['DateDeNaissance']; 
					mysqli_query($mysqli,"UPDATE utilisateur SET DateDeNaissance='$DateDeNaissance' WHERE id=$id1");
					header('Location: ../index.php?cible=utilisateurs&fonction=Modification_Profil'); 
?>