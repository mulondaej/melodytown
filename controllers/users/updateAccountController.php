<?php
require_once '../../models/users/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start();

// Confirmation que l'utilisateur est bel et bien en ligne
if (!isset($_SESSION['user'])) {
    // Sinon, lui rediriger vers la page d'accueil ou de connexion
    header("Location: /connexion");
    exit();
}

$user = new Users;
$user->id = $_SESSION['user']['id'];

if(isset($_POST['updateInfos'])) {

    

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
    
    
    
    if(empty($errors)) {
        if($user->update()){
            $_SESSION['user']['username'] = $user->username;
            $_SESSION['user']['email'] = $user->email;
            $success = USERS_UPDATE_SUCCESS;
        } else {
            $errors['update'] = USERS_UPDATE_ERROR;
        }
    }
}

if(isset($_POST['updatePassword'])) {
    
    if (!empty($_POST['password'])) {
        if (preg_match($regex['password'], $_POST['password'])) {
            if (!empty($_POST['password_confirm'])) {
                if ($_POST['password'] == $_POST['password_confirm']) {
                    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
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

    if(empty($errors)) {
        if($user->updatePassword()){
            $success = USERS_PASSWORD_UPDATE_SUCCESS;
        } else {
            $errors['update'] = USERS_PASSWORD_UPDATE_ERROR;
        }
    }
}

if(isset($_POST['deleteAccount'])) {
    if($user->delete()) {
        unset($_SESSION);
        session_destroy();
        header('Location: /compte-supprime');
        exit;
    }
}


$userAccount = $user->getById();

$title = 'Account-update';

require_once '../../views/parts/header.php';
require_once '../../views/users/updateAccount.php';
require_once '../../views/parts/footer.php';

// if (!empty($_POST['location'])) {
    //     if (preg_match($regex['location'], $_POST['location'])) {
    //         $user->location = clean($_POST['location']);
    //         if ($user->checkIfExistsByLocation() == 1 && $user->location != $_SESSION['user']['location']) {
    //             $errors['location'] = USERS_LOCATION_ERROR_EXISTS;
    //         }
    //     } else {
    //         $errors['location'] = USERS_LOCATION_ERROR_INVALID;
    //     }
    // } else {
    //     $errors['location'] = USERS_LOCATION_ERROR_EMPTY;
    // }
    
    // if (!empty($_FILES['avatar'])) {
    //     $imageMessage = checkImage($_FILES['avatar']);
    
    //     if ($imageMessage != '') {
    //         $errors['avatar'] = $imageMessage;
    //     } else {
    //         $user->avatar = uniqid() . '.' . pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    
    //         while(file_exists('../../assets/IMG/' . $user->avatar)) {
    //             $user->avatar = uniqid() . '.' . pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    //         }
    //     }
    // }