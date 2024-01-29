<?php

require_once '../models/users/usersModel.php' ;
require_once '../models/forumModel.php' ;
require_once '../models/posts/topicsAnswersModel.php' ;
require_once '../models/posts/commentsModel.php' ;
require_once '../models/posts/topicsModel.php';
require_once '../models/posts/categoriesModel.php';
require_once '../models/posts/tagsModel.php';
require_once '../models/posts/sectionsModel.php' ;
require_once '../utils/regex.php';
require_once '../utils/messages.php';
require_once '../utils/functions.php';

session_start();

$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getList();
$userCount = count($userAccount);

$forums = new Forums;

$categories = new Categories;
$categoriesList = $categories->getList();

$tags = new Tags;
$tagsList = $tags->getList();

$topic = new Topics;
$topicsList = $topic->getList();
$topicCount = count($topicsList);

$answers = new Answers;
$answersList = $answers->getList();
$postCount = count($answersList);

$title = 'MelodyTown';


 require_once('..//views/parts/header.php');
 require_once('../index.php');
 require_once('..//views/parts/footer.php'); ?>