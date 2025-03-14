<?php

// les models de site et les utils
require_once '../../models/usersModel.php' ;
require_once '../../models/likesModel.php' ;
require_once "../../models/topicsModel.php";
require_once "../../models/topicsRepliesModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start(); // démarrage de la session

$user = new Users;

if(!empty($_SESSION['user'])) {
$user->fetchUserData($_SESSION['user']['id']);
$userAccount = $user->getById();
}

$topic = new Topics();

$topic->id = (int) $_GET['id'];

if ($topic->checkIfExistsById() == 0) { // si le topic n'existe pas, on redirige vers l'accueil
    header('Location: /topics-par-categories');
    exit;
}

$replies = new Replies();

$replies->id_topics = (int) $_GET['id']; // on récupère l'id du topic

$replies->id_users = (int) $_GET['id']; // on récupère l'id de l'utilisateur qui a posté ce commentaire


$likes = new Likes();
$likes->id_topics = (int) $_GET['id'];
$likes->id_topicreplies = (int) $_GET['id']; 
$likes->id_comments = (int) $_GET['id'];
$likes->id_status = (int) $_GET['id'];
$likes->id_users = (int) $_GET['id']; 



// si la requete est de type POST (envoi du formulaire), on l'traite
if (isset($_POST['reply'])) {
    if (!empty($_POST['replyTextBar'])) { // si le contenu n'est pas vide
        if (!preg_match($regex['reponse'], $_POST['replyTextBar'])) {
            $replies->content = htmlspecialchars($_POST['replyTextBar']); // si le contenu est valide, on l'ajoute le reply
        } else {
            $errors['content'] = TOPICS_REPLIES_ERROR; // sinon, afficher le message d'erreur 
        }
    } else {
        $errors['content'] = TOPICS_REPLIES_ERROR; // sinon, afficher le message d'erreur 
    }

    $replies->id_topics = $topic->id;  // id-topics des $replies sera pareil que l'id du $topic
    $replies->id_users = $_SESSION['user']['id']; // id-users des $replies sera pareil que l'id de l'utilisateur connecté

    // si les erreurs sont vides, alors on ajoute les réponses($replies)
    if (empty($errors)) {
        if ($replies->create()) {
            $success = TOPICS_REPLIES_SUCCESS;
        } else {
            $errors['add'] = TOPICS_REPLIES_ERROR;
        }
    }
}

if (isset($_POST['liked'])) {
    if (!empty($_POST['liked'])) { // si le contenu n'est pas vide
        if (!preg_match($regex['content'], $_POST['liked'])) {
            $likes->id_topics = $_POST['liked']; // si le contenu est valide, on l'ajoute le reply
        } else {
            $errors['content'] = TOPICS_REPLIES_ERROR; // sinon, afficher le message d'erreur 
        }
    } else {
        $errors['content'] = TOPICS_REPLIES_ERROR; // sinon, afficher le message d'erreur 
    }

    // si les erreurs sont vides, alors on ajoute les réponses($replies)
    if (empty($errors)) {
        if ($likes->create()) {
            $likes->id_topics = "liked";
            $success = "Liked";
        } else {
            $errors['add'] = "error";
        }
    }
}


// Même logique pour la suppression des topics mais avec precision de l'id 
if (isset($_POST['deleteReply'])) {
    $replies->id = $_POST['idDelete']; // id du reply à supprimer
    if ($replies->delete()) {
        header('Location: /topic-' . $topic->id);
        exit;
    }
}


// si l'envoi de $_POST variable existe, alors mets les contenus du reponse à jour
if (isset($_POST['updateReply'])) {
    if (!empty($_POST['repliesUpdate'])) { // Même logique que pour la case de titre mais pour les réponses ou commentaires
        if (!preg_match($regex['reponse'], $_POST['repliesUpdate'])) { // si le contenu est valide, on l'ajoute le reply
            $replies->content = clean($_POST['repliesUpdate']);
            if ($replies->checkIfExistsByContent() == 1) { // si le contenu existe déjà, le message d'erreur s'affichera
                $errors['reponse'] = TOPIC_REPLIES_UPDATE_ERROR;
            }
        } else {
            $errors['reponse'] = TOPICS_REPLIES_ERROR;
        }
    } else {
        $errors['reponse'] = TOPIC_REPLIES_UPDATE_ERROR;
    }
    // si les erreurs sont vides, alors mets le contenu du réponse à jour
    if (empty($errors)) {
        $replies->id_users = $_SESSION['user']['id'];
        $replies->id = $_POST['repliesid'];
        if ($replies->update()) {
            $replies->content = $_POST['repliesUpdate'];
            $success = TOPIC_REPLIES_UPDATE_SUCCESS;
        } else {
            $errors['update'] = TOPIC_REPLIES_UPDATE_ERROR;
        }
    }
}

// update content seulement
if (isset($_POST['updateContent'])) { // Même logique que pour l'update de replies mais pour le contenu du topic
    if (!empty($_POST['contentUpdate'])) {
        if (!preg_match($regex['content'], $_POST['contentUpdate'])) {
            $topic->content = clean($_POST['contentUpdate']);
            if ($topic->checkIfExistsByContent() == 1) {
                $errors['content'] = TOPIC_CONTENT_UPDATE_ERROR;
            }
        } else {
            $errors['content'] = TOPICS_CONTENT_ERROR;
        }
    } else {
        $errors['content'] = TOPIC_CONTENT_UPDATE_ERROR_INVALID;
    }
    if (empty($errors)) { // si les erreurs sont vides, alors mets le contenu du topic à jour dans la BDD
        $topic->id_users = $_SESSION['user']['id'];
        if ($topic->updateContent()) {
            $topic->content;
            $success = TOPIC_CONTENT_UPDATE_SUCCESS;
        } else {
            $errors['update'] = TOPIC_CONTENT_UPDATE_ERROR;
        }
    }
}

// si l'envoi de delete est déclenche, le topic sera supprimé
if (isset($_POST['deleteTopic'])) {
    if ($topic->delete()) {
        (header('Location: /topics-par-categories'));
        exit;
    }
}


// Assume `$page` is the current page number from GET parameters or default to 1
$pages = $replies->page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$replies->repliesPerPage = 10;
$replies->offset = ($replies->page - 1) * $replies->repliesPerPage;

$totalPage = ceil($pages);
$pagesList =  $replies->getRepliesByTopics();
if ($pagesList !== false) {
    if ($totalPage > 0) {
        $getPage = $replies->getPage();
    }
}

// Fetch topic details
$topicsDetails = $topic->getById();

if ($topicsDetails === false) {
    // Handle the case where the topic was not found
    $errors['topic'] = 'Topic not found.';
    // Redirect or display an error message
    header('Location: /topics-par-categories');
    exit;
}

// $topicsDetails = $topic->getById();

$repliesList = $replies->getRepliesByTopics();
$countReply = count($repliesList);

// if ($repliesList !== false) {
//     if ($countReply > 0) {
//         $getReply = $replies->getRepliesByTopics();
//     }
// }

$title = $topicsDetails->title; // Titre de la page sera le nom du topic


//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/topics/topic.php';
// require_once '../../views/replies/topicReplies.php';
require_once '../../views/parts/footer.php';
?>

<script src="assets/js/topic.js"></script>
<script src="assets/js/modals.js"></script>
<script src="assets/js/replies.js"></script>
<script src="assets/js/pagination.js"></script>