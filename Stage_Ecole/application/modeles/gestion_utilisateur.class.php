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

    public static function supprimerById($idUtilisateur) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "Delete FROM utilisateur WHERE idUtilisateur = :id ";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idUtilisateur);
        GestionBoutique::$pdoStResults->execute();
    }

    public static function modifierUtilisateur($idUtilisateurAChanger, $Nom, $Prenom, $mdp, $Mail,$login,$admin,$superAdmin) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "update utilisateur set Nom = :Nom , Prenom = :Prenom , mdp = :mdp , Mail = :Mail,login = :login, isAdmin = :idAdmin, SuperAdmin = :SuperAdmin WHERE idUtilisateur = :id";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idUtilisateurAChanger);
        GestionBoutique::$pdoStResults->bindValue('Nom', $Nom);
        GestionBoutique::$pdoStResults->bindValue('Prenom', $Prenom);
        GestionBoutique::$pdoStResults->bindValue('mdp', $mdp);
        GestionBoutique::$pdoStResults->bindValue('Mail', $Mail);
        GestionBoutique::$pdoStResults->bindValue('login', $login);
        GestionBoutique::$pdoStResults->bindValue('isAdmin', $admin);
        GestionBoutique::$pdoStResults->bindValue('SuperAdmin', $superAdmin);
        GestionBoutique::$pdoStResults->execute();
    }

    public static function getIdUtilisateur($login) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "Select idUtilisateur FROM utilisateur WHERE login = :login";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('login', $login);
        GestionBoutique::$pdoStResults->execute();
        
    }
    public static function getUtilisateurById($idUtilisateur) {
        $pdo = GestionBoutique::seConnecter();
        if ($pdo) {
            $sql = "SELECT Nom, Prenom, Mail,isAdmin,SuperAdmin FROM utilisateur WHERE idUtilisateur = :idUtilisateur";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo 'Erreur : Impossible de se connecter à la base de données.';
            return false;
        }
    }

// </editor-fold>   
}
?>

