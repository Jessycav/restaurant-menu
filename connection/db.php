<?php
//$mongoUri = "mongodb://127.0.0.1:27017"; //local
$mongoUri = "mongodb+srv://JessV:RestauMenu2025@restaurant-menu.vatgq.mongodb.net/?retryWrites=true&w=majority&appName=restaurant-menu"; //hébergement sur MongoDB Atlas

try {
    $mongoClient = new MongoDB\Driver\Manager($mongoUri);
    echo "connexion reussie à atlas";
} catch (Exception $e) {
    die("Erreur de connexion : " . $e->getMessage());

}

$database = "restaurantDB";
$collection = "menu";
?>