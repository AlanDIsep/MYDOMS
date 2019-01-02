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
} ?>


<!Doctype html>
<html lang="fr">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' type='text/css' href='../CSS/Configuration.css' media='screen'/>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!------------------header-------------> 
<header>
		<title>Configuration de la Maison</title>	
		<a href="index.php?cible=utilisateurs&fonction=Accueil"><img src="../CSS/mydoms.jpg" alt="logo" class="logo"></a>
		<a href="vues/deconnexion.php"><img title="Logout" src="../CSS/icons/Bandeau/deconnexion.png" class="logo3ter"></a>
		
		
</header>

		
			<!-------------------Titre de la Page--------------> 
			<div class="titlepage">
				<div class="bordertitle">
          <a href="index.php?cible=utilisateurs&fonction=Accueil"><img title="Tableau de bord" src="../CSS/icons/Bandeau/bord.png" class="logo5"/></a>
					<a href="index.php?cible=utilisateurs&fonction=gerer_maison"><img title="Gérer ma maion" src="../CSS/icons/Bandeau/accueil1.png" class="logo6"/></a>
					<a href="index.php?cible=utilisateurs&fonction=Profil"><img title="Profil" src="../CSS/icons/Bandeau/profil.png" class="logo3"/></a>
          <a href="index.php?cible=utilisateurs&fonction=FAQ"><img title="FAQ" src="../CSS/icons/Bandeau/faq.png" class="logo3"/></a>
          <a href="index.php?cible=utilisateurs&fonction=Contact"><img title="Contact" src="../CSS/icons/Bandeau/contact.png" class="logo3"/></a>


				</div>
      </div>
<!-------------------Main--------------> 
<div class="wrapper">
<div class="one">
<div class="container">
    <h2> Ajouter une Maison</h2>
    <form method="POST" action="">
    <label for="nom">ID Utilisateur:</label>
    <select name="NumUtilisateur_id" >
                <?php
                $table="utilisateur";
                $resultat=$bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                {
                echo  '<option value="'.$data['id'].'">' . $data['id'] . '</option>';
                } ?>
            </select>
			<br>
    <br>

      <label for="nom">Nom de la Maison*</label>
        <input type="text" id="nommaison" name="NomMaison" placeholder="<?php
            $table = "utilisateur";
            $reponse = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
            $donnees = $reponse->fetch()?>
            <?php echo $donnees['Nom'];?>
            <?php $reponse->closeCursor();?>">

      <label for="superficie">Superficie de la Maison:* <span id="demo"></span> m2</label>
        <div class="slidecontainer">
          <input type="range" min="1" max="150" value="0" name="Superficie" class="slider" id="myRange">
          </div><br>
      <label for="object">Nombre d'habitants* </label><br>
        <input type="number" name="NombreHabitant"placeholder="Ex: 3" required/><br><br>

      <label for="object">Adresse*</label><br>
        <input type="text" name="Adresse" placeholder="Ex: 2 rue de la Paix"required/><br><br>

      <label for="object">Code Postal</label><br>
        <input type="number" name="CodePostal" placeholder="Ex: 75001" required/><br><br>

      <label for="object">Pays</label><br>
        <input type="text" name="Pays"placeholder="Ex: Françe" required/><br><br>

        <input type="submit" name="submit" value="Enregistrer">

</form><br><br>
</div>
</div>
<div class="two">
<div class="container">
<h2> Ma maison</h2>
<div id="profil">
	<p> Adresse Mail: </p>
	<div class="champs">
	<?php
		if (isset($_SESSION['email'])) {

		echo '<body>';
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
			$id=$donnees['id'];
            $reponse = $bdd->query("SELECT * FROM habitation WHERE NumUtilisateur_id=$id");
            $donnees = $reponse->fetch()?>
            <?php echo $donnees['NomMaison'];?>
            <?php  $reponse->closeCursor(); // Termine le traitement de la requête ?>
			<br>
			</div>	<br><br>
	<p>
	</div>

  <?php if(isset($alerte)) { echo AfficheAlerte($alerte);} ?>
    
</div>
</div>


<br><br><br><br>
<!-------------------Main--------------> 

<style>
.slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 25px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    background: #d0db36;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    background: #d0db36;
    cursor: pointer;
}

</style>


<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>

<!-------------------Liste déroulante pièces--------------> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
</style>

<script type="text/javascript">

  function BuildFormFields($amount)
  {
    var
      $container = document.getElementById('FormFields'),
      $item, $field, $i;

    $container.innerHTML = '';
    for ($i = 0; $i < $amount; $i++) {
      $item = document.createElement('div');
      $item.style.margin = '3px';

      $field = document.createElement('span');
      $field.innerHTML = 'Nom de la Pièce';
      $field.style.marginRight = '10px';
      $item.appendChild($field);

      $field = document.createElement('input');
      $field.name = 'Nom[' + $i + ']';
      $field.type = 'text';
      $item.appendChild($field);

      $container.appendChild($item);
    }
  }

</script>

</head>
<body>

<div id="footer">
<a href="index.php?cible=utilisateurs&fonction=About">© SAS Domisep - Tous droits réservés - A propos</a>
</div>

</html>




