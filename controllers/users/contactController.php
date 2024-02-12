<?php

require_once '../../models/users/usersModel.php';
require_once '../../models/users/contactModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start(); // démarrage de la session

if(empty($_SESSION['user'])){ // si l'utilisateur n'est pas en ligne
    header('Location: /connexion'); // le rediriger vers la page d'accueil
    exit;
}

// établissement des variables pour accéder aux données des modèles 
$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();
$userDetails = $user->getList();
$userCount = count($userDetails);

$contact = new Contact;

// si la requête est de type POST et que l'utilisateur clique sur le bouton envoyer, on traite les données du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sendMessage'])) {

    if (!empty($_POST['contact'])) {  // si le contenu n'est pas vide
        if (!preg_match($regex['contact'], $_POST['contact'])) { // si le contenu n'est pas valide
            $contact->message = trim($_POST['contact']); // on le trim
        } else {
            $errors['contact'] = CONTACT_ERROR;  // sinon, afficher le message d'erreur
        }
    } else {
        $errors['contact'] = CONTACT_ERROR; // sinon, afficher le message d'erreur
    }

    // si les erreurs sont vides, le message sera bel et bien envoyé dans le BDD 
    if (empty($errors)) {
        $contact->id_users = $_SESSION['user']['id'];
        if ($contact->create()) {
            $success = CONTACT_SUCCESS;
        } else {
            $errors['add'] = CONTACT_ERROR;
        }
    } else {
        $errors['add'] = CONTACT_ERROR;
    }
}

if(isset($_POST['updateMessage'])) { // si le POST variable est déclenché, 

    if (!empty($_POST['contact'])) { // si le contenu n'est pas vide
        if (preg_match($regex['contact'], $POST['contact'])) { // si le contenu n'est pas valide
            $contact->message = clean($_POST['contact']); // on le nettoie
            if ($contact->checkIfExistsByEmail() == 1 ) { // si l'utilisateur existe déjà
                $errors['contact'] = CONTACT_UPDATE_ERROR; // afficher le message d'erreur
            }
        } else {
            $errors['contact'] = CONTACT_UPDATE_SUCCESS; // sinon, afficher le message de succès
        }
    } else {
        $errors['contact'] = CONTACT_UPDATE_ERROR; // sinon, afficher le message d'erreur
    }

    // si les erreurs sont vides, le message sera mis au jour
    if(empty($errors)) {
        $contact->id_users = $_SESSION['user']['id'];
        if($contact->update()){
              $contact->message;
            $success = CONTACT_SUCCESS;
        } else {
            $errors['update'] = CONTACT_ERROR;
        }
    }
}

if (isset($_POST['deleteMessage'])) { // si le POST variable est déclenché, 
    if (isset($_POST['contact'])) { 
        if ($contact->delete()) { // on supprime le message
            unset($_POST);
            header('Location: /accueil');
            exit;
        }
    }
}

$title = 'contact'; // Titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/users/contact.php';
require_once '../../views/parts/footer.php';
?>