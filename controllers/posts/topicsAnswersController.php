<?php

require_once("../../models/topicAnswersModel.php");
require_once("../../models/categoriesModel.php");
require_once("../../models/tagsModel.php");


session_start();

// Confirmation que l'utilisateur est bel et bien en ligne
if (!isset($_SESSION['topic'])) {
    // Sinon, lui rediriger vers la page d'accueil ou de connexion
    header("Location: /connexion");
    exit();
}


$answersList = $answers->getById();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $answers = new Answers;
    $answers->id_users = $_SESSION['user']['id'];

    if(!empty($_POST['content'])) {
        $answers->content = $_POST['content'];
        $wordCount = str_word_count($answers->content);
    } else {
        if ($wordcunt < 5  ) {
             $errors['content'] = TOPICS_CONTENT_ERROR_INVALID;
            } else if ($wordcunt < 1) {
                $errors['content'] = TOPICS_CONTENT_ERROR;
            }
         else {
            $errors['content'] = TOPICS_CONTENT_SUCCESS;
        }
    } 

    if (empty($errors)) {
        $answers->create();
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comments = new Comments;
    $comments->id_users = $_SESSION['user']['id'];

    if(!empty($_POST['content'])) {
        $comments->content = $_POST['content'];
        $wordCount = str_word_count($comments->content);
    } else {
        if ($wordcunt < 5  ) {
             $errors['content'] = TOPICS_CONTENT_ERROR_INVALID;
            } else if ($wordcunt < 1) {
                $errors['content'] = TOPICS_CONTENT_ERROR;
            }
         else {
            $errors['content'] = TOPICS_CONTENT_SUCCESS;
        }
    } 

    if (empty($errors)) {
        $comments->create();
    }

}

require_once '../../views/parts/header.php';
require_once '../../views/posts/topics.php';
require_once '../../views/parts/footer.php';
