<a href="index.php" class="btn btn-secondary" style="margin-bottom: 20px;">← Retour</a>

<div class="product-detail">
    <div>
        <img src="backend/image/<?php echo basename($product['image_url']); ?>" alt="<?php echo $product['name']; ?>">
    </div>
    
    <div class="product-info">
        <h2><?php echo $product['name']; ?></h2>
        <div class="price"><?php echo $product['price']; ?> €</div>
        
        <p><?php echo $product['description']; ?></p>
        
        <form method="POST" action="index.php?page=add_to_cart" style="margin-top: 30px;">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            
            <div class="form-group">
                <label for="quantity">Quantité :</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1">
            </div>
            
            <button type="submit" class="btn">Ajouter au panier</button>
        </form>
    </div>
</div>