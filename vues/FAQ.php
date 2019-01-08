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
<link rel='stylesheet' type='text/css' href='../CSS/FAQ.css' media='screen'/>
<link rel="icon" href="../CSS/images/interrogative.ico"/>


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
					<a href="index.php?cible=utilisateurs&fonction=Profil"><img title="Profil" src="../CSS/icons/Bandeau/profil.png" class="logo3"/></a>
         			<a href="index.php?cible=utilisateurs&fonction=FAQ"><img title="FAQ" src="../CSS/icons/Bandeau/faq1.png" class="logo3"/></a>
         			<a href="index.php?cible=utilisateurs&fonction=Contact"><img title="Contact" src="../CSS/icons/Bandeau/contact.png" class="logo3"/></a>

				</div>
			</div>

<!-------------------Main-------------->
<main>
    <!-------------------Accordéon-------------->

<br>
		<h2 style=color:#DCE837>Se connecter</h2>

    <button class="accordion">Comment se connecter ?</button>
    <div class="panel">
    <p>• Vous vous connectez pour la 1ère fois à votre Espace Client :
            <br>
            <br> <b>ETAPE</b> 1 : Saisissez votre identifiant et votre mot de passe temporaire reçus par courrier.
            <br>
            <br> <b>ETAPE 2</b> : Personnalisation de votre mot de passe :
            <br>
            <br>- Il vous sera demandé de saisir 2 fois un nouveau mot de passe personnel composé de 8 caractères minimum (le nouveau mot de passe doit être différent du mot de passe temporaire et doit contenir au moins une lettre minuscule, une lettre majuscule, et un chiffre),
            <br>- Une confirmation de la prise en compte de votre mot de passe personnel sera affichée,
            <br>- Vous devrez ensuite vous identifier à nouveau pour accéder à votre Espace Client.

            <br><br><br>• Vous vous êtes déjà connecté à votre Espace Client : <br>

            <br>Connectez-vous à votre Espace Client avec votre identifiant et votre mot de passe personnel.</p>
    </div>

    <button class="accordion">J'ai oublié mon mot de passe personnel ?</button>
    <div class="panel">
    <p>Veuillez contacter par téléphone le service client DomIsep afin d'obtenir la procédure à suivre</p>
    </div>

    <button class="accordion">Modifier mon mot de passe personnel </button>
    <div class="panel">
    <p>Veuillez vous rendrez dans la rubrique "Mon Compte" / Modifier mon mot de passe</p>
    </div>

    <button class="accordion">Créer un compte utilisateur</button>
    <div class="panel">
    <p>Veuillez contacter par téléphone ou par mail le service client DomIsep afin d'obtenir la procédure à suivre</p>
    </div>
    <br>
    <br>

		<h2 style=color:#DCE837>Eclairage</h2>
    <button class="accordion">Différents modes</button>
    <div class="panel">
    <p>• Votre application vous permet de gérer vos CeMAC d'éclairage en toute quiétude.
		Pour se faire suivez les étapes suivantes:
				<br>
				<br> Accédez à l'onglet Gestion maison
        <br> Cliquez sur la catégorie <b><a href="index.php?cible=utilisateurs&fonction=Eclairage" style="text-decoration:none">Eclairage</a>
    </p>
    </div>
    <br>
    <br>

    <h2 style=color:#DCE837>Température</h2>
    <button class="accordion">Différents modes</button>
    <div class="panel">
    <p>• Votre application vous permet de gérer vos CeMAC de température en toute quiétude.
		Pour se faire suivez les étapes suivantes:
			<br>
			<br>- Accédez à l'onglet Gestion maison
			<br>- Cliquez sur la catégorie <a href="index.php?cible=utilisateurs&fonction=Temperature" style="text-decoration:none">Température</a>
    </p>
    </div>
		<h2 style=color:#DCE837>Utilisation</h2>
    <?php
                $table="faq";
                $resultat=$bdd->query("SELECT * FROM faq");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['QuestionRecurentes'].'">' . $data['QuestionRecurentes'] . '</option>';
                } ?>
    </button>
    <div class="panel">
    <?php
                $table="faq";$resultat=$bdd->query("SELECT * FROM faq");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {echo  '<option value="'.$data['Reponse'].'">' . $data['Reponse'] . '</option>';}
                ?>
    </div>


    <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
    </script>
    <br>
    <br>
    <br>
</main>

<!-------------------Footer-------------->
<footer>
        <div id="footer">
                <a href="index.php?cible=utilisateurs&fonction=About">© SAS Domisep - Tous droits réservés - A propos</a>
                </div>
</footer>


</html>
