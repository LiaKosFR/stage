<?php

require_once 'gestion_boutique.class.php';

class GestionUtilisateur {

    // <editor-fold defaultstate="collapsed" desc="Méthodes statiques">

    public static function getNbActualite() {
        return GestionBoutique::getNbTupleByTable('actualite');
    }

    public static function ajouter($Nom, $Prenom, $mdp, $mail, $login,$admin,$superAdmin) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "insert into utilisateur(Nom,Prenom,mdp,Mail,login,isAdmin,SuperAdmin) values(:Nom ,:Prenom, :mdp,:Mail, :login,:isAdmin,:SuperAdmin) ";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('Nom', $Nom);
        GestionBoutique::$pdoStResults->bindValue('Prenom', $Prenom);
        GestionBoutique::$pdoStResults->bindValue('mdp', sha1($mdp));
        GestionBoutique::$pdoStResults->bindValue('Mail', $mail);
        GestionBoutique::$pdoStResults->bindValue('login', $login);
        GestionBoutique::$pdoStResults->bindValue('isAdmin', $admin);
        GestionBoutique::$pdoStResults->bindValue('SuperAdmin', $superAdmin);
        GestionBoutique::$pdoStResults->execute();
    }

    public static function supprimerById($idActualite) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "Delete FROM actualite WHERE idActualite = :id ";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idActualite);
        GestionBoutique::$pdoStResults->execute();
    }

    public static function modifierActualite($idProduitAChanger, $Titre, $descriptionActualite, $dates, $idUtilisateur) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "update actualite set Titre = :Titre , description = :description , dates = :dates , idUtilisateur = :idUtilisateur WHERE id = :id";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idActualiteAChanger);
        GestionBoutique::$pdoStResults->bindValue('Titre', $nomProduit);
        GestionBoutique::$pdoStResults->bindValue('description', $descriptionActualite);
        GestionBoutique::$pdoStResults->bindValue('dates', $dates);
        GestionBoutique::$pdoStResults->bindValue('idUtilisateur', $idUtilisateur);
        GestionBoutique::$pdoStResults->execute();
    }

    public static function getIdUtilisateur($login) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "Select idUtilisateur FROM utilisateur WHERE login = :login";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('login', $login);
        GestionBoutique::$pdoStResults->execute();
        
    }

// </editor-fold>   
}
?>

