<?php

// les models de site et les utils
require_once "../../models/topicsModel.php";
require_once "../../models/topicsRepliesModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start(); // démarrage de la session

$topic = new Topics();

$topic->id = (int)$_GET['id'];

if($topic->checkIfExistsById() == 0) { // si le topic n'existe pas, on redirige vers l'accueil
    header('Location: /topics');
    exit;
}

if(isset($_POST['deleteTopic'])) {
    if($topic->delete()) {
        header('Location: /topics');
        exit;
    }
}

$replies = new Replies();

$replies->id_topics = (int)$_GET['id'];

$replies->id_users = (int)$_GET['id'];

$topicsDetails = $topic->getById();

$repliesList = $replies->getRepliesByTopics();

// si la requete est de type POST (envoi du formulaire), on l'traite
if(isset($_POST['reply'])) {
    if(!empty($_POST['comments'])) { // si le contenu n'est pas vide
        if(!preg_match($regex['content'], $_POST['comments'])) { 
            $replies->content = $_POST['comments']; // si le contenu est valide, on l'ajoute le reply
        } else {
            $errors['comments'] = TOPICS_REPLIES_ERROR; // sinon, afficher le message d'erreur 
        }
    } else {
        $errors['comments'] = TOPICS_REPLIES_ERROR; // sinon, afficher le message d'erreur 
    }
   
    $replies->id_topics = $topic->id;  // id-topics des $replies sera pareil que l'id du $topic
    $replies->id_users = $_SESSION['user']['id']; // id-users des $replies sera pareil que l'id de l'utilisateur connecté

    // si les erreurs sont vides, alors on ajoute les réponses($replies)
    if(empty($errors)) {
        if($replies->create()) {
            $success = TOPICS_REPLIES_SUCCESS;
        } else {
            $errors['add'] = TOPICS_REPLIES_ERROR;
        }
    } 
}

// si l'envoi de $_POST variable existe, alors mets les contenus du reponse à jour
if(isset($_POST['updateReply'])) {

    // Même logique que pour la case de titre mais pour les réponses ou commentaires
    if (!empty($_POST['content'])) {
        if (!preg_match($regex['content'], $POST['content'])) {
            $replies->content = clean($_POST['content']);
            if ($replies->checkIfExistsByContent() == 1 ) {
                $errors['content'] = TOPIC_REPLIES_UPDATE_ERROR;
            }
        } else {
            $errors['content'] = TOPIC_REPLIES_UPDATE_SUCCESS;
        }
    } else {
        $errors['content'] = TOPIC_REPLIES_UPDATE_ERROR;
    }

    // si les erreurs sont vides, alors mets le contenu du réponse à jour
    if(empty($errors)) {
        $replies->id_users = $_SESSION['user']['id'];
        if($replies->update()){
              $replies->content;
            $success = TOPIC_UPDATE_SUCCESS;
        } else {
            $errors['update'] = TOPIC_UPDATE_ERROR;
        }
    }

    if (empty($errors)) {
        if($replies->create()) {
            $success = '<p id=successMessage">Votre réponse vient d\'être publié avec succès </a></p>';
        }
    }
}

// Même logique pour la suppression des topics
if(isset($_POST['deleteReply'])) {
    if($topic->delete()) {
        header('Location: /liste-topics');
        exit;
    }
}

if (isset($_POST['updateContent'])) {
    if (!empty($_POST['content'])) {
        if (!preg_match($regex['content'], $POST['content'])) {
            $topic->content = clean($_POST['content']);
            if ($topic->checkIfExistsByContent() == 1) {
                $errors['content'] = TOPIC_CONTENT_UPDATE_ERROR;
            }
        } else {
            $errors['content'] = TOPIC_CONTENT_UPDATE_ERROR;
        }
    } else {
        $errors['content'] = TOPIC_CONTENT_UPDATE_ERROR;
    }

    if(empty($errors)) {
        if($topic->updateContent()){
            $success = TOPIC_UPDATE_SUCCESS;
        } else {
            $errors['update'] = TOPIC_UPDATE_ERROR;
        }
    }
}

// si l'envoi de delete est déclenche, le topic sera supprimé
if(isset($_POST['deleteTopic'])) {
    if($topic->delete()) {
        (header('Location: /liste-topics'));
        $title = 'Deleted';
        exit;
    }
}

if (isset($_POST['replyRepliesBtn']))  {
 echo $_POST['comments'] = $quotedReply .= " << ". $replies->content . ">>" . "\n";
} else if(isset($_POST['replyBtn'])) {
    echo $_POST['comments'] = $quotedText .= " << ". $replies->content . ">>" . "\n";
}

// $reply .= "> " . $quotedText . "\n";

$title = $topicsDetails->title; // Titre de la page sera le nom du topic


//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/topics/topic.php';
require_once '../../views/replies/topicReplies.php';
require_once '../../views/parts/footer.php';

