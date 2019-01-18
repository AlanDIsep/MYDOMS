<?php

// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
require "controleurs/verif_session.php";
include('controleurs/nb_online.php');

// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {

	$email=$_SESSION['email'];
	$rep = mysqli_query($mysqli,"SELECT id FROM utilisateur WHERE AdresseMail='$email'");
	$row = mysqli_fetch_assoc($rep);
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
<link rel='stylesheet' type='text/css' href='../CSS/temperature.css' media='screen'/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<!------------------header-------------> 
<!------------------header-------------> 
<header>
		<title>Température</title>	
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
<main>
	
	
	<?php $mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889"); ?>


	
	<!------------------------------------BOUTONS------------------------------------------------------------>
	
	<!------------------------------------------------------------------------------------------------------------>
    
	<div class="space"></div>
    
	
    <div id="conteneur">

	
	<?php
			
			 $table = "utilisateur";
            // On récupère tout le contenu de la table utilisateur
            $reponse1 = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
            $donnees1 = $reponse1->fetch();
			$id1 = $donnees1['id'];

               $table="equipement";
                $resultat=$bdd->query("SELECT * FROM equipement WHERE idUser=$id1 && Type='Temperature'");
                $resultat->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($resultat as $data)
                { 
				/*echo'<div class="container">';
				echo '<button class="toggle">';
				echo $data['Nom'];
				echo'</button>' ;    
				echo'</div>';*/
				
				
				echo '
				<div id="conteneur" style="width:200px ">
				<div id="target" style="width:200px">';
				$nom = $data['Nom'];
				$consigne= $data['consigne'];
				$donnee= $data['Donnee'];
				$etat=$data['Etat'];
				echo '<h2>'.$nom.'</h2>';
				
				
				echo'<form method="POST" action="./controleurs/update_Button.php">
				<label class="switch">
				<br>
				<br>';
				echo'<input type="checkbox" name="switch"';
				if($etat==1) {
				echo 'checked="checked"';
				} else { 
				}		
				echo'>';
				
				echo'<span class="slider round"></span>
				
				 <select name="ideq" style="visibility:hidden;">
				 <option value="'.$data['idEquipement'].'">' . $data['idEquipement'] . '</option>
				 </select>';
				
				echo'
				<img src="../CSS/icons/temp.jpg" style="width:50%;"/>
				<p id="temp">'.$donnee.'°C </p>';

				
				
				
				echo'<script>
				$(function() {
				$(".range").next().text("--"); // Valeur par défaut
				$(".range").on("input", function() {
				var $set = $(this).val()+"°";
				$(this).next().text($set);
				});
				});</script>';	
				


				echo '<p>Température Souhaitée : </p>';

				

				echo'
				<input type="range" class="range"  name="a" min="15" max="30" step="1" value='.$consigne.' style="width:150px"/>

				<output name="result"></output>
				
				<br>'
				;
				


				echo'				
				<button type="submit" style="font-size:small;">Appliquer</button>
				<select name="idUser" style="visibility:hidden;">
				<option value="'.$id1.'"></option>
				</select>
				</form>';
				
				
				echo'</div>';
				 echo'</div>';
					
				
				}

				
				?>
	

		

		


		
 
	
	<!-------------------------------------------------------------------------------------------------------------------->
	

<!-------------------Footer--------------> 
<footer>
        <div id="footer">
                <a href="index.php?cible=utilisateurs&fonction=About">© SAS Domisep - Tous droits réservés - A propos</a>
                </div>
</footer>

<script type="text/javascript">

/*affichage de la première fenêtre
$('.toggle').click(function() 
{
    $('#target').toggle('slow');
	$(this).toggleClass("active");
});
//affichage de la deuxième fenêtre
$('.toggle1').click(function() 
{
    $('#target1').toggle('slow');
	$(this).toggleClass("active");
});
$('.toggle2').click(function() 
{
    $('#target2').toggle('slow');
	$(this).toggleClass("active");
});
$('.toggle3').click(function() 
{
	$('#target3').toggle('slow');
	$(this).toggleClass("active");
});
 </script>


 
 

</html>