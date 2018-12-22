<?php

// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
require "controleurs/verif_session.php";

// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {

	echo '<body>';
	echo 'Votre login est '.$_SESSION['email'].' et votre mot de passe est '.$_SESSION['pass'].'.';
	echo '<br />';
}
else {
	echo 'Les variables ne sont pas déclarées.';
}
?>

<!DOCTYPE html>
<html lang="fr">


<head>
    <title>MyDoms Accueil</title>	
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
           <link rel='stylesheet' type='text/css' href='../CSS/admin.css' media='screen'/>
	   
</head>
<nav>
  
  <header>
    <span><img src="../CSS/icons/hd.png" alt="img"></img></span>
    Support
    <a></a>
  </header>
  
  </br>
  <ul>
    <li><a onclick="myFunction()">Tickets</a></li>
    <li><a onclick="myFunction1()">Statistiques</a></li>
	 
  </ul>
  
</nav>

<main>
  
  <h1 id="title">Support</h1>
  
  <div id="stats"> 
<div class="flex-grid">
    <div>
	<h2>Filtres</h2>
	</div>
	<div>
	<h2>KPI</h2>
	</div>
	<div>
	<h2>KPI</h2>
	</div>
 </div>
 <div class="flex-grid">
    <div>
	<h2>Tableau</h2>
	</div>
 </div>
 <div class="flex-grid">
    <div>
	<h2>Graphique</h2>
	</div>
 </div>
</div>
  <div class="flex-grid">
  
  <div id="tickets2"> 
    </br>
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
	
	

  
</main>

</body>




<script type="text/javascript">



function myFunction() {
    var x = document.getElementById("tickets2");
	 var y = document.getElementById("stats");
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

function myFunction1() {
    var x = document.getElementById("stats");
	var y = document.getElementById("tickets2");
	 
    if (x.style.display == "none") {
		 x.style.display = "block";
		 y.style.display = "none";
		 z.style.display = "none";
		 document.getElementById("title").innerHTML = "Statistiques";
    }  else {
        x.style.display = "block";
		y.style.display = "none";
		z.style.display = "none";
		document.getElementById("title").innerHTML = "Statistiques";
		
    }
	}
</script>

</html>
