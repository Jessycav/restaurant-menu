<?php
$mongoUri = "mongodb://127.0.0.1:27017"; //local
//$mongoUri = getenv("MONGO_DB_URI"); //hébergement sur MongoDB Atlas
$mongoClient = new MongoDB\Driver\Manager($mongoUri);
$database = "restaurantDB";
$collection = "menu";
?>