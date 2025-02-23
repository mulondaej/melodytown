<?php

// les models de site et les utils
require_once '../../models/usersModel.php' ;
require_once '../../models/likesModel.php' ;
require_once "../../models/inboxModel.php";
require_once "../../models/messagesModel.php";
require_once "../../models/textbackModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start(); // démarrage de la session

$user = new Users;

if(!empty($_SESSION['user'])) {
$user->fetchUserData($_SESSION['user']['id']);
$userAccount = $user->getById();
}

$messaging = new Messages();

$messaging->id = (int) $_GET['id'];

if ($messaging->checkIfExistsById() == 0) { // si le chat n'existe pas, on redirige vers la boite de messagerie
    header('Location: /inbox');
    exit;
}

$textback = new textback();

$textback->id_texts = (int) $_GET['id']; // on récupère l'id du chat

$textback->id_users = (int) $_GET['id']; // on récupère l'id de l'utilisateur qui a posté ce reponse



// si la requete est de type POST (envoi du formulaire), on l'traite
if (isset($_POST['reply'])) {
    if (!empty($_POST['replyTextBar'])) { // si le contenu n'est pas vide
        if (!preg_match($regex['reponse'], $_POST['replyTextBar'])) {
            $textback->content = htmlspecialchars($_POST['replyTextBar']); // si le contenu est valide, on l'ajoute le reply
        } else {
            $errors['content'] = TOPICS_REPLIES_ERROR; // sinon, afficher le message d'erreur 
        }
    } else {
        $errors['content'] = TOPICS_REPLIES_ERROR; // sinon, afficher le message d'erreur 
    }

    $textback->id_texts = $messaging->id;  // id-chats des $textback sera pareil que l'id du $messaging
    $textback->id_users = $_SESSION['user']['id']; // id-users des $textback sera pareil que l'id de l'utilisateur connecté

    // si les erreurs sont vides, alors on ajoute les réponses($textback)
    if (empty($errors)) {
        if ($textback->create()) {
            $success = TOPICS_REPLIES_SUCCESS;
        } else {
            $errors['add'] = TOPICS_REPLIES_ERROR;
        }
    }
}


// Même logique pour la suppression des chats mais avec precision de l'id 
if (isset($_POST['deleteReply'])) {
    $textback->id = $_POST['idDelete']; // id du reply à supprimer
    if ($textback->delete()) {
        header('Location: /message-' . $messaging->id);
        exit;
    }
}


// si l'envoi de $_POST variable existe, alors mets les contenus du reponse à jour
if (isset($_POST['updateReply'])) {
    if (!empty($_POST['repliesUpdate'])) { // Même logique que pour la case de titre mais pour les réponses ou commentaires
        if (!preg_match($regex['reponse'], $_POST['repliesUpdate'])) { // si le contenu est valide, on l'ajoute le reply
            $textback->content = clean($_POST['repliesUpdate']);
            if ($textback->checkIfExistsByContent() == 1) { // si le contenu existe déjà, le message d'erreur s'affichera
                $errors['reponse'] = TOPIC_REPLIES_UPDATE_ERROR;
            }
        } else {
            $errors['reponse'] = TOPICS_REPLIES_ERROR;
        }
    } else {
        $errors['reponse'] = TOPIC_REPLIES_UPDATE_ERROR;
    }
    // si les erreurs sont vides, alors mets le contenu du réponse à jour
    if (empty($errors)) {
        $textback->id_users = $_SESSION['user']['id'];
        $textback->id = $_POST['repliesid'];
        if ($textback->update()) {
            $textback->content = $_POST['repliesUpdate'];
            $success = TOPIC_REPLIES_UPDATE_SUCCESS;
        } else {
            $errors['update'] = TOPIC_REPLIES_UPDATE_ERROR;
        }
    }
}

// update content seulement
if (isset($_POST['updateContent'])) { // Même logique que pour l'update de textback mais pour le contenu du chat
    if (!empty($_POST['contentUpdate'])) {
        if (!preg_match($regex['content'], $_POST['contentUpdate'])) {
            $messaging->content = clean($_POST['contentUpdate']);
            if ($messaging->checkIfExistsByContent() == 1) {
                $errors['content'] = TOPIC_CONTENT_UPDATE_ERROR;
            }
        } else {
            $errors['content'] = TOPICS_CONTENT_ERROR;
        }
    } else {
        $errors['content'] = TOPIC_CONTENT_UPDATE_ERROR_INVALID;
    }
    if (empty($errors)) { // si les erreurs sont vides, alors mets le contenu du chat à jour dans la BDD
        $messaging->id_users = $_SESSION['user']['id'];
        if ($messaging->updateContent()) {
            $messaging->content;
            $success = TOPIC_CONTENT_UPDATE_SUCCESS;
        } else {
            $errors['update'] = TOPIC_CONTENT_UPDATE_ERROR;
        }
    }
}

// si l'envoi de delete est déclenche, le chat sera supprimé
if (isset($_POST['deleteChat'])) {
    if ($messaging->delete()) {
        (header('Location: /inbox'));
        exit;
    }
}


$messagingsDetails = $messaging->getById(); // on récupère les détails du chat

// if (isset($_SESSION['user']['id'])) {
//     $messageUser = $_SESSION['user']['id'];

//     // Fetch message details based on user ID
//     if (isset($_GET['id'])) {
//         $message_id = intval($_GET['id']); // Sanitize input
//         $messagingsDetails = $messaging->getMessageById($message_id);

//         // Ensure the message belongs to the user
//         if (!$messagingsDetails || 
//             ($messagingsDetails->sender_id != $messageUser && $messagingsDetails->receiver_id != $messageUser)) {
//             $messagingsDetails = null; // Reset if user is not sender or receiver
//         }
//     }
// }

$textbackList = $textback->getRepliesByChats();
$countReply = count($textbackList);

// if ($textbackList !== false) {
//     if ($countReply > 0) {
//         $getReply = $textback->getRepliesByTopics();
//     }
// }

$title = $messagingsDetails->title; // Titre de la page sera le nom du chat


//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/pages/textback.php';
require_once '../../views/parts/footer.php';
?>

<script src="assets/js/topic.js"></script>
<script src="assets/js/modals.js"></script>
<script src="assets/js/replies.js"></script>