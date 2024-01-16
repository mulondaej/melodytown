<?php
/**
 *vérifier que l'utilisateur est connecté.
 */
require_once '../../models/usersModel.php';

session_start();

if(empty($_SESSION['user'])){
    header('Location: /connexion');
    exit;
}



require_once '../../views/parts/header.php';
$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();

var_dump($userAccount);
var_dump('----');
var_dump($user);
require_once '../../views/users/account.php';
require_once '../../views/parts/footer.php';