<?php
require_once "../../models/topicsModel.php" ;
require_once "../../models/topicAnswersModel.php" ;
require_once "../../models/commentsModel.php" ;
require_once "../../models/categoriesModel.php" ;
require_once "../../models/tagsModel.php" ;
require_once "../../models/sectionsModel.php" ;
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

$posts = new Topics;
$postsList = $posts->getList();

require_once '../../views/parts/header.php';
require_once '../../views/posts/topicList.php'; 
require_once '../../views/parts/footer.php';
?>