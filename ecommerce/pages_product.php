<?php
require_once 'models.php';

$id = $_GET['id'];
$product = getProductById($id);
$pageTitle = "Produit";
$viewPath = 'views/product.php';

require 'layout.php';