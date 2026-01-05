<?php
require_once 'config.php';

function getAllProducts() {
    $pdo = getPDO();
    $sql = "SELECT * FROM products";
    $req = $pdo->query($sql);
    return $req->fetchAll();
}

function getProductById($id) {
    $pdo = getPDO();
    $sql = "SELECT * FROM products WHERE id = ?";
    $req = $pdo->prepare($sql);
    $req->execute([$id]);
    return $req->fetch();
}

function getUserByEmail($email) {
    $pdo = getPDO();
    $sql = "SELECT * FROM users WHERE email = ?";
    $req = $pdo->prepare($sql);
    $req->execute([$email]);
    return $req->fetch();
}

function createUser($name, $email, $password) {
    $pdo = getPDO();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password_hash, created_at) VALUES (?, ?, ?, NOW())";
    $req = $pdo->prepare($sql);
    return $req->execute([$name, $email, $hash]);
}

function createOrder($userId, $panier) {
    $pdo = getPDO();
    $total = 0;
    
    foreach ($panier as $id => $quantite) {
        $produit = getProductById($id);
        $total = $total + ($produit['price'] * $quantite);
    }

    $sql = "INSERT INTO orders (user_id, total_amount, created_at) VALUES (?, ?, NOW())";
    $req = $pdo->prepare($sql);
    $req->execute([$userId, $total]);
    
    $orderId = $pdo->lastInsertId();

    foreach ($panier as $id => $quantite) {
        $produit = getProductById($id);
        $sqlItem = "INSERT INTO order_items (order_id, product_id, quantity, unit_price) VALUES (?, ?, ?, ?)";
        $reqItem = $pdo->prepare($sqlItem);
        $reqItem->execute([$orderId, $id, $quantite, $produit['price']]);
    }

    return $orderId;
}

function getOrdersByUser($userId) {
    $pdo = getPDO();
    $sql = "SELECT * FROM orders WHERE user_id = ?";
    $req = $pdo->prepare($sql);
    $req->execute([$userId]);
    return $req->fetchAll();
}

function getOrderItems($orderId) {
    $pdo = getPDO();
    $sql = "SELECT * FROM order_items WHERE order_id = ?";
    $req = $pdo->prepare($sql);
    $req->execute([$orderId]);
    return $req->fetchAll();
}