<?php
// Include your database connection code .
require_once("../../models/topicsModel.php");
require_once("../../models/topicAnswersModel.php");
require_once("../../models/commentsModel.php");
require_once("../../models/categoriesModel.php");
require_once("../../models/tagsModel.php");


session_start();

// Check if the user is logged in. You can implement your authentication logic here.
if (!isset($_SESSION['user'])) {
    // Redirect to the login page or display an error message.
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
    } else {
        if ($_POST['tag'] != $topic->id_tags) {
            $errors['tag'] = 'Veuillez choisir un tag svp!';
        } else {
            $errors['tag'] = 'Le tag ne doit pas etre vide'; 
        }
    }

    if (!empty($_POST['categories'])) {
        $topic->id_categories = $_POST['categories'];
    } else {
        if ($_POST['categories'] != $topic->id_tags) {
            $errors['categories'] = 'Veuillez choisir un tag svp!';
        } else {
            $errors['categories'] = 'Le tag ne doit pas etre vide'; 
        }
    }

    if (!empty($_POST['title'])) {
        $topic->title = $_POST['title'];
        $wordCount = str_word_count($topic->title);
    } else {
        if($topic->checkIfExistsByTitle() == 1) {
            $errors['title'] = TOPICS_TITLE_ERROR_INVALID;
        } else if ($wordcunt < 8) {
            $errors['title'] = TOPICS_TITLE_ERROR_INVALID_2;
        }
        else {
            $errors['title'] = TOPICS_TITLE_SUCCESS;
        }
    }

    if(!empty($_POST['content'])) {
        $topic->content = $_POST['content'];
        $wordCount = str_word_count($topic->content);
    } else {
        if ($wordcunt < 30 ) {
             $errors['content'] = TOPICS_CONTENT_ERROR_INVALID;
            } else if ($wordcunt < 1) {
                $errors['content'] = TOPICS_CONTENT_ERROR;
            }
         else {
            $errors['content'] = TOPICS_CONTENT_SUCCESS;
        }
    } 

    if (empty($errors)) {
        if($topic->create()) {
            $success = 'Votre topic vient d\être publié avec succes';
        } else {
            $errors = TOPICS_ERROR;
        }
    }

}



require_once '../../views/parts/header.php';

if ('Location: /topics') {
    require_once '../../views/posts/topics.php';
} else if ('Location: /threads') {
    require_once '../../views/posts/threadsList.php';
}

require_once '../../views/parts/footer.php';
