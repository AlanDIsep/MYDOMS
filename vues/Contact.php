<?php

// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
require "controleurs/verif_session.php";
include('controleurs/nb_online.php');

// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {


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

<!-------------------Lien vers les feuilles CSS/icones/polices-------------->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' type='text/css' href='../CSS/Contact.css' media='screen'/>
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
			<!-------------------Contenu-------------->
      
			<br>
            <!-- test de contact -->
            <div class="wrapper">
            <div class="one">
                
      <h2 style=color:#DCE837 align="center">Contact Domisep</h2>
      <div class="container">
              &#9993;
						<a href="mailto:commercial@domisep.fr?subject=MYDOMS_COMMERCIAL" style="color:black;text-decoration:none;text-align:center">CONTACT</a>
				</p>
      </div>
      </div>
      <div class="two">
      <h2 style=color:#DCE837 align="center">Support Utilisateur</h2>
      <div class="container">
              &#9993;
            <a href="mailto:commercial@domisep.fr?subject=MYDOMS_ADMINISTRATEUR" style="color:black;text-decoration:none">CONTACT</a>
        </p>
      </div>
</div>



      	<br>
          <div class="three">
        <h2 style=color:#DCE837 align="center">Signaler une panne capteur</h2>
		<div class="container">

        <form method="POST" action="">
        <select name="DroitUtilisateur_idDroitUtilisateur" style="visibility:hidden;" >
                <?php
                $table="utilisateur";
                $resultat=$bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['id'].'">' . $data['id'] . '</option>';
                } ?>
            </select>

            <label for="object">Type de panne *</label>
            <select name="typePanne" >
            <option value="0"></option>
                <?php
                $table="typePanne";
                $resultat=$bdd->query("SELECT * FROM typePanne");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['typePanne'].'">' . $data['typePanne'] . '</option>';
                } ?>
            </select>

            <label for="object">Type de capteur</label>
            <select name="Equipement_id" >
            <option value="0"></option>
                <?php
                $table="equipement";
                $resultat=$bdd->query("SELECT * FROM equipement WHERE idUser=$id1");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['idEquipement'].'">' . $data['Type'] . ' ' . $data['Nom'] . '</option>';
                } ?>
            </select>


            <label for="Message">Description de la panne * </label>
            <textarea id="message" name="DescriptionPanne" placeholder="Ecrivez ici..." style="height:200px" required></textarea>

            <label for="date">Date de la panne *</label><br>
            <input type="date" id="datepanne" name="Date" required>
            <br><br>
<<<<<<< HEAD
<<<<<<< HEAD
            <?php
<<<<<<< HEAD

=======
  
  $url = "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=0G6C";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $data = curl_exec($ch);
  curl_close($ch);
  $data_tab = str_split($data,33);
  if ($type_capteur == "Capteur de Luminosité") {
    $type_capteur_num = "5";
  } else if ($type_capteur == "Capteur de distance") {
    $type_capteur_num = "1";
  }
  $res = "0";
  for($i=0, $size=count($data_tab);$i<$size;$i++){
    $trame = $data_tab[$i];
    //echo "$trame <br/>";
    list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1d%4s%1s%1s%2x%4s%4s%2s%4d%2d%2d%2d%2d%2d");
    if ($c == $type_capteur_num) {
      $res = (int)$v;
    }
  }
 ?>
>>>>>>> b92faedd5f7595355f1cbd0da3bc058112810d77
<br>

            <input type="submit" value="Envoyer">
         </form>
    </div>
    </div>

    <br><br>




<!-------------------Footer-------------->


<div id="footer">
        <a href="index.php?cible=utilisateurs&fonction=About">© SAS Domisep - Tous droits réservés - A propos</a>
        </div>



</html>
