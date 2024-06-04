<?php

require_once 'gestion_boutique.class.php';

class GestionActualite {

    // <editor-fold defaultstate="collapsed" desc="Méthodes statiques">

    public static function getNbActualite() {
        return GestionBoutique::getNbTupleByTable('actualite');
    }

    public static function ajouter($Titre, $descriptionActualite, $dates, $image, $privacy) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "insert into actualite(Titre,description,dates,image,privacy) values(:Titre ,:description, :dates,:image, :privacy) ";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('Titre', $Titre);
        GestionBoutique::$pdoStResults->bindValue('description', $descriptionActualite);
        GestionBoutique::$pdoStResults->bindValue('dates', $dates);
        GestionBoutique::$pdoStResults->bindValue('image', $image);
        GestionBoutique::$pdoStResults->bindValue('privacy', $privacy);
        GestionBoutique::$pdoStResults->execute();
    }

    public static function supprimerById($idActualite) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "Delete FROM actualite WHERE idActualite = :id ";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idActualite);
        GestionBoutique::$pdoStResults->execute();
    }

    public static function modifierActualite($idProduitAChanger, $Titre, $descriptionActualite, $dates, $idUtilisateur) {
        GestionBoutique::seConnecter();
        GestionBoutique::$requete = "update actualite set Titre = :Titre , description = :description , dates = :dates , idUtilisateur = :idUtilisateur WHERE id = :id";
        GestionBoutique::$pdoStResults = GestionBoutique::$pdoCnxBase->prepare(GestionBoutique::$requete);
        GestionBoutique::$pdoStResults->bindValue('id', $idActualiteAChanger);
        GestionBoutique::$pdoStResults->bindValue('Titre', $nomProduit);
        GestionBoutique::$pdoStResults->bindValue('description', $descriptionActualite);
        GestionBoutique::$pdoStResults->bindValue('dates', $dates);
        GestionBoutique::$pdoStResults->bindValue('idUtilisateur', $idUtilisateur);
        GestionBoutique::$pdoStResults->execute();
    }

    public static function getLesActualites() {
        GestionBoutique::getLesTuplesByTable("actualite");
    }

    public static function getActualiteById($idActualite) {
        $sql = "SELECT * FROM actualite WHERE idActualite = :idActualite";
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindParam(':idActualite', $idActualite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function modifier($idActualite, $nouveauTitre, $description, $image, $privacy) {
        $pdo = GestionBoutique::seConnecter();
        $sql = "UPDATE actualite SET Titre = :Titre, description = :Description, image = :Image, privacy = :Visibility WHERE idActualite = :idActualite";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'Titre' => $nouveauTitre,
            'Description' => $description,
            'Image' => $image,
            'Visibility' => $privacy,
            'idActualite' => $idActualite
        ]);
    }

    private static function getConnexion() {
        // Retourner la connexion PDO ici
    }
}

// </editor-fold>   
?>