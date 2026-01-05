<?php
require_once 'models.php';

$products = getAllProducts();
$pageTitle = "Accueil";
$viewPath = 'views/home.php';

require 'layout.php';