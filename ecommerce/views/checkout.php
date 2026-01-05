<h1>Validation de la commande</h1>

<p>Vous êtes sur le point de valider votre commande.</p>

<div class="cart-summary" style="text-align: left;">
    <p>Nombre d'articles : <?php echo array_sum($_SESSION['cart']); ?></p>
    <br>
    
    <form method="post" action="index.php?page=checkout_submit">
        <button type="submit" class="btn">Confirmer et payer</button>
        <a href="index.php?page=cart" class="btn btn-secondary">Retour au panier</a>
    </form>
</div>