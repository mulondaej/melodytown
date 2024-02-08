<?php

require_once "../../models/posts/topicsModel.php";
require_once "../../models/posts/topicsRepliesModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';
// $title = $topicDetails->title;


session_start();


$topic = new Topics();

$topic->id = $_GET['id'];

if($topic->checkIfExistsById() == 0) {
    header('Location: /topics');
    exit;
}

$replies = new Replies();

$topicsDetails = $topic->getById();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reply'])) {
    if(!empty($_POST['content'])) {
        if(!preg_match($regex['content'], $_POST['content'])) {
            $replies->content = $_POST['content'];
        } else {
            $errors['content'] = TOPICS_REPLIES_ERROR;
        }
    } else {
        $errors['content'] = TOPICS_REPLIES_ERROR;
    }
   
    $replies->id_topics = $topic->id;
    $replies->id_users = $_SESSION['user']['id'];

    if(empty($errors)) {
        if($replies->create()) {
            $success = TOPICS_REPLIES_SUCCESS;
        } else {
            $errors['add'] = TOPICS_REPLIES_ERROR;
        }
    }
    
}

// $topicsList = $topic->getList();


require_once '../../views/parts/header.php';
require_once '../../views/posts/thread.php';
require_once '../../views/replies/topicReplies.php';
require_once '../../views/parts/footer.php';