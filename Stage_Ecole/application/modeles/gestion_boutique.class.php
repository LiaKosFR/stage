<?php



class GestionBoutique {
    
    // <editor-fold defaultstate="collapsed" desc="Champs statiques"> 

    /**
     * Objet de la classe PDO
     * @var PDO
     */
    public static $pdoCnxBase = null;

    /**
     * Objet de la classe PDOStatement
     * @var PDOStatement
     */
    public static $pdoStResults = null;
    public static $requete = ""; //texte de la requête
    public static $resultat = null; //résultat de la requête

    // </editor-fold>
    // 
    // <editor-fold defaultstate="collapsed" desc="Méthodes statiques">

    /**
     * Permet de se connecter à la base de données
     */
    public static function seConnecter() {
        if (!isset(self::$pdoCnxBase)) { //S'il n'y a pas encore eu de connexion
            try {
                self::$pdoCnxBase = new PDO('mysql:host=' . MysqlConfig::SERVEUR . ';dbname=' . MysqlConfig::BASE, MysqlConfig::UTILISATEUR, MysqlConfig::MOT_DE_PASSE);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$pdoCnxBase->query("SET CHARACTER SET utf8");
            } catch (Exception $e) {
                // l’objet pdoCnxBase a généré automatiquement un objet de type Exception
                echo 'Erreur : ' . $e->getMessage() . '<br />'; // méthode de la classe Exception
                echo 'Code : ' . $e->getCode(); // méthode de la classe Exception
            }
        }
    }

     public static function isAdminOK($login, $passe) {
        self::seConnecter();
        self::$requete = "SELECT * FROM Utilisateur where login=:login and passe=:passe";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->bindValue('passe', sha1($passe));
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        if ((self::$resultat != null) and (self::$resultat->isAdmin))
            return true;
        else
            return false;
    }
    
    
    
    
    
    public static function seDeconnecter() {
        self::$pdoCnxBase = null; //base a null donc déconnecter
    }
    
    public static function getLesTuplesByTable($table) {
        self::seConnecter();

        self::$requete = "Select * FROM $table";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }
    
    public static function getLeTupleTableById($table,$id) {
        self::seConnecter();
        self::$requete = "Select * FROM $table WHERE id = $id";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }
    
    private static function getLeTupleByTable($table) {
        self::seConnecter();

        self::$requete = "Select * FROM $table";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }
    

    
    
    public static function getNbTupleByTable($table) {
        self::seConnecter();
        self::$requete = "SELECT Count(*) AS nbTuples FROM $table";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return self::$resultat->nbTuples;
    }
    
    // </editor-fold>
}
?>

<?php

//GestionCategorie::ajouter('souris');7
//GestionCategorie::ajouter('clavier');8
//GestionCategorie::ajouter('casque');9 
//GestionCategorie::ajouter('ecran');10
//GestionCategorie::ajouter('ordinateur');11

//GestionFournisseur::ajouter('José', '32 bis rue Avignon', 38000, 'Ragnaroc', '0650885566', 'José.rodrigez@gmail.com');3
//GestionFournisseur::ajouter('Dore', '2 Avenue Fabre', 91500, 'Saint-Gregoire du puit', '0785664125', 'Dore.entreprise@gmail.com');4
//GestionFournisseur::ajouter('Valentino', '5 rue de l apotre', 75030, 'Geneve', '0785654525', 'Valent.mail@gmail.com');5

