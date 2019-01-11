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
  $table = "utilisateur";
  // On récupère tout le contenu de la table utilisateur
  $reponse1 = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
  $donnees1 = $reponse1->fetch();
  $id1 = $donnees1['id'];

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
    <h2> Configuration d'un nouveau parcours lumineux</h2>
    <form method="POST" action="">

    <select name="idUser"style="visibility:hidden;" >
          <?php
          $table="utilisateur";
          $resultat=$bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
          $resultat->setFetchMode(PDO::FETCH_ASSOC);
          foreach ($resultat as $data)
          {
          echo  '<option value="'.$data['id'].'">' . $data['id'] . '</option>';
          } ?>
      </select><br><br>
    <label for="nom">Rentrer le nom du parcours: *</label><br>
    <input type="text" name="NomCheminLumineux" placeholder="Ex: Chambre --> Cuisine" required><br><br>
    <select name="EtatCheminLumineux" style="visibility:hidden;">
      <option value="0">OFF</option>
    </select>
    <h3>Eclairages sélectionnés: *</h3><br>
    <label for="object">Capteur 1: *</label>
      <select name="Capteur1" >
      <option value="0"></option>
          <?php
          $table="equipement";
          $resultat=$bdd->query("SELECT * FROM equipement WHERE idUser=$id1 && Type='Eclairage'");
          $resultat->setFetchMode(PDO::FETCH_ASSOC);
          foreach ($resultat as $data)
          {
          echo  '<option value="'.$data['idEquipement'].'">' . $data['Type'] . ' ' . $data['Nom'] . '</option>';
          } ?>
        </select>
        <label for="object">Intensité lumineuse - Capteur 1: *</label>
      <select name="IntensiteCapteur1" >
      <option value="0"></option>
            <option value="25">25%</option>
            <option value="50">50%</option>
            <option value="75">75%</option>
            <option value="100">100%</option>
      </select>
      <label for="object">Capteur 2:</label>
      <select name="Capteur2" >
      <option value="0"></option>
          <?php
          $table="equipement";
          $resultat=$bdd->query("SELECT * FROM equipement WHERE idUser=$id1&& Type='Eclairage'");
          $resultat->setFetchMode(PDO::FETCH_ASSOC);
          foreach ($resultat as $data)
          {
          echo  '<option value="'.$data['idEquipement'].'">' . $data['Type'] . ' ' . $data['Nom'] . '</option>';
          } ?>
      </select>
      <label for="object">Intensité lumineuse - Capteur 2: </label>
      <select name="IntensiteCapteur2" >
      <option value="0"></option>
            <option value="25">25%</option>
            <option value="50">50%</option>
            <option value="75">75%</option>
            <option value="100">100%</option>
      </select>
      <label for="object">Capteur 3: </label>
      <select name="Capteur3" >
      <option value="0"></option>
          <?php
          $table="equipement";
          $resultat=$bdd->query("SELECT * FROM equipement WHERE idUser=$id1&& Type='Eclairage'");
          $resultat->setFetchMode(PDO::FETCH_ASSOC);
          foreach ($resultat as $data)
          {
          echo  '<option value="'.$data['idEquipement'].'">' . $data['Type'] . ' ' . $data['Nom'] . '</option>';
          } ?>
      </select>
      <label for="object">Intensité lumineuse - Capteur 3: </label>
      <select name="IntensiteCapteur3" >
      <option value="0"></option>
            <option value="25">25%</option>
            <option value="50">50%</option>
            <option value="75">75%</option>
            <option value="100">100%</option>
      </select>
      <label for="object">Capteur 4:</label>
      <select name="Capteur4" >
      <option value="0"></option>
          <?php
          $table="equipement";
          $resultat=$bdd->query("SELECT * FROM equipement WHERE idUser=$id1&& Type='Eclairage'");
          $resultat->setFetchMode(PDO::FETCH_ASSOC);
          foreach ($resultat as $data)
          {
          echo  '<option value="'.$data['idEquipement'].'">' . $data['Type'] . ' ' . $data['Nom'] . '</option>';
          } ?>
      </select><br><br>
      <label for="object">Intensité lumineuse - Capteur 4: </label>
      <select name="IntensiteCapteur4" >
      <option value="0"></option>
            <option value="25">25%</option>
            <option value="50">50%</option>
            <option value="75">75%</option>
            <option value="100">100%</option>
      </select>

      <input type="submit" name="submit" value="Ajouter le chemin lumineux"><br>  
</form><br><br>
</div>
</div>

<div class="two">
<div class="container">
<label for="nom">Sélectionner le parcours à supprimer: *</label><br>
    <form method="POST" action="controleurs/suppr_cheminLumineux.php">
<input type="text" name="idCheminLumineux" placeholder="Ex: 1" required><br><br>
<input type="submit" name="submit" value="Supprimer le chemin lumineux"><br> 
</form><br><br>
</div>
</div>

<div class="three">
<div class="container">
    <h2> Parcours lumineux</h2>
    <table id="customers">
          <thead>
          <tr>
          <th>ID du chemin lumineux</th>
            <th>Etat du chemin lumineux</th>
            <th>Nom du chemin lumineux</th>
            <th>Capteur 1</th>
            <th>Capteur 2</th>
            <th>Capteur 3</th>
            <th>Capteur 4</th>
            <th>ID User</th>
          </tr>
          </thead>
          <tbody>	
          <?php foreach ((array) $configurations21 as $element) { ?>
          <tr>
          <td>
                <?php echo $element['idCheminLumineux']; ?>
              </td>
              <td>
                <?php echo $element['EtatCheminLumineux']; ?>
              </td>
              <td>
                <?php echo $element['NomCheminLumineux']; ?>
                </td>
              <td>
                <?php echo $element['Capteur1']; ?> / <?php echo $element['IntensiteCapteur1']; ?>%
              </td>
              <td>
                <?php echo $element['Capteur2']; ?> / <?php echo $element['IntensiteCapteur2']; ?>%
              </td>
              <td>
                <?php echo $element['Capteur3']; ?> / <?php echo $element['IntensiteCapteur3']; ?>%
              </td>
              <td>
                <?php echo $element['Capteur4']; ?> / <?php echo $element['IntensiteCapteur4']; ?>%
              </td>
              <td>
                <?php echo $element['idUser']; ?>
              </td>
            </tr>
      
      <?php } ?>

    </tbody>
          </table><br><br>
</div>
</div>
<div class="four">
<div class="container">
<h2>État des parcours</h2>
<div id="conteneur">
<?php
$table="cheminLumineux";
$resultattt4=$bdd->query("SELECT * FROM cheminLumineux WHERE idUser=$id1");
$resultattt4->setFetchMode(PDO::FETCH_ASSOC);
foreach ($resultattt4 as $data)
{
echo '				
<div id="conteneur" style="width:100% ">
<div id="target" style="width:50%">
<label for="nom">' . $data['NomCheminLumineux'] . '</label><br><br><br>
<form method="POST" action="./controleurs/update_CheminLumineux.php">
<label class="switch">

<input type="checkbox" name="switch"/>
<span class="slider round"></span>
 <br>
 <select name="idCheminLumineux" style="visibility:hidden;">
 <option value="'.$data['idCheminLumineux'].'">'.$data['idCheminLumineux'].'</option>
 </select>
 <button type="submit" value="submit">Valider</button>
 </div>
 </div></form>';

} ?>
</div>
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




