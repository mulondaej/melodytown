<?php

// les models de site et les utils
require_once '../../models/usersModel.php';
require_once '../../models/forumModel.php';
require_once '../../models/statusModel.php';
require_once '../../models/topicsRepliesModel.php';
require_once '../../models/commentsModel.php';
require_once '../../models/topicsModel.php';
require_once '../../models/categoriesModel.php';
require_once '../../models/tagsModel.php';
require_once '../../models/sectionsModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();

// établissement des variables pour accéder aux données des modèles 
$user = new Users;

if (!empty($_SESSION['user'])) {
    $user->fetchUserData($_SESSION['user']['id']);
    $userAccount = $user->getById();
}

$latestUser = $user->getLatestUser();
$userDetails = $user->getList();
$userCount = count($userDetails);

$forums = new Forums;

$categories = new Categories;
$categoriesList = $categories->getList();

$tags = new Tags;
$tagsList = $tags->getList();

$topic = new Topics;

// si la requete est de type POST (envoi du formulaire), on l'execute
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['threadPost'])) {
    // on récupère les données du formulaire
    if (!empty($_POST['title'])) { // si le titre n'est pas vide
        if (preg_match($regex['title'], $_POST['title'])) { // si le titre n'est pas vide
            $topic->title = clean($_POST['title']); // on récupère le titre en le nettoyant
        } else {
            $errors['title'] = TOPICS_TITLE_ERROR; // sinon, afficher le message d'erreur 
        }
    }

    // même logique de titre pour le contenu mais avec une regex plus large
    if (!empty($_POST['content'])) {
        if (!preg_match($regex['content'], $_POST['content'])) {
            $topic->content = trim($_POST['content']);
        }
    } else {
        $errors['content'] = TOPICS_CONTENT_ERROR;
    }

    // même logique pour les catégories 
    if (!empty($_POST['categories'])) {
        $categories->id = $_POST['categories'];
        if ($categories->checkIfExistsById() == 1) {
            $topic->id_categories = clean($_POST['categories']);
        } else {
            $errors['categories'] = TOPICS_CATEGORIES_ERROR_INVALID;
        }
    } else {
        $errors['categories'] = TOPICS_CATEGORIES_ERROR_EMPTY;
    }

    // même logique pour les tags
    if (!empty($_POST['tag'])) {
        $tags->id = $_POST['tag'];
        if ($tags->checkIfExistsById() == 1) {
            $topic->id_tags = clean($_POST['tag']);
        } else {
            $errors['tag'] = TOPICS_TAGS_ERROR_INVALID;
        }
    } else {
        $errors['tag'] = TOPICS_TAGS_ERROR_EMPTY;
    }

    // si les erreurs sont vides, alors on ajoute le topic
    if (empty($errors)) {
        $topic->id_users = $_SESSION['user']['id'];
        if ($topic->create()) {
            $success = TOPICS_SUCCESS;

            header("Location: /topics-par-categories");
            exit();
        } else {
            $errors['add'] = TOPICS_ERROR;
        }
    }
}

$topicsList = $topic->getList();
$topicCount = count($topicsList);
if ($topicCount > 0) {
    $latestTopic = $topic->getTopic();
}

$replies = new Replies;

$repliesList = $replies->getList();
$postCount = count($repliesList);

if ($postCount > 0) {
    $latestReply = $replies->getReply();
}



$status = new Status;
$statusList = $status->getList();
$latestStatus = $status->getStatus();
$statusCount = count($statusList);



$totalCount = $postCount + $topicCount + $statusCount; // total count de tous les publications : status; topics et replies 

$title = 'MelodyTown'; // Titre de la page

//  Inclusion des fichiers: header, du view et du footer 

require_once('../../views/parts/header.php');
require_once('../../index.php');
require_once('../../views/parts/footer.php');
?>

<script src="../../assets/js/topic.js"></script>