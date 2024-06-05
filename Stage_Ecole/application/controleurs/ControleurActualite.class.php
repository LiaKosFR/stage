<?php
require Chemins::MODELES.'gestion_actualite.class.php';
class ControleurActualite {
    
    
    
    public function afficherActualite() {
//        GestionBoutique::getLesTuplesByTable('actualite');
        VariablesGlobales::$lesActualites = GestionActualite::getLesActualites();
        require Chemins::VUES . 'v_actualite.inc.php';
        }
    
    public function __construct() {
    }
    public function AjouterActualite() {
        $TitreActualite = $_POST["Titre"];
        $description = $_POST["description"];
        $image = $_POST["image"];
        $dates = date("Y-m-d");
        $privacy = $_POST["Privacy_actualite"];
        
        GestionActualite::ajouter($TitreActualite, $description, $dates,$image, $privacy);
    }
    public function SupprimerActualite(){
        $id = $_POST["actualite_a_supprimer"];
        
        GestionActualite::supprimerById($id);
    }
    public function getActualite() {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $actualite = GestionBoutique::getLeTupleTableById('actualite', $id);
        if ($actualite) {
            echo json_encode($actualite);
        } else {
            echo json_encode(['error' => 'Actualité non trouvée']);
        }
    } else {
        echo json_encode(['error' => 'ID non fourni']);
    }
}

}
?>
