<!DOCTYPE html>
<html lang="fr">
<?php
//session_start ();

require "controleurs/verif_session.php";

/*$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
$connex_id = mysqli_query($mysqli,"SELECT DroitUtilisateur_Id FROM utilisateur where AdresseMail = '".$email."'");
$row = mysqli_fetch_assoc($connex_id);

$_SESSION['email'] = $email; 

if(($row['DroitUtilisateur_Id']) != 1){
					echo"acces interdit";
					exit();
					}*/



// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {


	$email=$_SESSION['email'];
	
}
else {
	echo 'Les variables ne sont pas déclarées.';
}
?>

<head>
    <title>MyDoms Accueil</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
           <link rel='stylesheet' type='text/css' href='../CSS/admin.css' media='screen'/>
	   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<nav>

  <header>
    <span><img src="../CSS/icons/Bandeau/admin.png" alt="img"></img></span>
    Administrateur
    <a></a>
  </header>

  <ul>
    <li>Navigation</li>
    <li><a onclick="myFunction()">Tableau de Bord</a></li>
    <li onclick="myFunction1()"><a>Utilisateurs</a></li>
    <li onclick="myFunction2()"><a>Gestion du formulaire</a></li>
    <li onclick="myFunction3()"><a>Capteurs</a></li>
    <li onclick="myFunction4()"><a>Tickets</a></li>
	<li onclick="myFunction5()"><a>Maisons</a></li>
  </ul>
  
