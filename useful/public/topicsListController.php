<?php
require_once '../../models/usersModel.php' ;
require_once "../../models/topicsModel.php";
require_once "../../models/topicsRepliesModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start();
  
$user = new Users;

if(!empty($_SESSION['user'])) {
$user->fetchUserData($_SESSION['user']['id']);
$userAccount = $user->getById();
}

$topic = new Topics;
// $topic->id_users = $_SESSION['user']['id'];
// $topicsDetails = $topic->getById();
$topicsList = $topic->getList();
$latestTopic = $topic->getTopic();
$topicCount = count($topicsList);

$replies = new Replies;
// $replies->id_topics = (int)$_GET['id'];
// $repliesOwn = $replies->getRepliesByTopics();
$repliesList = $replies->getList();
$latestReply = $replies->getReply();
$repliesCount = count($repliesList);

$totalCount = $repliesCount + $topicCount;

$title = 'Topics-List';

require_once '../../views/parts/header.php';
require_once '../../views/topics/topicsList.php';
require_once '../../views/parts/footer.php';
?>


<script src="assets/js/modals.js"></script>