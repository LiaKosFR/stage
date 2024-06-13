<div class="btn">
   <img src="<?php echo Chemins::IMAGES . 'arrow.svg' ?>" class="icone">
   
</div>



<section class="hero_section ">
    <div class="hero-container container">
        <div class="hero_detail-box">
            <h3>
                Bienvenue à <br>
                l'école 
            </h3>
            <h1 class="school">
                <img class="logo_presentation" src="<?php echo Chemins::IMAGES . 'logo_ecole_sansfond4.png' ?>" alt="alt"/>
            </h1>
            <p>
                Ecole maternelle et élémentaire Bilingue dans la ville de Pontoise
            </p>
            <div class="hero_btn-continer">
                <a href="#ContactNow" class="call_to-btn btn_white-border">
                    <span>
                        Nous Contacter
                    </span>
                    <img src="<?php echo Chemins::IMAGES . 'right-arrow.png' ?>" alt="">
                </a>
            </div>
        </div>
        <div class="hero_img-container">
            <div>
                <img src="<?php echo Chemins::IMAGES . 'hero.png' ?>"alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>
</div>
<!-- end header section -->

<!-- about section -->
<section class="about_section layout_padding">
    <div class="container" id="containerAbout">
        <div id="APropos">
            <h2 class="main-heading ">
                À Propos 
            </h2>
        </div>
        <p class="text-center">
            Située entre Pontoise et Ennery au sein du parc du château de l'Hermitage l'Ecole primaire Bilingue Jamondeyra accueille vos enfants de la maternelle au CM2.
          Les enfants seront accueillis dans un cadre bienveillant. Notre Pédagogie est tournée vers les besoins de votre enfant avec des classes à petit Effectif, des objectifs individualisés , un rythme de vie respecté.
        Les enfants bénéficient de cours d'anglais journalier (30 min pour les Maternelles et 1h30 pour les élémentaires) prodigués par une enseignante spécialisée.
        Des initiations par des intervenants extérieurs (Espagnol ,Pâtisserie , chants , potager ...) sont proposées au cours de l'année .
        Apprendre à être critique sur les informations trouvées sur internet et les réseaux sociaux afin de prévenir des dangers.
        Bienveillance , Adaptation , Autonomie ,Encouragements sont les maitres mots de notre pédagogie afin de permettre aux enfants de devenir des citoyens du monde de demain épanouis .
        </p>
        <div class="about_img-box ">
            <img src="<?php echo Chemins::IMAGES . 'kids.jpg' ?>" alt="" class="img-fluid w-100">
        </div>

    </div>
</section>
<!-- about section -->



<!-- carousel section -->
<section class="vehicle_section layout_padding">
    <div class="container">
        <div id='Services'>
            <h2 class="main-heading ">
                Nos Services
            </h2>
        </div>
        <div class="layout_padding-top2">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="vehicle_img-box ">
                            <p class="text-centre">
                                Centre de Loisirs le mercredi et une partie des vacances (première moitié) classique
                                ou avec Anglais renforcé .
                            </p>
                            <img src="<?php echo Chemins::IMAGES . 'centre.png' ?>" alt="" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="vehicle_img-box ">
                            <p class="text-cantine">
                                Cantine en Lunch box ou commande traiteur BIO
                            </p>
                            <img src="<?php echo Chemins::IMAGES . 'cantine.png' ?>" alt="" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="vehicle_img-box ">
                            <p class="text-garderie">
                                Garderie le matin de 7h30 à 8h20 et le soir de 17h à 19h00
                            </p>
                            <img src="<?php echo Chemins::IMAGES . 'garderie.png' ?>" alt="" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>
</section>

<!-- carousel section -->



<!-- client section -->
<section class="client_section layout_padding">
    <div class="container">
        
        <div class="layout_padding2">
            
            <div class="client_container d-flex flex-column">
                <h2 class="main-heading ">
            Nos Retours
        </h2>
                <?php require_once Chemins::VUES . 'google_reviews.inc.php' ?>
            </div>
        </div>
    </div>
</section>




<!-- client section -->

<!-- contact section -->

<section class="contact_section layout_padding-bottom">
    <div class="container">
        <div id='ContactNow'>
            <h2 class="main-heading">
                Nous Contacter
            </h2>
        </div>
        <p class="text-center">
            En cas de problèmes ou de questions veuillez nous contacter ci-dessous.

        </p>
        <div class="">
            <div class="contact_section-container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="image_contact">
                             <div class="contact-form">
                                <form action="">
                                    <div>
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Phone Number">
                                    </div>
                                    <div>
                                        <input type="email" placeholder="Email">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Message" class="input_message">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn_on-hover">
                                            Envoyer
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- end contact section -->

<!-- admission section -->
<section class="admission_section ">
    <div class="container-fluid position-relative">
        <div class="row h-100">
            <div id="map" class="h-100 w-100 ">

            </div>

        </div>
    </div>
</section>








