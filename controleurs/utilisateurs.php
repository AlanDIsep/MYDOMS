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
include('./modele/requetes.capteurs.php');


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "Login";
} else {
    $function = $_GET['fonction'];
}

switch ($function) {

    case 'Login':
        $vue = "login";
        $title = "Login";
        break;

    case 'Accueill':
    //affichage de l'accueil
    $vue = "Accueill";
    $title = "Accueill";
    break;

    case 'Accueil':
        //affichage de l'accueil
        $vue = "Accueil";
        $title = "Accueil";
    break;

    case 'Contact':
        $vue = "Contact";
        $title = "Contact";
         // Cette partie du code est appelée si le formulaire a été posté
         if (isset($_POST['DescriptionPanne'])) {

                // Tout est ok, on peut envoyer le formulaure

                //
                $values = [
                    'DescriptionPanne' => $_POST['DescriptionPanne'],
                    'Date' => $_POST['Date'],
                    'DroitUtilisateur_idDroitUtilisateur' => $_POST['DroitUtilisateur_idDroitUtilisateur'],
                    'typePanne' => $_POST['typePanne'],
                    'Equipement_id'=> $_POST['Equipement_id'],
                ];

                // Appel à la BDD à travers une fonction du modèle.
                $retour = ajouterPanne($bdd, $values);


                if ($retour) {
                    $alerte = "Panne transmise au support technique";
                } else {
                    $alerte = "L'inscription dans la BDD n'a pas fonctionné";
                }
            }
          if (isset($_POST['EnvoyerMail'])) {

            $values = [
                'ObjetDuMail' => $_POST['ObjetDuMail'],
                'ContenuDuMail' => $_POST['ContenuDuMail'],
            ];
            $retour = envoyerMail($bdd, $values);

            if ($retour) {
                $alerte = "Le mail a bien été envoyé";
            } else {
                $alerte = "Un problème semble être survenu. Veuillez nous en excuser";
            }

                    }
    break;

    case 'gestion_eclairage':
        $vue = "gestion_eclairage";
        $title = "Gestion de l'éclairage";
    break;

    case 'Profil':
        $vue = "Profil";
        $title = "Profil";
    break;

    case 'FAQ':
    $vue = "FAQ";
    $title = "FAQ";
    break;

    case 'About':
        $vue = "About";
        $title = "About";
    break;

    case 'Temperature':
        $vue = "Temperature";
        $title = "Gestion de la température";

    
    break;
    
    case 'gerer_maison':
        //affichage de l'accueil
        $vue = "gerer_maison";
        $title = "Gestion de la Maison";
    break;

    case 'Configuration':
        //affichage de la page de configuration
        $vue = "Configuration";
        $title = "Configuration de la Maison";
        if (isset($_POST['NomCheminLumineux'])) {
            $values = [
            'NomCheminLumineux' => $_POST['NomCheminLumineux'],
            'EtatCheminLumineux' => $_POST['EtatCheminLumineux'],
            'Capteur1' => $_POST['Capteur1'],
            'IntensiteCapteur1' => $_POST['IntensiteCapteur1'],
            'Capteur2' => $_POST['Capteur2'],
            'IntensiteCapteur2' => $_POST['IntensiteCapteur2'],
            'Capteur3' => $_POST['Capteur3'],
            'IntensiteCapteur3' => $_POST['IntensiteCapteur3'],
            'Capteur4' => $_POST['Capteur4'],
            'IntensiteCapteur4' => $_POST['IntensiteCapteur4'],
            'idUser' => $_POST['idUser'],
            ];
            $retour = ajouterCheminLumineux($bdd, $values);
        }

        else {
            $configurations21 = recupereCheminLumineux($bdd);
        }



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

        else if (isset($_POST['QuestionRecurentes'])){
            $values = [
                'QuestionRecurentes' => $_POST['QuestionRecurentes'],
                'Reponse' => $_POST['Reponse'],
            ];
            // Appel à la BDD à travers une fonction du modèle.
            $retour = ajouterFAQ($bdd, $values);
        }

        else if (isset($_POST['typePanne'])){
            $values = [
                'typePanne' => $_POST['typePanne'],
            ];
            // Appel à la BDD à travers une fonction du modèle.
            $retour = ajouterTypePanne($bdd, $values);
        }
        else if (isset($_POST['DescriptionPanne'])) {

            // Tout est ok, on peut envoyer le formulaure

            //
            $values = [
                'DescriptionPanne' => $_POST['DescriptionPanne'],
                'Date' => $_POST['Date'],
                'DroitUtilisateur_idDroitUtilisateur' => $_POST['DroitUtilisateur_idDroitUtilisateur'],
                'typePanne' => $_POST['typePanne'],
                'Equipement_id'=> $_POST['Equipement_id'],
            ];

            // Appel à la BDD à travers une fonction du modèle.
            $retour = ajouterPanne($bdd, $values);


            if ($retour) {
                $alerte = "Panne transmise au support technique";
            } else {
                $alerte = "L'inscription dans la BDD n'a pas fonctionné";
            }
        }

        else if (isset($_POST['Nom'])) {

            // Tout est ok, on peut envoyer le formulaure

            //
            $values = [
                'Type' => $_POST['Type'],
                'Nom' => $_POST['Nom'],
                'NumeroDeSerie' => $_POST['NumeroDeSerie'],
                'idUser' => $_POST['idUser'],
            ];

            // Appel à la BDD à travers une fonction du modèle.
            $retour = ajouterCapteur($bdd, $values);

        }
        elseif (isset($_POST['NomMaison'])) {
            $values = [
            'NomMaison' => $_POST['NomMaison'],
            'idUtilisateur' => $_POST['idUtilisateur'],
            'NombreHabitant' => $_POST['NombreHabitant'],
            'Pays' => $_POST['Pays'],
            'CodePostal' => $_POST['CodePostal'],
            'Superficie' => $_POST['Superficie'],
            'Adresse' => $_POST['Adresse'],
            ];
            $retour = ajouteMaison($bdd, $values);
        }
        else {
            $configuration = recuperePanne($bdd);
            $configurations = recupereTousUtilisateurs($bdd);
            $configurations1 = recupereTousTypesCapteurs($bdd);
            $configuration1 = recupereMaisons($bdd);
        }


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
        
    case 'Modification_Profil':
        $vue = "Modification_Profil";
        $title = "Modifier son profil";


      break;
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('vues/' . $vue . '.php');
