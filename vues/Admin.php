<!DOCTYPE html>
<html lang="fr">

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
    <li onclick="myFunction2()"><a>Tickets</a></li>
    
  </ul>

</nav>

<main>
  
  
  <h1 id="title">Tableau de Bord</h1>
  
  
  </br>
  
  
<div>  
  
  <!--div dashboard-->
  <div id="dashboard">
  </br>
  <div class="flex-grid">
    
    <div>
      <h2>Activités Récentes</h2>
    </div>
    
    <div>
      <h2>Total Maisons</h2>
	  <p class="kpi">12</p>
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
 
 
<?php echo AfficheAlerte($alerte);?>


<div id="user">
 <h2>Ajouter un utilisateur</h2>
<br> 
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


 <div class="flex-grid">
  <div id="tickets">

 <br>
      <table class="my_table">
  <tr>
    <th>ID</th>
    <th>Statut</th>
    <th>Auteur</th>
    <th>Résumé</th>
	<th>Assigné à</th>
	<th>Date</th>
  </tr>
</table>
</div>
</div>

</div>

<script type="text/javascript">



function myFunction() {
    var x = document.getElementById("dashboard");
	 var y = document.getElementById("user");
	 var z = document.getElementById("tickets");
    if (x.style.display == "none") {
        x.style.display = "block";
		y.style.display = "none";
		z.style.display = "none";
		document.getElementById("title").innerHTML = "Tableau de bord";
    } else {
        x.style.display = "block";
		y.style.display = "none";
		z.style.display = "none";
		document.getElementById("title").innerHTML = "Tableau de bord";
    }
	}

function myFunction1() {
    var x = document.getElementById("user");
	var y = document.getElementById("dashboard");
	 var z = document.getElementById("tickets");
    if (x.style.display == "none") {
		 x.style.display = "block";
		 y.style.display = "none";
		 z.style.display = "none";
		 document.getElementById("title").innerHTML = "Utilisateurs";
    }  else {
        x.style.display = "block";
		y.style.display = "none";
		z.style.display = "none";
		document.getElementById("title").innerHTML = "Utilisateurs";
		
    }
	}
function myFunction2() {
    var x = document.getElementById("tickets");
	var y = document.getElementById("user");
	 var z = document.getElementById("dashboard");
    if (x.style.display == "none") {
		 x.style.display = "block";
		 y.style.display = "none";
		 z.style.display = "none";
		 document.getElementById("title").innerHTML = "Tickets";
    } else {
        x.style.display = "block";
		y.style.display = "none";
		z.style.display = "none";
		document.getElementById("title").innerHTML = "Tickets";
    }
	
}
</script>  
  
</main>

</body>
  <div id="footer">
<a>© SAS Domisep - Tous droits réservés </a>
</div>
</html>
