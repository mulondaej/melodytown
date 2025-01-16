<?php

require_once "../../models/topicsModel.php";
require_once '../../models/usersModel.php';
require_once '../../models/mediaModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start(); // démarrage de la session

if (empty($_SESSION['user'])) { // si l'utilisateur n'est pas en ligne
    header('Location: /connexion'); // le rediriger vers la page d'accueil
    exit;
}

$user = new Users;
$user->fetchUserData($_SESSION['user']['id']);
$userAccount = $user->getById();

$media = new media;
// $mediaMediaImages = $media->getById();
$userMedia = $media->getUserMedia();

if (isset($_POST['uploadMedia'])) {
    if (!empty($_FILES['image']['name'][0])) { // Check if at least one file is selected
        $upload_dir = '../../assets/IMG/media/';
        $successMessages = [];
        $errorMessages = [];

        foreach ($_FILES['image']['name'] as $key => $imageName) {
            $tmpName = $_FILES['image']['tmp_name'][$key];
            $error = $_FILES['image']['error'][$key];

            // Check for errors in the file
            if ($error !== UPLOAD_ERR_OK) {
                $errorMessages[] = "Erreur lors du téléchargement de l'image: $imageName.";
                continue;
            }

            // Run validation for the current image
            $imageMessage = checkImages([
                'name' => $imageName,
                'tmp_name' => $tmpName,
                'error' => $error,
            ]);

            if ($imageMessage !== '') {
                $errorMessages[] = "Validation échouée pour l'image $imageName: $imageMessage";
                continue;
            }

            // Generate a unique file name
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $media->file_name = uniqid() . '.' . $extension;

            // Ensure the file name is unique in the directory
            while (file_exists($upload_dir . $media->file_name)) {
                $media->file_name = uniqid() . '.' . $extension;
            }

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($tmpName, $upload_dir . $media->getMedia())) {
                // Update media record in the database
                $media->id_users = $_SESSION['user']['id'];
                if ($media->updateMedia()) {
                    $successMessages[] = "Image téléchargée avec succès: $imageName.";
                } else {
                    unlink($upload_dir . $media->getMedia()); // Rollback on DB failure
                    $errorMessages[] = "Erreur lors de l'enregistrement dans la base de données: $imageName.";
                }
            } else {
                $errorMessages[] = "Échec du déplacement de l'image: $imageName.";
            }
        }

        // Display success and error messages
        if (!empty($successMessages)) {
            echo implode("<br>", $successMessages);
        }
        if (!empty($errorMessages)) {
            echo implode("<br>", $errorMessages);
        }
    } else {
        echo "Aucune image sélectionnée.";
    }
}





$userMedia = $media->getUserMedia();

if ($userMedia != false) {
    $latestMedia = $media->getMedia();
    $userTotalMedia = count($userMedia);

    if (count($userMedia) > 0) {
        $latestMedia = $userMedia;
    }
}

$title = 'Media';

require_once '../../views/parts/header.php';
require_once '../../views/pages/media.php';
require_once '../../views/parts/footer.php';
?>

<script src="../../assets/js/media.js"></script>