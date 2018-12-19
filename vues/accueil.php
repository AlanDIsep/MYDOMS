<?php

// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' type='text/css' href='../CSS/accueil.css' media='screen'/>
<link rel="icon" href="../CSS/images/contact.ico"/>
<!------------------Header------------->

	<header>
		<title>Accueil</title>
		<a href="index.php?cible=utilisateurs&fonction=Accueil"><img src="../CSS/mydoms.jpg" alt="logo" class="logo"></a>
		<a href="vues/deconnexion.php"><img title="Logout" src="../CSS/icons/Bandeau/deconnexion.png" class="logo3ter"></a>

	</header>


<!-------------------Titre de la Page-------------->
<div class="titlepage">
		<div class="bordertitle">
			<a href="index.php?cible=utilisateurs&fonction=Accueil"><img title="Tableau de bord" src="../CSS/icons/Bandeau/bord1.png" class="logo5"/></a>
			<a href="index.php?cible=utilisateurs&fonction=gerer_maison"><img title="Gérer ma maion" src="../CSS/icons/Bandeau/accueil.png" class="logo6"/></a>
			<a href="index.php?cible=utilisateurs&fonction=Profil"><img title="Profil" src="../CSS/icons/Bandeau/profil.png" class="logo3"/></a>
         	<a href="index.php?cible=utilisateurs&fonction=FAQ"><img title="FAQ" src="../CSS/icons/Bandeau/faq.png" class="logo3"/></a>
         	<a href="index.php?cible=utilisateurs&fonction=Contact"><img title="Contact" src="../CSS/icons/Bandeau/contact.png" class="logo3"/></a>

		</div>
	</div>

<!-------------------Contenu-------------->
<div class="wrapper">
	<div class="one">
		<div class="container">
		<img src="../CSS/images/temperaturedash.svg" class="imagedash">
		Chambre 1<br>
		<hr width= 100% color=#DCE837>
		<div class="temperature">20°C</div>
		</div>
	</div>
	<div class="two">
			<div class="container">
					<img src="../CSS/images/temperaturedash.svg" class="imagedash">
			Salon<br>
			<hr width= 100% color=#DCE837>
			<div class="temperature">18°C</div>
			</div>
	</div>
	<div class="three">
			<div class="container">
					<img src="../CSS/images/temperaturedash.svg" class="imagedash">
			Cuisine
			<hr width= 100% color=#DCE837>
			<div class="temperature">21°C</div>
			</div>
	</div>
	<div class="four">
			<div class="container">
					<img src="../CSS/images/temperaturedash.svg" class="imagedash">
			Chambre 2
			<hr width= 100% color=#DCE837>
			<div class="temperature">20°C</div>
			</div>
	</div>

	<div class="five">
		<div class="container">
				<img src="../CSS/images/lumieredash.svg" class="imagedash">
		Chambre 1<br>
		<hr width= 100% color=#DCE837>
		<div class="temperature">ON</div>
		</div>
	</div>
	<div class="sixth">
			<div class="container">
					<img src="../CSS/images/lumieredash.svg" class="imagedash">
			Salon<br>
			<hr width= 100% color=#DCE837>
			<div class="temperature">OFF</div>
			</div>
	</div>
	<div class="seven">
			<div class="container">
					<img src="../CSS/images/lumieredash.svg" class="imagedash">
			Cuisine
			<hr width= 100% color=#DCE837>
			<div class="temperature">OFF</div>
			</div>
	</div>
	<div class="height">
			<div class="container">
					<img src="../CSS/images/lumieredash.svg" class="imagedash">
			Chambre 2
			<hr width= 100% color=#DCE837>
			<div class="temperature">ON</div>
			</div>
		</div>
	<div class="nine">
			<div class="container">
				Graphique
				<hr width= 100% color=#DCE837>
				<div class="temperature"></div>
			</div>
		</div>
</div>


<div id="footer">
<a href="index.php?cible=utilisateurs&fonction=About">© SAS Domisep - Tous droits réservés - A propos</a>
</div>

</body>
</html>
