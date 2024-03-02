<?php

// les models de site et les utils
require_once '../../models/topicsModel.php';
require_once '../../models/usersModel.php';
require_once '../../models/statusModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start(); // démarrage de la session

// Confirmer que l'utilisateur est bel et bien en ligne
if (!isset($_SESSION['user'])) {
    // Sinon, lui rediriger vers la page d'accueil ou de connexion
    header("Location: /connexion");
    exit();
}

// établissement des variables pour accéder aux données des modèles 
$user = new Users;
$user->id = $_SESSION['user']['id'];

$topic = new Topics;

$status = new Status;


// Vérifier si le formulaire d'édition d'informations a été soumis
if (isset($_POST['updateInfos'])) {

    // Vérifier si le champ "username" est rempli
    if (!empty($_POST['username'])) {
        // Vérifier si le format du "username" est valide
        if (preg_match($regex['name'], $_POST['username'])) {
            // Nettoie le "username"
            $user->username = clean($_POST['username']);
            // Vérifier si le "username" existe déjà dans la base de données (BDD)
            if ($user->checkIfExistsByUsername() == 1 && $user->username != $_SESSION['user']['username']) {
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
            $user->email = clean($_POST['email']);
            if ($user->checkIfExistsByEmail() == 1 && $user->email != $_SESSION['user']['email']) {
                $errors['email'] = USERS_EMAIL_ERROR_EXISTS;
            }
        } else {
            $errors['email'] = USERS_EMAIL_ERROR_INVALID;
        }
    } else {
        $errors['email'] = USERS_EMAIL_ERROR_EMPTY;
    }

    // Même logique que pour le "username" mais pour la date de naissance
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

    // Même logique que pour le "username" mais pour la location
    if (!empty($_POST['location'])) {
        if (preg_match($regex['name'], $_POST['location'])) {
            $user->location = clean($_POST['location']);
            if ($user->checkIfExistsByLocation() == 1 && $user->location != $_SESSION['user']['location']) {
                $errors['location'] = USERS_LOCATION_ERROR_EXISTS;
            }
        } else {
            $errors['location'] = USERS_LOCATION_ERROR_INVALID;
        }
    } else {
        $errors['location'] = USERS_LOCATION_ERROR_EMPTY;
    }

    // Si aucune erreur n'a été détectée, met à jour les informations de l'utilisateur
    if (empty($errors)) {
        if ($user->update()) {
            // Met à jour les informations de l'utilisateur dans la session
            $_SESSION['user']['username'] = $user->username;
            $_SESSION['user']['email'] = $user->email;
            $_SESSION['user']['location'] = $user->location;
            // Affichage d'un message de succès au cas de réussite
            $success = USERS_UPDATE_SUCCESS;
        } else {
            // sinon, afficher le message d'erreur de mise à jour qu cas d'echec
            $errors['update'] = USERS_UPDATE_ERROR;
        }
    }
}

// Mis à jour du mot de passe de l'utilisateur
if (isset($_POST['updatePassword'])) {

    if (!empty($_POST['password'])) {
        if (preg_match($regex['password'], $_POST['password'])) { // 
            if (!empty($_POST['password_confirm'])) {
                if ($_POST['password'] == $_POST['password_confirm']) {
                    // Hash le mot de passe
                    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                } else {
                    // sinon, afficher le message d'erreur 
                    $errors['password_confirm'] = USERS_PASSWORD_CONFIRM_ERROR_INVALID;
                }
            } else {
                // sinon, afficher le message d'erreur 
                $errors['password_confirm'] = USERS_PASSWORD_CONFIRM_ERROR_EMPTY;
            }
        } else {
            // sinon, afficher le message d'erreur
            $errors['password'] = USERS_PASSWORD_ERROR_INVALID;
        }
    } else {
        // sinon, afficher le message d'erreur
        $errors['password'] = USERS_PASSWORD_ERROR_EMPTY;
    }

    // Si aucune erreur n'a été détectée, met à jour le mot de passe de l'utilisateur
    if (empty($errors)) {
        if ($user->updatePassword()) {
            $success = USERS_PASSWORD_UPDATE_SUCCESS;// afficher le message de succès au cas de réussite
        } else {
            // sinon, afficher le message d'erreur de mise à jour au cas d'echec
            $errors['update'] = USERS_PASSWORD_UPDATE_ERROR;
        }
    }
}

// Mis à jour de username de l'utilisateur
if (isset($_POST['updateUsername'])) {
    if (!empty($_POST['username'])) {
        if (preg_match($regex['name'], $_POST['username'])) {
            $user->username = clean($_POST['username']);
            if ($user->checkIfExistsByUsername() == 1 && $user->username != $_SESSION['user']['username']) {
                $errors['username'] = USERS_USERNAME_ERROR_EXISTS;
            }
        } else {
            $errors['username'] = USERS_USERNAME_ERROR_INVALID;
        }
    } else {
        $errors['username'] = USERS_USERNAME_ERROR_EMPTY;
    }

    // Si aucune erreur n'a été détectée, met à jour l'email de l'utilisateur
    if (empty($errors)) {
        if ($user->updateUsername()) {
            $success = USERS_USERNAME_UPDATE_SUCCESS;// afficher le message de succès au cas de réussite
        } else {
            // sinon, afficher le message d'erreur de mise à jour au cas d'echec
            $errors['updat'] = USERS_USERNAME_UPDATE_ERROR;
        }
    }
}

// Mis à jour de l'email de l'utilisateur
if (isset($_POST['updateEmail'])) {
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->email = clean($_POST['email']);
            if ($user->checkIfExistsByEmail() == 1 && $user->email != $_SESSION['user']['email']) {
                $errors['email'] = USERS_EMAIL_ERROR_EXISTS;
            }
        } else {
            $errors['email'] = USERS_EMAIL_ERROR_INVALID;
        }
    } else {
        $errors['email'] = USERS_EMAIL_ERROR_EMPTY;
    }

    // Si aucune erreur n'a été détectée, met à jour l'email de l'utilisateur
    if (empty($errors)) {
        if ($user->updateEmail()) {
            $success = USERS_EMAIL_UPDATE_SUCCESS;// afficher le message de succès au cas de réussite
        } else {
            // sinon, afficher le message d'erreur de mise à jour au cas d'echec
            $errors['update'] = USERS_EMAIL_UPDATE_ERROR;
        }
    }
}

