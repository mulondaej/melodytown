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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateAvatar'])) {
    if (!empty($_FILES['avatar'])) {
        $avatarMessage = checkAvatar($_FILES['avatar']);

        if ($avatarMessage != '') {
            $errors['avatar'] = $avatarMessage;
        } else {
            $user->avatar = uniqid() . '.' . pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

            while (file_exists('../../assets/IMG/user/' . $user->avatar)) {
                $user->avatar = uniqid() . '.' . pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            }
        }

        if(empty($errors)) {
            $user->id = $_SESSION['user']['id'];
            if(move_uploaded_file($_FILES['avatar']['tmp_name'], '../../assets/IMG/user/' . $user->avatar)) {
                if($user->updateAvatar()){
                    $_SESSION['user']['avatar'] = $user->avatar;
                    $success = IMAGE_SUCCESS;
                } else {
                    unlink('../../assets/IMG/user/' . $user->avatar);
                    $errors['update'] = IMAGE_ERROR;
                }
            } else {
                $errors['update'] = IMAGE_ERROR;
            }
        }
    }
    var_dump($_POST['updateAvatar']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['statusPost'])) {

    if (!empty($_POST['status'])) {
        if (!preg_match($regex['status'], $_POST['status'])) {
            $status->content = trim($_POST['status']);
        } else {
            $errors['status'] = STATUS_ERROR;
        }
    } else {
        $errors['status'] = STATUS_ERROR;
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
    
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['postComment'])) {
    if(!empty($_POST['comment'])) {
        if(!preg_match($regex['comment'], $_POST['comment'])) {
            $comments->content = $_POST['comment'];
        } else {
            $errors['comment'] = STATUS_COMMENTS_ERROR;
        }
    } else {
        $errors['comment'] = STATUS_COMMENTS_ERROR;
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

//topic
$topic = new Topics;
$topicsList = $topic->getList();
$latestTopic = $topic->getTopic();
$topicCount = count($topicsList);
$userPosts = $topic->getUserTopics($id_users);
$userTotalPost = count($userPosts);

//replies
$replies = new Replies;
$repliesList = $replies->getList();
$userReply = $replies->getUserReply();
$latestReply = $replies->getReply();
$postCount = count($repliesList);
$userTotalAnswer = count($userReply);

//status
$statusList = $status->getList();
$userOwnStatus = $status->getListByIdUsers();
$latestStatus = $status->getStatus();
$statusCount = count($statusList);

//cooments
$userOwnComments = $comments->getListByIdUsers();
$commentsList = $comments->getList();
$latestComment = $comments->getComment();
$commentsCount = count($commentsList);

$totalCounting = $postCount + $statusCount;

$title = 'Profile';

require_once '../../views/parts/header.php';
require_once '../../views/pages/profile.php';
require_once '../../views/parts/footer.php';
?>