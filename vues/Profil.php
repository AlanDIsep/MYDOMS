<?php

// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
require "controleurs/verif_session.php";
include('controleurs/nb_online.php');

// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {

	
	echo 'Bonjour '.$_SESSION['email'].'.';
	
	$email=$_SESSION['email'];
	
}
else {
	echo 'Les variables ne sont pas déclarées.';
}


?>

<!Doctype html>

<html lang="fr">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' type='text/css' href='../CSS/profil.css' media='screen'/>
<link rel="icon" href="../CSS/icons/profile.jpg"/>
</head>




<body>
<!------------------header------------->

		<title>Accueil</title>
		<a href="index.php?cible=utilisateurs&fonction=Accueil"><img src="../CSS/mydoms.jpg" alt="logo" class="logo"></a>
		<a href="vues/deconnexion.php"><img title="Logout" src="../CSS/icons/Bandeau/deconnexion.png" class="logo3ter"></a>





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


	<div id="profil">
	<img src="../CSS/icons/profile.jpg" alt="user" class="image"/>
	<h3>MON PROFIL</h3>
	<p> Adresse Mail: </p>
	<div class="champs">
	<?php
		if (isset($_SESSION['email'])) {
		echo ''.$_SESSION['email'].'';
		echo '<br />';
		}else {
		echo 'Les variables ne sont pas déclarées.';
}
?>
	</div>	
	<p> Nom: </p>

	<div class="champs">
	<?php
            $table = "utilisateur";
            // On récupère tout le contenu de la table utilisateur
            $reponse = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
            $donnees = $reponse->fetch()?>
            <?php echo $donnees['Nom'];?>
            <?php  $reponse->closeCursor(); // Termine le traitement de la requête ?>
			<br>
			</div>	


	<p> Prénom: </p>

	<div class="champs">
	<?php
            $table = "utilisateur";
            // On récupère tout le contenu de la table utilisateur
            $reponse = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
            $donnees = $reponse->fetch()?>
            <?php echo $donnees['Prenom'];?>
            <?php  $reponse->closeCursor(); // Termine le traitement de la requête ?>
			<br>
			</div>	


	<p> Adresse: </p>

	<div class="champs">
	<?php
            $table = "utilisateur";
            // On récupère tout le contenu de la table utilisateur
            $reponse = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
            $donnees = $reponse->fetch()?>
            <?php echo $donnees['AdresseFacturation'];?>, <?php echo $donnees['CodePostal'];?>, <?php echo $donnees['Ville'];?>
            <?php  $reponse->closeCursor(); // Termine le traitement de la requête ?>
			<br>
			</div>	


	<p> Date de Naissance:</p>

	<div class="champs">
	<?php
            $table = "utilisateur";
            // On récupère tout le contenu de la table utilisateur
            $reponse = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
            $donnees = $reponse->fetch()?>
            <?php echo $donnees['DateDeNaissance'];?>
            <?php  $reponse->closeCursor(); // Termine le traitement de la requête ?>
			<br>
			</div>	


	<p>Maison actuellement gérée:</p>
	<div class="champs">
	<?php
			$table = "utilisateur";
			$table = "habitation";
			// On récupère tout le contenu de la table utilisateur
			$id1 = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
			// On récupère l'id de la table habitation
			$id=$donnees['id'];
            $reponse = $bdd->query("SELECT * FROM habitation WHERE idUtilisateur=$id");
            $donnees = $reponse->fetch()?>
            <?php echo $donnees['NomMaison'];?>
            <?php  $reponse->closeCursor(); // Termine le traitement de la requête ?>
			<br>
			</div>	<br><br>
	<p>
	<div class="button">
	<a style="text-align:center" href="index.php?cible=utilisateurs&fonction=Modification_Profil">
	<h4 style="color:white">Modifier</h4>
	</a>
	</div>
	</div>

<div class="space">


</div>







<!-------------------Footer-------------->

		<div id="footer">
				<a href="index.php?cible=utilisateurs&fonction=About">© SAS Domisep - Tous droits réservés - A propos</a>
				</div>


</body>

</html>