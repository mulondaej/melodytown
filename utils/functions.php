<?php
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

/**
 * Vérifie si une image est valide
 * @param array $image - L'image à vérifier
 * @return bool - true si l'image est valide, false sinon
 */
function checkImage($image) {
    $errors['image'] = '';

    if($image['error'] != 4) {
        if($image['error'] != 1 &&  $image['size'] > 0 && $image['size'] <= 1000000) {
            if($image['error'] == 0) {

                $extensionArray = [
                    'jpg' => 'image/jpeg', 
                    'jpeg' => 'image/jpeg', 
                    'png' => 'image/png', 
                    'gif' => 'image/gif', 
                    'webp' => 'image/webp',
                ];

                $imgExtension = pathinfo($image['name'], PATHINFO_EXTENSION);

                if(!array_key_exists($imgExtension, $extensionArray) || mime_content_type($image['tmp_name']) != $extensionArray[$imgExtension]) {
                    $errors['image'] = IMAGE_ERROR_EXTENSION;
                }

            } else {
                $errors['image'] = IMAGE_ERROR;
            }
        } else {
            $errors['image'] = IMAGE_ERROR_SIZE;
        }
    } else {
        $errors['image'] = IMAGE_ERROR_EMPTY;
    }

    return $errors['image'];
}