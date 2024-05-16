<?php

require_once 'gestion_boutique.class.php';

class GestionProduit{
    
 // <editor-fold defaultstate="collapsed" desc="Méthodes statiques">
 
    public static function getNbActualite() {
        return GestionBoutique::getNbTupleByTable('actualite');
    }
    
    public static function ajouter($Titre,$descriptionActualite,$dates,$idUtilisateur) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "insert into actualite(Titre,description,dates,idUtilisateur) values(:Titre ,:description, :dates, :idUtilisateur) ";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('Titre', $nomProduit);
        GestionBoutique::$pdoStResults->bindValue('description', $descriptionActualite);
        GestionBoutique::$pdoStResults->bindValue('dates', $dates);
        GestionBoutique::$pdoStResults->bindValue('idUtilisateur', $idUtilisateur);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function supprimerById($idActualite) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "Delete FROM actualite WHERE id = :id ";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idActualite);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function modifierActualiter($idProduitAChanger,$Titre,$descriptionActualite,$dates,$idUtilisateur) {
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
    
   
    
   
    
// </editor-fold>   

    
}
?>