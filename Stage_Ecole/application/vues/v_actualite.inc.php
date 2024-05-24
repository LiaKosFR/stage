<section>
    <?php
    foreach (VariablesGlobales::$lesActualites as $uneActualite) {
        ?> 
        <article>
            <img src="<?php echo Chemins::IMAGES_ACTUALITES ?>/<?php echo $uneActualite->Titre; ?>/<?php echo $uneActualite->image; ?>" alt="photo" />
            <aside>
                <h1><?php echo $uneActualite->Titre ?></h1>
                <h3><?php echo $uneActualite->description ?></h3>
                <p><?php echo "(" . $uneActualite->dates . ")"; ?></p>   
                </aside>

        </article>
        <?php
    }
    ?>
</section>