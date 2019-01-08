<?php

// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
require "controleurs/verif_session.php";
include('controleurs/nb_online.php');

// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {

	echo '<body>';
	echo 'Bonjour '.$_SESSION['email'].'.';
	echo '<br />';
	$email=$_SESSION['email'];
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

<!Doctype html>

<html lang="fr">



<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' type='text/css' href='../CSS/profil.css' media='screen'/>
<link rel="icon" href="../CSS/icons/profile.jpg"/>

<!------------------header------------->
<header>
		<title>Modifier son profil</title>
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
	<h3>MODIFIER MON PROFIL</h3>
	<h5 style="text-align:center">Modifier les champs nécessaires</h5>
	<br>
	<form method="POST" action="./controleurs/update_Mail.php"><br>
	<p> Adresse Mail: </p>

	<input type="text" name='AdresseMail' placeholder=
	<?php echo ''.$_SESSION['email'].''; ?> >
	<select name="id1" style="visibility:hidden;" >
                <?php
                $table="utilisateur";
                $resultat=$bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['id'].'">' . $data['id'] . '</option>';
                } ?>
            </select>
<input type="submit" value="Modifier">
         </form>
	<form method="POST" action="./controleurs/update_Nom.php"><br>
	<p> Nom: </p>

	<input type="text" name='Nom' placeholder=
	<?php
            $table = "utilisateur";
            // On récupère tout le contenu de la table utilisateur
            $reponse = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
            $donnees = $reponse->fetch()?>
            <?php echo $donnees['Nom'];?>>
			<select name="id1" style="visibility:hidden;" >
                <?php
                $table="utilisateur";
                $resultat=$bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['id'].'">' . $data['id'] . '</option>';
                } ?>
            </select>
<input type="submit" value="Modifier">
         </form>
	<form method="POST" action="./controleurs/update_Prenom.php"><br>
	<p> Prénom: </p>

	<input type="text" name='Prenom' placeholder=
	<?php
            $table = "utilisateur";
            // On récupère tout le contenu de la table utilisateur
            $reponse = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
            $donnees = $reponse->fetch()?>
            <?php echo $donnees['Prenom'];?>>
			<select name="id1" style="visibility:hidden;" >
                <?php
                $table="utilisateur";
                $resultat=$bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['id'].'">' . $data['id'] . '</option>';
                } ?>
            </select>
<input type="submit" value="Modifier">
         </form>

	<form method="POST" action="./controleurs/update_DateDeNaissance.php"><br>
	<p> Date de Naissance: (AAAA-MM-JJ)</p>

	<input type="Date" name='DateDeNaissance' placeholder=
	<?php
            $table = "utilisateur";
            // On récupère tout le contenu de la table utilisateur
            $reponse = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
            $donnees = $reponse->fetch()?>
            <?php echo $donnees['DateDeNaissance'];?>>
			<select name="id1" style="visibility:hidden;" >
                <?php
                $table="utilisateur";
                $resultat=$bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['id'].'">' . $data['id'] . '</option>';
                } ?>
			</select>
			<input type="submit" value="Modifier">
			
		<form method="POST" action="./controleurs/update_MDP.php"><br>	
		<p> Mot de Passe</p>
		<input type="text" name='MDP' placeholder="Changer le mot de passe ...">
		<select name="id1" style="visibility:hidden;" >
                <?php
                $table="utilisateur";
                $resultat=$bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['id'].'">' . $data['id'] . '</option>';
                } ?>
			</select>
<input type="submit" value="Modifier">
         </form>
	<p>
	<br>
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