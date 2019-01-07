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
	<div class="container">
        <button class="toggle">
		<?php 
					$nom = mysqli_query($mysqli,"SELECT Nom FROM equipement where Piece_id='1'");
					$row = mysqli_fetch_assoc($nom);
					echo $row['Nom'];
					?>
		</button>     
        <button class="toggle1">
		<?php 
					$nom = mysqli_query($mysqli,"SELECT Nom FROM equipement where Piece_id='2'");
					$row = mysqli_fetch_assoc($nom);
					echo $row['Nom'];
					?>
		</button>
        <button class="toggle2">
		<?php 
					$nom = mysqli_query($mysqli,"SELECT Nom FROM equipement where Piece_id='3'");
					$row = mysqli_fetch_assoc($nom);
					echo $row['Nom'];
					?>
		</button> 
        <button class="toggle3">
		<?php 
					$nom = mysqli_query($mysqli,"SELECT Nom FROM equipement where Piece_id='4'");
					$row = mysqli_fetch_assoc($nom);
					echo $row['Nom'];
					?>
		</button>
    </div>
	<!------------------------------------------------------------------------------------------------------------>
    
	<div class="space"></div>
    
	
    <div id="conteneur">

	
	<div id="target">
		<h2>
		<?php 
					
		$nom = mysqli_query($mysqli,"SELECT Nom FROM equipement where Piece_id='1'");
		$row = mysqli_fetch_assoc($nom);
		echo $row['Nom'];
		?>
		</h2>
        <?php
		$etat = mysqli_query($mysqli,"SELECT Etat FROM equipement where idEquipement='5'");
		$row = mysqli_fetch_assoc($etat);	
		?>
		
		<!--------------------------------On/OFF-->
		<form method="post">
		<label class="switch">
        <input type="checkbox" name="switch"
		
		
		<?php
		if(isset($_POST['switch']) and $row='1') {
		echo 'checked="checked"';
		} else { 
		}
		?>
		>
        <span class="slider round"></span>
        </label>
		<?php

		/*if(isset($_POST['switch']) and $row=1) {
		$SQL = "UPDATE equipement SET Etat='1' where idEquipement='5'";
		mysqli_query($mysqli,$SQL);
		} else if(!isset($_POST['switch']) and $row=1) { 
		$SQL = "UPDATE equipement SET Etat='0' where idEquipement='5'";
		mysqli_query($mysqli,$SQL);
		} else if(isset($_POST['switch']) and $row=0) { 
		$SQL = "UPDATE equipement SET Etat='1' where idEquipement='5'";
		mysqli_query($mysqli,$SQL);
		} else if(!isset($_POST['switch']) and $row=0) { 
		$SQL = "UPDATE equipement SET Etat='0' where idEquipement='5'";
		mysqli_query($mysqli,$SQL);
		}*/
		
		$switch = (isset($_POST['switch'])) ? 1 : 0;
		$SQL = "UPDATE equipement SET Etat='.$switch.' where idEquipement='5'";
		mysqli_query($mysqli,$SQL);
		?>
		<input type="submit" value="submit"/>

		<!--FIN ON/OFF---------------------------------------------------------------------------->
		
		</form>
		<img src="../CSS/icons/temp.jpg" class="lumi"/></br>
        <p id="temp"><?php 
					$nom = mysqli_query($mysqli,"SELECT Donnee FROM equipement WHERE idEquipement='5'");
					$row = mysqli_fetch_assoc($nom);
					echo $row['Donnee'];
					?>°C</p>
		</br>
		</br>
			
			
			<div id="modulator">
			
			<p class="color-t">Température désirée: <a id="clicks"></a><output type="text" id="textInput" value="">19°</p>
			
			</div>
			<!--CONSIGNE A DONNER TEMPERATURE ---------------------------------->
			<form method="post" action="">
			<?php
		
			?>
			
			 <input type="range" name="range" id="range" min="15" max="30" step="1" value="19" onchange="updateTextInput(this.value);" />
			
			<br>
			<input type="submit" value="submit"/>
			</form>
			<script>
			function updateTextInput(val) {
			document.getElementById('textInput').value=val+'°'; 
			 }</script>
			<?php
			$temp= $_POST['range'];
			if(isset($_POST['range']))
			{
				 $SQL = "UPDATE equipement SET consigne='.$temp.' where idEquipement='5'";
				  mysqli_query($mysqli,$SQL);
			}
			?>

    </div>

	<div id="target1">
        <h2>
			<?php 
					$nom = mysqli_query($mysqli,"SELECT Nom FROM equipement where Piece_id='2'");
					$row = mysqli_fetch_assoc($nom);
					echo $row['Nom'];
					?>
		</h2>
         <form method="post" action="">
		<label class="switch">
        <input type="checkbox" name="switch2"
		<?php
		if(isset($_POST['switch2']) and $row2='1') {
		echo 'checked="checked"';
		} else { 
		}
		?>
		>
        <span class="slider round"></span>
        </label>
		<?php
		
		
		$etat = mysqli_query($mysqli,"SELECT Etat FROM equipement where idEquipement='14'");
					$row2 = mysqli_fetch_assoc($etat);
					
		
		
		
		/*if(isset($_POST['switch2']) and $row=1) {
		$SQL = "UPDATE equipement SET Etat='1' where idEquipement='14'";
		mysqli_query($mysqli,$SQL);
		} else if(!isset($_POST['switch2']) and $row=1) { 
		$SQL = "UPDATE equipement SET Etat='0' where idEquipement='14'";
		mysqli_query($mysqli,$SQL);
		} else if(isset($_POST['switch2']) and $row=0) { 
		$SQL = "UPDATE equipement SET Etat='1' where idEquipement='14'";
		mysqli_query($mysqli,$SQL);
		} else if(!isset($_POST['switch2']) and $row=0) { 
		$SQL = "UPDATE equipement SET Etat='0' where idEquipement='14'";
		mysqli_query($mysqli,$SQL);
		}*/
		

		$switch2 = (isset($_POST['switch2'])) ? 1 : 0;


		$SQL1 = "UPDATE equipement SET Etat='.$switch2.' where idEquipement='14'";
		mysqli_query($mysqli,$SQL1);
		?>
		
		<input type="submit" value="submit"/>
		
		</form>
		<img src="../CSS/icons/temp.jpg" class="lumi"/></br>
        <p id="temp">23°C</p>
		</br>
		</br>
		<div id="modulator">
			<button type="button" onClick="onClick3()" style="margin-left:15px;">-</button>
			<p class="color-t">Température désirée: <a id="clicks2"></a>			
			°</p>
			<button type="button" onClick="onClick4()">+</button>
			</div>
			
    </div>
	
	<div id="target2">
        <h2><?php 
					$nom = mysqli_query($mysqli,"SELECT Nom FROM equipement where Piece_id='3'");
					$row = mysqli_fetch_assoc($nom);
					echo $row['Nom'];
					?></h2>


         <form method="post" action="">
		<label class="switch">
        <input type="checkbox" name="switch3"
		<?php
		if(isset($_POST['switch3']) and $row='1') {
		echo 'checked="checked"';
		} else { 
		}
		?>
		>
        <span class="slider round"></span>
        </label>
		
		<?php
			

			
		$etat = mysqli_query($mysqli,"SELECT Etat FROM equipement where idEquipement='16'");
					$row = mysqli_fetch_assoc($etat);
					
		

		
		$switch3 = (isset($_POST['switch3'])) ? 1 : 0;
		$SQL2 = "UPDATE equipement SET Etat='.$switch3.' where idEquipement='16'";
		mysqli_query($mysqli,$SQL2);
		?>
		<input type="submit" name="submit" value="submit"/>
		
		</form>
        <img src="../CSS/icons/temp.jpg" class="lumi"/>
		</br>
		<p id="temp">20°C </p>
		</br>
		</br>
		<div id="modulator">
			<button type="button" onClick="onClick5()" style="margin-left:15px;">-</button>
			<p class="color-t">Température désirée: <a id="clicks3"></a>°</p>
			<button type="button" onClick="onClick6()">+</button>
			</div>
    </div>
	
	<div id="target3">
        <h2><?php 
					$nom = mysqli_query($mysqli,"SELECT Nom FROM equipement where Piece_id='4'");
					$row = mysqli_fetch_assoc($nom);
					echo $row['Nom'];
					?></h2>
        <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
        </label></br>
		<img src="../CSS/icons/temp.jpg" class="lumi"/>
		</br>
        <p id="temp">22°C</p>
		</br>
		</br>
		<div id="modulator">
			<button type="button" onClick="onClick7()" style="margin-left:15px;">-</button>
			<p class="color-t">Température désirée: <a id="clicks4"></a>°</p>
			<button type="button" onClick="onClick8()">+</button>
			</div>
		
    </div>
	
	
	</div>


  
	

	
