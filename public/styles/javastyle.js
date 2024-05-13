// JavaScript pour le menu déroulant
document.addEventListener("DOMContentLoaded", function () {
    var menuToggle = document.getElementById('menu-toggle');
    var menu = document.getElementById('menu');

    menuToggle.addEventListener('click', function () {
        menu.classList.toggle('active');
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Changement de couleur de fond au survol des liens de navigation
    var navLinks = document.querySelectorAll('#Boutons li a');
    navLinks.forEach(function (link) {
        link.addEventListener('mouseout', function () {
            this.style.backgroundColor = ''; // Retour à la couleur de fond par défaut
        });
    });

    // Effet de survol sur le logo
    var logo = document.querySelector('header img');
    logo.addEventListener('mouseover', function () {
        this.style.transform = 'scale(1.05)'; // Zoom du logo au survol
    });
    logo.addEventListener('mouseout', function () {
        this.style.transform = ''; // Retour à la taille normale du logo
    });

    // Ajout d'un effet de transition sur le menu gauche
    var menuGauche = document.getElementById('menu_gauche');
    menuGauche.style.transition = 'transform 0.1s ease'; // Transition fluide

});



