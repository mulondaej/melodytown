<?php

// les models de site et les utils
require_once "../../models/posts/topicsModel.php";
require_once "../../models/posts/topicsRepliesModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';
// $title = $topicDetails->title; // Titre de la page

session_start(); // démarrage de la session

$topic = new Topics();

$topic->id = $_GET['id'];

if($topic->checkIfExistsById() == 0) { // si le topic n'existe pas, on redirige vers l'accueil
    header('Location: /topics');
    exit;
}

$replies = new Replies();

$topicsDetails = $topic->getById();

// si la requete est de type POST (envoi du formulaire), on l'traite
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reply'])) {
    if(!empty($_POST['reply'])) { // si le contenu n'est pas vide
        if(!preg_match($regex['reply'], $_POST['reply'])) { 
            $replies->content = $_POST['reply']; // si le contenu est valide, on l'ajoute le reply
        } else {
            $errors['reply'] = TOPICS_REPLIES_ERROR; // sinon, afficher le message d'erreur 
        }
    } else {
        $errors['reply'] = TOPICS_REPLIES_ERROR; // sinon, afficher le message d'erreur 
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

// $topicsList = $topic->getList();

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/posts/thread.php';
require_once '../../views/replies/topicReplies.php';
require_once '../../views/parts/footer.php';