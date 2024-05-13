<?php

require_once '../../configs/mysql_config.class.php';
require_once 'gestion_boutique.class.php';

Class GestionCategorie{
   
    // <editor-fold defaultstate="collapsed" desc="Méthodes statiques">

    public static function getNbCategorie() {
        return GestionBoutique::getNbTupleByTable('Categorie');
    }
    
    public static function ajouter($libelleCateg) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "insert into Categorie(libelle) values(:libelle)";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('libelle', $libelleCateg);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function supprimerByLibelle($libelleCateg) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "Delete FROM Categorie WHERE libelle = :libelle";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('libelle', $libelleCateg);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function supprimerById($idCateg) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "Delete FROM Categorie WHERE id = :id";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idCateg);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function getLesCategories() {
        return self::getLesTuplesByTable('Categories');
    }
    
    public static function getLaCategorie() {
        return self::getLeTupleByTable('Categories');
    }
    
    public static function modifier($idCategorieAChanger,$libelleCateg) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "update Categorie set libelle = :libelle WHERE id = :id";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('libelle', $libelleCateg);
        GestionBoutique::$pdoStResults->bindValue('id', $idCategorieAChanger);
        GestionBoutique::$pdoStResults->execute();
    }
    
        // </editor-fold>
    
}
?>

