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

if (empty($_SESSION['user'])) { // si l'utilisateur n'est pas en ligne
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
    $status->id = (int) $_GET['id'];
    if ($status->delete()) { // si la suppression de l'utilisateur réussie, on redirige vers la page de profil
        header('Location: /profil');
        exit;
    }
}


// les mis à jour et la suppression des status et des commentaires sont gérées ici.
if (isset($_POST['updateStatus'])) { // si est déclenché le POST variable updateStatus

    if (!empty($_POST['content'])) { // si le status n'est pas vide
        if (!preg_match($regex['content'], $POST['content'])) {
            $status->content = clean($_POST['content']); // on récupère le message en le nettoyant
            if ($status->checkIfExistsByContent() == 1) {  // si le statut existe déjà dans la BDD, on ne peut pas le mettre à jour
                $errors['content'] = STATUS_UPDATE_ERROR; // afficher le message d'erreur
            } else {
                $errors['content'] = STATUS_UPDATE_ERROR; // sinon, on met à jour le statut dans la BDD
            }
        } else {
            $errors['content'] = STATUS_UPDATE_ERROR_INVALID; // sinon, afficher le message d'erreur
        }

        // si les erreurs sont vides, les status seront mis à jour dans la BDD
        if (empty($errors)) {
            $status->id_users = $_SESSION['user']->id;
            if ($status->update()) {
                $success = STATUS_SUCCESS;
            } else {
                $errors['update'] = STATUS_ERROR;
            }
        }
    }
}


$comments = new Comments;

$comments->id_users = (int) $_SESSION['user']['id'];

// même logique pour creer les commentaires que pour les status
if (isset($_POST['addComment'])) {
    if (!empty($_POST['content'])) {
        $comments->id_status = $status->id;
        if (!preg_match($regex['content'], $_POST['content'])) {
            $comments->content = $_POST['content'];


        } else {
            $errors['content'] = STATUS_COMMENTS_ERROR;
        }
    } else {
        $errors['content'] = STATUS_COMMENTS_ERROR_EXISTS;
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
if (isset($_POST['updateComment'])) {

    if (!empty($_POST['content'])) {
        if (!preg_match($regex['content'], $POST['content'])) {
            $comments->content = clean($_POST['content']);
            if ($comments->checkIfExistsByContent() == 1) {
                $errors['content'] = STATUS_COMMENTS_UPDATE_ERROR;
            }
        } else {
            $errors['content'] = STATUS_COMMENTS_UPDATE_ERROR;
        }
    } else {
        $errors['content'] = STATUS_COMMENTS_UPDATE_ERROR_INVALID;
    }

    if (empty($errors)) {
        $comments->id_users = $_SESSION['user']->id;
        if ($comments->update()) {
            $success = STATUS_COMMENTS_SUCCESS;
        } else {
            $errors['update'] = STATUS_COMMENTS_ERROR;
        }
    }
}

//suppresion de commentaires
if (isset($_POST['deleteComment'])) {
    if (isset($_POST['content'])) {
        if ($comments->delete()) {
            header('Location: /profil');
            exit;
        }
    }
}

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

foreach ($userTopics as $key => $post) {
    $replies->id_topics = $post['id'];
    $userTopics[$key]['content'] = $replies->getRepliesByTopics();
}

$userReply = $replies->getUserReply();
$latestReply = $replies->getReply();
$userTotalAnswer = count($userReply);

//status
$userOwnStatus = $status->getListByIdUsers();
if (count($userOwnStatus) > 0) {
    $latestStatus = $userOwnStatus[0];
}

//comments
$comments->id_users = $_SESSION['user']['id'];
$userOwnComments = $comments->getListByIdUsers();
$latestComment = $comments->getComment();


$totalCounting = $userTotalAnswer + $userTotalTopics;


$title = 'Profile'; // titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/users/profile.php';
require_once '../../views/parts/footer.php';

?>