<?php
require_once 'models.php';

$panierDetails = [];
$total = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $qty) {
        $produit = getProductById($id);
        $prixLigne = $produit['price'] * $qty;
        $total = $total + $prixLigne;
        
        $panierDetails[] = [
            'produit' => $produit, 
            'qty' => $qty
        ];
    }
}

$viewPath = 'views/cart.php';
require 'layout.php';