<?php
require_once '../../models/usersModel.php';
require_once 'formValidation.php';

session_start();

//verifier si le membre est déjà connecté
if(isset($_SESSION['user'])) {
    header('location: /mon-compte');
    exit;
}

// Votre code existant pour gérer la connexion
$errors = [];

// Si le formulaire a été envoyé en POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new Users();
    //Je vérifie que les champs ne sont pas vides
    if (!empty($_POST['email'])) {
        //Je vérifie que l'email est valide
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // Et je le stocke dans une variable
            $user->email = $_POST['email'];

            if (!$user->checkIfExistsByEmail()) {
                $errors['email'] = $errors['password'] = 'Votre adresse mail ou votre mot de passe est incorrect';
            } else {
                $user->password = $user->getPassword();
            }
        } else {
            // Sinon, je remplis mon tableau d'erreurs
            $errors['email'] = 'Veuillez renseigner une adresse mail valide. Elle ne doit contenir que des caractères alphanumériques, des tirets et des points';
        }
    } else {
        $errors['email'] = 'Veuillez renseigner votre adresse mail';
    }

    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $errors['password'] = 'Veuillez renseigner votre mot de passe';
    }

    // Si je n'ai aucune erreur
    if (empty($errors)) {
        // Je vérifie que l'email et le mot de passe correspondent à ceux stockés dans le tableau $credentials (plus tard, ce sera une requête SQL). S'il y a une erreur, je ne précise pas si c'est l'email ou le mot de passe qui est incorrect pour ne pas donner d'informations à un éventuel pirate.
        if (!password_verify($password, $user->password)) {
            $errors['email'] = $errors['password'] = 'Votre adresse mail ou votre mot de passe est incorrect';
        } else {
            // Si ma case "Se souvenir de moi" est cochée, je crée un cookie qui contient l'email et le mot de passe de l'utilisateur. Le cookie sera valable 60 secondes et accessible depuis tout le site.
            if (isset($_POST['remember'])) {
                setcookie('email', $user->email, time() + 60, '/');
                setcookie('password', $password, time() + 60, '/');
            }

            /**
             * Dans tous les cas, si les informations sont correctes, je crée une session qui contient les informations de l'utilisateur. Ici, je ne mets que quelques informations, mais je peux mettre toutes les informations que je veux (nom, prénom, rôle, etc.)
             * Je ne stocke que des informations peu sensibles dans la session (pas de mot de passe, pas de numéro de carte bancaire, etc.)
             * Ca me permettra de savoir si l'utilisateur est connecté ou non en vérifiant si la session existe ou non.
             * Je peux aussi stocker l'id de l'utilisateur dans la session pour pouvoir faire des requêtes SQL avec.
             * Ou vérifier s'il a le bon rôle pour accéder à certaines pages.
             * Je peux également utiliser la session pour stocker des informations qui ne sont pas propres à l'utilisateur (par exemple, le panier d'un utilisateur non connecté).
             */
            $_SESSION['user'] = $user->getInfosByEmail();
            //var_dump($_SESSION['user']);
            // header('Location: /mon-compte');
            // exit;
        }
        if($user->getInfosByEmail() && $user->getPassword()) {
            $success = 'Vous êtes connecté !';
            header('Location: /accueil');
            exit;
        }
    }
    
}

require_once '../../views/parts/header.php';
require_once '../../views/users/login.php';
require_once '../../views/parts/footer.php';
?>
