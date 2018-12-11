<?php

/**
 * Le contrôleur :
 * - définit le contenu des variables à afficher
 * - identifie et appelle la vue
 */ 

/**
 * Contrôleur de l'utilisateur
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.utilisateurs.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "Admin";
} else {
    $function = $_GET['fonction'];
}

switch ($function) {
    
    case 'Login':
        //affichage de l'accueil
        $vue = "login";
        $title = "Login";
        break;
        
        
    case 'Admin':
    // inscription d'un nouvel utilisateur
        $vue = "Admin";
        $alerte = false;
        
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['AdresseMail']) and isset($_POST['password'])) {
            
            if( !estUneChaine($_POST['AdresseMail'])) {
                $alerte = "Le nom d'utilisateur doit être une chaîne de caractère.";
                
            } else if( !estUnMotDePasse($_POST['password'])) {
                $alerte = "Le mot de passe n'est pas correct.";
                
            } else {
                // Tout est ok, on peut inscrire le nouvel utilisateur
                
                // 
                $values = [
                    'AdresseMail' => $_POST['AdresseMail'],
                    'password' => crypterMdp($_POST['password']), // on crypte le mot de passe
                    'Nom' => $_POST['Nom'],
                    'Prenom' => $_POST['Prenom'],
                    'DateDeNaissance' => $_POST['DateDeNaissance'], 
                    'AdresseFacturation' => $_POST['AdresseFacturation'], 
                    'CodePostal' => $_POST['CodePostal'],
                    'Ville' => $_POST['Ville'],
                    'Pays' => $_POST['Pays'],
                    'NumeroDeTelephone' => $_POST['NumeroDeTelephone'],
                    'DroitUtilisateur_id' => $_POST['DroitUtilisateur_id'],
                ];

                // Appel à la BDD à travers une fonction du modèle.
                $retour = ajouteUtilisateur($bdd, $values);
                
                if ($retour) {
                    $alerte = "Inscription réussie";
                } else {
                    $alerte = "L'inscription dans la BDD n'a pas fonctionné";
                }
            }
        }
        $title = "Inscription";
        break;
        
    case 'liste':
    // Liste des utilisateurs déjà enregistrés
        $vue = "liste";
        $title = "Liste des utilisateurs inscrits";
        $entete = "Voici la liste :";
        
        $liste = recupereTousUtilisateurs($bdd);
        
        if(empty($liste)) {
            $alerte = "Aucun utilisateur inscrit pour le moment";
        }
        
        break;
        
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('vues/header.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');