</nav>

  <main>
  
  <span style="float:right;"><a href="vues/deconnexion.php"><img title="Logout" src="../CSS/icons/deco.png" class="logo3ter"></a></span>

      <h1 id="title">Tableau de Bord</h1><br>

    <div>
	  
      <!--div dashboard---------------------------------------------------------------------------------->
      <div id="dashboard"><br>
        <div class="flex-grid">

          <div>
            <h2>Activités Récentes</h2>
          </div>

          <div>
            <h2>Total Maisons</h2>
          <p class="kpi">
					<?php 
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$table = "habitation";
					$nbr_maison = mysqli_query($mysqli,"SELECT COUNT(idHabitation) AS nb_maison FROM habitation");
					$row = mysqli_fetch_assoc($nbr_maison);
					echo $row['nb_maison'];
					?>
					
					
		  </p>
          </div>

          <div>
            <h2>Total Utilisateurs</h2>
          <p class="kpi">
					<?php $mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$table = "utilisateur";
					$nb_user = mysqli_query($mysqli,"SELECT COUNT(id) AS nb_user FROM utilisateur");
					$row = mysqli_fetch_assoc($nb_user);
					echo $row['nb_user']; ?>
		  </p>
          </div>
        </div>

      <div class="flex-grid">

        <div>
          <h2>Utilisateurs Connectés</h2>
		  <p class="kpi">
					<?php
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$table = "connectes";
					// ÉTAPE 1 : on vérifie si l'IP se trouve déjà dans la table.
					// Pour faire ça, on n'a qu'à compter le nombre d'entrées dont le champ "ip" est l'adresse IP du visiteur.
					$retour = mysqli_query($mysqli,'SELECT COUNT(*) AS nbre_entrees FROM connectes WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
					$donnees = mysqli_fetch_assoc($retour);

					if ($donnees['nbre_entrees'] == 0) // L'IP ne se trouve pas dans la table, on va l'ajouter.
					{
						mysqli_query($mysqli,'INSERT INTO connectes VALUES(\'' . $_SERVER['REMOTE_ADDR'] . '\', ' . time() . ')');
					}
					else // L'IP se trouve déjà dans la table, on met juste à jour le timestamp.
					{
						mysqli_query($mysqli,'UPDATE connectes SET timestamp=' . time() . ' WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
					}

					// -------
					// ÉTAPE 2 : on supprime toutes les entrées dont le timestamp est plus vieux que 5 minutes.

					// On stocke dans une variable le timestamp qu'il était il y a 5 minutes :
					$timestamp_5min = time() - (60 * 5); // 60 * 5 = nombre de secondes écoulées en 5 minutes
					mysqli_query($mysqli,'DELETE FROM connectes WHERE timestamp < ' . $timestamp_5min);

					// -------
					// ÉTAPE 3 : on compte le nombre d'IP stockées dans la table. C'est le nombre de visiteurs connectés.
					$retour = mysqli_query($mysqli,'SELECT COUNT(*) AS nbre_entrees FROM connectes');
					$donnees = mysqli_fetch_assoc($retour);


					// Ouf ! On n'a plus qu'à afficher le nombre de connectés !
					echo $donnees['nbre_entrees'];?>
		  </p>
        </div>

        <div>
          <h2>Total Tickets</h2>
		  <p class="kpi">
					<?php $mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$table = "panne";
					$nb_panne = mysqli_query($mysqli,"SELECT COUNT(idPanne) AS nb_panne FROM panne");
					$row = mysqli_fetch_assoc($nb_panne);
					echo $row['nb_panne']; ?>
		  </p>
        </div>

      </div>
      <div class="flex-grid">

        <div style="height:400px;">
          <h2>Statistiques</h2>
        </div>
      </div>
    </div>
	<!---.------------------------------------------------------------------------------>


    <?php echo AfficheAlerte($alerte);?>

	<!---.------------------------------------------------------------------------------>
    <div id="user">

	
	<!---.------------------------------------------------------------------------------>	 
  <div class="flex-grid">
  <div class="two">
  <h2>Liste des utilisateurs</h2><br>
  
          <table class="my_table">
          <thead>
          <tr>
            <th>ID</th>
            <th>Adresse Mail</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Naissance</th>
            <th>Adresse de Facturation</th>
            <th>Code Postal</th>
            <th>Ville</th>
            <th>Pays</th>
            <th>Numéro de Téléphone</th>
          </tr>
          </thead>
          <tbody>	
          <?php foreach ((array) $configurations as $element) { ?>
          <tr>
              <td>
                <?php echo $element['id']; ?>
              </td>
              <td>
                <?php echo $element['AdresseMail']; ?>
                </td>
              <td>
                <?php echo $element['Nom']; ?>
              </td>
              <td>
                <?php echo $element['Prenom']; ?>
              </td>
              <td>
                <?php echo $element['DateDeNaissance']; ?>
              </td>
              <td>
                <?php echo $element['AdresseFacturation']; ?>
              </td>
              <td>
                <?php echo $element['CodePostal']; ?>
              </td>
              <td>
                <?php echo $element['Ville']; ?>
              </td>
              <td>
                <?php echo $element['Pays']; ?>
              </td>
              <td>
                <?php echo $element['NumeroDeTelephone']; ?>
              </td>

            </tr>
      
      <?php } ?>

    </tbody>
    </table>
    </div></div><br><br>
      <div class="flex-grid">
        <div class="two">
        <h2>Ajouter un utilisateur</h2><br>

          <form method="POST" action="">
            <label for="id" class="titles">Adresse Mail</label>
            <input type="text" id="fname" name="AdresseMail" placeholder="Adresse Mail ...">

            <label for="mdp" class="titles">Mot de Passe</label>
            <input type="text" id="fname" name="password" placeholder="Mot de Passe ...">

            <label for="lname" class="titles">Nom</label>
            <input type="text" id="lname" name="Nom" placeholder="Nom ...">

            <label for="fname" class="titles">Prénom</label>
            <input type="text" id="fname" name="Prenom" placeholder="Prénom ...">

            <label for="birthday" class="titles">Date de Naissance </label></br>
            <input type="date" id="birthday" name="DateDeNaissance" placeholder="Date de naissance ..."></br>


            <label for="adresse" class="titles">Adresse Postale</label>
            <input type="text" id="adresse" name="AdresseFacturation" placeholder="Adresse postale ...">

            <label for="codepostal" class="titles">Code Postal</label>
            <input type="text" id="codepostal" name="CodePostal" placeholder="Code postal ...">

            <label for="Ville" class="titles">Ville</label>
            <input type="text" id="ville" name="Ville" placeholder="Ville ...">

            <label for="pays" class="titles">Pays</label>
            <input type="text" id="pays" name="Pays" placeholder="Pays ...">

            <label for="number" class="titles">Numéro de contact</label>
            <input type="text" id="number" name="NumeroDeTelephone" placeholder="Téléphone ...">

            <label for="account" class="titles">Type de compte</label><br>
            <select id="account" name="DroitUtilisateur_id">
              <option value="1">Administrateur</option>
              <option value="2">Utilisateur</option>
              <option value="3">Help Desk</option>
            </select><br><br>

            <input type="submit" name="submit">
          </form>
        </div>
      </div>
        <div class="flex-grid">
        <div class="two">
        <h2>Supprimer un utilisateur</h2><br>
        <form method="POST" action="controleurs/suppr_utilisateur.php">
        <label for="number" class="titles">Rentrer l'ID de l'utilisateur à supprimer</label><br><br>
        <input type="number" name="id" placeholder="ID de l'utilisateur à supprimer ..."><br><br>
        <input type="submit" name="submit">
        </form>
        </div></div></div>
	<!---.---------------------------------------------------------------------------------------------------->
  
  <!---.------------------------------------------------------------------------------>
  <div id="data_form" style="height:600px;">
    <div class="flex-grid"><br><br>
      <div class="two">
        <h2>Ajouter une Panne</h2>
        <form method="POST" action="">
          <label for="id" class="titles">Type de la panne</label>
          <input type="text" id="fname" name="typePanne" placeholder="Renseignez le type de la panne ..." required>
          <input type="submit" value="Ajouter la Panne">
        </form>

        <h2>Supprimer un Type de Panne</h2>
        <form method="POST" action="controleurs/suppr_typePanne.php">
        <select name="typePanne" >
                <?php
                $table="typePanne";
                $resultat=$bdd->query("SELECT * FROM typePanne");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['typePanne'].'">' . $data['typePanne'] . '</option>';
                } ?>
          </select>
          <input type="submit" value="Supprimer le type de Panne">
        </form>


    

  
		  </div>
      </div>
    </div>
	<!---.------------------------------------------------------------------------------>	  
		  
	
	<!---.------------------------------------------------------------------------------>	 
		  
      <div id="tickets">
      <div class="flex-grid"><br><br>
      <div class="two">
          <table class="my_table">
          <thead>
          <h2>Tickets - Liste des Pannes</h2>
          <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Type de Panne</th>
            <th>Date</th>
            <th>Id Equipement</th>
            <th>Id Utilisateur</th>
          </tr>
          </thead>
          <tbody>	
          <?php foreach ((array) $configuration as $element) { ?>
          <tr>
              <td>
                <?php echo $element['idPanne']; ?>
              </td>
              <td>
                <?php echo $element['DescriptionPanne']; ?>
                </td>
              <td>
                <?php echo $element['typePanne']; ?>
              </td>
              <td>
                <?php echo $element['Date']; ?>
              </td>
              <td>
                <?php echo $element['Equipement_id']; ?>
              </td>
              <td>
                <?php echo $element['DroitUtilisateur_idDroitUtilisateur']; ?>
              </td>
            </tr>
      
      <?php } ?>

    </tbody>
          </table><br><br></div></div>
      <div class="flex-grid"><br><br>
      <div class="two">
          <h2> Supprimer un ticket</h2><br>
          <form method="POST" action="controleurs/suppr_panne.php">
              <label for="nom">Rentrer l'ID de la panne à supprimer: *</label><br><br>
              <input type="number" name="idPanne" placeholder="Ex: 1" required><br><br>
              <input type="submit" name="submit" value="Supprimer la panne"><br>  
          </form>
       </div> 
       </div>
       <div class="flex-grid"><br><br>
      <div class="two">
          <h2> Ajouter un ticket</h2><br>
          <form method="POST" action="">
        <label for="Nom">Id utilisateur:</label>
        <select name="DroitUtilisateur_idDroitUtilisateur" >
                <?php
                $table="utilisateur";
                $resultat=$bdd->query("SELECT * FROM utilisateur WHERE DroitUtilisateur_id=2"); // Il faut que l'id corresponde a celui d'un utiisateur
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['id'].'">' . $data['id'] . '</option>';
                } ?>
            </select>

            <label for="object">Type de capteur</label>
            <select name="typePanne" >
                <?php
                $table="equipement";
                $resultat=$bdd->query("SELECT * FROM equipement ");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['Type'].'">ID User:'. $data['idUser'] . ' - ' . $data['Type'] . ' ' . $data['Nom'] . '</option>';
                } ?>
            </select>
						
            <label for="object">Type de panne *</label>
            <select name="typePanne" >
                <?php
                $table="typePanne";
                $resultat=$bdd->query("SELECT * FROM typePanne");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['typePanne'].'">' . $data['typePanne'] . '</option>';
                } ?>
            </select><br><br>
            <label for="Message">Description de la panne * </label><br><br>
            <textarea id="message" name="DescriptionPanne" placeholder="Ecrivez ici..." style="height:200px" required></textarea>
            <br><br>
            <label for="date">Date de la panne *</label><br>
            <input type="date" id="datepanne" name="Date" required>
            <br><br>
            <input type="submit" value="Envoyer">
         </form><br><br>
    </div>
       </div> 
       </div>
       </div>
