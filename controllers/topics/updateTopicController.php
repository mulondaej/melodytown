<?php

// les models de site et les utils
require_once "../../models/topicsRepliesModel.php" ;
require_once "../../models/commentsModel.php" ;
require_once "../../models/topicsModel.php";
require_once "../../models/categoriesModel.php";
require_once "../../models/tagsModel.php";
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
$topic->id = (int) $_GET["id"];
$topicsList = $topic->getList();
$topicsDetails = $topic->getById();

$categories = new Categories;
$categoriesList = $categories->getList();

$tags = new Tags;
$tagsList = $tags->getList();

// si l'envoi de $_POST variable existe
if(isset($_POST['updateTopic'])) { // si le formulaire est envoyé

    if (!empty($_POST['title'])) { // si le titre n'est pas vide
        if (preg_match($regex['title'], $_POST['title'])) { // si le titre est valide
            $topic->title = clean($_POST['title']); // on récupère le nouveau titre en le nettoyant
            if ($topic->checkIfExistsByTitle() == 1) { // si le titre existe déjà dans la BDD
                $errors['title'] = TOPIC_TITLE_UPDATE_ERROR;  // afficher le message d'erreur
            }
        } else {
            $errors['title'] = TOPIC_TITLE_UPDATE_ERROR; // sinon, afficher le message de succes
        }
    } else {
        $errors['title'] = TOPIC_TITLE_UPDATE_ERROR_INVALID; // sinon, afficher le message d'erreur
    }


    // Même logique que pour la case de titre mais pour le contenu
    if (!empty($_POST['content'])) {
        if (!preg_match($regex['content'], $_POST['content'])) {
            $topic->content = clean($_POST['content']);
            if ($topic->checkIfExistsByContent() == 1 ) {
                $errors['content'] = TOPIC_CONTENT_UPDATE_ERROR_INVALID;
            }
        } else {
            $errors['content'] = TOPIC_CONTENT_UPDATE_ERROR;
        }
    } else {
        $errors['content'] = 'le nouveau contenu ne doit pas être vide';
    }


    if (!empty($_POST['categories'])) { // si la catégorie n'est pas vide
        $categories->id = $_POST['categories'];
        if ($categories->checkIfExistsById() == 1) { // si la catégorie existe déjà dans la BDD
            $topic->id_categories = $_POST['categories'];
        } else {
            $errors['categories'] = TOPIC_TAG_CATEGORIE_UPDATE_ERROR; // sinon, afficher le message d'erreur
        }
    } else {
        $errors['categories'] = TOPIC_TAG_CATEGORIE_UPDATE_ERROR; // sinon, afficher le message d'erreur
    }

    // Même logique que pour la case de catégories mais pour les tags
    if (!empty($_POST['tag'])) {
        $tags->id = $_POST['tag'];
        if ($tags->checkIfExistsById() == 1) {
            $topic->id_tags = $_POST['tag'];
        } else {
            $errors['tag'] = TOPIC_TAG_CATEGORIE_UPDATE_ERROR;
        }
    } else {
        $errors['tag'] = TOPIC_TAG_CATEGORIE_UPDATE_ERROR;
    }

    // si les erreurs sont vides, alors mets les informations du topic à jour
    if(empty($errors)) {
        if($topic->update()){
            $success = TOPIC_UPDATE_SUCCESS;
        } else {
            $errors['update'] = TOPIC_UPDATE_ERROR;
        }
    }
}


// si l'envoi de delete est déclenche, le topic sera supprimé
if(isset($_POST['deleteTopic'])) {
    if($topic->delete()) {
        header('Location: /liste-topics');
        exit;
    }
}


$title = 'Topic-update'; // Titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/topics/updateTopic.php';
require_once '../../views/parts/footer.php';





