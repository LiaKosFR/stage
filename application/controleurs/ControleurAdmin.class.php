<?php

class ControleurAdmin {

    public function __construct() {
        
    }

    public function afficherIndex() {
        if (isset($_SESSION['login_admin']))
            require Chemins::VUES_ADMIN . 'v_index_admin.inc.php';
        else
            require Chemins::VUES_ADMIN . 'v_connexion.inc.php';
    }

    public function verifierConnexion() {

        if (GestionBoutique::isAdminOK($_POST['login'], $_POST['passe'])) {
            $_SESSION['login_admin'] = $_POST['login'];
            if (isset($_POST['connexion_auto']))
                setcookie('login_admin', $_POST['login'], time() + 7 * 24 * 3600, null, null, false, true);
            require Chemins::VUES_ADMIN . 'v_index_admin.inc.php';
        } else
            require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php';
    }

    public function seDeconnecter() {
        setcookie('login_admin', ''); //suppression du cookie en vidant simplement la chaîne
        $_SESSION = array();
        session_destroy();
        header("Location:index.php");
    }
}