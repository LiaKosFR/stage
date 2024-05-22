<section class="indexAdmin">
    <div class="titre">
        Administration du site (Accès réservé)</br>
        - Bonjour <?php echo $_SESSION['login_admin']; ?> -
    </div>
    <div class="lienIndexAdmin">
        <a class="linkAdmin" href="#">Gestion des catégories</a></br>
        <a class="linkAdmin" href="#">Gestion des produits</a></br>
        <p>
            <a href="index.php?controleur=admin&action=seDeconnecter">Déconnexion (<?php echo $_SESSION['login_admin'] ?>)</a>
        </p>
    </div>
</section>

