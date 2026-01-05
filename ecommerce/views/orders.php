<h1>Mes commandes</h1>

<?php if (empty($orders)): ?>
    <p>Vous n'avez pas encore passé de commande.</p>
    <a href="index.php" class="btn">Commencer mes achats</a>
<?php else: ?>
    <?php foreach ($orders as $commande): ?>
        <div class="order-item">
            <h3>Commande n°<?php echo $commande['id']; ?></h3>
            <p>Date : <?php echo $commande['created_at']; ?></p>
            <p class="price">Montant total : <?php echo $commande['total_amount']; ?> €</p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>