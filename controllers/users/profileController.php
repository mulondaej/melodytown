<?php

// les modèles de site appélés
require_once "../../models/statusModel.php";
require_once "../../models/commentsModel.php";
require_once "../../models/topicsRepliesModel.php";
require_once "../../models/topicsModel.php";
require_once "../../models/usersModel.php";
require_once "../../models/messagesModel.php";
require_once "../../models/likesModel.php";
require_once "../../models/messageNotifModel.php";
require_once "../../models/statusNotifModel.php";
// require_once "../../models/repliesNotifModel.php";
require_once "../../models/topicNotifModel.php";
require_once "../../models/textbackModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';
require_once 'sendMail.php';



session_start(); // démarrage de la session

if (empty($_SESSION['user'])) { // si l'utilisateur n'est pas en ligne
    header('Location: /connexion'); // le rediriger vers la page d'accueil
    exit;
}

// établissement des variables pour accéder aux données des modèles 
$user = new Users;
if (!empty($_SESSION['user'])) {
    $user->fetchUserData($_SESSION['user']['id']);
    $userAccount = $user->getById();
}

$status = new Status;

$status->id_users = $_SESSION['user']['id'];

$sendMail = new sendMail;

$messaging = new Messages();
$messagingsList = $messaging->getList();

// Fetch notifications
$notification = new messageNotif();

$errors = [];


// si la requête est une méthode POST et le POST variable est déclenché, on traite les données du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addStatus'])) {

    if (!empty($_POST['content'])) { // si le message n'est pas vide
        if (!preg_match($regex['content'], $_POST['content'])) {  // si le message n'est pas conforme à la regex
            $status->content = trim($_POST['content']); // on récupère le message en le trimmant
        } else {
            $errors['content'] = STATUS_ERROR; // sinon, afficher le message d'erreur
        }
    } else {
        $errors['content'] = STATUS_ERROR; // sinon, afficher le message d'erreur
    }

    // si les erreurs sont vides, les status seront ajoutés dans la BDD
    if (empty($errors)) {
        $status->id_users = $_SESSION['user']['id'];
        if ($status->create()) {
            $success = STATUS_SUCCESS;
        } else {
            $errors['add'] = STATUS_ERROR;
        }
    } else {
        $errors['add'] = STATUS_ERROR;
    }
}

//suppression des status
if (isset($_POST['deleteStatus'])) { // si est déclenché le POST variable deleteStatus
    $status->id = $_POST['idStatusDelete'];
    if ($status->delete()) { // si la suppression de l'utilisateur réussie, on redirige vers la page de profil
        header('Location: /profil');
        exit;
    }
}


// les mis à jour et la suppression des status et des commentaires sont gérées ici.
if (isset($_POST['updateStatus'])) { // si est déclenché le POST variable updateStatus
    if (!empty($_POST['statusUpdate'])) { // si le status n'est pas vide
        if (!preg_match($regex['content'], $_POST['statusUpdate'])) {
            $status->content = clean($_POST['statusUpdate']); // on récupère le message en le nettoyant
        } else {
            $errors['content'] = STATUS_UPDATE_ERROR_INVALID; // sinon, afficher le message d'erreur
        }

        // si les erreurs sont vides, les status seront mis à jour dans la BDD
        if (empty($errors)) {
            $status->id_users = $_SESSION['user']['id'];
            $status->id = $_POST['statusid'];
            if ($status->update()) {
                $success = STATUS_UPDATE_SUCCESS;
            } else {
                $errors['update'] = STATUS_UPDATE_ERROR;
            }
        }
    }
}

$comments = new Comments;

$comments->id_users = (int) $_SESSION['user']['id'];


// même logique pour creer les commentaires que pour les status
if (isset($_POST['addComment'])) {
    if (!empty($_POST['commenting'])) {
        if (!preg_match($regex['comment'], $_POST['commenting'])) {
            $comments->content = $_POST['commenting'];

            $comments->id_status = $_POST['statusid'];
        } else {
            $errors['comment'] = STATUS_COMMENTS_ERROR;
        }
    } else {
        $errors['comment'] = STATUS_COMMENTS_ERROR_EXISTS;
    }

    if (empty($errors)) {
        if ($comments->create()) {
            $success = STATUS_COMMENTS_SUCCESS;
        } else {
            $errors['add'] = STATUS_COMMENTS_ERROR;
        }
    }
}

// même logique pour les mis à jour des commentaires que pour les status
if (isset($_POST['updateComments'])) {
    if (!empty($_POST['commentUpdate'])) {
        if (!preg_match($regex['reponse'], $_POST['commentUpdate'])) {
            $comments->content = htmlspecialchars($_POST['commentUpdate']);
        } else {
            $errors['reponse'] = STATUS_COMMENTS_UPDATE_ERROR_INVALID;
        }

        if (empty($errors)) {
            $comments->id_users = $_SESSION['user']['id'];
            $comments->id = $_POST['commentsid'];
            if ($comments->update()) {
                $comments->content = $_POST['commentUpdate'];
                $success = STATUS_COMMENTS_UPDATE_SUCCESS;
            } else {
                $errors['update'] = STATUS_COMMENTS_ERROR;
            }
        }
    }
}

