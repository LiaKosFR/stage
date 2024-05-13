    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <style>
        /* CSS pour le style */
        .disabled {
            opacity: 0.5;
            pointer-events: none;
        }
    </style>
    
<section>
    <div class="titre">
        Administration du site (Accès réservé)
    </div>
    <form method="post" action="index.php?controleur=admin&action=verifierConnexion" id="loginForm">
        <fieldset>
            <legend>Identification</legend>
            <label for="login">Votre login :</label>
            <input type="text" name="login" id="login" required/><br/>
            <label for="passe">Votre mot de passe :</label>
            <input type="password" name="passe" id="passe" required/><br/>
            <input type="checkbox" name="connexion_auto" id="connexion_auto"/>
            <label for="connexion_auto" class="enligne"> Connexion automatique </label><br/>
            <input type="submit" value="Connexion" id="connexionBtn" class="disabled"/>
        </fieldset>
    </form>
</section>

<script>
    // Fonction pour vérifier si les champs de connexion sont remplis
    function checkForm() {
        var login = document.getElementById("login").value;
        var passe = document.getElementById("passe").value;
        var submitBtn = document.getElementById("connexionBtn");

        // Si les champs ne sont pas vides, activer le bouton de soumission
        if (login !== "" && passe !== "") {
            submitBtn.classList.remove("disabled");
        } else {
            submitBtn.classList.add("disabled");
        }
    }

    // Appeler la fonction de vérification à chaque fois qu'un champ est modifié
    document.getElementById("login").addEventListener("input", checkForm);
    document.getElementById("passe").addEventListener("input", checkForm);
</script>


