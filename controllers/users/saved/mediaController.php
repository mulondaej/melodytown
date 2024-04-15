
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
    if (!empty($_FILES['image'])) {
        
        $imageMessage = checkImages($_FILES['image']);

        if ($imageMessage != '') {
            $errors['image'] = $imageMessage;
        } else {

            $media->id = $_SESSION['user']['id'];
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $media->file_name = uniqid() . '.' . $extension;


            $upload_dir = '../../assets/IMG/media/';


            while (file_exists($upload_dir . $media->file_name)) {
                $media->file_name = uniqid() . '.' . $extension;
            }

            // Move uploaded file to the destination directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $media->file_name)) {
                if ($media->create()) {
                    $media->id_users = $_SESSION['user']['id'];
                    $success = 'les medias viennent d/être publie avec succès';
                } else {
                    unlink($upload_dir . $media->file_name);
                    $errors['add'] = 'Réessayez encore car il y\eut une erreur';
                }
            } else {
                $errors['add'] = 'Une erreur est survenue';
            }
        }
    }
}

// Handle file upload
// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["image"])) {
//     $uploadDir = "../../assets/IMG/media/";
//     $uploadedFiles = [];

//     foreach ($_FILES["image"]["tmp_name"] as $key => $tmpName) {
//         $file_Name = basename($_FILES["image"]["name"][$key]);
//         $uploadPath = $uploadDir . $file_Name;
//         if (move_uploaded_file($tmpName, $uploadPath)) {
//             $uploadedFiles[] = $file_Name;
//         }
//     }

//     // Respond with uploaded file names
//     echo json_encode($uploadedFiles);
// }

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