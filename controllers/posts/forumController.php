<?php
require_once "../../models/users/usersModel.php" ;
require_once "../../models/forumModel.php" ;
require_once "../../models/posts/statusModel.php";
require_once "../../models/posts/topicsAnswersModel.php" ;
require_once "../../models/posts/commentsModel.php" ;
require_once "../../models/posts/topicsModel.php";
require_once "../../models/posts/categoriesModel.php";
require_once "../../models/posts/tagsModel.php";
require_once "../../models/posts/sectionsModel.php" ;
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
$latestUser = $user->getUser();
$userAccount = $user->getById();
$userDetails = $user->getList();
$userCount = count($userDetails);

$forums = new Forums;

$categories = new Categories;
$categoriesList = $categories->getList();

$tags = new Tags;
$tagsList = $tags->getList();

$topic = new Topics;
$topicsList = $topic->getList();
$latestTopic = $topic->getTopic();
$topicCount = count($topicsList);

$answers = new Answers;
$answersList = $answers->getList();
$latestAnswer = $answers->getAnswer();
$postCount = count($answersList);

$status = new Status;
$statusList = $status->getList();
$latestStatus = $status->getStatus();
$statusCount = count($statusList);

$totalCount = $postCount + $topicCount + $statusCount;

$title = 'MelodyTown';

require_once '../../views/parts/header.php';
require_once '../../views/pages/forum.php'; 
require_once '../../views/parts/footer.php';
?>