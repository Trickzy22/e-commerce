<?php
require_once 'config.php';

$page = 'home';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if ($page == 'home') {
    require 'pages_home.php';
} elseif ($page == 'product') {
    require 'pages_product.php';
} elseif ($page == 'cart') {
    require 'pages_cart.php';
} elseif ($page == 'add_to_cart') {
    require 'pages_cart_actions.php';
} elseif ($page == 'remove_from_cart') {
    require 'pages_cart_actions.php';
} elseif ($page == 'clear_cart') {
    require 'pages_cart_actions.php';
} elseif ($page == 'login') {
    require 'pages_auth.php';
} elseif ($page == 'register') {
    require 'pages_auth.php';
} elseif ($page == 'logout') {
    require 'pages_auth.php';
} elseif ($page == 'login_submit') {
    require 'pages_auth.php';
} elseif ($page == 'register_submit') {
    require 'pages_auth.php';
} elseif ($page == 'checkout') {
    require 'pages_checkout.php';
} elseif ($page == 'checkout_submit') {
    require 'pages_checkout.php';
} elseif ($page == 'orders') {
    require 'pages_orders.php';
} else {
    echo "Erreur 404 : Page introuvable";
}