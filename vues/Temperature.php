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
    
    <div class="space"></div>
    
	
    <div id="conteneur">
	<div id="target">
		<h2>
		<?php 
					$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
					$nom = mysqli_query($mysqli,"SELECT Nom FROM equipement where Piece_id='1'");
					$row = mysqli_fetch_assoc($nom);
					echo $row['Nom'];
					?>
		</h2>
        <form method="post" action="">
		<label class="switch">
        <input type="checkbox" name="switch"
		<?php
		if(isset($_POST['switch'])) {
		echo 'checked="checked"';
		} else { 
		}
		?>
		>
        <span class="slider round"></span>
        </label>
		<?php
		
		$switch = (isset($_POST['switch'])) ? 1 : 0;
		$SQL = "UPDATE equipement SET Etat='.$switch.' where idEquipement='5'";
		$result = mysqli_query($mysqli,$SQL);
		?>
		<input type="submit" name="submit" value="appliquer"/>
		
		</form>
		<img src="../CSS/icons/temp.jpg" class="lumi"/></br>
        <p id="temp"><?php 
					//$nom = mysqli_query($mysqli,"SELECT Donnée FROM equipement WHERE idEquipement='5'");
					//$row = mysqli_fetch_assoc($nom);
					//echo $row['Donnée'];
					?>°C</p>
		</br>
		</br>
			
			
			<div id="modulator">
			<button type="button" onClick="onClick2()" style="margin-left:15px;">-</button>
			<p class="color-t">Température désirée: <a id="clicks"></a>°</p>
			<button type="button" onClick="onClick()">+</button>
			</div>
			
			<form method="post">
			<input type="submit" name="submit" value="submit"/>
			</form>
			<?php
			if(isset($_POST['submit']))
			{
				 $SQL = "UPDATE equipement SET consigne='.$clicks.' where idEquipement=1";
				 $result = mysqli_query($mysqli,$SQL);
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
		if(isset($_POST['switch2'])) {
		echo 'checked="checked"';
		} else { 
		}
		?>
		>
        <span class="slider round"></span>
        </label>
		<?php
		
		$switch2 = (isset($_POST['switch2'])) ? 1 : 0;
		$SQL = "UPDATE equipement SET Etat='.$switch2.' where idEquipement='14'";
		$result = mysqli_query($mysqli,$SQL);
		?>
		<input type="submit" name="submit2" value="appliquer"/>
		
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
		if(isset($_POST['switch3'])) {
		echo 'checked="checked"';
		} else { 
		}
		?>
		>
        <span class="slider round"></span>
        </label>
		<?php
		
		$switch3 = (isset($_POST['switch3'])) ? 1 : 0;
		$SQL = "UPDATE equipement SET Etat='.$switch3.' where idEquipement='16'";
		$result = mysqli_query($mysqli,$SQL);
		?>
		<input type="submit" name="submit3" value="appliquer"/>
		
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
        document.getElementById("clicks").innerHTML = <?php echo $clicks2; ?>;
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