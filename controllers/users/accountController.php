<?php
/**
 *vérifier que l'utilisateur est connecté.
 */
require_once '../../models/users/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();

if(empty($_SESSION['user'])){
    header('Location: /connexion');
    exit;
}


$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();
// $userAccount->avatar;

$title = 'Account';

// var_dump($userAccount);
// var_dump('----');
// var_dump($user);

require_once '../../views/parts/header.php';
require_once '../../views/users/account.php';
require_once '../../views/parts/footer.php';