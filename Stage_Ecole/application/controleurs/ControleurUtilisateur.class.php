<?php 
require Chemins::MODELES . 'gestion_utilisateur.class.php';
class ControleurUtilisateur {

public function ajouterUtilisateur(){
    $nom = $_POST['Nom'];
    $prenom = $_POST['prenom'];
    $mdp = $_POST['mdp'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $isAdmin = $_POST['isAdmin'];
    $SuperAdmin = $_POST['SuperAdmin'];
    GestionUtilisateur::ajouter($nom, $prenom, $mdp, $email, $login, $isAdmin, $SuperAdmin);
}
public function seDeconnecter() {
        setcookie('login', ''); //suppression du cookie en vidant simplement la chaîne
        $_SESSION = array();
        session_destroy();
        header("Location:index.php");
    }
}
?>