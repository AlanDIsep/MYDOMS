<?php
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$table = "connectes";
					// �TAPE 1 : on v�rifie si l'IP se trouve d�j� dans la table.
					// Pour faire �a, on n'a qu'� compter le nombre d'entr�es dont le champ "ip" est l'adresse IP du visiteur.
					$retour = mysqli_query($mysqli,'SELECT COUNT(*) AS nbre_entrees FROM connectes WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
					$donnees = mysqli_fetch_assoc($retour);

					if ($donnees['nbre_entrees'] == 0) // L'IP ne se trouve pas dans la table, on va l'ajouter.
					{
						mysqli_query($mysqli,'INSERT INTO connectes VALUES(\'' . $_SERVER['REMOTE_ADDR'] . '\', ' . time() . ')');
					}
					else // L'IP se trouve d�j� dans la table, on met juste � jour le timestamp.
					{
						mysqli_query($mysqli,'UPDATE connectes SET timestamp=' . time() . ' WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
					}

					// -------
					// �TAPE 2 : on supprime toutes les entr�es dont le timestamp est plus vieux que 5 minutes.

					// On stocke dans une variable le timestamp qu'il �tait il y a 5 minutes :
					$timestamp_5min = time() - (60 * 5); // 60 * 5 = nombre de secondes �coul�es en 5 minutes
					mysqli_query($mysqli,'DELETE FROM connectes WHERE timestamp < ' . $timestamp_5min);

					// -------
					// �TAPE 3 : on compte le nombre d'IP stock�es dans la table. C'est le nombre de visiteurs connect�s.
					$retour = mysqli_query($mysqli,'SELECT COUNT(*) AS nbre_entrees FROM connectes');
					$donnees = mysqli_fetch_assoc($retour);


					// Ouf ! On n'a plus qu'� afficher le nombre de connect�s !
					echo $donnees['nbre_entrees'];?>