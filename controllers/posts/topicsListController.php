<?php
require_once "../../models/posts/topicsModel.php";
require_once "../../models/posts/categoriesModel.php";
require_once "../../models/posts/tagsModel.php";
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

$tags = new Tags;
$tagsList = $tags->getList();

$categories = new Categories;
$categoriesList = $categories->getList();

$topic = new Topics;
$topicsList = $topic->getList();

 var_dump($topicsList);

require_once '../../views/parts/header.php';
require_once '../../views/posts/topicsList.php';
require_once '../../views/parts/footer.php';
?>