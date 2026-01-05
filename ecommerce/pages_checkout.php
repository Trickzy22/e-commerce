<?php
require_once 'models.php';

if ($_GET['page'] == 'checkout_submit') {
    if (isset($_SESSION['user'])) {
        $userId = $_SESSION['user']['id'];
        $panier = $_SESSION['cart'];
        
        createOrder($userId, $panier);
        
        $_SESSION['cart'] = [];
        header('Location: index.php?page=orders');
        exit;
    }
}

$viewPath = 'views/checkout.php';
require 'layout.php';