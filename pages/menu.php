<?php
include '../connection/db.php';


$query = new MongoDB\Driver\Query([]);
$rows = $mongoClient->executeQuery("$database.$collection", $query);
$menu = iterator_to_array($rows);

$categories = ["Entrées" => [], "Plats" => [], "Desserts" => []];

foreach ($menu as $item) {
    $categories[$item->catégorie][] = $item;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu du restaurant</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Menu du restaurant</h1>
    </header>

    <section class="menu-container">
        <?php foreach ($categories as $categorie => $items) : ?>
            <?php if (!empty($items)) : ?>
                <div class="menu-section">
                    <h2><?php echo htmlspecialchars($categorie); ?></h2>
                    <ul class="menu-list">
                        <?php foreach ($items as $item) : ?>
                            <li class="menu-item">
                                <strong><?php echo htmlspecialchars($item->nom); ?></strong>
                                <p><?php echo htmlspecialchars($item->description); ?></p>
                                <span class="price"><?php echo number_format($item->prix, 2, ',', ' '); ?> €</span>
                                <p>~</p>
                            </li>
                        <?php endforeach; ?>   
                    </ul>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>       
        
    </section>
    <nav>
        <a href="../index.php">Retour à l'accueil</a> 
    </nav>
    
</body>
</html>