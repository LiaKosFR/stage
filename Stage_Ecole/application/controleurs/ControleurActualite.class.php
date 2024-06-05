<?php

require Chemins::MODELES . 'gestion_actualite.class.php';

class ControleurActualite {

    public function afficherActualite() {
//        GestionBoutique::getLesTuplesByTable('actualite');
        if (isset($_SESSION['login_admin'])){
            VariablesGlobales::$lesActualites = GestionActualite::getLesActualites();
        require Chemins::VUES . 'v_actualite.inc.php';}
        else{
            VariablesGlobales::$lesActualites = GestionActualite::getLesActualitesPublic();
            require Chemins::VUES . 'v_actualite.inc.php';
            
           
        }
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
        header("Location:index.php?controleur=Actualite&action=afficherActualite");
    }

    public function SupprimerActualite() {
        $id = $_POST["actualite_a_supprimer"];

        GestionActualite::supprimerById($id);
        header("Location:index.php?controleur=Actualite&action=afficherActualite");
    }

    public function afficherModifierActualite() {
        if (isset($_GET['idActualite'])) {
            $idActualite = $_GET['idActualite'];
            $actualite = GestionActualite::getActualiteById($idActualite);
            require Chemins::VUES_ADMIN . 'modifier_actualite_view.inc.php';
        }
    }

    public function getActualiteDetails() {
        if (isset($_POST['idActualite'])) {
            $idActualite = $_POST['idActualite'];
            $actualite = GestionActualite::getActualiteById($idActualite);

            if ($actualite) {
                header('Content-Type: application/json');
                echo json_encode($actualite);
            } else {
                echo json_encode(['error' => 'Erreur lors de la récupération des détails de l\'actualité.']);
            }
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
        header("Location:index.php?controleur=Actualite&action=afficherActualite");
    }

  
}

?>
