<?php

// les models de site et les utils
require_once '../../models/usersModel.php' ;
require_once '../../models/forumModel.php' ;
require_once '../../models/statusModel.php';
require_once '../../models/topicsRepliesModel.php' ;
require_once '../../models/commentsModel.php' ;
require_once '../../models/contactModel.php' ;
require_once '../../models/topicsModel.php';
require_once '../../models/categoriesModel.php';
require_once '../../models/tagsModel.php';
require_once '../../models/sectionsModel.php' ;
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();

// établissement des variables pour accéder aux données des modèles 
$user = new Users;

$latestUser = $user->getLatestUser();

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

$contact = new Contact;
$contactList = $contact->getList();
$latestContact = $contact->getMessage();
$contactCount = count($contactList);

$totalCount = $postCount + $topicCount + $statusCount ; // total count de tous les publications : status; topics et replies 

$title = 'MelodyTown'; // Titre de la page

//  Inclusion des fichiers: header, du view et du footer
 require_once('../../views/parts/header.php');
 require_once('../../index.php');
 require_once('../../views/parts/footer.php'); 
 ?>

<script src="../../assets/javaSc/topic.js"></script>