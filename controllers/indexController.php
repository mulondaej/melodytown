<?php

// les models de site et les utils
require_once '../models/users/usersModel.php' ;
require_once '../models/forumModel.php' ;
require_once '../models/posts/statusModel.php';
require_once '../models/posts/topicsRepliesModel.php' ;
require_once '../models/posts/commentsModel.php' ;
require_once '../models/posts/topicsModel.php';
require_once '../models/posts/categoriesModel.php';
require_once '../models/posts/tagsModel.php';
require_once '../models/posts/sectionsModel.php' ;
require_once '../utils/regex.php';
require_once '../utils/messages.php';
require_once '../utils/functions.php';

session_start();

// établissement des variables pour accéder aux données des modèles 
$user = new Users;
//// $user->id = $_SESSION['user']['id'];
//// $userAccount = $user->getById();
$latestUser = $user->getUser();

$userDetails = $user->getList();
$userCount = count($userDetails);

$forums = new Forums;

$categories = new Categories;
$categoriesList = $categories->getList();

$tags = new Tags;
$tagsList = $tags->getList();

$topic = new Topics;
$topicsList = $topic->getList();
// $topicsDetails = $topic->getById();
$latestTopic = $topic->getTopic();
$topicCount = count($topicsList);

$replies = new Replies;
$repliesList = $replies->getList();
$latestReply = $replies->getReply();
$postCount = count($repliesList);

$status = new Status;
$statusList = $status->getList();
$latestStatus = $status->getStatus();
$statusCount = count($statusList);

$totalCount = $postCount + $topicCount + $statusCount ; // total count de tous les publications : status; topics et replies 

$title = 'MelodyTown'; // Titre de la page

//  Inclusion des fichiers: header, du view et du footer
 require_once('..//views/parts/header.php');
 require_once('..//index.php');
 require_once('..//views/parts/footer.php'); ?>