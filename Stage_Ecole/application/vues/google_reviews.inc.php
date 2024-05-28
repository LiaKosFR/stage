<?php


// Remplacez 'YOUR_API_KEY' par votre clé API et 'PLACE_ID' par l'identifiant de votre lieu.
$apiKey = 'AIzaSyDkZjxaEsdBz5BdaayR-uDUj3ouNHrRllw';
$placeId = 'ChIJ5ZFHl8b15kcRIyb85G9YQuA';

// URL de l'API Google Places
$url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=$placeId&fields=name,rating,reviews&key=$apiKey";

// Envoyer une requête GET à l'API
$response = file_get_contents($url);
$data = json_decode($response, true);

if (isset($data['result']['reviews'])) {
    echo "<h2>Avis Google pour {$data['result']['name']}:</h2>";
    foreach ($data['result']['reviews'] as $review) {
        echo "<div class='review'>";
        echo "<p><strong>{$review['author_name']}:</strong> {$review['text']}</p>";
        echo "<p><em>Évaluation: {$review['rating']} étoiles</em></p>";
        echo "</div>";
    }
} else {
    echo "Aucun avis trouvé.";
    echo "<pre>";
print_r($data);
echo "</pre>";
}
?>