//GestionClient::ajouter('Rodriguez', '6 rue de maldive', 45060, 'Mont-Part', '0750422686', 'Rodriguez@gmail.com');
//GestionClient::ajouter('Dupont', '22 avenue des Tulipes', 75015, 'Paris', '0635874125', 'dupont@gmail.com');
//GestionClient::ajouter('Martin', '10 rue Bonaparte', 69001, 'Lyon', '0658741203', 'martin@gmail.com');
//GestionClient::ajouter('Petit', '8 chemin de la Meunière', 31000, 'Toulouse', '0645892571', 'petit@gmail.com'); 
//GestionClient::ajouter('Dubois', '5 place de la République', 44000, 'Nantes', '0687451289', 'dubois@gmail.com'); 
//GestionClient::ajouter('Lefebvre', '12 avenue du Général de Gaulle', 59000, 'Lille', '0658741352', 'lefebvre@gmail.com');
//GestionClient::ajouter('Robert', '14 rue Victor Hugo', 13002, 'Marseille', '0678529631', 'robert@gmail.com');
//GestionClient::ajouter('Moreau', '9 boulevard Saint-Michel', 75005, 'Paris', '0658749012', 'moreau@gmail.com');
//GestionClient::ajouter('Simon', '25 chemin de la Fontaine', 67000, 'Strasbourg', '0687451296', 'simon@gmail.com');
//GestionClient::ajouter('Leroy', '2 rue des Primevères', 35000, 'Rennes', '0678456032', 'leroy@gmail.com');
//GestionClient::ajouter('Laurent', '18 avenue de la Libération', 69003, 'Lyon', '0698475102', 'laurent@gmail.com');
//GestionClient::ajouter('Garcia', '7 rue de la Paix', 75001, 'Paris', '0658743021', 'garcia@gmail.com');
//GestionClient::ajouter('Roux', '15 boulevard du Temple', 69002, 'Lyon', '0698657412', 'roux@gmail.com');
//GestionClient::ajouter('Marchand', '3 rue du Commerce', 44000, 'Nantes', '0658743026', 'marchand@gmail.com'); 
//GestionClient::ajouter('Sanchez', '20 avenue des Champs-Élysées', 75008, 'Paris', '0698574130', 'sanchez@gmail.com');

//GestionCommande::ajouter(5);17
//GestionCommande::ajouter(3);18
//GestionCommande::ajouter(10);19
//GestionCommande::ajouter(14);20
//GestionCommande::ajouter(13);21
//GestionCommande::ajouter(8);22
//GestionCommande::ajouter(15);23
//GestionCommande::ajouter(16);24

//GestionProduit::ajouter('Moniteur Acer EK241YHbi', '24Pouces, Full HD LED, 100 Hz, 1ms, 1920x1080', 99.99, 'image_ecran.jpg', 10, 3);17
//GestionProduit::ajouter('Souris Logitech G PRO X SUPERLIGHT', 'Technologie sans fil LIGHTSPEED, 63 grammes, Conçue avec et pour les Gamers Pro', 120.50, 'image_souris.jpg', 7, 4);18
//GestionProduit::ajouter('Clavier Razer Huntsman V2', 'Clavier Gamer Optique pratiquement Sans Latence, Silencieux, Clavier AZERTY, Noir', 149.99, 'image_clavier.jpg', 8, 4);19
//GestionProduit::ajouter('Casque Gaming HyperX Cloud II', 'Son surround 7.1 virtuel, Confort HyperX exceptionnel, Compatibilité multi-plateforme', 75.49, 'image_casque.jpg',9, 5);20
//GestionProduit::ajouter('Ordinateur de Bureau Gamer INFOMAX', 'Intel Core i5-13400F, NVIDIA GeForce RTX 4060 Ti 8 Go, 6 Go de mémoire + 1 To SSD', 1200.99, 'image_ordinateurFixe.jpg', 11, 3);21
//GestionProduit::ajouter('Ordinateur Portable Acer Nitro 5 AN515-58-992L', '15,6Pouces, Full HD, IPS 144 Hz,Intel Core i9-12900H, NVIDIA GeForce RTX 4060, RAM 16 Go, 1024 Go SSD', 999.99, 'image_ordinateurPortable.jpg', 11, 3);22
        
//GestionLigneDeCommande::ajouter(17, 17, 2);
//GestionLigneDeCommande::ajouter(18, 18, 1);
//GestionLigneDeCommande::ajouter(19, 18, 1);
//GestionLigneDeCommande::ajouter(20, 19, 1);
//GestionLigneDeCommande::ajouter(21, 22, 1);
//GestionLigneDeCommande::ajouter(22, 20, 1);
//GestionLigneDeCommande::ajouter(23, 20, 1);
//GestionLigneDeCommande::ajouter(24, 21, 1);


?>