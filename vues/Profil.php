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
<!Doctype html>

<html lang="fr">



<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' type='text/css' href='../CSS/profil.css' media='screen'/>
<link rel="icon" href="../CSS/icons/profile.jpg"/>

<!------------------header------------->
<header>
		<title>Accueil</title>
		<a href="index.php?cible=utilisateurs&fonction=Accueil"><img src="../CSS/mydoms.jpg" alt="logo" class="logo"></a>
		<a href="vues/deconnexion.php"><img title="Logout" src="../CSS/icons/Bandeau/deconnexion.png" class="logo3ter"></a>


</header>


			<!-------------------Titre de la Page-------------->
			<div class="titlepage">
				<div class="bordertitle">
					<a href="index.php?cible=utilisateurs&fonction=Accueil"><img title="Tableau de bord" src="../CSS/icons/Bandeau/bord.png" class="logo5"/></a>
					<a href="index.php?cible=utilisateurs&fonction=gerer_maison"><img title="Gérer ma maion" src="../CSS/icons/Bandeau/accueil.png" class="logo6"/></a>
					<a href="index.php?cible=utilisateurs&fonction=Profil"><img title="Profil" src="../CSS/icons/Bandeau/profil1.png" class="logo3"/></a>
         			<a href="index.php?cible=utilisateurs&fonction=FAQ"><img title="FAQ" src="../CSS/icons/Bandeau/faq.png" class="logo3"/></a>
         			<a href="index.php?cible=utilisateurs&fonction=Contact"><img title="Contact" src="../CSS/icons/Bandeau/contact.png" class="logo3"/></a>

				</div>
			</div>
<!-------------------Main-------------->
<main>

	<div id="profil">
	<img src="../CSS/icons/profile.jpg" alt="user" class="image"/>
	<h3>Mon Profil</h3>
	<p> Adresse Mail </p>
	<?php
                $table = "utilisateur";
				// On récupère tout le contenu de la table utilisateur
				$ID_user=$_SESSION['AdresseMail'];
				$reponse = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail = $ID_user");
				?>
				
	<p> Nom </p>
	<p> Prénom </p>
	<p> Adresse </p>
	<p> Date de Naissance</p>
	<p>Maison actuellement gérée</p>
	<p>
	</div>

<div class="space">


</div>


</main>

<!-------------------Footer-------------->
<footer>
		<div id="footer">
				<a href="index.php?cible=utilisateurs&fonction=About">© SAS Domisep - Tous droits réservés - A propos</a>
				</div>
</footer>


</html>
