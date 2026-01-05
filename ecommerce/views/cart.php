<h1>Mon Panier</h1>

<?php if (empty($panierDetails)): ?>
    <div style="text-align: center; padding: 40px;">
        <p>Votre panier est vide.</p>
        <a href="index.php" class="btn">Voir les produits</a>
    </div>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($panierDetails as $item): ?>
                <tr>
                    <td>
                        <img src="backend/image/<?php echo basename($item['produit']['image_url']); ?>" 
                             alt="<?php echo $item['produit']['name']; ?>">
                    </td>
                    <td><strong><?php echo $item['produit']['name']; ?></strong></td>
                    <td><?php echo $item['produit']['price']; ?> €</td>
                    <td><?php echo $item['qty']; ?></td>
                    <td><strong><?php echo $item['produit']['price'] * $item['qty']; ?> €</strong></td>
                    <td>
                        <a href="index.php?page=remove_from_cart&id=<?php echo $item['produit']['id']; ?>" 
                           class="btn btn-danger btn-small">Retirer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="cart-summary">
        <h3>Total à payer : <?php echo $total; ?> €</h3>
        <div class="cart-actions">
            <a href="index.php?page=clear_cart" class="btn btn-secondary">Vider le panier</a>
            
            <?php if (isset($_SESSION['user'])): ?>
                <a href="index.php?page=checkout" class="btn">Passer la commande</a>
            <?php else: ?>
                <a href="index.php?page=login" class="btn">Se connecter pour commander</a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>