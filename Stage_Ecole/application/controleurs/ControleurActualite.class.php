<?php

require Chemins::MODELES . 'gestion_actualite.class.php';

class ControleurActualite {

    public function afficherActualite() {
        VariablesGlobales::$lesActualites = GestionBoutique::getLesTuplesByTable('actualite');
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

        GestionActualite::ajouter($TitreActualite, $description, $dates, $image, $privacy);
    }

    public function SupprimerActualite() {
        $id = $_POST["actualite_a_supprimer"];

        GestionActualite::supprimerById($id);
    }

       public function getActualiteDetails() {
        if (isset($_POST['idActualite'])) {
            $idActualite = $_POST['idActualite'];
            $actualite = GestionActualite::getActualiteById($idActualite); 

            header('Content-Type: application/json');
            echo json_encode($actualite);
            exit;
        }
    }

    public function modifierActualite() {
        $idActualite = $_POST["actualite_a_modifier"];
        $nouveauTitre = $_POST["nouveau_nom_actualite"];
        $description = $_POST["description_actualite"];
        $image = $_POST["image"];
        $privacy = $_POST["Privacy_actualite"];

        GestionActualite::modifier($idActualite, $nouveauTitre, $description, $image, $privacy);
    }
    
    
}

?>
