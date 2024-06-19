

<section class="indexAdmin">
    <div class="titre">
        Administration du site (Accès réservé)</br>
        - Bonjour <?php echo $_SESSION['login_admin']; ?> -
    </div>
    <div class ="produit">

        <h2 class="titre_modifier_ajouter_supp">Modifier une actualité</h2>
        <form class="formModifierActualite" action="index.php?controleur=Actualite&action=modifierActualite" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="modifierActualite">
            <label for="actualite_a_modifier">Modifier l'actualité :</label>
            <select id="actualite_a_modifier" name="actualite_a_modifier" required>
                <option value="">Sélectionner l'actualité</option>
                <!-- Options de sélection des actualités -->
            </select><br>

            <label for="nouveau_nom_actualite">Nouveau Titre :</label>
            <input type="text" id="nouveau_nom_actualite" name="nouveau_nom_actualite" placeholder="Nouveau Titre" required><br>

            <label for="description_actualite">Description de l'actualité :</label>
            <input type="text" id="description_actualite" name="description_actualite" placeholder="Description" required><br>

            <label for="image">Image de l'actualité :</label>
            <input type="file" id="image" name="image"><br>

            <label for="Privacy_actualite">Visibilité de l'actualité :</label>
            <select id="Privacy_actualite" name="Privacy_actualite" required>
                <option value="">Sélectionner la visibilité de l'actualité</option>
                <option value="0">public</option>
                <option value="1">privé</option>
            </select><br>

            <input class="bouton_form" type="submit" value="Modifier">
        </form>

        <p class="textdeconnexion">
            <button class="deconnexion"><a href="index.php?controleur=Admin&action=afficherIndex">Retour </a></button>
        </p>

</section>

