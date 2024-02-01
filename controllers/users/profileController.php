<?php
/**
 *vérifier que l'utilisateur est connecté.
 */
require_once "../../models/posts/topicsAnswersModel.php" ;
require_once "../../models/posts/commentsModel.php" ;
require_once "../../models/posts/topicsModel.php";
require_once '../../models/users/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start();

if(empty($_SESSION['user'])){
    header('Location: /connexion');
    exit;
}

$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();
$userDetails = $user->getList();
$userCount = count($userDetails);

if (!empty($_FILES['image'])) {
    $imageMessage = checkImage($_FILES['image']);

    if ($imageMessage != '') {
        $errors['image'] = $imageMessage;
    } else {
        $userAccount->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        while(file_exists('../../assets/img/topics/' . $userAccount->image)) {
            $userAccount->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        }
    }
}

$topic = new Topics;
$topicsList = $topic->getList();
$latestTopic = $topic->getTopic();
$topicCount = count($topicsList);
$userPosts = $topic->getUserTopics();
$userTotalPost = count($userPosts);

$answers = new Answers;
$answersList = $answers->getList();
$userAnswer = $answers->getUserAnswer();
$latestAnswer = $answers->getAnswer();
$postCount = count($answersList);
$userTotalAnswer = count($userAnswer);

$title = 'Profile';

// var_dump($userPosts);
// var_dump($userTotalPost);
// var_dump($userTotalAnswer);

require_once '../../views/parts/header.php';
require_once '../../views/pages/profile.php';
require_once '../../views/parts/footer.php';
?>