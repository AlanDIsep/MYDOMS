<?php

// on récupère les requêtes génériques
include('requetes.generiques.php');

//on définit le nom de la table
$table = "utilisateur";

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

function formulaireDeContact(PDO $bdd, array $utilisateur) {
    
    $query = ' INSERT INTO utilisateur (Nom, Prenom, Object, AdresseFacturation, CodePostal, Ville, Pays, NumeroDeTelephone, DroitUtilisateur_id) VALUES (:AdresseMail, :password, :Nom, :Prenom, :DateDeNaissance, :AdresseFacturation, :CodePostal, :Ville, :Pays, :NumeroDeTelephone, :DroitUtilisateur_id)';
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

?>