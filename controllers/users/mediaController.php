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

// header('Content-Type: application/json');

if (isset($_POST['uploadMedia'])) {
    if (!empty($_FILES['image']['name'][0])) { 
        $upload_dir = '../../assets/IMG/media/';
        $successMessages = [];
        $errorMessages = [];

        foreach ($_FILES['image']['name'] as $key => $imageName) {
            $tmpName = $_FILES['image']['tmp_name'][$key];
            $error = $_FILES['image']['error'][$key];

            if ($error !== UPLOAD_ERR_OK) {
                $errorMessages[] = "Erreur lors du téléchargement de l'image: $imageName.";
                continue;
            }

            $imageMessage = checkImage([
                'name' => $imageName,
                'tmp_name' => $tmpName,
                'error' => $error,
            ]);

            if ($imageMessage !== '') {
                $errorMessages[] = "Validation échouée pour l'image $imageName: $imageMessage";
                echo "Image Failed: $imageName - $imageMessage"; 
                continue;
            }

            $extension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (!in_array($extension, $allowedExtensions)) {
                $errorMessages[] = "Type de fichier non autorisé pour l'image: $imageName.";
                continue;
            }

            $file_name = uniqid() . '.' . $extension;

            while (file_exists($upload_dir . $file_name)) {
                $file_name = uniqid() . '.' . $extension;
            }

            if (move_uploaded_file($tmpName, $upload_dir . $file_name)) {
                $media->id_users = $_SESSION['user']['id'];
                $media->file_name = $file_name;

                if ($media->updateMedia()) { 
                    $successMessages[] = "Image téléchargée avec succès: $imageName.";
                } else {
                    unlink($upload_dir . $file_name); 
                    $errorMessages[] = "Erreur lors de l'enregistrement dans la base de données: $imageName.";
                }
            } else {
                $errorMessages[] = "Échec du déplacement de l'image: $imageName.";
            }
        }

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
<!-- <script src="../../assets/js/upload.js"></script>
<script src="../../assets/js/server.js"></script> -->