<!---.------------------------------------------------------------------------------>	 


      
    <!---.------------------------------------------------------------------------------>	 
    <div id="capteur" style="height:90%;">
      <div class="flex-grid">
        <div class="two">
        <table class="my_table">
        <h2>Liste des capteurs</h2>
          <thead>
          <tr>
            <th>ID Capteur</th>
            <th>Type</th>
            <th>Nom</th>
            <th>Etat</th>
            <th>Donnée</th>
            <th>Numéro de Série</th>
            <th>ID de l'utilisateur</th>
          </tr>
          </thead>
          <tbody>	
          <?php foreach ((array) $configurations1 as $element) { ?>
          <tr>
              <td>
                <?php echo $element['idEquipement']; ?>
              </td>
              <td>
                <?php echo $element['Type']; ?>
                </td>
              <td>
                <?php echo $element['Nom']; ?>
              </td>
              <td>
                <?php echo $element['Etat']; ?>
              </td>
              <td>
                <?php echo $element['Donnée']; ?>
              </td>
              <td>
                <?php echo $element['NumeroDeSerie']; ?>
              </td>
              <td>
                <?php echo $element['idUser']; ?>
              </td>
            </tr>
      
      <?php } ?>

    </tbody>
          </table><br><br>
          <h2>Ajouter un capteur</h2>
              <form method="POST" action="">

                <label for="Type" class="titles">Utilisateur</label>
                <br>
                <select name="idUser" >
                <option value=""></option>
                <?php
                $table="utilisateur";
                $resultat=$bdd->query("SELECT * FROM utilisateur");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['id'].'">' . $data['id'] . ' - '.$data['Nom'].'  '.$data['Prenom'].'</option>';
                } ?>
                </select><br><br>

                <label for="Type" class="titles">Type de capteur*</label><br>
                <select id="account" name="Type">
                  <option value=""></option>
                  <option value="Température">Température</option>
                  <option value="Éclairage">Éclairage</option>
                </select><br>
                <br>

                <label for="Nom" class="titles">Nom du capteur*</label>
                <input type="text" id="Nom" name="Nom" placeholder="Ex: Chambre 1..." required>
                <br>
                <label for="NumeroDeSerie" class="titles">Numéro de série*</label><br><br>
                <input type="number" id="NumeroDeSerie" name="NumeroDeSerie" placeholder="Numéro de série affiché sur le capteur ..." required><br><br>

                <input type="submit" value="Ajouter un capteur">
                </form>

        </div>  
		</div>
        
		<div class="flex-grid">
        <div class="two">
        <h2> Supprimer un capteur</h2><br>
          <form method="POST" action="controleurs/suppr_capteur.php">
              <label for="nom">Rentrer l'ID du capteur à supprimer: *</label><br><br>
              <input type="number" name="idEquipement" placeholder="Ex: 1" required><br><br>
              <input type="submit" name="submit"><br>  
          </form>

		</div>
		</div>
	</div>




