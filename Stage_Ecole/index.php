<?php 

session_start(); 
ob_start(); 

require_once 'configs/chemins.class.php';
require_once Chemins::MODELES . 'gestion_boutique.class.php';
require_once Chemins::CONFIGS.'mysql_config.class.php';
require_once Chemins::CONFIGS.'variables_globales.class.php';
require Chemins::VUES_PERMANENTES.'v_entete.inc.php';
if (isset($_SESSION['login'])){
        require Chemins::VUES_PERMANENTES.'v_menu.inc.php';}
        else{
            require Chemins::VUES_PERMANENTES.'v_menu.inc.php';
        }



require_once Chemins::CONTROLEURS . 'ControleurActualite.class.php';

    
if (!isset($_REQUEST['controleur'])) {
    require_once Chemins::VUES. 'v_accueil.inc.php';
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

