<?php

// on récupère les requêtes génériques
include('requetes.generiques.php');

//on définit le nom de la table
$table = "utilisateur";
$table = "habitation";



// requêtes spécifiques à la table des capteurs


/**
 * Recherche un utilisateur en fonction du nom passé en paramètre
 * @param PDO $bdd
 * @param string $nom
 * @return array
 */
function rechercheParNom(PDO $bdd, string $nom): array {
    
    $statement = $bdd->prepare('SELECT * FROM  utilisateur WHERE AdresseMail = :AdresseMail');
    $statement->bindParam(":AdresseMail", $value);
    $statement->execute();
    
    return $statement->fetchAll();
    
}

/**
 * Récupère tous les enregistrements de la table utilisateur
 * @param PDO $bdd
 * @return array
 */
function recupereTousUtilisateurs(PDO $bdd): array {
    $query = 'SELECT * FROM utilisateur';
    return $bdd->query($query)->fetchAll();
}

function recupereMaisons(PDO $bdd): array {
    $query = "SELECT * FROM habitation";
    return $bdd->query($query)->fetchAll();
}

function recuperePanne(PDO $bdd): array {
    $query = "SELECT * FROM panne";
    return $bdd->query($query)->fetchAll();
}
function supprimePanne(PDO $bdd): array {
    $query = "DELETE FROM 'panne' WHERE `id` = 1";
    return $bdd->query($query)->fetchAll();
}
/**
 * Ajoute un nouvel utilisateur dans la base de données
 * @param array $utilisateur
 */
function ajouteUtilisateur(PDO $bdd, array $utilisateur) {
    
    $query = ' INSERT INTO utilisateur (AdresseMail, password, Nom, Prenom, DateDeNaissance, AdresseFacturation, CodePostal, Ville, Pays, NumeroDeTelephone, DroitUtilisateur_id) VALUES (:AdresseMail, :password, :Nom, :Prenom, :DateDeNaissance, :AdresseFacturation, :CodePostal, :Ville, :Pays, :NumeroDeTelephone, :DroitUtilisateur_id)';
    $donnees = $bdd->prepare($query);
    $donnees->bindParam(":AdresseMail", $utilisateur['AdresseMail'], PDO::PARAM_STR);
    $donnees->bindParam(":password", $utilisateur['password']);
    $donnees->bindParam(":Nom", $utilisateur['Nom']);
    $donnees->bindParam(":Prenom", $utilisateur['Prenom']);
    $donnees->bindParam(":DateDeNaissance", $utilisateur['DateDeNaissance']);
    $donnees->bindParam(":AdresseFacturation", $utilisateur['AdresseFacturation']);
    $donnees->bindParam(":CodePostal", $utilisateur['CodePostal']);
    $donnees->bindParam(":Ville", $utilisateur['Ville']);
    $donnees->bindParam(":Pays", $utilisateur['Pays']);
    $donnees->bindParam(":NumeroDeTelephone", $utilisateur['NumeroDeTelephone']);
    $donnees->bindParam(":DroitUtilisateur_id", $utilisateur['DroitUtilisateur_id']);
    return $donnees->execute();
    
}

function ajouteMaison(PDO $bdd, array $habitation) {
    
    $query = ' INSERT INTO habitation (Adresse, Superficie, CodePostal, Pays, NombreHabitant, NumUtilisateur_id, NomMaison) VALUES (:Adresse, :Superficie,:CodePostal, :Pays, :NombreHabitant, :NumUtilisateur_id, :NomMaison)';
    $donnees = $bdd->prepare($query);
    $donnees->bindParam(":Adresse", $habitation['Adresse'], PDO::PARAM_STR);
    $donnees->bindParam(":Superficie", $habitation['Superficie']);
    $donnees->bindParam(":CodePostal", $habitation['CodePostal']);
    $donnees->bindParam(":Pays", $habitation['Pays']);
    $donnees->bindParam(":NombreHabitant", $habitation['NombreHabitant']);
    $donnees->bindParam(":NumUtilisateur_id", $habitation['NumUtilisateur_id']);
    $donnees->bindParam(":NomMaison", $habitation['NomMaison']);
    return $donnees->execute();
    
}

//function supprimeMaisons(PDO $bdd, array $habitation) {
  //$donnees->bindParam(":idHabitation", $habitation['idHabitation']);
   //$sql = 'DELETE FROM habitation WHERE idHabitation="'.$donnees.'"';
}

function ajouterPanne(PDO $bdd, array $panne) {
    
    $query = ' INSERT INTO panne (DescriptionPanne, Date, Equipement_id,DroitUtilisateur_idDroitUtilisateur, typePanne) VALUES (:DescriptionPanne, :Date, :Equipement_id, :DroitUtilisateur_idDroitUtilisateur, :typePanne)';
    $donnees = $bdd->prepare($query);
    $donnees->bindParam(":DescriptionPanne", $panne['DescriptionPanne']);
    $donnees->bindParam(":Date", $panne['Date']);
    $donnees->bindParam(":DroitUtilisateur_idDroitUtilisateur", $panne['DroitUtilisateur_idDroitUtilisateur']);
    $donnees->bindParam(":Equipement_id", $panne['Equipement_id']);
    $donnees->bindParam(":typePanne", $panne['typePanne']);
    return $donnees->execute();
}

function ajouterTypePanne(PDO $bdd, array $typePanne) {
    
    $query = ' INSERT INTO typePanne (typePanne) VALUES (:typePanne)';
    $donnees = $bdd->prepare($query);
    $donnees->bindParam(":typePanne", $typePanne['typePanne'], PDO::PARAM_STR);
    return $donnees->execute();
}

function ajouterFAQ(PDO $bdd, array $faq) {
    
    $query = ' INSERT INTO faq (QuestionRecurentes, Reponse) VALUES (:QuestionRecurentes, :Reponse)';
    $donnees = $bdd->prepare($query);
    $donnees->bindParam(":QuestionRecurentes", $faq['QuestionRecurentes']);
    $donnees->bindParam(":Reponse", $faq['Reponse']);
    return $donnees->execute();
}

?>