<?php

// les modèles de site appélés
require_once "../../models/posts/topicsModel.php";
require_once '../../models/users/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();

// établissement des variables pour accéder aux données des modèles 
$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();




$title = 'inbox'; // le titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/pages/inbox.php';
require_once '../../views/parts/footer.php';