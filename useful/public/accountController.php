<?php
/**
 *
 */
require_once '../../models/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start(); // démarrage de la session

if(empty($_SESSION['user'])){ // si l'utilisateur n'est pas en ligne
    header('Location: /connexion'); // le rediriger vers la page d'accueil
    exit;
}

// établissement des variables de session pour users
$user = new Users;
$user->fetchUserData($_SESSION['user']['id']);
$userAccount = $user->getById();
// $userAccount->avatar;

$title = 'Account'; // Titre de la page


//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/users/account.php';
require_once '../../views/parts/footer.php';