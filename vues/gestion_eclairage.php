<?php

// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
require "controleurs/verif_session.php";
include('controleurs/nb_online.php');

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


<!Doctype html>
<html lang="fr">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' type='text/css' href='../CSS/temperature.css' media='screen'/>
<link rel="icon" href="../CSS/icons/lumiere.ico"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<!------------------header------------->

<header>
		<title>Gestion de l'éclairage</title>	
		<a href="index.php?cible=utilisateurs&fonction=Accueil"><img src="../CSS/mydoms.jpg" alt="logo" class="logo"></a>
		<a href="vues/deconnexion.php"><img title="Logout" src="../CSS/icons/Bandeau/deconnexion.png" class="logo3ter"></a>
		
		
</header>

		
			<!-------------------Titre de la Page--------------> 
			<div class="titlepage">
				<div class="bordertitle">
					<a href="index.php?cible=utilisateurs&fonction=Accueil"><img title="Tableau de bord" src="../CSS/icons/Bandeau/bord.png" class="logo5"/></a>
					<a href="index.php?cible=utilisateurs&fonction=gerer_maison"><img title="Gérer ma maion" src="../CSS/icons/Bandeau/accueil1.png" class="logo6"/></a>
					<a href="index.php?cible=utilisateurs&fonction=Profil"><img title="Profil" src="../CSS/icons/Bandeau/profil.png" class="logo3"/></a>
         			<a href="index.php?cible=utilisateurs&fonction=FAQ"><img title="FAQ" src="../CSS/icons/Bandeau/faq.png" class="logo3"/></a>
         			<a href="index.php?cible=utilisateurs&fonction=Contact"><img title="Contact" src="../CSS/icons/Bandeau/contact.png" class="logo3"/></a>

				</div>
			</div>

<!-------------------Main-------------->
<body>
  <main>
      

 <div class="container">
        <button class="toggle">Chambre 1</button>     
        <button class="toggle1">Salon</button>
        <button class="toggle2">Cuisine</button> 
        <button class="toggle3">Chambre 2</button>
    </div>
    
    <div class="space"></div>
    
	
    <div id="conteneur">
	<div id="target">
		<h2 class="color-t">Chambre 1 </h2>
        <div>
		<label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
		</label></div>
		</br>
		<img src="../CSS/icons/lumi.jpg" class="lumi"/>
		</br>
        <output for="range" class="output" id="temp" value="0">0%</output>
		</br>
		
		<label for="range">
        <input type="range" name="range" id="range" min="0" max="100" step="5" value="0"/>
		</label>
 
    </div>

	<div id="target1">
        <h2 class="color-t">Salon </h2>
        <div>
		<label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
		</label>
		</div>
		</br>
		<img src="../CSS/icons/lumi.jpg" class="lumi"/>
		</br>
        <output for="range" class="output2" id="temp" value="0">20%</output>
		</br>
		
		<label for="range">
        <input type="range" name="range" id="range2" min="0" max="100" step="5" value="20"/>
		</label>
    </div>
	
	<div id="target2">
        <h2>Cuisine</h2>
		<div>
        <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
        </label></div>
		</br>
		<img src="../CSS/icons/lumi.jpg" class="lumi"/>
		</br>
        <output for="range" class="output3" id="temp" value="0">70%</output>
		</br>
		
		<label for="range">
        <input type="range" name="range" id="range3" min="0" max="100" step="5" value="70"/>
		</label>
    </div>
	
	<div id="target3">
        <h2>Chambre 2</h2>
		<div>
        <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
        </label></div>
		</br>
		<img src="../CSS/icons/lumi.jpg" class="lumi"/>
		</br>
        <output for="range" class="output4" id="temp" value="0">20%</output>
		</br>
		
		<label for="range">
        <input type="range" name="range" id="range4" min="0" max="100" step="5" value="20"/>
		</label>
		
    </div>
	
</div>	



  </main>
  
  
  </body>
  
    <script type="text/javascript">
    //affichage de la première fenêtre
	$('.toggle').click(function() 
	{
		$('#target').toggle('slow');
		$(this).toggleClass("active");
	});
	//affichage de la deuxième fenêtre
	$('.toggle1').click(function() 
	{
		$('#target1').toggle('slow');
		$(this).toggleClass("active");
	});
	$('.toggle2').click(function() 
	{
		$('#target2').toggle('slow');
		$(this).toggleClass("active");
	});
	$('.toggle3').click(function() 
	{
		$('#target3').toggle('slow');
		$(this).toggleClass("active");
	});
     </script>

<script>

$('#range').on("input", function() {
    $('.output').val(this.value +"%" );
    }).trigger("change");
	
	$('#range2').on("input", function() {
    $('.output2').val(this.value +"%" );
    }).trigger("change");
	
	$('#range3').on("input", function() {
    $('.output3').val(this.value +"%" );
    }).trigger("change");
	
	$('#range4').on("input", function() {
    $('.output4').val(this.value +"%" );
    }).trigger("change");
</script>


    
<!-------------------Footer-------------->
<footer>
    <div id="footer">
        <a href="index.php?cible=utilisateurs&fonction=About">© SAS Domisep - Tous droits réservés - A propos</a>
        </div>
</footer>



</html>
