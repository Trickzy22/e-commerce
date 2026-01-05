<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma Boutique</title>
    <style>
        body { font-family: sans-serif; margin: 0; background: #f5f5f5; }
        header { background: #2c3e50; color: white; padding: 15px 20px; }
        header a { color: white; margin-right: 20px; text-decoration: none; }
        header a:hover { text-decoration: underline; }
        .container { max-width: 1000px; margin: 30px auto; background: white; padding: 20px; border-radius: 5px; }
        .flash { padding: 10px; margin-bottom: 15px; border-radius: 5px; }
        .flash-success { background: #d4edda; color: #155724; }
        .flash-error { background: #f8d7da; color: #721c24; }
        .products-grid { display: flex; flex-wrap: wrap; gap: 20px; }
        .product-card { border: 1px solid #ddd; width: 30%; padding: 10px; background: white; }
        .product-card img { width: 100%; height: 150px; object-fit: cover; }
        .btn { background: #3498db; color: white; padding: 10px; text-decoration: none; border-radius: 5px; display: inline-block; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
    </style>
</head>
<body>

<header>
    <strong style="font-size:20px; margin-right:20px;">Ma Boutique</strong>
    <a href="index.php">Accueil</a>
    
    <?php 
    $nbArticles = 0;
    if(isset($_SESSION['cart'])) {
        $nbArticles = array_sum($_SESSION['cart']);
    }
    ?>
    <a href="index.php?page=cart">Panier (<?php echo $nbArticles; ?>)</a>
    
    <?php if (isset($_SESSION['user'])): ?>
        <a href="index.php?page=orders">Mes commandes</a>
        <span>Bonjour <?php echo $_SESSION['user']['name']; ?></span>
        <a href="index.php?page=logout">Déconnexion</a>
    <?php else: ?>
        <a href="index.php?page=login">Connexion</a>
        <a href="index.php?page=register">Inscription</a>
    <?php endif; ?>
</header>

<div class="container">
    <?php if (isset($_SESSION['flash'])): ?>
        <?php foreach ($_SESSION['flash'] as $type => $message): ?>
            <div class="flash flash-<?php echo $type; ?>">
                <?php echo $message; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <?php 
    if (isset($viewPath)) { 
        require $viewPath; 
    } 
    ?>
</div>

</body>
</html>