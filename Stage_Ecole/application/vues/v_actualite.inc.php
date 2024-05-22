<section>
    <?php
    foreach (VariablesGlobales::$lesActualites as $uneActualite) {
        ?> 
        <article>
            <img src="<?php echo Chemins::IMAGES_PRODUITS ?>/<?php echo $unProduit->libelle; ?>/<?php echo $unProduit->image; ?>" alt="photo" />
            <aside>
                <h1><?php echo $unProduit->nom ?></h1>
                <h3><?php echo $unProduit->description ?></h3>
                <p><?php echo "(" . $unProduit->libelle . ")"; ?></p>
                <h3><?php echo $unProduit->prix ?> Euros</h3>
                <a href="#" class="ajouterPanier">
                    <img src="<?php echo Chemins::IMAGES ?>/ajouter_panier.png" title="Ajouter au panier"/>
                </a>
            </aside>

        </article>
        <?php
    }
    ?>
</section>