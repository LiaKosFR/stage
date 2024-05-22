<?php 

session_start(); 
ob_start(); 

require_once 'configs/chemins.class.php';

require_once Chemins::CONFIGS.'mysql_config.class.php';
require_once Chemins::CONFIGS.'variables_globales.class.php';
require Chemins::VUES_PERMANENTES.'v_entete.inc.php';
require Chemins::VUES_PERMANENTES.'v_menu.inc.php';

require_once Chemins::CONTROLEURS . 'ControleurActualite.class.php';
$controleurActualite = new ControleurActualite();
$controleurActualite->afficher();


require_once Chemins::VUES. 'v_accueil.inc.php';

require Chemins::VUES_PERMANENTES.'v_pied.inc.php';
?>

