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
?>
