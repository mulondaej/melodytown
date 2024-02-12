<?php

// les models de site et les utils
require_once "../../models/users/usersModel.php" ;
require_once "../../models/posts/topicsRepliesModel.php" ;
require_once "../../models/posts/commentsModel.php" ;
require_once "../../models/posts/topicsModel.php";
require_once "../../models/posts/categoriesModel.php";
require_once "../../models/posts/tagsModel.php";
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

// établissement des variables pour accéder aux données des modèles 
$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();

$topic = new Topics;

// si l'envoi de $_POST variable existe
if(isset($_POST['updateInfos'])) { // si le formulaire est envoyé

    if (!empty($_POST['title'])) { // si le titre n'est pas vide
        if (preg_match($regex['title'], $_POST['title'])) { // si le titre est valide
            $topic->title = clean($_POST['title']); // on récupère le nouveau titre en le nettoyant
            if ($topic->checkIfExistsByTitle() == 1) { // si le titre existe déjà dans la BDD
                $errors['title'] = TOPIC_TITLE_UPDATE_ERROR;  // afficher le message d'erreur
            }
        } else {
            $errors['title'] = TOPIC_TITLE_UPDATE_SUCCESS; // sinon, afficher le message de succes
        }
    } else {
        $errors['title'] = TOPIC_TITLE_UPDATE_ERROR; // sinon, afficher le message d'erreur
    }


    // Même logique que pour la case de titre mais pour le contenu
    if (!empty($_POST['content'])) {
        if (preg_match($regex['content'], $POST['content'])) {
            $topic->content = clean($_POST['content']);
            if ($topic->checkIfExistsByContent() == 1 ) {
                $errors['content'] = TOPIC_CONTENT_UPDATE_ERROR;
            }
        } else {
            $errors['content'] = TOPIC_CONTENT_UPDATE_SUCCESS;
        }
    } else {
        $errors['content'] = TOPIC_CONTENT_UPDATE_ERROR;
    }

    if (!empty($_POST['categories'])) { // si la catégorie n'est pas vide
        $categories->id = $_POST['categories'];
        if ($categories->checkIfExistsById() == 1) { // si la catégorie existe déjà dans la BDD
            $topic->id_categories = $_POST['categories'];
        } else {
            $errors['categories'] = TOPIC_TAG_CATEGORIE_UPDATE_ERROR; // sinon, afficher le message d'erreur
        }
    } else {
        $errors['categories'] = TOPIC_TAG_CATEGORIE_UPDATE_ERROR; // sinon, afficher le message d'erreur
    }

    // Même logique que pour la case de catégories mais pour les tags
    if (!empty($_POST['tag'])) {
        $tags->id = $_POST['tag'];
        if ($tags->checkIfExistsById() == 1) {
            $topic->id_tags = $_POST['tag'];
        } else {
            $errors['tag'] = TOPIC_TAG_CATEGORIE_UPDATE_ERROR;
        }
    } else {
        $errors['tag'] = TOPIC_TAG_CATEGORIE_UPDATE_ERROR;
    }

    // si les erreurs sont vides, alors mets les informations du topic à jour
    if(empty($errors)) {
        $topic->id_users = $_SESSION['user']['id'];
        if($topic->update()){
              $topic->title;
              $topic->content;
              $topic->id_categories;
              $topic->id_tags;
            $success = TOPIC_UPDATE_SUCCESS;
        } else {
            $errors['update'] = TOPIC_UPDATE_ERROR;
        }
    }

}

// si l'envoi de delete est déclenche, le topic sera supprimé
if(isset($_POST['deletePost'])) {
    if($topic->delete()) {
        unset($_SESSION);
        session_destroy();
        header('Location: /topics');
        exit;
    }
}

// si l'envoi de $_POST variable existe, alors mets les contenus du reponse à jour
if(isset($_POST['updatePost'])) {

    // Même logique que pour la case de titre mais pour les réponses ou commentaires
    if (!empty($_POST['reply'])) {
        if (preg_match($regex['reply'], $POST['reply'])) {
            $replies->content = clean($_POST['reply']);
            if ($replies->checkIfExistsByContent() == 1 ) {
                $errors['reply'] = TOPIC_REPLIES_UPDATE_ERROR;
            }
        } else {
            $errors['reply'] = TOPIC_REPLIES_UPDATE_SUCCESS;
        }
    } else {
        $errors['reply'] = TOPIC_REPLIES_UPDATE_ERROR;
    }

    // si les erreurs sont vides, alors mets le contenu du réponse à jour
    if(empty($errors)) {
        $replies->id_users = $_SESSION['user']['id'];
        if($replies->update()){
              $replies->content;
            $success = TOPIC_UPDATE_SUCCESS;
        } else {
            $errors['update'] = TOPIC_UPDATE_ERROR;
        }
    }

}

// Même logique pour la suppression des topics
if(isset($_POST['deleteReply'])) {
    if($topic->delete()) {
        unset($_SESSION);
        session_destroy();
        header('Location: /topics');
        exit;
    }
}

$topicsList = $topic->getList(); // get all topics
$topicCount = count($topicsList); // get the number of topics in the list

$title = 'Topic-update'; // Titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/posts/updateTopic.php';
require_once '../../views/parts/footer.php';





