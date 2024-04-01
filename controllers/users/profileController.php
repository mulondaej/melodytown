<?php

// les modèles de site appélés
require_once "../../models/statusModel.php";
require_once "../../models/commentsModel.php";
require_once "../../models/topicsRepliesModel.php";
require_once "../../models/topicsModel.php";
require_once '../../models/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start(); // démarrage de la session

if (empty ($_SESSION['user'])) { // si l'utilisateur n'est pas en ligne
    header('Location: /connexion'); // le rediriger vers la page d'accueil
    exit;
}

// établissement des variables pour accéder aux données des modèles 
$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();

$status = new Status;

$status->id_users = $_SESSION['user']['id'];


// si la requête est une méthode POST et le POST variable est déclenché, on traite les données du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['addStatus'])) {

    if (!empty ($_POST['content'])) { // si le message n'est pas vide
        if (!preg_match($regex['content'], $_POST['content'])) {  // si le message n'est pas conforme à la regex
            $status->content = trim($_POST['content']); // on récupère le message en le trimmant
        } else {
            $errors['content'] = STATUS_ERROR; // sinon, afficher le message d'erreur
        }
    } else {
        $errors['content'] = STATUS_ERROR; // sinon, afficher le message d'erreur
    }

    // si les erreurs sont vides, les status seront ajoutés dans la BDD
    if (empty ($errors)) {
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
if (isset ($_POST['deleteStatus'])) { // si est déclenché le POST variable deleteStatus
    $status->id = $_POST['idStatusDelete'];
    if ($status->delete()) { // si la suppression de l'utilisateur réussie, on redirige vers la page de profil
        header('Location: /profil');
        exit;
    }
}


// les mis à jour et la suppression des status et des commentaires sont gérées ici.
if (isset ($_POST['updateStatus'])) { // si est déclenché le POST variable updateStatus
    if (!empty ($_POST['statusUpdate'])) { // si le status n'est pas vide
        if (!preg_match($regex['content'], $_POST['statusUpdate'])) {
            $status->content = clean($_POST['statusUpdate']); // on récupère le message en le nettoyant
        } else {
            $errors['content'] = STATUS_UPDATE_ERROR_INVALID; // sinon, afficher le message d'erreur
        }

        // si les erreurs sont vides, les status seront mis à jour dans la BDD
        if (empty ($errors)) {
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
if (isset ($_POST['addComment'])) {
    if (!empty ($_POST['commenting'])) {
        if (!preg_match($regex['comment'], $_POST['commenting'])) {
            $comments->content = $_POST['commenting'];

            $comments->id_status = $_POST['statusid'];
        } else {
            $errors['comment'] = STATUS_COMMENTS_ERROR;
        }
    } else {
        $errors['comment'] = STATUS_COMMENTS_ERROR_EXISTS;
    }

    if (empty ($errors)) {
        if ($comments->create()) {
            $success = STATUS_COMMENTS_SUCCESS;
        } else {
            $errors['add'] = STATUS_COMMENTS_ERROR;
        }
    }
}

// même logique pour les mis à jour des commentaires que pour les status
if (isset ($_POST['updateComments'])) {
    if (!empty ($_POST['commentUpdate'])) {
        if (!preg_match($regex['reponse'], $_POST['commentUpdate'])) {
            $comments->content = htmlspecialchars($_POST['commentUpdate']);
        } else {
            $errors['reponse'] = STATUS_COMMENTS_UPDATE_ERROR_INVALID;
        }

        if (empty ($errors)) {
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
if (isset ($_POST['deleteComment'])) {
    if (isset ($_POST['idCommentsDelete'])) {
        $comments->id = $_POST['commentsid'];
        if ($comments->delete()) {
            header('Location: /profil');
            exit;
        }
    }
}

// mis a jour de l'avatar
if (isset ($_POST['updateAvatar'])) {
    if (!empty ($_FILES['avatar'])) {
        $imageMessage = checkImage($_FILES['avatar']);

        if ($imageMessage != '') {
            $errors['avatar'] = $imageMessage;
        } else {
            $user->id = $_SESSION['user']['id'];
            $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $user->avatar = uniqid() . '.' . $extension;

            // Check if avatar file already exists
            $upload_dir = '../../assets/IMG/';
            while (file_exists($upload_dir . $user->avatar)) {
                $user->avatar = uniqid() . '.' . $extension;
            }

            // Move uploaded file to the destination directory
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $upload_dir . $user->avatar)) {
                // Update user's avatar in the database
                if ($user->updateAvatar()) {
                    $success = IMAGE_SUCCESS;
                } else {
                    // If database update fails, remove uploaded avatar
                    unlink($upload_dir . $user->avatar);
                    $errors['add'] = IMAGE_ERROR;
                }
            } else {
                $errors['add'] = IMAGE_ERROR;
            }
        }
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

//points 
// $points = 0;
// $pointsPerPost = $userReply;
// $pointsPerComment = $pointsPerPost / 2;
// $pointsPerReply = $pointsPerPost / 2;
// $userPoints = $pointsPerComment + $pointsPerReply + $pointsPerPost;

// Assuming $userReply, $userTopics, and $userStatus are defined elsewhere
$totalPosting = $userTotalAnswer + $userTotalTopics + $userTotalStatus;
$pointsPerPost = 10;
$userPoints = $totalPosting * $pointsPerPost * 10; // Calculate points based on total postings

if ($userPoints > 0) {
    // If user has positive points, set points to 25
    $userPoints = 25;
    $points = 25; // Update points variable
} else {
    // If user has negative points, calculate points based on logarithm of absolute value
    $userPoints = abs($userPoints);
    $points = log10($userPoints); // Calculate logarithm of absolute value
}

// if($_POST['addStatus'] || $_POST['addComment'] || $_POST[' ) {

// }
$userPoints += 1; // Add one point for every answer/topic posted

//comments
$comments->id_users = $_SESSION['user']['id'];
$userComments = $comments->getListByIdUsers();
$latestComment = $comments->getComment();



$title = 'Profile'; // titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/users/profile.php';
require_once '../../views/parts/footer.php';
?>

<script src="assets/js/comments.js"></script>
<script src="assets/js/profile.js"></script>
<script src="assets/js/media.js"></script>