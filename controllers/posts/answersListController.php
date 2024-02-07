<?php
require_once "../../models/posts/topicsModel.php";
require_once "../../models/posts/topicsAnswersModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start();
  
// // Confirmation que l'utilisateur est bel et bien en ligne
// if (!isset($_SESSION['user'])) {
//     // Sinon, lui rediriger vers la page d'accueil ou de connexion
//     header("Location: /connexion");
//     exit();
// }

$topic = new Topics;
$topicsList = $topic->getList();
$latestTopic = $topic->getTopic();
$topicCount = count($topicsList);

$answers = new Answers;
$answersList = $answers->getList();
$latestAnswer = $answers->getAnswer();
$postCount = count($answersList);

$totalCount = $postCount + $topicCount;

$title = 'Topics-List';

//  var_dump($topicsList);

require_once '../../views/parts/header.php';
require_once '../../views/replies/TopicAnswersList.php';
require_once '../../views/parts/footer.php';
?>