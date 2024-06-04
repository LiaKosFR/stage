<section class="indexAdmin">
    <div class="titre">
        Administration du site (Accès réservé)</br>
        - Bonjour <?php echo $_SESSION['login_admin']; ?> -
    </div>
    <div class ="produit">
        <h2 class="titre_modifier_ajouter_supp">Ajouter/Modifier/Supprimer une actualité</h2>

        <form class="formAjouterActualite" method="POST" action="index.php?controleur=Actualite&action=AjouterActualite">
            <input type="hidden" name="action" value="ajouterActualite">
            <label for="nom">Titre de l'actualite :</label>
            <input type="text" id="Titre" name="Titre" placeholder= "Entrez le Titre de l'actualité" required></br>
            <label for="nom">Description de l'actualite :</label>
            <input type="text" id="description" name="description" placeholder="Entrez la description" required></br>
            <label for="nom">Image de l'actualite :</label>
            <input type="file" id="image" name="image"></br>
            <label for="nom">Visibilité de l'actualite :</label>
            <select id="Privacy_actualite" name="Privacy_actualite" required>
                <option value="">Sélectionner la visibilite de l'actualite</option>
                <option value="0">public</option>
                <option value="1">privé</option>

            </select></br>
            <input  class ="bouton_form" type="submit"  value="Ajouter"/>
        </form>



        <form class="formModifierActualite" method="POST" action="index.php?controleur=Actualite&action=ModifierActualite">
            <label for="actualite_a_modifier">Modifier l'actualité :</label>
            <select id="actualite_a_modifier" name="actualite_a_modifier" required>
                <option value="">Sélectionner l'actualité</option>
                <?php
                $lesActualites = GestionBoutique::getLesTuplesByTable("actualite");
                foreach ($lesActualites as $uneActualite) {
                    echo '<option value="' . $uneActualite->idActualite . '">' . $uneActualite->Titre . '</option>';
                }
                ?>
            </select>
            <input type="text" id="nouveau_nom_actualite" name="nouveau_nom_actualite" placeholder="Nouveau Titre" required></br>
            <label for="description_actualite">Description de l'actualité :</label>
            <input type="text" id="description_actualite" name="description_actualite" value="" required></br>
            <label for="image">Image de l'actualité :</label>
            <input type="file" id="image" name="image"></br>
            <label for="Privacy_actualite">Visibilité de l'actualité :</label>
            <select id="Privacy_actualite" name="Privacy_actualite" required>
                <option value="">Sélectionner la visibilité de l'actualité</option>
                <option value="0">public</option>
                <option value="1">privé</option>
            </select></br>
            <input class="bouton_form" type="submit" value="Modifier">
        </form>

        <form  class="formSuppActualite"action="index.php?controleur=Actualite&action=SupprimerActualite" method="POST">
            <label for="actualite_a_supprimer">Supprimer une actualite</label>
            <select id="actualite_a_supprimer" name="actualite_a_supprimer" required>
                <option value="">Sélectionner l'actualite</option>
                <?php
                $lesActualites = GestionBoutique::getLesTuplesByTable("actualite");

                foreach ($lesActualites as $uneActualite) { // Remplir le select avec les actualites
                    ?>
                    <option value="<?php echo $uneActualite->idActualite ?>"> <?php echo $uneActualite->Titre ?></option>
                    <?php
                }
                ?>

            </select>

            <input class ="bouton_form" type="submit" value="Supprimer">
        </form>
    </div>
    <p class="textdeconnexion">
        <button class="deconnexion"><a href="index.php?controleur=Admin&action=seDeconnecter">Déconnexion </a></button>
    </p>

</section>




