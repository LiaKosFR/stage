
<script>
    $(document).ready(function () {
        $('#actualite_a_modifier').change(function () {
            var idActualite = $(this).val();
            console.log("Actualité sélectionnée: " + idActualite); // Debug
            if (idActualite) {
                $.ajax({
                    type: 'POST',
                    url: 'index.php?controleur=Actualite&action=getActualiteDetails',
                    data: {idActualite: idActualite},
                    dataType: 'json',
                    success: function (response) {
                        console.log("Réponse du serveur: ", response); // Debug
                        if (response) {
                            $('#nouveau_nom_actualite').val(response.Titre);
                            $('#description_actualite').val(response.description);
                            $('#Privacy_actualite').val(response.privacy);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Erreur lors de la récupération des détails de l'actualité:", error); // Debug
                        alert('Erreur lors de la récupération des détails de l\'actualité.');
                    }
                });
            } else {
                $('#nouveau_nom_actualite').val('');
                $('#description_actualite').val('');
                $('#Privacy_actualite').val('');
            }
        });
    });
</script>











<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<!--  <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 40.645037,
          lng: -73.880224
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 40.645037,
          lng: -73.880224
        },
        map: map,
        icon: image
      });
    }
  </script>-->
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</script>
<!-- end google map js -->
</body>

</html>