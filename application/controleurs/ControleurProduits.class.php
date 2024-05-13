<?php
require Chemins::MODELES.'gestion_produit.class.php';
class ControleurProduits {
    
    public function afficher() {
        VariablesGlobales::$libelleCategorie = $_REQUEST['categorie'];
        VariablesGlobales::$lesProduits = GestionProduit::getLesProduitsByCategorie($_REQUEST['categorie']);
        require Chemins::VUES . 'v_produits.inc.php';
        
    }
    
    public function afficherProduits() {
        VariablesGlobales::$lesProduits = GestionProduit::getlesProduitsWithCategorie();
        require Chemins::VUES . 'v_produits.inc.php';
        }
    
    public function __construct() {
    }
    
}
?>
