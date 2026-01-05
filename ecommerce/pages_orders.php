<?php
require_once 'models.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php?page=login');
    exit;
}

$userId = $_SESSION['user']['id'];
$orders = getOrdersByUser($userId);

$viewPath = 'views/orders.php';
require 'layout.php';