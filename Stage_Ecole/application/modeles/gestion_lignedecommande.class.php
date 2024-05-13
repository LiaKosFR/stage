<?php

require_once '../../configs/mysql_config.class.php';
require_once 'gestion_boutique.class.php';

class GestionLigneDeCommande{
    
 // <editor-fold defaultstate="collapsed" desc="Méthodes statiques">
 
    
    public static function ajouter($idCommande, $idProduit, $quantite) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "insert into lignedecommande(idCommande,idProduit,quantite) values(:idCommande,:idProduit,:quantite)";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('quantite', $quantite);
        GestionBoutique::$pdoStResults->bindValue('idCommande', $idCommande);
        GestionBoutique::$pdoStResults->bindValue('idProduit', $idProduit);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function supprimer($idCommande) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "Delete FROM lignedecommande WHERE id = :id";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idCommande);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function modifier($idAChanger,$quantite) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "update lignedecommande set quantite = :quantite WHERE id = :id";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('quantite', $quantite);
        GestionBoutique::$pdoStResults->bindValue('id', $idAChanger);
        GestionBoutique::$pdoStResults->execute();
    }
    
// </editor-fold>   

    
}
?>
