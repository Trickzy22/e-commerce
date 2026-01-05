<?php
require_once 'models.php';

// On recupere l'action demandee
$action = 'login';
if (isset($_GET['page'])) {
    $action = $_GET['page'];
}

if ($action == 'login_submit') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user = getUserByEmail($email);
    
    if ($user) {
        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['user'] = $user;
            header('Location: index.php?page=home');
            exit;
        }
    }
    
    // Si on arrive la c'est que l'email ou le mot de passe est faux
    $_SESSION['flash']['error'] = "Identifiants incorrects";
    header('Location: index.php?page=login');
    exit;
}

if ($action == 'register_submit') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // VERIFICATION : On regarde si l'email est deja dans la base
    $userExiste = getUserByEmail($email);

    if ($userExiste) {
        // Si l'utilisateur existe deja, on renvoie une erreur sans planter
        $_SESSION['flash']['error'] = "Cet email est déjà utilisé par un autre compte";
        header('Location: index.php?page=register');
        exit;
    } else {
        // Si l'email est libre, on cree le compte
        createUser($name, $email, $password);
        $_SESSION['flash']['success'] = "Votre compte a bien été créé";
        header('Location: index.php?page=login');
        exit;
    }
}

if ($action == 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
}

// Affichage des vues
if ($action == 'register') {
    $viewPath = 'views/register.php';
} else {
    $viewPath = 'views/login.php';
}

require 'layout.php';