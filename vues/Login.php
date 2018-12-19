<?php

 // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION
if(isset($_POST['submit'])) { // si le bouton "Connexion" est appuyé
    // on vérifie que le champ "Pseudo" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
    if(empty($_POST['email']) OR empty($_POST['pass'])) {
        echo "Un des champs est vide.";
   
        } else {
            // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
         
		    $email = htmlentities($_POST['email'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
            $MotDePasse = htmlentities($_POST['pass'], ENT_QUOTES, "ISO-8859-1");
			
			
            //on se connecte à la base de données:
			$mysqli = mysqli_connect("localhost", "root", "root", "mydoms","8889");
            //on vérifie que la connexion s'effectue correctement:
            if(!$mysqli){
                echo "Erreur de connexion à la base de données.";
				
            } else {
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
                $Requete = mysqli_query($mysqli,"SELECT * FROM utilisateur WHERE AdresseMail = '".$email."' AND password = '".md5($MotDePasse)."';");//si vous avez enregistré le mot de passe en md5() il vous suffira de faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
                // si il y a un résultat, mysqli_num_rows() nous donnera alors 1
                // si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
                if(mysqli_num_rows($Requete) == 0) {
                    echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                } else {
                    // on ouvre la session avec $_SESSION:
                    session_start();
					$_SESSION['email'] = $email; // la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
                    $_SESSION['pass'] = $MotDePasse; 
					header('Location: index.php?cible=utilisateurs&fonction=Accueil'); 
					 
                }
            }
       }
	   }
	   
?>
     

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="icon" href="../CSS/images/login.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../CSS/css/util.css">
	<link rel="stylesheet" type="text/css" href="../CSS/css/main.css">
<!--=============================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../CSS/mydoms.jpg" alt="IMG">
				</div>

				<form class="login100-form" action="" method="post" accept-charset='UTF-8'>

					<span class="login100-form-title">
						Identification
					</span>
					<div class="wrap-input100">
						<input class="input100" type="email" name="email" required placeholder="Adresse mail">
						</span>
					</div>

					<div class="wrap-input100" data-validate = "Un mot de passe est requis">
						<input class="input100" type="password" name="pass" placeholder="Mot de Passe" required>
						</span>
					</div>
					
					
					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">
							Se connecter
						</button>
					</div>
				

					<div class="text-center p-t-136">
						<a class="txt2" >
							Si vous n'avez pas encore ou avez oublié votre identifiant ou mot de passe, merci de contacter le service client Domisep
						</a>
						<a href="index.php?cible=utilisateurs&fonction=Accueil">Interface user</a>
						<a href="index.php?cible=utilisateurs&fonction=Admin">Interface admin</a>

					</div>
				</form>
			</div>
		</div>
	</div>
	

</body>
</html>
