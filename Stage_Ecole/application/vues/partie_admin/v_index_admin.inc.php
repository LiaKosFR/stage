<section class="indexAdmin">
    <div class="titre">
        Administration du site (Accès réservé)</br>
        - Bonjour <?php echo $_SESSION['login_admin']; ?> -
    </div>
    <div class ="produit">
        <h2 class="titre_modifier_ajouter_supp">Ajouter/Modifier/Supprimer un Produit</h2>

        <form class="formAjouterProduit" method="POST" action="index.php?controleur=Produits&action=ajouterProduit">
            <input type="hidden" name="action" value="ajouterProduit">
            <label for="nom">Nom du produit :</label>
            <input type="text" id="nom" name="nom" placeholder= "Entrez nom du produit" required></br>
            <label for="nom">Description du Produit :</label>
            <input type="text" id="description" name="description" placeholder="Entrez la description" required></br>
            <label for="nom">Prix du produit :</label>
            <input type="text" id="prix" name="prix" placeholder="Entrez le prix du produit"required></br>
            <label for="nom">Image du produit :</label>
            <input type="file" id="image" name="image"></br>
            <label for="nom">Categorie du produit :</label>
            <select id="categorie_produit" name="categorie_produit" required>
                <option value="">Sélectionner une catégorie</option>
                
            </select></br>
            <label for="nom">Fournisseur du produit :</label>
            <select id="fournisseur" name="fournisseur" required placeholder= "Entrez nom du produit">
                <option value="">Sélectionner un fournisseur</option>
                
            </select></br>
            <input  class ="bouton_form" type="submit"  value="Ajouter"/>
        </form>



        <form  class="formModifierProduit" action="index.php?controleur=Categories&action=modifierCategorie" method="POST">
            <label for="produit_a_modifier">Modifier Produit :</label>

            <select id="produit_a_modifier" name="produit_a_modifier" required>
                <option value="">Sélectionner un produit</option>
                

            </select>

            <input type="text" id="nouveau_nom_produit" name="nouveau_nom_produit" placeholder="Nouveau Nom" required></br>
            <label for="nom">Description du produit :</label>
            <input type="text" id="descrption_produit" name="descrption_produit" value="" required></br>
            <label for="nom">Prix du produit :</label>
            <input type="text" id="prix_produit" name="prix_produit" value="" required></br>
            <label for="nom">Image du produit :</label>
            <input type="text" id="image_produit" name="image_produit" value="" required></br>
            <label for="nom">Categorie du produit :</label>
            <input type="text" id="categorie_produit" name="categorie_produit" value="" required></br>
            <label for="nom">Fournisseur du produit :</label>
            <input type="text" id="fournisseur_produit" name="fournisseur_produit" value="" required></br>

            <input class ="bouton_form" type="submit" value="Modifier">
        </form>

        <form  class="formSuppProduit"action="index.php?controleur=Produits&action=supprimerProduit" method="POST">
            <label for="produit_a_supprimer">Supprimer Catégorie :</label>
            <select id="produit_a_supprimer" name="produit_a_supprimer" required>
                <option value="">Sélectionner un produit</option>
               

            </select>
            <input class ="bouton_form" type="submit" value="Supprimer">
        </form>
    </div>
    <p class="textdeconnexion">
        <button class="deconnexion"><a href="index.php?controleur=Admin&action=seDeconnecter">Déconnexion </a></button>
    </p>

</section>

