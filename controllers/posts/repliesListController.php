<?php
// les models de site et les utils
require_once "../../models/posts/topicsModel.php";
require_once "../../models/posts/topicsRepliesModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start(); // démarrqge de la session
  
// // Confirmation que l'utilisateur est bel et bien en ligne
// if (!isset($_SESSION['user'])) {
//     // Sinon, lui rediriger vers la page d'accueil ou de connexion
//     header("Location: /connexion");
//     exit();
// }

// établissement des variables pour accéder aux données des modèles 
$topic = new Topics;
$topicsList = $topic->getList();
$latestTopic = $topic->getTopic();
$topicCount = count($topicsList);

$replies = new Replies;
$repliesList = $replies->getList();
$latestReply = $replies->getReply();
$postCount = count($repliesList);

$totalCount = $postCount + $topicCount; // total number of topics and replies


$title = 'Topics-List'; // Titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php'; 
require_once '../../views/replies/TopicRepliesList.php';
require_once '../../views/parts/footer.php';
?>