<?php 
class ControleurUtilisateur {

public function seDeconnecter() {
        setcookie('login', ''); //suppression du cookie en vidant simplement la chaîne
        $_SESSION = array();
        session_destroy();
        header("Location:index.php");
    }
}
?>