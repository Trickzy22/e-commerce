<?php
const DB_HOST = 'localhost';
const DB_NAME = 'tp_ecommerce';
const DB_USER = 'root';
const DB_PASS = '';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function getPDO() {
    static $pdo = null;
    if ($pdo === null) {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    return $pdo;
}

function isLoggedIn() {
    return isset($_SESSION['user']);
}

function redirect($page) {
    header('Location: index.php?page=' . $page);
    exit;
}