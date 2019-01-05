<?php

/**
 * Liste des fonctions spécifiques à la table des capteurs
 */

// on récupère les requêtes génériques

//on définit le nom de la table
$table = "equipement";



/**
 * Recherche les capteurs en fonction du type passé en paramètre
 * @param PDO $bdd
 * @param string $table
 * @param string $type
 * @return array
 */
 function recupereTousTypesCapteurs(PDO $bdd): array {
     $query = 'SELECT * FROM equipement';
     return $bdd->query($query)->fetchAll();
 }

 function ajouterTypeCapteur(PDO $bdd, array $equipement) {

     $query = ' INSERT INTO equipement (Type) VALUES (:Type)';
     $donnees = $bdd->prepare($query);
     $donnees->bindParam(":Type", $equipement['Type'], PDO::PARAM_STR);
     return $donnees->execute();
 }

 function ajouterCapteur(PDO $bdd, array $equipement){

      $query = 'INSERT INTO equipement (Type, Nom, NumeroDeSerie, idUser) VALUES (:Type, :Nom, :NumeroDeSerie, :idUser)';
      $donnees = $bdd->prepare($query);
      $donnees->bindParam(":Type", $equipement['Type'], PDO::PARAM_STR);
      $donnees->bindParam(":Nom", $equipement['Nom'], PDO::PARAM_STR);
      $donnees->bindParam(":NumeroDeSerie", $equipement['NumeroDeSerie'], PDO::PARAM_STR);
      $donnees->bindParam(":idUser", $equipement['idUser'], PDO::PARAM_STR);
      return $donnees->execute();
  }

  function ajouterCheminLumineux(PDO $bdd, array $cheminLumineux){

    $query = 'INSERT INTO cheminLumineux (NomCheminLumineux,EtatCheminLumineux, Capteur1, IntensiteCapteur1, Capteur2, IntensiteCapteur2, Capteur3, IntensiteCapteur3, Capteur4, IntensiteCapteur4, idUser) VALUES (:NomCheminLumineux, :EtatCheminLumineux, :Capteur1,:IntensiteCapteur1, :Capteur2, :IntensiteCapteur2, :Capteur3, :IntensiteCapteur3, :Capteur4, :IntensiteCapteur4, :idUser)';
    $donnees = $bdd->prepare($query);
    $donnees->bindParam(":NomCheminLumineux", $cheminLumineux['NomCheminLumineux']);
    $donnees->bindParam(":EtatCheminLumineux", $cheminLumineux['EtatCheminLumineux']);
    $donnees->bindParam(":Capteur1", $cheminLumineux['Capteur1']);
    $donnees->bindParam(":IntensiteCapteur1", $cheminLumineux['IntensiteCapteur1']);
    $donnees->bindParam(":Capteur2", $cheminLumineux['Capteur2']);
    $donnees->bindParam(":IntensiteCapteur2", $cheminLumineux['IntensiteCapteur2']);
    $donnees->bindParam(":Capteur3", $cheminLumineux['Capteur3']);
    $donnees->bindParam(":IntensiteCapteur3", $cheminLumineux['IntensiteCapteur3']);
    $donnees->bindParam(":Capteur4", $cheminLumineux['Capteur4']);
    $donnees->bindParam(":IntensiteCapteur4", $cheminLumineux['IntensiteCapteur4']);
    $donnees->bindParam(":idUser", $cheminLumineux['idUser']);
    return $donnees->execute();
}

function recupereCheminLumineux(PDO $bdd): array {
    $query = "SELECT * FROM cheminLumineux";
    return $bdd->query($query)->fetchAll();
}
?>
