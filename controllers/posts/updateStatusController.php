<?php

require_once "../../models/users/usersModel.php" ;
require_once "../../models/posts/StatusModel.php" ;
require_once "../../models/posts/commentsModel.php" ;
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();

// Confirmation que l'utilisateur est bel et bien en ligne
if (!isset($_SESSION['user'])) {
    // Sinon, lui rediriger vers la page d'accueil ou de connexion
    header("Location: /connexion");
    exit();
}


$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();

$topic = new Topics;

if(isset($_POST['updateStatus'])) {

    if (!empty($_POST['status'])) {
        if (preg_match($regex['status'], $POST['status'])) {
            $status->comment = clean($_POST['status']);
            if ($status->checkIfExistsByContent() == 1 ) {
                $errors['status'] = STATUS_UPDATE_ERROR;
            }
        } else {
            $errors['status'] = STATUS_UPDATE_SUCCESS;
        }
    } else {
        $errors['status'] = STATUS_UPDATE_ERROR;
    }

    if(empty($errors)) {
        $status->id_users = $_SESSION['user']['id'];
        if($status->update()){
              $status->content;
            $success = STATUS_SUCCESS;
        } else {
            $errors['update'] = STATUS_ERROR;
        }
    }
}


if(isset($_POST['updateComment'])) {

    if (!empty($_POST['comment'])) {
        if (preg_match($regex['comment'], $POST['comment'])) {
            $comments->content = clean($_POST['comment']);
            if ($comments->checkIfExistsByContent() == 1 ) {
                $errors['comment'] = STATUS_COMMENTS_UPDATE_ERROR;
            }
        } else {
            $errors['comment'] = STATUS_COMMENTS_UPDATE_SUCCESS;
        }
    } else {
        $errors['comment'] = STATUS_COMMENTS_UPDATE_ERROR;
    }

    if(empty($errors)) {
        $comments->id_users = $_SESSION['user']['id'];
        if($comments->update()){
              $comments->content;
            $success = STATUS_COMMENTS_SUCCESS;
        } else {
            $errors['update'] = STATUS_COMMENTS_ERROR;
        }
    }
}


$topicsList = $topic->getList();
$topicCount = count($topicsList);

$title = 'Topic-update';





