<?php
require Chemins::MODELES.'gestion_actualite.class.php';
class ControleurActualite {
    
    public function afficher() {
        VariablesGlobales::$lesActualites = GestionBoutique::getLesTuplesByTable('actualite');
        require Chemins::VUES . 'v_actualite.inc.php';
        
    }
    
    public function afficherProduits() {
        VariablesGlobales::$lesProduits = GestionProduit::getlesProduitsWithCategorie();
        require Chemins::VUES . 'v_produits.inc.php';
        }
    
    public function __construct() {
    }
    
}
?>
