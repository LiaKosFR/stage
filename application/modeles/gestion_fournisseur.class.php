<?php

require_once '../../configs/mysql_config.class.php';
require_once 'gestion_boutique.class.php';

Class GestionFournisseur{
   
    // <editor-fold defaultstate="collapsed" desc="Méthodes statiques">

    public static function getNbFornisseur() {
        return GestionBoutique::getNbTupleByTable('fournisseur');
    }
    
    public static function ajouter($nom,$rue,$cp,$ville,$tel,$email) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "insert into Fournisseur(nom,rue,codePostal,ville,tel,email) values(:nom,:rue,:cp,:ville,:tel,:email)";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('nom', $nom);
        GestionBoutique::$pdoStResults->bindValue('rue', $rue);
        GestionBoutique::$pdoStResults->bindValue('cp', $cp);
        GestionBoutique::$pdoStResults->bindValue('ville', $ville);
        GestionBoutique::$pdoStResults->bindValue('tel', $tel);
        GestionBoutique::$pdoStResults->bindValue('email', $email);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function supprimerByNom($nom) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "Delete FROM Fournisseur WHERE nom = :nom";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('nom', $nom);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function supprimerById($idFournisseur) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "Delete FROM Fournisseur WHERE id = :id";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idFournisseur);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function modifier($idAChanger,$nom,$rue,$cp,$ville,$tel,$email) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "update Fournisseur set nom = :nom, rue = :rue, cp= :cp, ville = :ville , tel = :tel , email = :email WHERE id = :id";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idAChanger);
        GestionBoutique::$pdoStResults->bindValue('nom', $nom);
        GestionBoutique::$pdoStResults->bindValue('rue', $rue);
        GestionBoutique::$pdoStResults->bindValue('cp', $cp);
        GestionBoutique::$pdoStResults->bindValue('ville', $ville);
        GestionBoutique::$pdoStResults->bindValue('tel', $tel); 
        GestionBoutique::$pdoStResults->bindValue('email', $email); 
        GestionBoutique::$pdoStResults->execute();
    }
    
        // </editor-fold>
    
}
?>
