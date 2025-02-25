<?php

// les models de site et les utils
require_once '../../models/usersModel.php' ;
require_once '../../models/likesModel.php' ;
require_once "../../models/messagesModel.php";
require_once "../../models/textbackModel.php";
require_once "../../models/messageNotifModel.php";
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

$notification = new messageNotif();

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
            $notif = new messageNotif();
            // $textback->id_users == $_SESSION['user']['id']
            if ($textback->id_users == $_SESSION['user']['id']) {
                $notif->id_messages = $messaging->id;
                $notif->id_users = $textback->id_users;
                $notif->message = "Nouveau reponse de " . $_SESSION['user']['username'];
                $notif->link = "/message-$messaging->id";
                $notif->is_read = 0; // Mark notification as unread
                }
            
                if ($notif->createReply()) { 
                    $success = TOPICS_SUCCESS;
                    header("Location: /messages");
                    exit();
                } else {
                    $errors['notif'] = "Erreur lors de la création de la notification.";
                }
            } else {
                $errors['message'] = "Erreur lors de l'envoi du message.";
            }
                    $success = TOPIC_CONTENT_UPDATE_SUCCESS;
                } else {
                    $errors['update'] = TOPIC_CONTENT_UPDATE_ERROR;
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



$textbackList = $textback->getRepliesByChats();
$countReply = count($textbackList);

// if ($textbackList !== false) {
//     if ($countReply > 0) {
//         $getReply = $textback->getRepliesByTopics();
//     }
// }


// notifs
$notifications = json_decode(json_encode($notification->getNotifications()), true);

// Fetch alerts safely
$userAlerts = json_decode(json_encode($notification->getListByIdUsers()), true) ?? []; // Ensure it's an array

foreach ($userAlerts as $note) {
    echo "<li class='".(isset($note['is_read']) && $note['is_read'] ? 'read' : 'unread')."'>";
    echo "<a href='{$note['link']}'>{$note['message']}</a>";
    echo "<small>{$note['created_at']}</small>";
    echo "</li>";
}

// Mark notifications as read
if (!empty($userAlerts)) {
    foreach ($notifications as $note) {
        if (isset($note['is_read']) && !$note['is_read']) {
            $notification->id = $note['id']; // Ensure id is set
            $notification->markAsRead($note['id']);
        }
    }
}

// Fetch alerts safely
$alertsList = json_decode(json_encode($notification->getList()), true) ?? [];         // Fix typo and ensure array
$latestAlert = json_decode(json_encode($notification->getUserNotifs()), true) ?? [];  // Ensure it's an array

$alertsCount = is_array($alertsList) ? count($alertsList) : 0;

if (empty($alertsList)) {
    error_log("Warning: alertsList is empty or null.");
}
if (empty($latestAlert)) {
    error_log("Warning: latestAlert is empty or null.");
}

// Process alerts safely
if (!empty($latestAlert)) {
    foreach ($latestAlert as $alert) {
        echo "New Alert: " . htmlspecialchars($alert['message']);
    }
} else {
    echo "No new alerts available.";
}


$title = $messagingsDetails->title; // Titre de la page sera le nom du chat


//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/pages/textback.php';
require_once '../../views/parts/footer.php';
?>

<script src="assets/js/topic.js"></script>
<script src="assets/js/modals.js"></script>
<script src="assets/js/replies.js"></script>