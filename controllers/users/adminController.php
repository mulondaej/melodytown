
<?php
require_once '../../models/users/adminModel.php';
require_once '../../models/users/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();
if(empty($_SESSION['user']) && $_SESSION['user']['role'] = 258){
    header('Location: /accueil');
    exit;
}
/**
 * Ici je contrôle que l'utilisateur a le bon rôle pour accéder à la page car seul les administrateurs peuvent y accéder.
 * J'utilise la variable $_SESSION['user']['role'] qui a été créée lors de la connexion (voir loginController.php).
 * S'il n'a pas accès à cette page, je renvoie l'utilisateur vers sa page de profil.
 */
 
 $title = 'Admin';

require_once '../../views/parts/header.php';
require_once '../../views/users/admin.php';
require_once '../../views/parts/footer.php';



