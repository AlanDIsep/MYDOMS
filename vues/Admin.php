<!DOCTYPE html>
<html lang="fr">
<?php
//session_start ();

require "controleurs/verif_session.php";




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
    <!-- <li onclick="myFunction3()"><a>Ajouter un capteur</a></li> -->
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
            <h2>Utilisateurs en ligne</h2>
          <p class="kpi">0</p>
          </div>
        </div>

      <div class="flex-grid">

        <div>
          <h2>Utilisateurs</h2>
        </div>

        <div>
          <h2>Tickets</h2>
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
      <h2>Ajouter un utilisateur</h2><br>
      <div class="flex-grid">
        <div class="two">

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

            <label for="account" class="titles">Type de compte</label>
            <select id="account" name="DroitUtilisateur_id">
              <option value="1">Administrateur</option>
              <option value="2">Utilisateur</option>
              <option value="3">Help Desk</option>
            </select>

            <input type="submit" name="submit">
          </form>
        </div>
      </div>
    </div>
	<!---.---------------------------------------------------------------------------------------------------->
  
  <!---.------------------------------------------------------------------------------>
  <div id="data_form">
    <div class="flex-grid"><br><br>
      <div class="two">
        <h2>Ajouter une Panne</h2>
        <form method="POST" action="">
          <label for="id" class="titles">Type de la panne</label>
          <input type="text" id="fname" name="typePanne" placeholder="Renseignez le type de la panne ...">
          <input type="submit" value="Ajouter la Panne">
        </form>

        <h2>Ajouter une FAQ</h2>
        <form method="POST" action="">
          <label for="id" class="titles">Question posée</label>
          <input type="text" id="qstion" name="QuestionRecurentes" placeholder="Renseigner la question ...">
          <label for="id" class="titles">Réponse à la question</label>
          <input type="text" id="fnnnname" name="Reponse" placeholder="Renseigner la réponse à la question ...">
          <input type="submit" value="Ajouter la question">
        </form>


        <h2>Ajouter un capteur</h2>
        <form method="POST" action="">
          <label for="id" class="titles">Type de capteur</label>
          <input type="text" id="Type" name="Type" placeholder="Renseigner le type de capteur ...">
          <input type="submit" value="Ajouter le capteur">
        </form>

		  </div>
      </div>
    </div>
	<!---.------------------------------------------------------------------------------>	  
		  
	
	<!---.------------------------------------------------------------------------------>	 
		  <div id="tickets">
          <table class="my_table">
          <thead>
          <tr>
            <th>ID</th>
            <th>Statut</th>
            <th>Auteur</th>
            <th>Résumé</th>
            <th>Assigné à</th>
            <th>Date</th>
          </tr>
          </thead>
          <tbody>	
          <?php foreach ((array) $configuration as $element) { ?>
          <tr>
              <td>
                <?php echo $element['idHabitation']; ?>
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
<!---.------------------------------------------------------------------------------>	 


    <!---.------------------------------------------------------------------------------>	 
    <div id="capteur" style="height:700px;">
      <div class="flex-grid">
        <div class="two">

     


          <h2>Lister un capteur dans la FAQ</h2>

          <form method="POST" action="">
            <label for="id" class="titles">Type de capteur</label>
            <input type="text" id="Type" name="Type" placeholder="Renseigner le type de capteur ...">
            <input type="submit" value="Lister le capteur">
          </form>
		  
          <h2>Ajouter un capteur</h2>
              <form method="POST" action="">

                <label for="Type" class="titles">Utilisateur</label>
                <br>
                <select name="id" >
                <?php
                $table="utilisateur";
                $resultat=$bdd->query("SELECT id FROM utilisateur");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['id'].'">' . $data['id'] . '</option>';
                } ?>
                </select><br><br>

                <label for="Type" class="titles">Type de capteur</label><br>
                <select name="Type" >
                <?php
                $table="equipement";
                $resultat=$bdd->query("SELECT * FROM equipement");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['Type'].'">' . $data['Type'] . '</option>';
                } ?>
                </select><br><br>

                <label for="Nom" class="titles">Nom du capteur</label>
                <input type="text" id="Nom" name="Nom" placeholder="Nom du capteur...">

                <label for="Etat" class="titles">Etat</label>
                <input type="text" id="Etat" name="Etat" placeholder="Etat du capteur lors de l'installation ...">

                <label for="NumeroDeSerie" class="titles">Numéro de série</label></br>
                <input type="text" id="NumeroDeSerie" name="DateDeNaissance" placeholder="Date de naissance ..."></br>

                <label for="Piece_id" class="titles">ID de la piece dans laquelle le capteur sera</label>
                <input type="text" id="Piece_id" name="Piece_id" placeholder="ID de la piece dans laquelle le capteur sera...">

                <input type="submit" value="Ajouter un capteur">

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
       
        if (x.style.display == "none") {
            x.style.display = "block";
    		y.style.display = "none";
    		z.style.display = "none";
			a.style.display = "none";
			b.style.display = "none";
        
    		document.getElementById("title").innerHTML = "Tableau de bord";
        } else {
            x.style.display = "block";
    		y.style.display = "none";
    		z.style.display = "none";
			a.style.display = "none";
			b.style.display = "none";
        
    		document.getElementById("title").innerHTML = "Tableau de bord";
        }
    	}

    function myFunction1() {
      var x = document.getElementById("user");
    	var y = document.getElementById("dashboard");
    	var z = document.getElementById("data_form");       
       var a = document.getElementById("capteur");
     
      //fin rajout
        if (x.style.display == "none") {
    		 x.style.display = "block";
    		 y.style.display = "none";
    		 z.style.display = "none";
			 a.style.display = "none";
         
    		 document.getElementById("title").innerHTML = "Utilisateurs";
        }  else {
            x.style.display = "block";
    		y.style.display = "none";
    		z.style.display = "none";
		    a.style.display = "none";
        
    		document.getElementById("title").innerHTML = "Utilisateurs";

        }
    	}
    function myFunction2() {
        var x = document.getElementById("data_form"); 
    	var y = document.getElementById("user");
    	 var z = document.getElementById("dashboard");     
       var a = document.getElementById("capteur");
       
        if (x.style.display == "none") {
    		 x.style.display = "block";
    		 y.style.display = "none";
    		 z.style.display = "none";
			 a.style.display = "none";
        
    		 document.getElementById("title").innerHTML = "Ajouter des données formulaire";
        } else {
            x.style.display = "block";
    		y.style.display = "none";
    		z.style.display = "none";
		    a.style.display = "none";
        
    		document.getElementById("title").innerHTML = "Ajouter des données formulaire";
        }

    }

    //rajout
    function myFunction3() {
        var x = document.getElementById("capteur");
    	var y = document.getElementById("user");
    	 var z = document.getElementById("dashboard");
       var a = document.getElementById("data_form");
       
        if (x.style.display == "none") {
    		 x.style.display = "block";
    		 y.style.display = "none";
    		 z.style.display = "none";
			 a.style.display = "none";
         
    		 document.getElementById("title").innerHTML = "Gestion des Capteurs";
        } else {
            x.style.display = "block";
    		y.style.display = "none";
    		z.style.display = "none";
			a.style.display = "none";
        
    		document.getElementById("title").innerHTML = "Gestion des Capteurs";
        }

    }
    //fin rajout

    </script>

  </main>

  <div id="footer">
    <a>© SAS Domisep - Tous droits réservés </a>
  </div>
</html>
