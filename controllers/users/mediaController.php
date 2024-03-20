
<?php 

require_once "../../models/topicsModel.php";
require_once '../../models/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start(); // démarrage de la session

if (empty($_SESSION['user'])) { // si l'utilisateur n'est pas en ligne
    header('Location: /connexion'); // le rediriger vers la page d'accueil
    exit;
} 

$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();

if (!empty($_FILES['image'])) {
    $imageMessage = checkImage($_FILES['image']);

    if ($imageMessage != '') {
        $errors['image'] = $imageMessage;
    } else {
        $userAccount->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        while(file_exists('../../assets/img/' . $userAccount->image)) {
            $userAccount->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        }
    }
}

$title = 'Media';

require_once '../../views/parts/header.php';
require_once '../../views/pages/media.php';
require_once '../../views/parts/footer.php';
?>

<script src="assets/js/media.js"></script>