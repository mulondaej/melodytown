<?php
require_once "../../models/posts/topicsModel.php";
require_once "../../models/posts/categoriesModel.php";
// require_once "../../models/posts/categoriesModel.php";
require_once "../../models/posts/tagsModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start();

require_once '../../views/parts/header.php';
  
// Confirmation que l'utilisateur est bel et bien en ligne
if (!isset($_SESSION['user'])) {
    // Sinon, lui rediriger vers la page d'accueil ou de connexion
    header("Location: /connexion");
    exit();
}

$topic = new Topics();

$topic->id = $_GET['id'];
if($topic->checkIfExistsById() == 0) {
    header('Location: /thread');
    exit;
}

$topicDetails = $topic->getById();

$comment = new Comments();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['content'])) {
        if(!preg_match($regex['content'], $_POST['content'])) {
            $comment->content = $_POST['content'];
        } else {
            $errors['content'] = COMMENT_CONTENT_ERROR_INVALID;
        }
    } else {
        $errors['content'] = COMMENT_CONTENT_ERROR_EMPTY;
    }
   
    $comment->id_topics = $topic->id;
    $comment->id_users = $_SESSION['user']['id'];

    if(empty($errors)) {
        if($comment->create()) {
            $success = COMMENT_ADD_SUCCESS;
        } else {
            $errors['add'] = COMMENT_ADD_ERROR;
        }
    }
}

require_once '../../views/parts/header.php';
require_once '../../views/posts/thread.php';
// require_once '../../views/comments/addComment.php';
require_once '../../views/parts/footer.php';