</main>

<!-------------------Footer--------------> 
<footer>
        <div id="footer">
                <a href="index.php?cible=utilisateurs&fonction=About">© SAS Domisep - Tous droits réservés - A propos</a>
                </div>
</footer>

<script type="text/javascript">

//affichage de la première fenêtre
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

 <?php
	$clicks =20; // $clicks now holds 20
	$clicks2 =20; // $clicks now holds 20
	?>
 
 <script type="text/javascript">
  

	var clicks = <?php echo $clicks; ?>;
	var clicks2 = <?php echo $clicks2; ?>;
	var clicks3=20;
	var clicks4=20;
    
	
	
	<!-- fonctions de modulation de température souhaitée avec une fonction par bouton -->
	
	
	function onClick() {
        if (clicks < 35) {
		<?php $clicks += 1; ?>
		clicks += 1;
        document.getElementById("clicks").innerHTML = clicks;
	}};
    function onClick2() {
        if (clicks > 13) {
		clicks -= 1;
        document.getElementById("clicks").innerHTML = clicks;
    }};
	 <!-- fin-->
	  <!-- Et on refait la même chose pour les autres fenêtres-->


	function onClick3() {
        clicks2 -= 1;
        document.getElementById("clicks2").innerHTML = clicks2;
    };
	function onClick4() {
        clicks2 += 1;
        document.getElementById("clicks2").innerHTML = clicks2;
    };


	function onClick5() {
        clicks3 -= 1;
        document.getElementById("clicks3").innerHTML = clicks3;
    };
	function onClick6() {
        clicks3 += 1;
        document.getElementById("clicks3").innerHTML = clicks3;
    };


	function onClick7() {
        clicks4 -= 1;
        document.getElementById("clicks4").innerHTML = clicks4;
    };
	function onClick8() {
        clicks4 += 1;
        document.getElementById("clicks4").innerHTML = clicks4;
    };
	
  </script>

</html>