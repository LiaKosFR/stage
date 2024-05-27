<section class="indexAdmin">
    <div class="titre">
        Administration du site (Accès réservé)</br>
        - Bonjour <?php echo $_SESSION['login_admin']; ?> -
    </div>
    <div class ="produit">
        <h2 class="titre_modifier_ajouter_supp">Ajouter/Modifier/Supprimer un Produit</h2>

        <form class="formAjouterActualite" method="POST" action="index.php?controleur=Actualite&action=AjouterAcutalite">
            <input type="hidden" name="action" value="ajouterProduit">
            <label for="nom">Titre de l'actualite :</label>
            <input type="text" id="Titre" name="Titre" placeholder= "Entrez le Titre de l'actualité" required></br>
            <label for="nom">Description de l'actualite :</label>
            <input type="text" id="description" name="description" placeholder="Entrez la description" required></br>
            <label for="nom">Image de l'actualite :</label>
            <input type="file" id="image" name="image"></br>
            <label for="nom">Visibilité de l'actualite :</label>
            <select id="Privacy_actualite" name="Privacy_actualite" required>
                <option value="">Sélectionner la visibilite de l'actualite</option>
                
            </select></br>
            <input  class ="bouton_form" type="submit"  value="Ajouter"/>
        </form>



        <form  class="formModifierActualite" action="index.php?controleur=Categories&action=modifierCategorie" method="POST">
            <label for="actualite_a_modifier">Modifier l'actualite :</label>

            <select id="actualite_a_modifier" name="actualite_a_modifier" required>
                <option value="">Sélectionner l'actualite</option>
                

            </select>

            <input type="text" id="nouveau_nom_actualite" name="nouveau_nom_actualite" placeholder="Nouveau Nom" required></br>
            <label for="nom">Description de l'actualite :</label>
            <input type="text" id="descrption_actualite" name="descrption_actualite" value="" required></br>
            <label for="nom">Prix de l'actualite :</label>
            <input type="text" id="prix_actualite" name="prix_actualite" value="" required></br>
            <label for="nom">Image de l'actualite :</label>
            <input type="text" id="image_actualite" name="image_actualite" value="" required></br>
            <label for="nom">Categorie de l'actualite :</label>
            <input type="text" id="categorie_actualite" name="categorie_actualite" value="" required></br>
            <label for="nom">Fournisseur de l'actualite :</label>
            <input type="text" id="fournisseur_actualite" name="fournisseur_actualite" value="" required></br>

            <input class ="bouton_form" type="submit" value="Modifier">
        </form>

        <form  class="formSuppProduit"action="index.php?controleur=Produits&action=supprimerProduit" method="POST">
            <label for="actualite_a_supprimer">Supprimer une actualite</label>
            <select id="actualite_a_supprimer" name="actualite_a_supprimer" required>
                <option value="">Sélectionner l'actualite</option>
               

            </select>
            <input class ="bouton_form" type="submit" value="Supprimer">
        </form>
    </div>
    <p class="textdeconnexion">
        <button class="deconnexion"><a href="index.php?controleur=Admin&action=seDeconnecter">Déconnexion </a></button>
    </p>

</section>

