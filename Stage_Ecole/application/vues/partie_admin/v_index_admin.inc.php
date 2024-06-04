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



        <form  class="formModifierActualite" action="index.php?controleur=Categories&action=modifierCategorie" method="POST">
            <label for="actualite_a_modifier">Modifier l'actualite :</label>

            <select id="actualite_a_modifier" name="actualite_a_modifier" required>
                <option value="">Sélectionner l'actualite</option>
                <?php
                $lesActualites = GestionBoutique::getLesTuplesByTable("actualite");
              
                foreach($lesActualites as $uneActualite) { // Remplir le select avec les actualites
                    ?>
                    <option value="<?php echo $uneActualite->idActualite ?>"> <?php echo $uneActualite->Titre ?></option>
                    <?php
                }
                ?>

            </select>

            <input type="text" id="nouveau_nom_actualite" name="nouveau_nom_actualite" placeholder="Nouveau Titre" required></br>
            <label for="nom">Description de l'actualite :</label>
            <input type="text" id="descrption_actualite" name="descrption_actualite" value="" required></br>
            <label for="nom">Image de l'actualite :</label>
            <input type="file" id="image" name="image"></br>
            <label for="nom">Visibilité de l'actualite :</label>
            <select id="Privacy_actualite" name="Privacy_actualite" required>
                <option value="">Sélectionner la visibilite de l'actualite</option>
                <option value="0">public</option>
                <option value="1">privé</option>
                
            </select></br>

            <input class ="bouton_form" type="submit" value="Modifier">
        </form>

        <form  class="formSuppActualite"action="index.php?controleur=Actualite&action=SupprimerActualite" method="POST">
            <label for="actualite_a_supprimer">Supprimer une actualite</label>
            <select id="actualite_a_supprimer" name="actualite_a_supprimer" required>
                <option value="">Sélectionner l'actualite</option>
               <?php
                $lesActualites = GestionBoutique::getLesTuplesByTable("actualite");
              
                foreach($lesActualites as $uneActualite) { // Remplir le select avec les actualites
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

 <script>
document.addEventListener('DOMContentLoaded', function() {
    const actualiteSelect = document.getElementById('actualite_a_modifier');
    actualiteSelect.addEventListener('change', function() {
        const actualiteId = this.value;
        if (actualiteId) {
            fetch(`index.php?controleur=Actualite&action=getActualite&id=${actualiteId}`)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        document.getElementById('nouveau_nom_actualite').value = data.Titre;
                        document.getElementById('descrption_actualite').value = data.Description;
                        document.getElementById('image_actualite').value = data.Image;
                    }
                })
                .catch(error => console.error('Error fetching data:', error));
        }
    });
});
</script>
