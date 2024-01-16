<<<<<<< HEAD
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

$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();


require_once '../../views/parts/header.php';
require_once '../../views/pages/profile.php';
require_once '../../views/parts/footer.php';
=======
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

$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();


require_once '../../views/parts/header.php';
require_once '../../views/pages/profile.php';
require_once '../../views/parts/footer.php';
>>>>>>> 19db88153d4fb2b0737212ded8e024505fda031c
?>