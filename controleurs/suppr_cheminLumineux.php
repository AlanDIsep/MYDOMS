<?php 
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$idCheminLumineux= $_POST['idCheminLumineux']; 
					 mysqli_query($mysqli,"DELETE FROM cheminLumineux WHERE idCheminLumineux='".$idCheminLumineux."'");
					header('Location: ../index.php?cible=utilisateurs&fonction=Configuration'); 
?>