<?php 
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$table = "graph";
					// On récupère tout le contenu de la table utilisateur
					$reponse = $bdd->query("SELECT SUM(CompteurTemp) AS sums FROM graph ");
					$donnees = $reponse->fetch()?>
					<?php $val1= $donnees['sums']; echo $val1?>
					<?php  $reponse->closeCursor(); // Termine le traitement de la requête ?>