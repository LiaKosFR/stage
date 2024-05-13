<?php 

session_start(); 
ob_start(); 

require_once 'configs/chemins.class.php';

require_once Chemins::CONFIGS.'mysql_config.class.php';
require_once Chemins::MODELES.'gestion_boutique.class.php';
require_once Chemins::CONFIGS.'variables_globales.class.php';

require Chemins::VUES_PERMANENTES.'v_entete.inc.php';

require_once Chemins::CONTROLEURS . 'ControleurCategories.class.php';
$controleurCategories = new ControleurCategories();
$controleurCategories->afficher();

if (!isset($_REQUEST['controleur'])) {
    require_once Chemins::CONTROLEURS.'ControleurProduits.class.php';
            $controleurtousProduits = new ControleurProduits();
            $controleurtousProduits->afficherProduits();
} else {

    $classeControleur = 'Controleur' . $_REQUEST['controleur']; 
    $fichierControleur = $classeControleur . ".class.php"; 
    require_once(Chemins::CONTROLEURS . $fichierControleur);

    $action = $_REQUEST['action'];

    $objetControleur = new $classeControleur(); 
    $objetControleur->$action(); 
}

require Chemins::VUES_PERMANENTES.'v_pied.inc.php';
?>

