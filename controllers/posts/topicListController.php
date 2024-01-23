<?php
require_once "../../models/topicsModel.php" ;
require_once "../../models/categoriesModel.php" ;
require_once "../../models/tagsModel.php" ;
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

$topic = new Topics;
 $topicsList = $topic->getList();

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $topic = new Topics;
//     $topicList = $topic->getList();

//     if ($topic->checkIfExistsById() == 1) {
//         $topic->id = clean($_POST['topic']);
//     } else {
//         $errors['topic'] = TOPICS_ERROR;
//     }
// }

require_once '../../views/parts/header.php';
require_once '../../views/parts/footer.php';
?>