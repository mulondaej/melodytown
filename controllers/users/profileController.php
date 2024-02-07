<?php

require_once "../../models/posts/statusModel.php";
require_once "../../models/posts/commentsModel.php";
require_once "../../models/posts/topicsrepliesModel.php" ;
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

$status = new Status;

$comments = new comments;

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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['statusPost'])) {

    if (!empty($_POST['content'])) {
        if (!preg_match($regex['content'], $_POST['content'])) {
            $status->content = trim($_POST['content']);
        } else {
            $errors['content'] = STATUS_ERROR;
        }
    } else {
        $errors['content'] = STATUS_ERROR;
    }


    if (empty($errors)) {
        $status->id_users = $_SESSION['user']['id'];
        if ($status->create()) {
            $success = STATUS_SUCCESS;
        } else {
            $errors['add'] = STATUS_ERROR;
        }
    } else {
        $errors['add'] = STATUS_ERROR;
    }
     $statusPoster = $status->getById();
}

if($_SERVER['REQUEST_METHOD'] == 'comment') {
    if(!empty($_POST['content'])) {
        if(!preg_match($regex['content'], $_POST['content'])) {
            $replies->content = $_POST['content'];
        } else {
            $errors['content'] = STATUS_COMMENTS_ERROR;
        }
    } else {
        $errors['content'] = STATUS_COMMENTS_ERROR;
    }
   
    $comments->id_status = $status->id;
    $comments->id_users = $_SESSION['user']['id'];

    if(empty($errors)) {
        if($comments->create()) {
            $success = STATUS_COMMENTS_SUCCESS;
        } else {
            $errors['add'] = STATUS_COMMENTS_ERROR;
        }
    }
    
    // $commentsPoster = $comments->getById();
}

$topic = new Topics;
$topicsList = $topic->getList();
$latestTopic = $topic->getTopic();
$topicCount = count($topicsList);
$userPosts = $topic->getUserTopics();
$userTotalPost = count($userPosts);

$replies = new Replies;
$repliesList = $replies->getList();
$userReply = $replies->getUserReply();
$latestReply = $replies->getReply();
$postCount = count($repliesList);
$userTotalAnswer = count($userReply);


$statusList = $status->getList();
$latestStatus = $status->getStatus();
$statusCount = count($statusList);


$commentsList = $comments->getList();
$latestComment = $comments->getComment();
$commentsCount = count($commentsList);

$statusTotalCount = $postCount + $statusCount;

$title = 'Profile';

// var_dump($userPosts);
// var_dump($userTotalPost);
// var_dump($userTotalAnswer);

require_once '../../views/parts/header.php';
require_once '../../views/pages/profile.php';
require_once '../../views/parts/footer.php';
?>