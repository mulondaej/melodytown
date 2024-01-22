<?php 
//FONCTIONS
/**
 * Nettoie la chaîne de caractères
 * @param string $string La chaîne à nettoyer
 * @return string La chaîne nettoyée
 */
function clean($string)
{
    $string = trim($string);
    $string = strip_tags($string);
    return $string;
}

/**
 * Fonction qui permet de vérifier la validité d'une date
 * @param string $date - La date à vérifier (au format mysql)
 * @return bool - true si la date est valide, false sinon
 */
function checkDateValidity($date) {
    $dateArray = explode('-', $date);
    return checkdate($dateArray[1], $dateArray[2], $dateArray[0]);
}

// REGEX
$regex = [
    'name' => '/^[A-zÄ-ÿ]{1,}([ \'-]{1}[A-zÄ-ÿ]{1,}){0,}$/',
    'date' => '/^[0-9]{4}(-[0-9]{2}){2}$/',
    'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/',
];

// MESSAGES D'ERREUR
define('USERS_USERNAME_ERROR_EMPTY', 'Le nom d\'utilisateur est requis');
define('USERS_USERNAME_ERROR_INVALID', 'Le nom d\'utilisateur est invalide. Il ne peut contenir que des lettres, des espaces, des tirets et des apostrophes');
define('USERS_USERNAME_ERROR_EXISTS', 'Le nom d\'utilisateur existe déjà');

define('USERS_EMAIL_ERROR_EMPTY', 'L\'adresse email est requise');
define('USERS_EMAIL_ERROR_INVALID', 'L\'adresse email est invalide. Elle ne peut contenir que des lettres, des chiffres, des tirets, des underscores, des points et des arobases');
define('USERS_EMAIL_ERROR_EXISTS', 'L\'adresse email existe déjà');

define('USERS_PASSWORD_ERROR_EMPTY', 'Le mot de passe est requis');
define('USERS_PASSWORD_ERROR_INVALID', 'Le mot de passe est invalide. Il doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial');
define('USERS_PASSWORD_CONFIRM_ERROR_INVALID', 'La confirmation du mot de passe est invalide. Les mots de passe ne correspondent pas');
define('USERS_PASSWORD_CONFIRM_ERROR_EMPTY', 'La confirmation du mot de passe est requise');

define('USERS_BIRTHDATE_ERROR_EMPTY', 'La date de naissance est requise');
define('USERS_BIRTHDATE_ERROR_INVALID', 'La date de naissance est invalide. Elle doit être au format YYYY-MM-DD');

define('USERS_LOGIN_ERROR', 'Votre adresse mail ou votre mot de passe est incorrect');

//MIS A JOUR
define('USERS_UPDATE_SUCCESS', 'Votre compte a bien été mis à jour');
define('USERS_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de votre compte');

define('USERS_PASSWORD_UPDATE_SUCCESS', 'Votre mot de passe a bien été mis à jour');
define('USERS_PASSWORD_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de votre mot de passe');

// IMAGE
define('IMAGE_ERROR_EMPTY', 'L\'image est requise');
define('IMAGE_ERROR_INVALID', 'L\'image est invalide');
define('IMAGE_ERROR_EXTENSION', 'L\'image est invalide. Elle doit être au format jpg, jpeg, png, gif ou webp');
define('IMAGE_ERROR_SIZE', 'L\'image est invalide. Elle doit faire moins de 1Mo');
define('IMAGE_ERROR', 'Une erreur est survenue lors de l\'envoi de l\'image');

// TITRE
define('TOPICS_TITLE_SUCCESS', 'Merci d\avoir respecté le norme');
define('TOPICS_TITLE_ERROR_INVALID', 'Le titre existe déjà; choisissez un autre svp!');
define('TOPICS_TITLE_ERROR_INVALID_2', 'Le titre doit contenir au moins 8 caractères');
define('TOPICS_TITLE_ERROR', 'Mettez un titre SVP');

// CONTENT
define('TOPICS_CONTENT_SUCCESS', 'Merci d\avoir respecté le norme');
define('TOPICS_CONTENT_ERROR_INVALID', 'Le contenu doit contenir au moins 30 caractères');
define('TOPICS_CONTENT_ERROR', 'Veuillez redigez une phrase au moins, la case ne peut pas être vide');

// TOPIC
define('TOPICS_SUCCESS', 'Votre topic vient d\etre publié avec succes');
define('TOPICS_ERROR', 'Il y a un eu un soucis: soit le titre;,le tag ou le contenu y manque');

