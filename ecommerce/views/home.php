<h1 style="text-align: center; margin-bottom: 30px;">Nos produits</h1>

<div class="products-grid">
    <?php foreach ($products as $produit): ?>
        <div class="product-card">
            <a href="index.php?page=product&id=<?php echo $produit['id']; ?>">
                <img src="backend/image/<?php echo basename($produit['image_url']); ?>" 
                     alt="<?php echo $produit['name']; ?>">
            </a>
            
            <div class="product-card-content">
                <h3><?php echo $produit['name']; ?></h3>
                <p><?php echo substr($produit['description'], 0, 50); ?>...</p>
                <div class="price"><?php echo $produit['price']; ?> €</div>
                <a href="index.php?page=product&id=<?php echo $produit['id']; ?>" class="btn">Voir le produit</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>