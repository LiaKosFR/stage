<?php
require_once '../../configs/mysql_config.class.php';
require_once 'gestion_boutique.class.php';

class GestionCommande{
    
 // <editor-fold defaultstate="collapsed" desc="Méthodes statiques">
 
    public static function getNbCommandes() {
        return GestionBoutique::getNbTupleByTable('Commande');
    }
    
    public static function ajouter($idClient) {
        date_default_timezone_set('Europe/Paris');
        $today = date("d/m/Y");
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "insert into Commande(date,idClient) values($today,:idClient)";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('idClient', $idClient);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function supprimerById($idCommande) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "Delete FROM Commande WHERE id = :id";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idCommande);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function modifier($idAChanger,$date,$idClient) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "update Commande set date = :date , idClient = :idClient WHERE id = :id";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idAChanger);
        GestionBoutique::$pdoStResults->bindValue('date', $date); 
        GestionBoutique::$pdoStResults->bindValue('idClient', $idClient); 
        GestionBoutique::$pdoStResults->execute();
    }
    
// </editor-fold>   

    
}
?>