// Même logique que pour le "username" mais pour la location
if (isset($_POST['updateLocation'])) {
    if (!empty($_POST['location'])) {
        if (preg_match($regex['name'], $_POST['location'])) {
            $user->location = clean($_POST['location']);
            if ($user->checkIfExistsByLocation() == 1 && $user->location != $_SESSION['user']['location']) {
                $errors['location'] = USERS_LOCATION_ERROR_EXISTS;
            }
        } else {
            $errors['location'] = USERS_LOCATION_ERROR_INVALID;
        }
    } else {
        $errors['location'] = USERS_LOCATION_ERROR_EMPTY;
    }

    if (empty($errors)) {
        if ($user->updateLocation()) {
            $success = USERS_LOCATION_UPDATE_SUCCESS;// afficher le message de succès au cas de réussite
        } else {
            // sinon, afficher le message d'erreur de mise à jour au cas d'echec
            $errors['update'] = USERS_LOCATION_UPDATE_ERROR;
        }
    }
}

// mis a jour de l'avatar
if (isset($_POST['updateAvatar'])) {
    if (!empty($_FILES['avatar'])) {
        $imageMessage = checkImage($_FILES['avatar']);

        if ($imageMessage != '') {
            $errors['avatar'] = $imageMessage;
        } else {
            $user->id = $_SESSION['user']['id'];
            $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $user->avatar = uniqid() . '.' . $extension;

            // Check if avatar file already exists
            $upload_dir = '../../assets/IMG/';
            while (file_exists($upload_dir . $user->avatar)) {
                $user->avatar = uniqid() . '.' . $extension;
            }
            
            // Move uploaded file to the destination directory
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $upload_dir . $user->avatar)) {
                // Update user's avatar in the database
                if ($user->updateAvatar()) {
                    $success = IMAGE_SUCCESS;
                } else {
                    // If database update fails, remove uploaded avatar
                    unlink($upload_dir . $user->avatar);
                    $errors['add'] = IMAGE_ERROR;
                }
            } else {
                $errors['add'] = IMAGE_ERROR;
            }
        }
    }
}



// Suppression de l'utilisateur
if (isset($_POST['deleteAccount'])) {
    if ($user->delete()) {
        unset($_SESSION);
        session_destroy();
        header('Location: /accueil');
        exit;
    }
}


$userAccount = $user->getById();

$title = 'modification-de-compte'; // Titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/users/updateAccount.php';
require_once '../../views/parts/footer.php';
?>

<script src="assets/javaSc/modals.js"></script>
<script src="assets/javaSc/repliesModal.js"></script>