<div id="maisons"style="height:500px;">
		 <div class="flex-grid">
        <div class="two">
	        <h2> Liste de(s) Maison(s)</h2>
			  <table id="customers">
				<thead>
				  <tr>
          <th>ID Maison</th>
          <th>ID Utilisateur</th>
					<th>Maison</th>
					<th>Superficie</th>
					<th>Nombre d'habitant</th>
					<th>Adresse</th>
					<th>Code Postal</th>
					<th>Pays</th>
				  </tr>
				</thead>

				<tbody>	
				  <?php foreach ((array) $configuration1 as $element) { ?>
					  <tr>
						  <td>
							<?php echo $element['idHabitation']; ?>
              </td>
              <td>
							<?php echo $element['idUtilisateur']; ?>
              </td>
						  <td>
							<?php echo $element['NomMaison']; ?>
							</td>
						  <td>
							<?php echo $element['Superficie']; ?> m2
						  </td>
						  <td>
							<?php echo $element['NombreHabitant']; ?>
						  </td>
						  <td>
							<?php echo $element['Adresse']; ?>
						  </td>
						  <td>
							<?php echo $element['CodePostal']; ?>
						  </td>
						  <td>
							<?php echo $element['Pays']; ?>
						  </td>
						</tr>
      
				  <?php } ?>

				</tbody>
			  </table>
			  </div>
			  </div>

  <?php if(isset($alerte)) { echo AfficheAlerte($alerte);} ?>
  </br>

  <!-------------------Main--------------> 
