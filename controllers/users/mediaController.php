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

// if (!empty($_FILES['image'])) {
//     $imageMessage = checkImage($_FILES['image']);

//     if ($imageMessage != '') {
//         $errors['image'] = $imageMessage;
//     } else {
//         $userAccount->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

//         while(file_exists('../../assets/img/topics/' . $userAccount->image)) {
//             $userAccount->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
//         }
//     }
// }

$title = 'Media'; // le titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/pages/media.php';
require_once '../../views/parts/footer.php';
?>
