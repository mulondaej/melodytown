<?php

// les models de site et les utils
require_once "../../models/usersModel.php";
require_once "../../models/messagesModel.php";
require_once "../../models/textbackModel.php";
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

$messaging = new Messages();

$textback = new textback();

// si la requete est de type POST (envoi du formulaire), on l'execute
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['messageUser'])) {

    $errors = [];

    // Validate Receiver ID
    if (!empty($_POST['receiver_id'])) {
        $receiver_id = clean($_POST['receiver_id']); // Sanitize input
        $messaging->receiver_id = $receiver_id;

        if ($user->checkIfExistsByUsername($receiver_id)) { // Pass receiver_id
            $messaging->receiver_id = $receiver_id;
        } else {
            $errors['receiver_id'] = 'Recommencez svp'; // User not found
        }
    } else {
        $errors['receiver_id'] = 'Choisissez un utilisateur svp'; // Receiver required
    }

    if (!empty($_POST['title'])) {
        if (preg_match($regex['title'], $_POST['title'])) {
            $messaging->title = clean($_POST['title']);
        } else {
            $errors['title'] = TOPICS_TITLE_ERROR;
        }
    } else {
        $errors['title'] = "Le titre ne peut pas être vide.";
    }

    // Validate Message Content
    if (!empty($_POST['message'])) {
        if (isset($regex['message']) && is_string($regex['message']) && preg_match($regex['message'], $_POST['message'])) {
            $errors['message'] = TOPICS_message_ERROR;
        } else {
            $messaging->message = trim($_POST['message']); // Valid message
        }
    } else {
        $errors['message'] = "Le contenu ne peut pas être vide."; // Message required
    }

    // If no errors, proceed with sending
    if (empty($errors)) {
        if (isset($_SESSION['user']['id'])) {
            $messaging->sender_id = $_SESSION['user']['id']; // Assign sender ID

            if ($messaging->create()) { // Create message
                $success = TOPICS_SUCCESS;
                header("Location: /messages");
                exit();
            } else {
                $errors['add'] = TOPICS_ERROR; // Database insert error
            }
        } else {
            $errors['auth'] = "Utilisateur non authentifié."; // Session issue
        }
    }
}


if (isset($_SESSION['user']['id'])) {
    $user_id = $_SESSION['user']['id'];
    $latesttexts = $messaging->getMessages($user_id);
} else {
    echo "User not logged in.";
}

// texts
$messagingsList = $messaging->getList();
// $latesttexts = $messaging->getMessages($user_id);
$messagingCount = count($messagingsList);

// reply
$messagingReplyList = $textback->getList();
$latestReply = $textback->getReply();
$textbackCount = count($messagingReplyList);

$totalCount = $textbackCount + $messagingCount;



$title = 'Messages';// Titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/pages/messages.php';
require_once '../../views/parts/footer.php';
?>
 

<script src="assets/js/modals.js"></script>
<script src="../../assets/js/topic.js"></script>