<div class="flex-grid"><br><br>
<div class="two">
    <h2> Ajouter une Maison</h2>
    <form method="POST" action="">
    <label for="nom">ID Utilisateur:</label>
    <select name="idUtilisateur" >
                <?php
                $table="utilisateur";
                $resultat=$bdd->query("SELECT * FROM utilisateur");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['id'].'">' . $data['id'] . ' - '.$data['Nom'].'  '.$data['Prenom'].'</option>';
                } ?>
                </select>
			<br>
    <br>

      <label for="nom">Nom de la Maison*</label>
        <input type="text" id="nommaison" name="NomMaison" placeholder="Nom de la maison"><br>

      <label for="superficie">Superficie de la Maison: <span id="demo"></span> m2 *</label>
        <div class="slidecontainer">
          <input type="range" min="1" max="150" value="0" name="Superficie" class="slider" id="myRange">
          </div><br>
      <label for="object">Nombre d'habitants* </label><br>
        <input type="number" name="NombreHabitant"placeholder="Ex: 3" required/><br><br>

      <label for="object">Adresse*</label><br>
        <input type="text" name="Adresse" placeholder="Ex: 2 rue de la Paix"required/><br><br>

      <label for="object">Code Postal</label><br>
        <input type="number" name="CodePostal" placeholder="Ex: 75001" required/><br><br>

      <label for="object">Pays</label><br>
        <input type="text" name="Pays"placeholder="Ex: Françe" required/><br><br>

        <input type="submit" name="submit" value="Enregistrer">

</form><br>
</div>
</div>

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>



<br><br>


  <div class="flex-grid"><br><br>
      <div class="two">
	<h2> Supprimer une Maison</h2>
		<form method="POST" action="controleurs/suppr_maison.php">
			<label for="nom">Rentrer l'ID de la Maison à supprimer*</label><br><br>
			<input type="number" name="idHabitation" placeholder="Ex: 1" required><br><br>
			<input type="submit" name="submit" value="Supprimer la Maison">
		</form>
		</div>
		</div>
