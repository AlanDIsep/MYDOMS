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
		<img title="Logout" src="../CSS/icons/Bandeau/deconnexion.png" class="logo3ter"/>


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
    <h1 align="center" style="color:#FFF">Formulaire de contact</h1>

    <!-------------------Contenu-------------->

    <div class="container">

        <form action="action_page.php">

            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Votre nom">

            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Votre prénom">

            <label for="object">Objet</label>

            <select id="object" name="object">
                <option value="Demande d'informations">Demande d'informations</option>
                <option value="Problème d'utilisation">Problème d'utilisation</option>
                <option value="Autre">Autre</option>
								<option value="Demande ajout de maison">Demander d'ajouter une maison </option>
            </select>

            <label for="Message">Message</label>
            <textarea id="message" name="message" placeholder="Ecrivez ici..." style="height:200px"></textarea>

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
