<?php
require_once "../../models/usersModel.php";
require_once "../../models/statusModel.php";
require_once "../../models/topicsModel.php";
require_once "../../models/topicsRepliesModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start();

if (empty ($_SESSION['user'])) { // si l'utilisateur n'est pas en ligne
    header('Location: /connexion'); // le rediriger vers la page d'accueil
    exit;
}
  

// établissement des variables pour accéder aux données des modèles 
$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();
$userList = $user->getList();
$userCount = count($userList);

$status = new Status;

$status->id_users = $_SESSION['user']['id'];

//topics
$topic = new Topics;
$topic->id_users = $_SESSION['user']['id'];
$topicsList = $topic->getList();
$userTopics = $topic->getUserTopics();
$userTotalTopics = count($userTopics);

if (count($userTopics) > 0) {
    $latestPost = $userTopics[0];
}

//replies
$replies = new Replies;
$replies->id_users = $_SESSION['user']['id'];

foreach ($userTopics as $key => $post) {
    $replies->id_topics = $post['id'];
    $userTopics[$key]['content'] = $replies->getRepliesByTopics();
}

$userReply = $replies->getUserReply();

if ($userReply != false) {
    $latestReply = $replies->getReply();
    $userTotalAnswer = count($userReply);

    if (count($userReply) > 0) {
        $latestReply = $userReply;
    }
}

//status
$userStatus = $status->getListByIdUsers();
$userTotalStatus = count($userStatus);

if (count($userStatus) > 0) {
    $latestStatus = $userStatus[0];
}

$totalPosts = $userTotalAnswer + $userTotalTopics;


$title = 'Members';

require_once '../../views/parts/header.php';
require_once '../../views/users/usersList.php';
require_once '../../views/parts/footer.php';
?>


<script src="assets/js/modals.js"></script>