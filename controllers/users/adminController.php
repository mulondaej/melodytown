<?php
require_once '../../models/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start();
if (!empty($_SESSION['user']) && $_SESSION['user']['id_usersRoles'] === 381) {
    header('Location: /accueil'); // le rediriger vers la page d'accueil
    exit;
}

$user = new Users;
$user->fetchUserData($_SESSION['user']['id']);
$userAccount = $user->getById();

/**
 * Ici je contrôle que l'utilisateur a le bon rôle pour accéder à la page car seul les administrateurs peuvent y accéder.
 * J'utilise la variable $_SESSION['user']['role'] qui a été créée lors de la connexion (voir loginController.php).
 * S'il n'a pas accès à cette page, je renvoie l'utilisateur vers la page d'accueil.
 */

$title = 'Admin'; // Titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/users/admin.php';
require_once '../../views/parts/footer.php';



