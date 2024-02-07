<?php 
$errors = [];

// MESSAGES D'ERREUR
define('USERS_USERNAME_ERROR_EMPTY', 'Le nom d\'utilisateur est requis');
define('USERS_USERNAME_ERROR_INVALID', 'Le nom d\'utilisateur est invalide. Il ne peut contenir que des lettres, des espaces, des tirets et des apostrophes');
define('USERS_USERNAME_ERROR_EXISTS', 'Le nom d\'utilisateur existe déjà');

define('USERS_EMAIL_ERROR_EMPTY', 'L\'adresse email est requise');
define('USERS_EMAIL_ERROR_INVALID', 'L\'adresse email est invalide. Elle ne peut contenir que des lettres, des chiffres, des tirets, des underscores, des points et des arobases');
define('USERS_EMAIL_ERROR_EXISTS', 'L\'adresse email existe déjà');

define('USERS_LOCATION_ERROR_EMPTY', 'La location est requise');
define('USERS_LOCATION_ERROR_INVALID', 'La location est invalide. Elle ne peut contenir que des lettres, des chiffres, des tirets, des underscores, des points et des arobases');
define('USERS_LOCATION_ERROR_EXISTS', 'La location existe déjà');

define('USERS_PASSWORD_ERROR_EMPTY', 'Le mot de passe est requis');
define('USERS_PASSWORD_ERROR_INVALID', 'Le mot de passe est invalide. Il doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial');
define('USERS_PASSWORD_CONFIRM_ERROR_INVALID', 'La confirmation du mot de passe est invalide. Les mots de passe ne correspondent pas');
define('USERS_PASSWORD_CONFIRM_ERROR_EMPTY', 'La confirmation du mot de passe est requise');

define('USERS_BIRTHDATE_ERROR_EMPTY', 'La date de naissance est requise');
define('USERS_BIRTHDATE_ERROR_INVALID', 'La date de naissance est invalide. Elle doit être au format YYYY-MM-DD');

define('USERS_LOGIN_ERROR', 'Votre adresse mail ou votre mot de passe est incorrect');

//MIS A JOUR USERS
define('USERS_UPDATE_SUCCESS', 'Votre compte a bien été mis à jour');
define('USERS_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de votre compte');

define('USERS_PASSWORD_UPDATE_SUCCESS', 'Votre mot de passe a bien été mis à jour');
define('USERS_PASSWORD_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de votre mot de passe');

//MIS A JOUR TOPICS
define('TOPIC_UPDATE_SUCCESS', 'Votre compte a bien été mis à jour');
define('TOPIC_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de votre compte');

define('TOPIC_TITLE_UPDATE_SUCCESS', 'Le titre a bien été mis à jour');
define('TOPIC_TITLE_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de titre');

define('TOPIC_CONTENT_UPDATE_SUCCESS', 'Le contenu a bien été mis à jour');
define('TOPIC_CONTENT_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour du contenu');

define('TOPIC_REPLIES_UPDATE_SUCCESS', 'La reponse a bien été mis à jour');
define('TOPIC_REPLIES_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de votre reponse');

define('TOPIC_TAG_CATEGORIE_UPDATE_SUCCESS', 'Cela a bien été mis à jour');
define('TOPIC_TAG_CATEGORIE_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour du tag ou categorie');

// IMAGE
define('IMAGE_ERROR_EMPTY', 'L\'image est requise');
define('IMAGE_ERROR_INVALID', 'L\'image est invalide');
define('IMAGE_ERROR_EXTENSION', 'L\'image est invalide. Elle doit être au format jpg, jpeg, png, gif ou webp');
define('IMAGE_ERROR_SIZE', 'L\'image est invalide. Elle doit faire moins de 1Mo');
define('IMAGE_ERROR', 'Une erreur est survenue lors de l\'envoi de l\'image');
define('IMAGE_SUCCESS', 'l\'envoi de l\'image est reussi');

// TITRE
define('TOPICS_TITLE_SUCCESS', 'Merci d\avoir respecté le norme');
define('TOPICS_TITLE_ERROR_INVALID', 'Le titre existe déjà; choisissez un autre svp!');
define('TOPICS_TITLE_ERROR_INVALID_2', 'Le titre doit contenir au moins 8 caractères');
define('TOPICS_TITLE_ERROR', 'Mettez un titre SVP');

// CONTENT
define('TOPICS_CONTENT_SUCCESS', 'Merci d\avoir respecté le norme');
define('TOPICS_CONTENT_ERROR_INVALID', 'Le contenu doit contenir au moins 30 caractères');
define('TOPICS_CONTENT_ERROR', 'Veuillez redigez une phrase au moins, la case ne peut pas être vide');

// REPLIES
define('TOPICS_REPLIES_SUCCESS', 'Merci d\avoir respecté le norme');
define('TOPICS_REPLIES_ERROR', 'Veuillez redigez une phrase au moins, la case ne peut pas être vide');

// COMMENTS
define('STATUS_COMMENTS_SUCCESS', 'Merci d\avoir respecté le norme');
define('STATUS_COMMENTS_ERROR', 'Veuillez redigez une phrase au moins, la case ne peut pas être vide');

// TAGS
define('TOPICS_TAGS_ERROR_EMPTY', 'Le tag est requis');
define('TOPICS_TAGS_ERROR_INVALID', 'Le tag est invalide');

// CATEGORIES
define('TOPICS_CATEGORIES_ERROR_EMPTY', 'Le tag est requis');
define('TOPICS_CATEGORIES_ERROR_INVALID', 'Le tag est invalide');

// TOPIC
define('TOPICS_SUCCESS', 'Votre topic vient d\etre publié avec succes');
define('TOPICS_ERROR', 'Il y a un eu un soucis: soit le titre;,le tag ou le contenu y manque');

// STATUS
define('STATUS_SUCCESS', 'Votre status vient d\etre publié avec succes');
define('STATUS_ERROR', 'Il y a un eu un soucis: peut etre le contenu y manque');
