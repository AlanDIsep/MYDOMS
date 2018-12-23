<?php

// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
require "controleurs/verif_session.php";
include('controleurs/nb_online.php');

// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {

	echo '<body>';
	echo 'Votre login est '.$_SESSION['email'].' et votre mot de passe est '.$_SESSION['pass'].'.';
    echo '<br />';
    $email=$_SESSION['email'];
}
else {
	echo 'Les variables ne sont pas déclarées.';
}
?>
<!Doctype html>
<html lang="fr">


<!-------------------Lien vers les feuilles CSS/icones/polices-------------->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' type='text/css' href='../CSS/contact.css' media='screen'/>
<link rel="icon" href="../CSS/images/contact.ico"/>

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
                    <a href="index.php?cible=utilisateurs&fonction=FAQ"><img title="FAQ" src="../CSS/icons/Bandeau/faq.png" class="logo3"/></a>
                    <a href="index.php?cible=utilisateurs&fonction=Contact"><img title="Contact" src="../CSS/icons/Bandeau/contact1.png" class="logo3"/></a>

				</div>
			</div>
    <h1 align="center" style="color:#FFF">Support technique</h1>

    <!-------------------Contenu-------------->

    <div class="container">

        <form method="POST" action="">
        <label for="Nom">Id utilisateur:</label>
        <select name="DroitUtilisateur_idDroitUtilisateur" >
                <?php
                $table="utilisateur";
                $resultat=$bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['id'].'">' . $data['id'] . '</option>';
                } ?>
            </select>
            <label for="idequipement">Id Équipement *</label>
            <input type="text" id="prenom" name="Equipement_id" placeholder="N° de série de votre équipement" required>

            <label for="object">Type de capteur</label>
            <select name="typePanne" >
                <?php
                $table="equipement";
                $resultat=$bdd->query("SELECT * FROM equipement");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['Type'].'">' . $data['Type'] . '</option>';
                } ?>
            </select>
						
            <label for="object">Type de panne *</label>
            <select name="typePanne" >
                <?php
                $table="typePanne";
                $resultat=$bdd->query("SELECT * FROM typePanne");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['typePanne'].'">' . $data['typePanne'] . '</option>';
                } ?>
            </select>
            <label for="Message">Description de la panne * </label>
            <textarea id="message" name="DescriptionPanne" placeholder="Ecrivez ici..." style="height:200px" required></textarea>

            <label for="date">Date de la panne *</label><br>
            <input type="date" id="datepanne" name="Date" required>
            <br><br>
            <input type="submit" value="Envoyer">
         </form><br><br>
    </div>

    <br><br><br><br>



</main>

<!-------------------Footer-------------->


<div id="footer">
        <a href="index.php?cible=utilisateurs&fonction=About">© SAS Domisep - Tous droits réservés - A propos</a>
        </div>



</html>
