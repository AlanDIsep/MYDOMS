<?php

// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
require "controleurs/verif_session.php";
include('controleurs/nb_online.php');

// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {

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
<br>
<br>
<br>
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
    <p>Veuillez contacter par mail le service client DomIsep afin d'obtenir la procédure à suivre à l'adresse suivante</p>
		<p align="center">administrateur@domisep.fr</p>
    </div>

    <button class="accordion">Modifier mon mot de passe personnel </button>
    <div class="panel">
    <p>Veuillez vous rendrez dans la rubrique "Mon Compte" / Modifier mon mot de passe afin de modifier votre mot de passe.</p>
    </div>

    <button class="accordion">Créer un compte utilisateur</button>
    <div class="panel">
    <p>Veuillez contacter par téléphone ou par mail le service client DomIsep afin d'obtenir la procédure à suivre</p>
    </div>
    <br>
    <br>

		<h2 style=color:#DCE837>Eclairage</h2>

    <button class="accordion">Gérer ses éclairages</button>
    <div class="panel">
	    <p>• Votre application vous permet de gérer vos CeMAC d'éclairage en toute quiétude.</p>
			<P>Pour se faire suivez les étapes suivantes:
					<br>
					<br> Accédez à l'onglet <a href="index.php?cible=utilisateurs&fonction=gerer_maison" style="text-decoration:none">Gestion maison</a>
	        <br> Cliquez sur la catégorie <a href="index.php?cible=utilisateurs&fonction=Temperature" style="text-decoration:none">Eclairage</a>
					<br>Vous pouvez allumer vos équipements grâce au premier bouton.
					<br>Vous pouver gérer l'intensité lumineuse de vos équipements grâce au second bouton.
					<br> N'oubliez pas de cliquer sur appliquer pour lancer vos équipements.
	    </p>
		</div>
		<button class="accordion">Créer un profils lumineux</button>
		<div class="panel">
			<p>• Vous pouvez programmer des profils lumineux vous permettant d'automatiser l'allumage de plusieurs lumières en même temps.</p>
			<p>Pour se faire suivez les étapes suivantes:
					<br>
					<br> Accédez à l'onglet <a href="index.php?cible=utilisateurs&fonction=gerer_maison" style="text-decoration:none">Gestion maison</a>
					<br> Cliquez sur la catégorie <a href="index.php?cible=utilisateurs&fonction=Configuration" style="text-decoration:none">profils lumineux</a>
					<br> La fenêtre de gauche vous permet de créer votre profils. Nommer votre profils (par exemple:"Parcours_cuisine") et configurer l'allumage et la luminosité de capteurs à allumer pour ce profils.
					<br>La fenêtre "profils lumineux" vous permet d'avoir l'historique des profils que vous avez créé.
					<br>La fenêtre "Etat des profils" vous permet d'afficher l'état des profils.
					<br>Enfin, vous pouvez supprimer un profils que vous ne jugez plus pertinent depuis la fenêtre "Supprimer un profils"
					<br>Une fois votre pacours créé, vous pouvez le lancer depuis la fenêtre "Etat des profils".
			</p>
			<br>
		</div>

    <h2 style=color:#DCE837>Température</h2>
    <button class="accordion">Différents modes</button>
    <div class="panel">
    <p>• Votre application vous permet de gérer vos CeMAC de température en toute quiétude.
		Pour se faire suivez les étapes suivantes:
			<br>
			<br>  Accédez à l'onglet <a href="index.php?cible=utilisateurs&fonction=gerer_maison" style="color:black;text-decoration:none">Gestion maison</a>
			<br>  Cliquez sur la catégorie <a href="index.php?cible=utilisateurs&fonction=Temperature" style="color:black;text-decoration:none">Température</a>
			<br>Vous pouvez allumer vos équipements grâce au premier bouton.
			<br>Vous pouver gérer le degré de température de vos équipements grâce au second bouton.
			<br> N'oubliez pas de cliquer sur appliquer pour lancer vos équipements.
    </p>
    </div>

		<h2 style=color:#DCE837>Utilisation</h2>

		<button class="accordion">Comment utiliser l'application ?</button>
    <div class="panel">
			<p>Une fois connectée, vous pourrez aisément profiter des fonctionnalités proposées par votre application domotique</p>
		</div>

			<button class="accordion">Navigation</button>
			<div class="panel">
				<p>La partie supérieur de l'application vous permet de naviguer à travers les différentes fonctionnalités à ce jour proposées</p>
			</div>

			<button class="accordion">Tableau de bord</button>
			<div class="panel">
				<p>La page <a href="index.php?cible=utilisateurs&fonction=Accueil" style="color:black;text-decoration:none">"Tableau de bord"</a>, première page à laquelle vous accedez une fois connectée,
				vous donne la possibilité de visualiser l'état de vos capteurs à l'instant T.</p>
				<p>De même, vous pourrez obtenir les statistiques d'utilisation de votre application.</p>
				<p>Par exemple, pour obtenir la statistique d'utilisation d'un capteur de luminosité, cliquez sur lumière.</p>
			</div>

			<button class="accordion">Gestion maison</button>
			<div class="panel">
				<p>La page <a href="index.php?cible=utilisateurs&fonction=gerer_maison" style="color:black;text-decoration:none">"Gestion maison"</a>, vous permet de gérer vos capteurs de
				température et de luminosité. L'utilisation de ces capteurs est décrite dans les sections plus basses.</p>
			</div>

			<button class="accordion">FAQ</button>
			<div class="panel">
				<p>La page <a href="index.php?cible=utilisateurs&fonction=FAQ" style="color:black;text-decoration:none">"FAQ"</a>, vous permet d'avoir toutes les solutions
				dex problématiques récurrentes rencontrées par les utilisateurs de la solution.</p>
			</div>

				<button class="accordion">Contact</button>
				<div class="panel">
				<p>Enfin la page, <a href=index.php?cible=utilisateurs&fonction=Contact style="color:black;text-decoration:none">"Contact"</a> vous permet de contacter les services
				de DomIsep</p>
				</div>

			</p>

			<h2 style=color:#DCE837>Contact</h2>
			<button class="accordion">Contacter les services DomIsep</button>
			<div class="panel">
			<p>Vous pouvez contacter par mail les services DomIsep aux adresses proposées dans la page contact:</p>
			</div>

	    <br>
	    <br>
	    <br>

    </div>


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

</main>

<!-------------------Footer-------------->
<footer>
        <div id="footer">
                <a href="index.php?cible=utilisateurs&fonction=About">© SAS Domisep - Tous droits réservés - A propos</a>
                </div>
</footer>




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
</html>
