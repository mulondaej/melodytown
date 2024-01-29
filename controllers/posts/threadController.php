<?php

require_once "../../models/users/usersModel.php" ;
require_once "../../models/posts/topicsModel.php";
require_once "../../models/posts/topicsAnswersModel.php";
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

$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();
$userDetails = $user->getList();
$userCount = count($userDetails);

$topic = new Topics();

// $topic->id = $_GET['id'];

// if($topic->checkIfExistsById() == 0) {
//     header('Location: /topics');
//     exit;
// }

$answers = new Answers();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['content'])) {
        if(!preg_match($regex['answers'], $_POST['content'])) {
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
$answersList = $answers->getList();
$postCount = count($answersList);


require_once '../../views/parts/header.php';
require_once '../../views/posts/thread.php';
require_once '../../views/replies/topicAnswers.php';
require_once '../../views/parts/footer.php';