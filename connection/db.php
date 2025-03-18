<?php
$mongoUri = "mongodb+srv://JessV:ProjetsStudi2025@restaurant-menu.mongodb.net/restaurantDB?retryWrites=true&w=majority";
$mongoClient = new MongoDB\Driver\Manager($mongoUri);
$database = "restaurantDB";
$collection = "menu";
?>