</div>

    <!-- fin du rajout -->

    <br>


    <script type="text/javascript">



    function myFunction() {
       var x = document.getElementById("dashboard");
    	 var y = document.getElementById("user");
    	 var z = document.getElementById("tickets");
		var b = document.getElementById("data_form");       
       var a = document.getElementById("capteur");
	   var c = document.getElementById("maisons");

       
        if (x.style.display == "none") {
            x.style.display = "block";
    		y.style.display = "none";
    		z.style.display = "none";
			a.style.display = "none";
			b.style.display = "none";
			c.style.display = "none";
        
    		document.getElementById("title").innerHTML = "Tableau de bord";
        } else {
            x.style.display = "block";
    		y.style.display = "none";
    		z.style.display = "none";
			a.style.display = "none";
			b.style.display = "none";
			c.style.display = "none";
    		document.getElementById("title").innerHTML = "Tableau de bord";
        }
    	}

    function myFunction1() {
      var x = document.getElementById("user");
    	var y = document.getElementById("dashboard");
    	var z = document.getElementById("data_form");       
       var a = document.getElementById("capteur");
     var b = document.getElementById("tickets");
	 var c = document.getElementById("maisons");
      //fin rajout
        if (x.style.display == "none") {
    		 x.style.display = "block";
    		 y.style.display = "none";
    		 z.style.display = "none";
			 a.style.display = "none";
			b.style.display = "none";
			c.style.display = "none";
    		 document.getElementById("title").innerHTML = "Utilisateurs";
        }  else {
            x.style.display = "block";
    		y.style.display = "none";
    		z.style.display = "none";
		    a.style.display = "none";
			 b.style.display = "none";
			 c.style.display = "none";
    		document.getElementById("title").innerHTML = "Utilisateurs";

        }
    	}
    function myFunction2() {
        var x = document.getElementById("data_form"); 
    	var y = document.getElementById("user");
    	 var z = document.getElementById("dashboard");     
       var a = document.getElementById("capteur");
	   var b = document.getElementById("tickets");
	   var c = document.getElementById("maisons");
       
        if (x.style.display == "none") {
    		 x.style.display = "block";
    		 y.style.display = "none";
    		 z.style.display = "none";
			 a.style.display = "none";
			b.style.display = "none";
			c.style.display = "none";
    		 document.getElementById("title").innerHTML = "Ajouter des données formulaire";
        } else {
            x.style.display = "block";
    		y.style.display = "none";
    		z.style.display = "none";
		    a.style.display = "none";
			b.style.display = "none";
			c.style.display = "none";
    		document.getElementById("title").innerHTML = "Ajouter des données formulaire";
        }

    }

    //rajout
    function myFunction3() {
        var x = document.getElementById("capteur");
    	var y = document.getElementById("user");
    	 var z = document.getElementById("dashboard");
       var a = document.getElementById("data_form");
       var b = document.getElementById("tickets");
	   var c = document.getElementById("maisons");

        if (x.style.display == "none") {
    		 x.style.display = "block";
    		 y.style.display = "none";
    		 z.style.display = "none";
			 a.style.display = "none";
			b.style.display = "none";
			c.style.display = "none";
    		 document.getElementById("title").innerHTML = "Gestion des Capteurs";
        } else {
            x.style.display = "block";
    		y.style.display = "none";
    		z.style.display = "none";
			a.style.display = "none";
			b.style.display = "none";
			c.style.display = "none";
    		document.getElementById("title").innerHTML = "Gestion des Capteurs";
        }

    }
    //fin rajout

	  function myFunction4() {
        var x = document.getElementById("tickets");
    	var y = document.getElementById("user");
    	 var z = document.getElementById("dashboard");
       var a = document.getElementById("data_form");
	    var b = document.getElementById("capteur");
		var c = document.getElementById("maisons");
       
        if (x.style.display == "none") {
    		 x.style.display = "block";
    		 y.style.display = "none";
    		 z.style.display = "none";
			 a.style.display = "none";
			 b.style.display = "none";
			c.style.display = "none";
    		 document.getElementById("title").innerHTML = "Tickets";
        } else {
            x.style.display = "block";
    		y.style.display = "none";
    		z.style.display = "none";
			a.style.display = "none";
			b.style.display = "none";
			c.style.display = "none";
    		document.getElementById("title").innerHTML = "Tickets";
        }

    }

	 function myFunction5() {
        var x = document.getElementById("maisons");
    	var y = document.getElementById("user");
    	 var z = document.getElementById("dashboard");
       var a = document.getElementById("data_form");
	    var b = document.getElementById("capteur");
		var c = document.getElementById("tickets");
       
        if (x.style.display == "none") {
    		 x.style.display = "block";
    		 y.style.display = "none";
    		 z.style.display = "none";
			 a.style.display = "none";
			 b.style.display = "none";
			c.style.display = "none";
    		 document.getElementById("title").innerHTML = "Maisons";
        } else {
            x.style.display = "block";
    		y.style.display = "none";
    		z.style.display = "none";
			a.style.display = "none";
			b.style.display = "none";
			c.style.display = "none";
    		document.getElementById("title").innerHTML = "Maisons";
        }

    }


    </script>

  </main>

  <div id="footer">
    <a>© SAS Domisep - Tous droits réservés </a>
  </div>
</html>
