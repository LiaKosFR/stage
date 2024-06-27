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
    require Chemins::VUES_ADMIN . 'v_index_super_admin.inc.php';
}
public function SuprimerUtilisateur(){
    $id = $_POST['idUtilisateur'];
    GestionUtilisateur::supprimerById($id);
    require Chemins::VUES_ADMIN . 'v_index_super_admin.inc.php';
}
 public function afficherModifierUtilisateur() {
        if (isset($_GET['idUtilisateur'])) {
            $idUtilisateur = $_GET['idUtilisateur'];
            $utilisateur = GestionUtilisateur::getUtilisateurById($idUtilisateur);
            require Chemins::VUES_ADMIN . 'modifier_utilisateur_view.inc.php';
        }
    }

    public function getUtilisateurDetails() {
        if (isset($_POST['idUtilisateur'])) {
            $idUtilisateur = $_POST['idUtilisateur'];
            $utilisateur = GestionUtilisateur::getUtilisateurById($idUtilisateur);

            if ($utilisateur) {
                header('Content-Type: application/json');
                echo json_encode($utilisateur);
            } else {
                echo json_encode(['error' => 'Erreur lors de la récupération des détails de l\'actualité.']);
            }
            exit;
        }
    }

public function seDeconnecter() {
        setcookie('login', ''); //suppression du cookie en vidant simplement la chaîne
        $_SESSION = array();
        session_destroy();
        header("Location:index.php");
    }
}
?>