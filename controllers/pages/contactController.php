<?php

require_once '../../models/contactModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start(); // démarrage de la session

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


$title = 'contact'; // Titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/pages/contact.php';
require_once '../../views/parts/footer.php';
?>