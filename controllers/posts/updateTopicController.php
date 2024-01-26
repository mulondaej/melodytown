<?php

require_once "../../models/posts/topicsAnswersModel.php" ;
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

$topic = new Topics;

if(isset($_POST['updateInfos'])) {

    if (!empty($_POST['title'])) {
        if (preg_match($regex['title'], $_POST['title'])) {
            $topic->title = clean($_POST['title']);
            if ($topic->checkIfExistsByTitle() == 1) {
                $errors['title'] = TOPIC_TITLE_UPDATE_ERROR;
            }
        } else {
            $errors['title'] = TOPIC_TITLE_UPDATE_SUCCESS;
        }
    } else {
        $errors['title'] = TOPIC_TITLE_UPDATE_ERROR;
    }

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

    if (!empty($_POST['categories'])) {
        $categorie->id = $_POST['categories'];
        if ($categories->checkIfExistsById() == 1) {
            $topic->id_categories = clean($_POST['categories']);
        } else {
            $errors['categories'] = TOPIC_TAG_CATEGORIE_UPDATE_ERROR;
        }
    } else {
        $errors['categories'] = TOPIC_TAG_CATEGORIE_UPDATE_ERROR;
    }

    if (!empty($_POST['tag'])) {
        $tags->id = $_POST['tag'];
        if ($tags->checkIfExistsById() == 1) {
            $topic->id_tags = clean($_POST['tag']);
        } else {
            $errors['tag'] = TOPIC_TAG_CATEGORIE_UPDATE_ERROR;
        }
    } else {
        $errors['tag'] = TOPIC_TAG_CATEGORIE_UPDATE_ERROR;
    }

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

if(isset($_POST['delete'])) {
    if($topic->delete()) {
        unset($_SESSION);
        session_destroy();
        header('Location: /compte-supprime');
        exit;
    }
}

$topicsList = $topic->getList();
// var_dump();

$title = 'Topic-update';

require_once '../../views/parts/header.php';
require_once '../../views/posts/updateTopic.php';
require_once '../../views/parts/footer.php';





