<?php

require_once 'gestion_boutique.class.php';

class GestionProduit{
    
 // <editor-fold defaultstate="collapsed" desc="Méthodes statiques">
 
    public static function getNbProduit() {
        return GestionBoutique::getNbTupleByTable('Produit');
    }
    
    public static function ajouter($nomProduit,$descriptionProduit,$prix,$image,$idcateg,$idfournisseur) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "insert into Produit(nom,description,prix,image,idCategorie,idFournisseur) values(:nom ,:description, :prix, :image, :idCategorie, :idFournisseur) ";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('nom', $nomProduit);
        GestionBoutique::$pdoStResults->bindValue('description', $descriptionProduit);
        GestionBoutique::$pdoStResults->bindValue('prix', $prix);
        GestionBoutique::$pdoStResults->bindValue('image', $image);
        GestionBoutique::$pdoStResults->bindValue('idCategorie', $idcateg);
        GestionBoutique::$pdoStResults->bindValue('idFournisseur', $idfournisseur);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function supprimerById($idProduit) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "Delete FROM Produit WHERE id = :id ";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idProduit);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function modifierProduit($idProduitAChanger,$nomProduit,$descriptionProduit,$prix,$image) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "update Produit set nom = :nom , description = :description , prix = :prix , image = :image WHERE id = :id";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idProduitAChanger);
        GestionBoutique::$pdoStResults->bindValue('nom', $nomProduit);
        GestionBoutique::$pdoStResults->bindValue('description', $descriptionProduit);
        GestionBoutique::$pdoStResults->bindValue('prix', $prix);
        GestionBoutique::$pdoStResults->bindValue('image', $image);
        GestionBoutique::$pdoStResults->execute();
    }
    
    public static function getLesProduits() {
        return self::getLesTuplesByTable('Produit');
    }
    
    
        public static function getlesProduitsWithCategorie() {
        GestionBoutique::seConnecter();

        GestionBoutique::$requete = "Select Produit.*, categorie.libelle FROM Produit,Categorie where Produit.idCategorie = categorie.id";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->execute();
        GestionBoutique::$resultat = GestionBoutique::$pdoStResults->fetchall();

        GestionBoutique::$pdoStResults->closeCursor();

        return GestionBoutique::$resultat;
    }
  
    
    public static function getLesProduitsByCategorie($libelleCategorie) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "SELECT * FROM Produit P,Categorie C where P.idCategorie = C.id AND libelle = :libCateg";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('libCateg', $libelleCategorie);
        GestionBoutique::$pdoStResults->execute();
        GestionBoutique::$resultat = GestionBoutique::$pdoStResults->fetchAll();
        GestionBoutique::$pdoStResults->closeCursor();
        return GestionBoutique::$resultat;
    }
    
// </editor-fold>   

    
}
?>