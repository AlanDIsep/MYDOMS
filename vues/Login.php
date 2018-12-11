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

				<form class="login100-form">
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