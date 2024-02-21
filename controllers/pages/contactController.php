<?php

require_once '../../models/contactModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start(); // démarrage de la session

$contact = new Contact;

// si la requête est de type POST et que l'utilisateur clique sur le bouton envoyer, on traite les données du formulaire
if (isset($_POST['sendMessage'])) {

    if (!empty($_POST['username'])) {
        // Vérifier si le format du "username" est valide
        if (!preg_match($regex['username'], $_POST['username'])) {
            // Nettoie le "username"
            $contact->username = clean($_POST['username']);
            // Vérifier si le "username" existe déjà dans la base de données (BDD)
            if ($contact->checkIfExistsByUsername() == 1 && $contact->username != $_SESSION['user']['username']) {
                // sinon, afficher une erreur pour le "username"
                $errors['username'] = USERS_USERNAME_ERROR_EXISTS;
            }
        } else {
            // sinon, afficher une erreur pour le "username"
            $errors['username'] = USERS_USERNAME_ERROR_INVALID;
        }
    } else {
        // sinon, afficher une erreur pour le "username"
        $errors['username'] = USERS_USERNAME_ERROR_EMPTY;
    }

    // Même logique que pour le "username" mais pour l'email
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $contact->email = clean($_POST['email']);
            if ($contact->checkIfExistsByEmail() == 1 && $contact->email != $_SESSION['user']['email']) {
                $errors['email'] = USERS_EMAIL_ERROR_EXISTS;
            }
        } else {
            $errors['email'] = USERS_EMAIL_ERROR_INVALID;
        }
    } else {
        $errors['email'] = USERS_EMAIL_ERROR_EMPTY;
    }
    
    // on récupère les données du formulaire
    if (!empty($_POST['subject'])) { // si le titre n'est pas vide
        if (!preg_match($regex['subject'], $_POST['subject'])) { // si le titre n'est pas vide
            $contact->subject = clean($_POST['subject']); // on récupère le titre en le nettoyant
        } else {
            $errors['subject'] = TOPICS_TITLE_ERROR_INVALID; // sinon, afficher le message d'erreur invalid
        }
    } else {
        $errors['subject'] = TOPICS_TITLE_ERROR; // sinon, afficher le message d'erreur 
    }

    if (!empty($_POST['message'])) {  // si le contenu n'est pas vide
        if (!preg_match($regex['message'], $_POST['message'])) { // si le contenu n'est pas valide
            $contact->message = clean($_POST['message']); // on le trim
        } else {
            $errors['message'] = CONTACT_ERROR;  // sinon, afficher le message d'erreur
        }
    } else {
        $errors['message'] = CONTACT_ERROR; // sinon, afficher le message d'erreur
    }

    // si les erreurs sont vides, le message sera bel et bien envoyé dans le BDD 
    if (empty($errors)) {
        
        if ($contact->create()) {
            $success = CONTACT_SUCCESS;
        } else {
            $errors['add'] = CONTACT_ERROR;
        }
    } else {
        $errors['add'] = CONTACT_ERROR;
    }

}


$contactList = $contact->getList();
$latestContact = $contact->getMessage();
$contactCount = count($contactList);

$title = 'contact'; // Titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/pages/contact.php';
require_once '../../views/parts/footer.php';
?>
