<nav id="menu_gauche">
    <h1> Catégories </h1>
    <ul>
        
        <?php
        foreach (VariablesGlobales::$lesCategories as $uneCategorie) {
            echo "<li>"
            . "<a href=index.php?controleur=Produits&action=afficher&categorie=$uneCategorie->libelle>$uneCategorie->libelle</a>"
            . "</li>";
        }
        ?>

    </ul>
</nav>