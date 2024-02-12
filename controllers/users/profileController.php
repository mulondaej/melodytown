<?php

// les modèles de site appélés
require_once "../../models/posts/statusModel.php";
require_once "../../models/posts/commentsModel.php";
require_once "../../models/posts/topicsRepliesModel.php";
require_once "../../models/posts/topicsModel.php";
require_once '../../models/users/usersModel.php';
////require_once "../../controllers/posts/updateStatusController.php" ;
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start(); // démarrage de la session

if (empty($_SESSION['user'])) { // si l'utilisateur n'est pas en ligne
    header('Location: /connexion'); // le rediriger vers la page d'accueil
    exit;
}

// établissement des variables pour accéder aux données des modèles 
$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();
$userDetails = $user->getList();
$userCount = count($userDetails);

$status = new Status;

$comments = new comments;

// si la requête est une méthode POST et le POST variable esy déclenché, on traite les données du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateAvatar'])) {
    if (!empty($_FILES['avatar'])) { // si l'image n'est pas vide
        $avatarMessage = checkAvatar($_FILES['avatar']); // si l'extension de l'image est autorisée

        if ($avatarMessage != '') { // si l'extension de l'image n'est pas autorisée
            $errors['avatar'] = $avatarMessage; // afficher le message d'erreur
        } else {
            $user->avatar = uniqid() . '.' . pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            // sinon, on donne un nom unique à l'image

            while (file_exists('../../assets/IMG/user/' . $user->avatar)) { // si l'image existe déjà
                $user->avatar = uniqid() . '.' . pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                // on donne un nom unique à l'image
            }
        }

        // si les erreurs sont vides, 
        if (empty($errors)) {
            $user->id = $_SESSION['user']['id']; // on récupère l'id de l'utilisateur
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], '../../assets/IMG/user/' . $user->avatar)) {
                // si la fonction move_uploaded_file renvoie TRUE
                if ($user->updateAvatar()) { // si la fonction updateAvatar renvoie TRUE; alors on met à jour l'avatar de l'utilisateur dans la BDD
                    $_SESSION['user']['avatar'] = $user->avatar;
                    $success = IMAGE_SUCCESS;
                } else { // sinon, on enlève l'avatar de l'utilisateur hors de la BDD et le dossier d'images
                    unlink('../../assets/IMG/user/' . $user->avatar);
                    $errors['update'] = IMAGE_ERROR; // et afficher le message d'erreur
                }
            } else {
                $errors['update'] = IMAGE_ERROR; // afficher le message d'erreur
            }
        }
    }
    var_dump($_POST['updateAvatar']);
}

// si la requête est une méthode POST et le POST variable est déclenché, on traite les données du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['statusPost'])) {

    if (!empty($_POST['status'])) { // si le message n'est pas vide
        if (!preg_match($regex['status'], $_POST['status'])) {  // si le message n'est pas conforme à la regex
            $status->content = trim($_POST['status']); // on récupère le message en le trimmant
        } else {
            $errors['status'] = STATUS_ERROR; // sinon, afficher le message d'erreur
        }
    } else {
        $errors['status'] = STATUS_ERROR; // sinon, afficher le message d'erreur
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

// même logique pour les commentaires que pour les status
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['postComment'])) {
    if (!empty($_POST['comment'])) {
        if (!preg_match($regex['comment'], $_POST['comment'])) {
            $comments->content = $_POST['comment'];
        } else {
            $errors['comment'] = STATUS_COMMENTS_ERROR;
        }
    } else {
        $errors['comment'] = STATUS_COMMENTS_ERROR;
    }

    $comments->id_status = $status->id;
    $comments->id_users = $_SESSION['user']['id'];

    if (empty($errors)) {
        if ($comments->create()) {
            $success = STATUS_COMMENTS_SUCCESS;
        } else {
            $errors['add'] = STATUS_COMMENTS_ERROR;
        }
    }
}

// les mis à jour et la suppression des status et des commentaires sont gérées ici.
if (isset($_POST['updateStatus'])) { // si est déclenché le POST variable updateStatus

    if (!empty($_POST['status'])) { // si le status n'est pas vide
        if (preg_match($regex['status'], $POST['status'])) {
            $status->content = clean($_POST['status']); // on récupère le message en le nettoyant
            if ($status->checkIfExistsByContent() == 1) {  // si le statut existe déjà dans la BDD, on ne peut pas le mettre à jour
                $errors['status'] = STATUS_UPDATE_ERROR; // afficher le message d'erreur
            } else {
                $errors['status'] = STATUS_UPDATE_SUCCESS; // sinon, on met à jour le statut dans la BDD
            }
        } else {
            $errors['status'] = STATUS_UPDATE_ERROR; // sinon, afficher le message d'erreur
        }


        // si les erreurs sont vides, les status seront mis à jour dans la BDD
        if (empty($errors)) {
            $status->id_users = $_SESSION['user']['id'];
            if ($status->update()) {
                $status->content;
                $success = STATUS_SUCCESS;
            } else {
                $errors['update'] = STATUS_ERROR;
            }
        }
    }
}

if (isset($_POST['deleteStatus'])) { // si est déclenché le POST variable deleteStatus
    if (isset($_POST['status'])) { // si le status existe ; on le supprime
        if ($status->delete()) {
            unset($_POST);
            header('Location: /profile'); // on redirige vers la page de profil
            exit;
        }
    }
}

// même logique pour les mis à jour des commentaires que pour les status
if (isset($_POST['updateComment'])) {

    if (!empty($_POST['comment'])) {
        if (preg_match($regex['comment'], $POST['comment'])) {
            $comments->content = clean($_POST['comment']);
            if ($comments->checkIfExistsByContent() == 1) {
                $errors['comment'] = STATUS_COMMENTS_UPDATE_ERROR;
            }
        } else {
            $errors['comment'] = STATUS_COMMENTS_UPDATE_SUCCESS;
        }
    } else {
        $errors['comment'] = STATUS_COMMENTS_UPDATE_ERROR;
    }

    if (empty($errors)) {
        $comments->id_users = $_SESSION['user']['id'];
        if ($comments->update()) {
            $comments->content;
            $success = STATUS_COMMENTS_SUCCESS;
        } else {
            $errors['update'] = STATUS_COMMENTS_ERROR;
        }
    }
}

if (isset($_POST['deleteComment'])) {
    if (isset($_POST['status'])) {
        if ($comments->delete()) {
            unset($_POST['comment']);
            header('Location: /profile');
            exit;
        }
    }
}

// établissement des variables pour accéder aux données des modèles 
//topics
$topic = new Topics;
$topicsList = $topic->getList();
$latestTopic = $topic->getTopic();
$topicCount = count($topicsList);
$userPosts = $topic->getUserTopics($id_users);
$userTotalPost = count($userPosts);

//replies
$replies = new Replies;
$repliesList = $replies->getList();
$userReply = $replies->getUserReply();
$latestReply = $replies->getReply();
$postCount = count($repliesList);
$userTotalAnswer = count($userReply);

//status
$statusList = $status->getList();
$userOwnStatus = $status->getListByIdUsers();
$latestStatus = $status->getStatus();
$statusCount = count($statusList);

//comments
$userOwnComments = $comments->getListByIdUsers();
$commentsList = $comments->getList();
$latestComment = $comments->getComment();
$commentsCount = count($commentsList);

$totalCounting = $postCount + $statusCount;

$title = 'Profile'; // titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/pages/profile.php';
require_once '../../views/parts/footer.php';
?>