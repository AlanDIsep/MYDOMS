<?php

$lien = "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=001A&TRAME=1001A2a36000119250A";
file_get_contents($lien);

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
<link rel="icon" href="../CSS/icons/lumiere.ico"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<!------------------header------------->

<header>
		<title>Gestion de l'éclairage</title>	
		<a href="index.php?cible=utilisateurs&fonction=Accueil"><img src="../CSS/mydoms.jpg" alt="logo" class="logo"></a>
		<a href="vues/deconnexion.php"><img title="Logout" src="../CSS/icons/Bandeau/deconnexion.png" class="logo3ter"></a>
		
		
</header>

<?php

$capteur_type = array("1" => "distance modèle 1", "2" => "distance modèle 2", "3" => "température",
"4" => "humidité", "5" => "lumière modèle 1", "6" => "couleur",
"7" => "présence", "8" => "lumière modèle 2", "9" => "mouvement",
"A" => "présence son modèle 1", "B" => "Envoie de la date JJ:MM", "C" => "Envoie de l'année AAAA",
"D" => "Envoi valeur potentiomètre", "H" => "Requête Heure 1", "a" =>"Requête actionneur 1",
"h" => "Requête Heure 2", "p" => "Requête data", "q" => "Requête année");
$requete_tyep = array("1" => "Requête en écriture", "2" =>"Requête en lecture", "3" => "Requête en lecture/écriture");

  $url = "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=001A";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $data= (curl_exec($ch));
  
  curl_close($ch);
  //echo $data;
  $data_tab = str_split($data,33);
//echo "Tabular Data:<br />";
for($i=0, $size=count($data_tab); $i<$size; $i++){
//echo "Trame $i: $data_tab[$i]<br />";
}
$trame = $data_tab[$size-2];
//echo $size;
// décodage avec des substring
$t = substr($trame,0,1);
$o = substr($trame,1,4);


echo'Trame numero 2:';
$trame2 = substr($trame,-18);
//echo $trame2;


// …
// décodage avec sscanf
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");





$hexVal=$v;


function hexadecimalToDecimal($hexVal) 
{  
    $len = strlen($hexVal); 
      
    // Initializing base value  
    // to 1, i.e 16^0 
    $base = 1; 
      
    $dec_val = 0; 
      
    // Extracting characters as  
    // digits from last character 
    for ($i = $len - 1; $i >= 0; $i--) 
    {  
        // if character lies in '0'-'9',  
        // converting it to integral 0-9  
        // by subtracting 48 from ASCII value. 
        if ($hexVal[$i] >= '0' &&  
            $hexVal[$i] <= '9') 
        { 
            $dec_val += (ord($hexVal[$i]) - 48) *  
                                         $base; 
                  
            // incrementing base by power 
            $base = $base * 16; 
        } 
  
        // if character lies in 'A'-'F' ,   
        // converting it to integral  
        // 10 - 15 by subtracting 55  
        // from ASCII value 
        else if ($hexVal[$i] >= 'A' &&  
                 $hexVal[$i] <= 'F') 
        { 
            $dec_val += (ord($hexVal[$i]) - 55) *  
                                         $base; 
          
            // incrementing base by power 
            $base = $base * 16; 
        } 
    } 
      
    return $dec_val; 
} 
  
// Driver Code 
$hexNum = $v;  
$v= hexadecimalToDecimal($hexNum); 
  echo $v;

    


  









		?>
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

			<div class="titlepage" style="padding:40px;">Gestion de l'Eclairage </div>
<!-------------------Main-------------->
<body>

<?php $mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889"); ?>
  
  
  <main>
      

 <div id="conteneur">
        <?php
			
			 $table = "utilisateur";
            // On récupère tout le contenu de la table utilisateur
            $reponse1 = $bdd->query("SELECT * FROM utilisateur WHERE AdresseMail='$email'");
            $donnees1 = $reponse1->fetch();
			$id1 = $donnees1['id'];

               $table="equipement";
                $resultat=$bdd->query("SELECT * FROM equipement WHERE idUser=$id1 && Type='Eclairage'");
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


				if ($n == 35){
				$SQL = "UPDATE equipement SET Donnee='$v' where idEquipement='6'";
				mysqli_query($mysqli,$SQL);
				}



				$nom = $data['Nom'];
				$consigne= $data['consigne'];
				$donnee= $data['Donnee'];
				$etat=$data['Etat'];
				echo '<h2>'.$nom.'</h2>';
				
				
				echo'<form method="POST" action="./controleurs/update_Button_lum.php">
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
				 <img src="../CSS/icons/lumi.jpg" style="width:50%;"/>
				<p id="temp">'.$donnee.'% </p>';

					echo'<script>
				$(function() {
				$(".range").next().text("--"); // Valeur par défaut
				$(".range").on("input", function() {
				var $set = $(this).val()+"%";
				$(this).next().text($set);
				});
				});</script>';	
				


				echo '<p style="width:100px;">Luminosité Souhaitée : </p>';

				

				echo'
				<input type="range" class="range"  name="a" min="0" max="100" step="10" value='.$consigne.' style="width:150px"/>

				<output name="result"></output>
				
				<br>'
				;

				$lien = "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=001A&TRAME=1001A2a36000119250A";

				$curl = curl_init();
				
				curl_setopt($curl, CURLOPT_URL, $lien);
				curl_setopt($curl, CURLOPT_COOKIESESSION, true);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_POST, true);

				
				$return = curl_exec($curl);
				curl_close($curl);

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
	

	
</div>	



  </main>
  
  
  </body>
  
    <script type="text/javascript">
 
     </script>






    
<!-------------------Footer-------------->
<footer>
    <div id="footer">
        <a href="index.php?cible=utilisateurs&fonction=About">© SAS Domisep - Tous droits réservés - A propos</a>
        </div>
</footer>



</html>
