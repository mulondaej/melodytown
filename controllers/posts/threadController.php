<?php

require_once "../../models/posts/topicsModel.php";
require_once "../../models/posts/topicsAnswersModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();


$topic = new Topics();

$topic->id = $_GET['id'];

if($topic->checkIfExistsById() == 0) {
    header('Location: /topics');
    exit;
}

$answers = new Answers();

$topicsDetails = $topic->getById();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['answer'])) {
    if(!empty($_POST['content'])) {
        if(!preg_match($regex['content'], $_POST['content'])) {
            $answers->content = $_POST['content'];
        } else {
            $errors['content'] = TOPICS_ANSWERS_ERROR;
        }
    } else {
        $errors['content'] = TOPICS_ANSWERS_ERROR;
    }
   
    $answers->id_topics = $topic->id;
    $answers->id_users = $_SESSION['user']['id'];

    if(empty($errors)) {
        if($answers->create()) {
            $success = TOPICS_ANSWERS_SUCCESS;
        } else {
            $errors['add'] = TOPICS_ANSWERS_ERROR;
        }
    }
    
    $title = $topic->title;
}


$topicsList = $topic->getList();


require_once '../../views/parts/header.php';
require_once '../../views/posts/thread.php';
require_once '../../views/replies/topicAnswers.php';
require_once '../../views/parts/footer.php';