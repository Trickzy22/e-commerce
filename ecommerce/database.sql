-- Script SQL pour le TP e-commerce PHP
-- À exécuter dans MySQL (par exemple via phpMyAdmin)

CREATE DATABASE IF NOT EXISTS tp_ecommerce
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE tp_ecommerce;

-- Table des utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL
);

-- Table des catégories
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Table des produits
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image_url VARCHAR(255) NULL,
    category_id INT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

-- Table des commandes
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    created_at DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table des lignes de commande
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    unit_price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE RESTRICT
);

-- Quelques catégories exemple
INSERT INTO categories (name) VALUES
('Informatique'),
('Maison'),
('Sport');

-- Quelques produits exemple
INSERT INTO products (name, description, price, image_url, category_id) VALUES
('Ordinateur portable', 'PC portable 15 pouces pour la bureautique.', 599.99, 'https://via.placeholder.com/300x200?text=PC+portable', 1),
('Souris sans fil', 'Souris confortable pour le quotidien.', 19.90, 'https://via.placeholder.com/300x200?text=Souris', 1),
('Lampe de bureau', 'Lampe LED réglable pour votre bureau.', 29.90, 'https://via.placeholder.com/300x200?text=Lampe', 2),
('Ballon de football', 'Ballon taille 5 pour le loisir.', 24.50, 'https://via.placeholder.com/300x200?text=Ballon', 3);

-- Utilisateur de test (mot de passe : test123)
INSERT INTO users (name, email, password_hash, created_at) VALUES
('Utilisateur Test', 'test@example.com', '$2y$10$B1a8gXvX3e6e5ZtBtAOvEuhqX.MKJ6fPG.vZlVwPuk.OQW7ciG.gC', NOW());


