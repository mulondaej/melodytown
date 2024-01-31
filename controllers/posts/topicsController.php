<?php
require_once "../../models/posts/topicsModel.php";
require_once "../../models/posts/topicsAnswersModel.php";
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

$categories = new Categories;
$categoriesList = $categories->getList();

$tags = new Tags;
$tagsList = $tags->getList();

$topic = new Topics;

$answers = new Answers;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['threadPost'])) {

    if (!empty($_POST['title'])) {
        if (preg_match($regex['title'], $_POST['title'])) {
            $topic->title = clean($_POST['title']);
        } else {
            $errors['title'] = TOPICS_TITLE_ERROR_INVALID;
        }
    } else {
        $errors['title'] = TOPICS_TITLE_ERROR;
    }

    if (!empty($_POST['content'])) {
        if (!preg_match($regex['content'], $_POST['content'])) {
            $topic->content = trim($_POST['content']);
        } else {
            $errors['content'] = TOPICS_CONTENT_ERROR_INVALID;
        }
    } else {
        $errors['content'] = TOPICS_CONTENT_ERROR;
    }


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

    if (empty($errors)) {
        $topic->id_users = $_SESSION['user']['id'];
        if ($topic->create()) {
            $success = TOPICS_SUCCESS;
        } else {
            $errors['add'] = TOPICS_ERROR;
        }
    } else {
        $errors['add'] = TOPICS_ERROR;
    }
}


$topicsList = $topic->getList();
$latestTopic = $topic->getTopic();
$topicCount = count($topicsList);

$answersList = $answers->getList();
$latestAnswer = $answers->getAnswer();
$postCount = count($answersList);

$totalCount = $postCount + $topicCount;

$title = 'Topics';

require_once '../../views/parts/header.php';
require_once '../../views/posts/topics.php';
require_once '../../views/parts/footer.php';



