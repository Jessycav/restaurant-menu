<?php
//$mongoUri = "mongodb://127.0.0.1:27017"; //local
$mongoUri = getenv("MONGO_DB_URI"); //hébergement sur MongoDB Atlas

if (!$mongoUri) {
    die("Erreur : la variable n'est pas définie !");
}

try {
    $mongoClient = new MongoDB\Driver\Manager($mongoUri);
    echo "connexion reussie à atlas";
} catch (Exception $e) {
    die("Erreur de connexion : " . $e->getMessage());

}

$database = "restaurantDB";
$collection = "menu";
?>