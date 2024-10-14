<?php

// les models de site et les utils
require_once '../../models/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';
require_once '../../controllers/users/sendMail.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new Users(); // Create a new user instance

    // Validate username
    if (!empty($_POST['username'])) {
        if (preg_match($regex['name'], $_POST['username'])) {
            $user->setUsername(clean($_POST['username']));
            if ($user->checkIfExistsByUsername() == 1) {
                $errors['username'] = USERS_USERNAME_ERROR_EXISTS;
            }
        } else {
            $errors['username'] = USERS_USERNAME_ERROR_INVALID;
        }
    } else {
        $errors['username'] = USERS_USERNAME_ERROR_EMPTY;
    }

    // Validate email
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->setEmail(clean($_POST['email']));
            if ($user->checkIfExistsByEmail() == 1) {
                $errors['email'] = USERS_EMAIL_ERROR_EXISTS;
            }
        } else {
            $errors['email'] = USERS_EMAIL_ERROR_INVALID;
        }
    } else {
        $errors['email'] = USERS_EMAIL_ERROR_EMPTY;
    }

    // Validate password
    if (!empty($_POST['password'])) {
        if (preg_match($regex['password'], $_POST['password'])) {
            if (!empty($_POST['password_confirm'])) {
                if ($_POST['password'] == $_POST['password_confirm']) {
                    $user->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
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

    // If there are no errors, proceed with user creation
    if (empty($errors)) {
        if ($user->create()) {
            // Send verification email
            $to = $user->getEmail();
            $subject = 'Confirm your registration';
            $message = 'Click the following link to confirm your registration: <a href="https://melodytown/verification?token=' . $user->getToken() . '">Verify Email</a>';
            $headers = 'From: kibongatsho31@gmail.com' . "\r\n" .
                'Content-type: text/html; charset=UTF-8' . "\r\n";

            // Send the email
            mail($to, $subject, $message, $headers);

            // Provide feedback to the user
            $success = '<p id="successMessage">Bienvenue! Un email de confirmation a été envoyé à votre adresse email. Veuillez vérifier votre boîte de réception pour terminer votre inscription.</p>';
        }
    }
}


$title = 'Inscription'; // titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/users/register.php';
require_once '../../views/parts/footer.php';
