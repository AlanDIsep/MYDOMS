
<?php

// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
require "controleurs/verif_session.php";

include('controleurs/nb_online.php');

// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {

	echo '<body>';
	echo '<p style=color:white>Bonjour '.$_SESSION['email'].' et bienvenu sur MYDOMS.';

	echo '<br />';
	$email=$_SESSION['email'];
	//$table = "utilisateur";
	//echo $bdd->query("SELECT id FROM utilisateur WHERE 'AdresseMail'='$email'");

            $table = "utilisateur";
            // On récupère tout le contenu de la table utilisateur
            $reponse1 = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
            $donnees1 = $reponse1->fetch();
			$id1 = $donnees1['id'];

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
<link rel="stylesheet" href="./Style/style.css">

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
		<div class=temperature1>
		<img src="../CSS/images/temperaturedash.svg" class="imagedash">
		TEMPÉRATURE</div><br>
		<?php
				$table="equipement";
                $resultat=$bdd->query("SELECT * FROM equipement WHERE idUser=$id1 && Type='Température'");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<hr width= 100% color=#DCE837><option value="'.$data['Nom'].'">' . $data['Nom'] . '</option><div class=temperature><option value="'.$data['Donnee'].'">' . $data['Donnee'] . ' °C</div></option>';
                } ?>
		<hr width= 100% color=#DCE837>

		</div>
	</div>


	<div class="two">
			<div class="container">
			<div class=temperature1>
		<img src="../CSS/images/lumieredash.svg" class="imagedash">
		ÉCLAIRAGE</div><br>
		<?php
                $table="equipement";
                $resultat=$bdd->query("SELECT * FROM equipement WHERE idUser=$id1 && Type='Éclairage'");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<hr width= 100% color=#DCE837><option value="'.$data['Nom'].'">' . $data['Nom'] . '</option><div class=temperature><option value="'.$data['Donnee'].'">' . $data['Donnee'] . ' %</div></option>';
                } ?>
		<hr width= 100% color=#DCE837>
	</div></div>

	<div class="nine">
			<div class="container">
				Récapitulatif journalier (h/h)
				<?php
				include("graphiqueAccueil.php") ?>

			</div>
		</div>
</div>


<div id="footer">
<a href="index.php?cible=utilisateurs&fonction=About">© SAS Domisep - Tous droits réservés - A propos</a>
</div>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>




</html>
