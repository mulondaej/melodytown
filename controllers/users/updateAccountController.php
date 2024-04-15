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
$user->fetchUserData($_SESSION['user']['id']); // Fetch user data from the database

$topic = new Topics;

$status = new Status;

// Check if the update infos form has been submitted
if (isset($_POST['updateInfos'])) {
    // Check if the "username" field is filled
    if (!empty($_POST['username'])) {
        // Check if the format of the "username" is valid
        if (preg_match($regex['name'], $_POST['username'])) {
            // Clean the "username"
            $user->setUsername(clean($_POST['username']));
            // Check if the "username" already exists in the database
            if ($user->checkIfExistsByUsername() == 1 && $user->getUsername() != $_SESSION['user']['username']) {
                // Display an error for the "username"
                $errors['username'] = USERS_USERNAME_ERROR_EXISTS;
            }
        } else {
            // Display an error for the "username"
            $errors['username'] = USERS_USERNAME_ERROR_INVALID;
        }
    } else {
        // Display an error for the "username"
        $errors['username'] = USERS_USERNAME_ERROR_EMPTY;
    }

    // Similar logic as above but for the email
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->setEmail(clean($_POST['email']));
            if ($user->checkIfExistsByEmail() == 1 && $user->getEmail() != $_SESSION['user']['email']) {
                $errors['email'] = USERS_EMAIL_ERROR_EXISTS;
            }
        } else {
            $errors['email'] = USERS_EMAIL_ERROR_INVALID;
        }
    } else {
        $errors['email'] = USERS_EMAIL_ERROR_EMPTY;
    }

    // Similar logic as above but for the birthdate
    if (!empty($_POST['birthdate'])) {
        if (preg_match($regex['date'], $_POST['birthdate'])) {
            if (checkDateValidity($_POST['birthdate'])) {
                $user->setBirthdate($_POST['birthdate']);
            } else {
                $errors['birthdate'] = USERS_BIRTHDATE_ERROR_INVALID;
            }
        } else {
            $errors['birthdate'] = USERS_BIRTHDATE_ERROR_INVALID;
        }
    } else {
        $errors['birthdate'] = USERS_BIRTHDATE_ERROR_EMPTY;
    }

    // Similar logic as above but for the location
    if (!empty($_POST['location'])) {
        if (preg_match($regex['name'], $_POST['location'])) {
            $user->setLocation(clean($_POST['location']));
            if ($user->checkIfExistsByLocation() == 1 && $user->getLocation() != $_SESSION['user']['location']) {
                $errors['location'] = USERS_LOCATION_ERROR_EXISTS;
            }
        } else {
            $errors['location'] = USERS_LOCATION_ERROR_INVALID;
        }
    } else {
        $errors['location'] = USERS_LOCATION_ERROR_EMPTY;
    }

    // If no errors are detected, update the user's information
    if (empty($errors)) {
        if ($user->updateUserInfos()) {
            // Update the user's information in the session
            $_SESSION['user']['username'] = $user->getUsername();
            $_SESSION['user']['email'] = $user->getEmail();
            $_SESSION['user']['location'] = $user->getLocation();
            // Display a success message in case of success
            $success = USERS_UPDATE_SUCCESS;
        } else {
            // Display the update error message in case of failure
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
                    $user->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
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

// Mis à jour du nom d'utilisateur de l'utilisateur
if (isset($_POST['updateUsername'])) {
    if (!empty($_POST['username'])) {
        if (preg_match($regex['name'], $_POST['username'])) {
            $user->setUsername(clean($_POST['username']));
            if ($user->checkIfExistsByUsername() == 1 && $user->getUsername() != $_SESSION['user']['username']) {
                $errors['username'] = USERS_USERNAME_ERROR_EXISTS;
            }
        } else {
            $errors['username'] = USERS_USERNAME_ERROR_INVALID;
        }
    } else {
        $errors['username'] = USERS_USERNAME_ERROR_EMPTY;
    }

    // Si aucune erreur n'a été détectée, met à jour le nom d'utilisateur de l'utilisateur
    if (empty($errors)) {
        if ($user->updateUserInfos()) {
            $success = USERS_USERNAME_UPDATE_SUCCESS; // Afficher le message de succès en cas de réussite
            $_SESSION['user']['username'] = $user->getUsername(); // Mettre à jour le nom d'utilisateur dans la session
        } else {
            $errors['update'] = USERS_USERNAME_UPDATE_ERROR; // Sinon, afficher le message d'erreur de mise à jour en cas d'échec
        }
    }
}

// Mis à jour de l'email de l'utilisateur
if (isset($_POST['updateEmail'])) {
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->setEmail(clean($_POST['email']));
            if ($user->checkIfExistsByEmail() == 1 && $user->getEmail() != $_SESSION['user']['email']) {
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
        if ($user->updateUserInfos()) {
            $success = USERS_EMAIL_UPDATE_SUCCESS; // Afficher le message de succès en cas de réussite
            $_SESSION['user']['email'] = $user->getEmail(); // Mettre à jour l'email dans la session
        } else {
            $errors['update'] = USERS_EMAIL_UPDATE_ERROR; // Sinon, afficher le message d'erreur de mise à jour en cas d'échec
        }
    }
}

// Même logique que pour le "username" mais pour la localisation
if (isset($_POST['updateLocation'])) {
    if (!empty($_POST['location'])) {
        if (preg_match($regex['name'], $_POST['location'])) {
            $user->setLocation(clean($_POST['location']));
            if ($user->checkIfExistsByLocation() == 1 && $user->getLocation() != $_SESSION['user']['location']) {
                $errors['location'] = USERS_LOCATION_ERROR_EXISTS;
            }
        } else {
            $errors['location'] = USERS_LOCATION_ERROR_INVALID;
        }
    } else {
        $errors['location'] = USERS_LOCATION_ERROR_EMPTY;
    }

    // Si aucune erreur n'a été détectée, met à jour la localisation de l'utilisateur
    if (empty($errors)) {
        if ($user->updateUserInfos()) {
            $success = USERS_LOCATION_UPDATE_SUCCESS; // Afficher le message de succès en cas de réussite
            $_SESSION['user']['location'] = $user->getLocation(); // Mettre à jour la localisation dans la session
        } else {
            $errors['update'] = USERS_LOCATION_UPDATE_ERROR; // Sinon, afficher le message d'erreur de mise à jour en cas d'échec
        }
    }
}

// Mis à jour de l'avatar de l'utilisateur
if (isset($_POST['updateAvatar'])) {
    // Vérifier si le fichier d'avatar n'est pas vide
    if (!empty($_FILES['avatar']['name'])) {
        // Appeler la fonction checkImage pour valider l'avatar téléchargé
        $imageMessage = checkImage($_FILES['avatar']);

        // S'il y a un message d'erreur retourné par la fonction checkImage, l'assigner à $errors['avatar']
        if ($imageMessage != '') {
            $errors['avatar'] = $imageMessage;
        } else {
            // Si l'avatar téléchargé est valide, procéder au traitement ultérieur
            $user->fetchUserData($_SESSION['user']['id']); // Récupérer les données de l'utilisateur depuis la base de données
            $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $user->setAvatar(uniqid() . '.' . $extension); // Définir le nom du nouvel avatar

            // Répertoire de destination pour le téléchargement de l'avatar
            $upload_dir = '../../assets/IMG/users/';

            // Déplacer le fichier téléchargé vers le répertoire de destination
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $upload_dir . $user->getAvatar())) {
                // Mettre à jour l'avatar de l'utilisateur dans la base de données
                if ($user->updateAvatar()) {
                    $success = 'La photo de profil a été mise à jour avec succès';
                } else {
                    // En cas d'échec de la mise à jour de la base de données, supprimer l'avatar téléchargé
                    unlink($upload_dir . $user->getAvatar());
                    $errors['update'] = 'Une erreur est survenue lors de la mise à jour de la base de données';
                }
            } else {
                $errors['update'] = 'Une erreur est survenue lors du téléchargement du fichier';
            }
        }
    }
}

