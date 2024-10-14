<?php

// les models de site et les utils
require_once "../../models/usersModel.php";
require_once "../../models/inboxModel.php";
require_once "../../models/chatReplyModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();

$user = new Users;
$usersList = $user->getList();

if (!empty($_SESSION['user'])) {
    $user->fetchUserData($_SESSION['user']['id']);
    $userAccount = $user->getById();
}

if(empty($_SESSION['user'])) {
    header('Location: /accueil');
    exit();
}

// établissement des variables pour accéder aux données des modèles 

$chat = new Chats;

$replyback = new replyback();

// si la requete est de type POST (envoi du formulaire), on l'execute
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['threadPost'])) {

    $errors = [];

    if (!empty($_POST['username'])) {
        if (preg_match($regex['name'], $_POST['username'])) {
            $user->setUsername(clean($_POST['username']));
            if ($user->checkIfExistsByUsername() == 1) {
                $chat->username = $_POST['username'];
                $errors['username'] = 'recommencez svp';
            }
        } else {
            $errors['username'] = 'invalid';
        }
    } else {
        $errors['username'] = 'choisissez un utilisateur svp';
    }

    if (!empty($_POST['title'])) {
        if (preg_match($regex['title'], $_POST['title'])) {
            $chat->title = clean($_POST['title']);
        } else {
            $errors['title'] = TOPICS_TITLE_ERROR;
        }
    } else {
        $errors['title'] = "Le titre ne peut pas être vide.";
    }

    if (!empty($_POST['content'])) {
        if (!preg_match($regex['content'], $_POST['content'])) {
            $chat->content = trim($_POST['content']);
        } else {
            $errors['content'] = TOPICS_CONTENT_ERROR;
        }
    } else {
        $errors['content'] = "Le contenu ne peut pas être vide.";
    }

    if (empty($errors)) {
        $chat->id_users = $_SESSION['user']['id'];
        if ($chat->create()) {
            $success = TOPICS_SUCCESS;
            header("Location: /inbox");
            exit();
        } else {
            $errors['add'] = TOPICS_ERROR;
        }
    }
}


// chat
$chatsList = $chat->getList();
$latestChat = $chat->getChat();
$chatCount = count($chatsList);

// reply
$chatReplyList = $replyback->getList();
$latestReply = $replyback->getReply();
$replybackCount = count($chatReplyList);

$totalCount = $replybackCount + $chatCount;



$title = 'Inbox';// Titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/pages/inbox.php';
require_once '../../views/parts/footer.php';
?>
 

<script src="assets/js/modals.js"></script>
<script src="../../assets/js/topic.js"></script>