//suppresion de commentaires
if (isset($_POST['deleteComment'])) {
    if (isset($_POST['idCommentsDelete'])) {
        $comments->id = $_POST['commentsid'];
        if ($comments->delete()) {
            header('Location: /profil');
            exit;
        }
    }
}

if (isset($_POST['updateAvatar'])) {
    // Check if the avatar file is not empty
    if (!empty($_FILES['avatar'])) {

        // Call the checkImage function to validate the uploaded avatar
        $imageMessage = checkImage($_FILES['avatar']);

        // If there's an error message returned from checkImage function, assign it to $errors['avatar']
        if ($imageMessage != '') {
            $errors['avatar'] = $imageMessage;
        } else {
            // If the uploaded avatar is valid, proceed with further processing
            $user->fetchUserData($_SESSION['user']['id']);
            $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $user->setAvatar(uniqid() . '.' . $extension);

            // Destination directory for avatar upload
            $upload_dir = '../../assets/IMG/users/';

            // Check if avatar file already exists
            while (file_exists($upload_dir . $user->getAvatar())) {
                $user->setAvatar(uniqid() . '.' . $extension);
            }

            // Move uploaded file to the destination directory
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $upload_dir . $user->getAvatar())) {
                // Update user's avatar in the database
                if ($user->updateAvatar()) {
                    $success = 'la photo profile vient d/être mis à jour avec succès';
                } else {
                    // If database update fails, remove uploaded avatar
                    unlink($upload_dir . $user->getAvatar());
                    $errors['add'] = 'Réessayez encore car il y\eut une erreur';
                }
            } else {
                $errors['add'] = 'Une erreur est survenue';
            }
        }
    }
}

if (isset($_POST['updateCoverPicture'])) {
    // Check if the avatar file is not empty
    if (!empty($_FILES['image'])) {
        // Call the checkImage function to validate the uploaded avatar
        $imageMessage = checkImage($_FILES['image']);

        // If there's an error message returned from checkImage function, assign it to $errors['avatar']
        if ($imageMessage != '') {
            $errors['image'] = $imageMessage;
        } else {
            // If the uploaded avatar is valid, proceed with further processing
            $user->fetchUserData($_SESSION['user']['id']);
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $user->setCoverpicture(uniqid() . '.' . $extension);

            // Destination directory for avatar upload
            $upload_dir = '../../assets/IMG/users/';

            // Check if avatar file already exists
            while (file_exists($upload_dir . $user->getCoverPicture())) {
                $user->setCoverpicture(uniqid() . '.' . $extension);
            }

            // Move uploaded file to the destination directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $user->getCoverPicture())) {
                // Update user's avatar in the database
                if ($user->updateCoverPicture()) {
                    $success = 'la banière d/être mis à jour avec succès';
                } else {
                    // If database update fails, remove uploaded avatar
                    unlink($upload_dir . $user->getCoverPicture());
                    $errors['add'] = 'Réessayez encore car il y\eut une erreur';
                }
            } else {
                $errors['add'] = 'Une erreur est survenue';
            }
        }
    }
}

//verification de email
if (isset($_POST['updateVerified'])) {
    if (!empty($_POST['verified'])) {
        if ($user->setVerified(true) === 0) {
            $user->setVerified($_POST['verified']);
        } else {
            $errors['verified'] = 'Il eut une erreur';
        }
    }

    if (empty($errors)) {
        if ($user->emailVerified()) {
            $sendMail->confirmedEmail($user->getEmail(), $user->getUsername());

            header('Location: /accueil');
        } else {
            $errors['update'] = "réesayez à nouveau";
        }
    }
}


// Suppression de l'utilisateur
if (isset($_POST['deleteAccount'])) {
    if ($user->delete()) {
        unset($_SESSION);
        session_destroy();
        header('Location: /accueil');
        exit;
    }
}


// établissement des variables pour accéder aux données des modèles 
//topics
$topic = new Topics;
$topic->id_users = $_SESSION['user']['id'];
$userTopics = $topic->getUserTopics();
$userTotalTopics = count($userTopics);

if (count($userTopics) > 0) {
    $latestPost = $userTopics[0];
}

//replies
$replies = new Replies;
$replies->id_users = $_SESSION['user']['id'];

foreach ($userTopics as $key => $post) {
    $replies->id_topics = $post['id'];
    $userTopics[$key]['content'] = $replies->getRepliesByTopics();
}

$userReply = $replies->getUserReply();

if ($userReply != false) {
    $latestReply = $replies->getReply();
    $userTotalAnswer = count($userReply);

    if (count($userReply) > 0) {
        $latestReply = $userReply;
    }
}

//status
$userStatus = $status->getListByIdUsers();
$userTotalStatus = count($userStatus);

if (count($userStatus) > 0) {
    $latestStatus = $userStatus[0];
}


//comments
$comments->id_users = $_SESSION['user']['id'];
$userComments = $comments->getListByIdUsers();
$latestComment = $comments->getComment();

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


$title = 'Profile'; // titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/users/profile.php';
require_once '../../views/parts/footer.php';
?>

<script src="assets/js/comments.js"></script>
<script src="assets/js/profile.js"></script>
<script src="assets/js/media.js"></script>
<script src="assets/js/avyCover.js"></script>