// Mis à jour de la photo de couverture de l'utilisateur
if (isset($_POST['updateCoverPicture'])) {
    // Vérifier si le fichier de la photo de couverture n'est pas vide
    if (!empty($_FILES['image']['name'])) {
        // Appeler la fonction checkImage pour valider la photo de couverture téléchargée
        $imageMessage = checkImage($_FILES['image']);

        // S'il y a un message d'erreur retourné par la fonction checkImage, l'assigner à $errors['image']
        if ($imageMessage != '') {
            $errors['image'] = $imageMessage;
        } else {
            // Si la photo de couverture téléchargée est valide, procéder au traitement ultérieur
            $user->fetchUserData($_SESSION['user']['id']); // Récupérer les données de l'utilisateur depuis la base de données
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $user->setCoverPicture(uniqid() . '.' . $extension); // Définir le nom de la nouvelle photo de couverture

            // Répertoire de destination pour le téléchargement de la photo de couverture
            $upload_dir = '../../assets/IMG/users/';

            // Déplacer le fichier téléchargé vers le répertoire de destination
            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $user->getCoverPicture())) {
                // Mettre à jour la photo de couverture de l'utilisateur dans la base de données
                if ($user->updateCoverPicture()) {
                    $success = 'La bannière a été mise à jour avec succès';
                } else {
                    // En cas d'échec de la mise à jour de la base de données, supprimer la photo de couverture téléchargée
                    unlink($upload_dir . $user->getCoverPicture());
                    $errors['update'] = 'Une erreur est survenue lors de la mise à jour de la base de données';
                }
            } else {
                $errors['update'] = 'Une erreur est survenue lors du téléchargement du fichier';
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

<script src="assets/js/modals.js"></script>
<script src="assets/js/repliesModal.js"></script>