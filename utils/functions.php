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

function checkAvatar($avatar) {
    $errors['avatar'] = '';

    if($avatar['error'] != 4) {
        
        if($avatar['error'] != 1 &&  $avatar['size'] > 0 && $avatar['size'] <= 1000000) {
            if($avatar['error'] == 0) {

                $extensionArray = [
                    'jpg' => 'image/jpeg', 
                    'jpeg' => 'image/jpeg', 
                    'png' => 'image/png', 
                    'gif' => 'image/gif', 
                    'webp' => 'image/webp',
                ];

                $imgExtension = pathinfo($avatar['name'], PATHINFO_EXTENSION);

                if(!array_key_exists($imgExtension, $extensionArray) || mime_content_type($avatar['tmp_name']) != $extensionArray[$imgExtension]) {
                    $errors['avatar'] = IMAGE_ERROR_EXTENSION;
                }

            } else {
                $errors['avatar'] = IMAGE_ERROR;
            }
        } else {
            $errors['avatar'] = IMAGE_ERROR_SIZE;
        }
    } else {
        $errors['avatar'] = IMAGE_ERROR_EMPTY;
    }

    return $errors['avatar'];
}

function checkImages($images) {
    $errors = array();

    // Define max size for each image (5MB)
    $maxSize = 5 * 1024 * 1024;

    // Iterate over each image file
    foreach ($images['error'] as $key => $error) {
        // Skip iteration if no file was uploaded
        if ($error == UPLOAD_ERR_NO_FILE) {
            continue;
        }

        // Check for upload errors
        if ($error != UPLOAD_ERR_OK || $images['size'][$key] > $maxSize) {
            $errors[] = 'Image ' . ($key + 1) . ': Invalid image size or upload error.';
            continue;
        }

        // Check file extension and MIME type
        $extensionArray = array(
            'jpg' => 'image/jpeg', 
            'jpeg' => 'image/jpeg', 
            'png' => 'image/png', 
            'gif' => 'image/gif', 
            'webp' => 'image/webp'
        );

        $imgExtension = strtolower(pathinfo($images['name'][$key], PATHINFO_EXTENSION));

        if (!array_key_exists($imgExtension, $extensionArray) || mime_content_type($images['tmp_name'][$key]) != $extensionArray[$imgExtension]) {
            $errors[] = 'Image ' . ($key + 1) . ': Invalid image format. Please upload a JPG, JPEG, PNG, GIF, or WEBP file.';
        }
    }

    return $errors;
}
