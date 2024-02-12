<?php

// les models de site et les utils
require_once '../../models/users/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();

// si la requete est de type POST (envoi du formulaire), on l'traite
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new Users(); // création d'un nouvel utilisateur

    if (!empty($_POST['username'])) { // si la case de nom n'est pas vide
        if (preg_match($regex['name'], $_POST['username'])) { // si le nom est valide, on l'ajoute le utilisateur
            $user->username = clean($_POST['username']); // on récupère le nom de l'utilisateur en le nettoyant
            if ($user->checkIfExistsByUsername() == 1) {    // on récupère le nombre de résultats (=1 si il existe, sinon 0)
                $errors['username'] = USERS_USERNAME_ERROR_EXISTS; // sinon, afficher le message d'erreur
            }
        } else {
            $errors['username'] = USERS_USERNAME_ERROR_INVALID; // sinon, afficher le message d'erreur invalide
        }
    } else {
        $errors['username'] = USERS_USERNAME_ERROR_EMPTY;   // sinon, afficher le message d'erreur vides
    }

    // même logique de nom pour l'addresse mail
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // si l'adresse email est valide
            $user->email = clean($_POST['email']);
            if ($user->checkIfExistsByEmail() == 1) {
                $errors['email'] = USERS_EMAIL_ERROR_EXISTS;
            }
        } else {
            $errors['email'] = USERS_EMAIL_ERROR_INVALID;
        }
    } else {
        $errors['email'] = USERS_EMAIL_ERROR_EMPTY;
    }

    // même logique de nom pour le mot de passe mais avec hashement du password ou mot de passe
    if (!empty($_POST['password'])) {
        if (preg_match($regex['password'], $_POST['password'])) {
            if (!empty($_POST['password_confirm'])) {
                if ($_POST['password'] == $_POST['password_confirm']) {
                    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT); // on hash le mot de passe
                } else {
                    $errors['password_confirm'] = USERS_PASSWORD_CONFIRM_ERROR_INVALID;
                }
            } else {
                $errors['password_confirm'] = USERS_PASSWORD_CONFIRM_ERROR_EMPTY;
            }
        } else {
            $errors['password'] = USERS_PASSWORD_ERROR_INVALID;
        }
    } else {
        $errors['password'] = USERS_PASSWORD_ERROR_EMPTY;
    }

    // même logique de nom pour la date de naissance mais avec la fonction de formatage de date
    if (!empty($_POST['birthdate'])) {
        if (preg_match($regex['date'], $_POST['birthdate'])) {
            if (checkDateValidity($_POST['birthdate'])) {
                $user->birthdate = $_POST['birthdate'];
            } else {
                $errors['birthdate'] = USERS_BIRTHDATE_ERROR_INVALID;
            }
        } else {
            $errors['birthdate'] = USERS_BIRTHDATE_ERROR_INVALID;
        }
    } else {
        $errors['birthdate'] = USERS_BIRTHDATE_ERROR_EMPTY;
    }

    // si les erreurs sont vides, l'utilisateur sera ajouté dans le BDD et inscrit dans le forum
    if (empty($errors)) {
        if($user->create()) {
            $success = '<p id=successMessage">Bienvenue! Vous êtes bel et bien inscript dans le forum. Vous pouvez vous ' 
            . '<a href="/connexion"> connecter maintenant </a></p>';
        }
    }
}

$title = 'Inscription'; // titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/users/register.php';
require_once '../../views/parts/footer.php';
