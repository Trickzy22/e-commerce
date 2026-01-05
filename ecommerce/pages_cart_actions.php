<?php
require_once 'config.php';
require_once 'models.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = $_GET['page'];

if ($action == 'add_to_cart') {
    $id = $_POST['product_id'];
    $qty = $_POST['quantity'];
    
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = $_SESSION['cart'][$id] + $qty;
    } else {
        $_SESSION['cart'][$id] = $qty;
    }
}

if ($action == 'remove_from_cart') {
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
}

if ($action == 'clear_cart') {
    $_SESSION['cart'] = [];
}

header('Location: index.php?page=cart');
exit;