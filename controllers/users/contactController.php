<?php

require_once '../../models/users/usersModel.php';
require_once '../../models/users/contactModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start();

if(empty($_SESSION['user'])){
    header('Location: /connexion');
    exit;
}

$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();
$userDetails = $user->getList();
$userCount = count($userDetails);

$contact = new Contact;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sendMessage'])) {

    if (!empty($_POST['contact'])) {
        if (!preg_match($regex['contact'], $_POST['contact'])) {
            $contact->message = trim($_POST['contact']);
        } else {
            $errors['contact'] = CONTACT_ERROR;
        }
    } else {
        $errors['contact'] = CONTACT_ERROR;
    }

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


if(isset($_POST['updateMessage'])) {

    if (!empty($_POST['contact'])) {
        if (preg_match($regex['contact'], $POST['contact'])) {
            $contact->message = clean($_POST['contact']);
            if ($contact->checkIfExistsByEmail() == 1 ) {
                $errors['contact'] = CONTACT_UPDATE_ERROR;
            }
        } else {
            $errors['contact'] = CONTACT_UPDATE_SUCCESS;
        }
    } else {
        $errors['contact'] = CONTACT_UPDATE_ERROR;
    }

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

if (isset($_POST['deleteMessage'])) {
    if (isset($_POST['contact'])) {
        if ($contact->delete()) {
            unset($_POST);
            header('Location: /accueil');
            exit;
        }
    }
}

$title = 'contact';

require_once '../../views/parts/header.php';
require_once '../../views/users/contact.php';
require_once '../../views/parts/footer.php';
?>