<?php
require_once "../../models/topicsModel.php" ;
require_once "../../models/topicAnswersModel.php" ;
require_once "../../models/commentsModel.php" ;
require_once "../../models/categoriesModel.php" ;
require_once "../../models/tagsModel.php" ;
require_once "../../models/sectionsModel.php" ;
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

$categories = new Categories;
$categoriesList = $categories->getList();

$tags = new Tags;
$tagsList = $tags->getList();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $topic = new Topics;
    $topic->id_users = 1;

    if (!empty($_POST['tag'])) {
        $topic->id_tags = $_POST['tag'];

            if ($_POST['tag'] != $topic->id_tags) {
                $errors['tag'] = 'Veuillez choisir un tag svp!';
            }
        } else {
            $errors['tag'] = 'Le tag ne doit pas etre vide';
        }
    

    if (!empty($_POST['categories'])) {
        $topic->id_categories = $_POST['categories'];
        if ($_POST['categories'] != $topic->id_categories) {
            $errors['categories'] = 'Veuillez choisir une categorie svp!';
        }
    } else {
            $errors['categories'] = 'La categorie ne doit pas etre vide';
        }
    

    if (!empty($_POST['title'])) {
        if (preg_match($regex['title'], $_POST['title'])) {
            $topic->title = $_POST['title'];
            if ($topic->checkIfExistsByTitle() == 1) {
                $errors['title'] = TOPICS_TITLE_ERROR_INVALID;
            } 
        } else {
            $errors['title'] = TOPICS_TITLE_ERROR;
        }
    }

    if (!empty($_POST['content'])) {
        $wordCount = str_word_count($topic->content);
        if (preg_match($regex['content'], $_POST['content'])) {
            $topic->content = $_POST['content'];
            if ($wordcunt < 30) {
                $errors['content'] = TOPICS_CONTENT_ERROR_INVALID;
            } else if ($wordcunt < 1) {
                $errors['content'] = TOPICS_CONTENT_ERROR;
            }
        } else {
            $errors['content'] = TOPICS_CONTENT_ERROR;
        }
    }

    if (empty($errors)) {
        if ($topic->create()) {
            $success = 'Votre topic vient d\être publié avec succes';
        } else {
            $errors = TOPICS_ERROR;
        }
    }
}


require_once '../../views/parts/header.php';
require_once '../../views/posts/topics.php';
require_once '../../views/parts/footer.php';
