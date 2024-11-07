<?php

require_once '../../models/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();

$errors = [];

$user = new Users();

if (isset($_GET['code'])) {
    if (!empty($_GET['code'])) {
        // $user->emailVerified();
        $verificationLink = "http://melodytown/connexion?";
        $success = "<p id=\"successMessage\" style=\"background-color: azure;\">
   Ceci prouve que votre email existe bel et bien!" . "<br> et nous vous conseillons de bien vouloir vous connecter 
   enfin de verifier votre compte en cliquant sur le bouton 'verifier' <br>sur votre profil ou dans vos parametres.</p><br><hr>
    <a href='$verificationLink' style=\"text-align: center\"><br>Connectez vous</a>";
        // header('Location: /connexion');
        // exit;

    } else {
        $success = 'Échec de la mise à jour du statut de vérification.</p>';
    }
} else {
    $success = 'Votre email est déjà confirmé.</p>';
}

if (isset($_GET['code'], $_POST['updateVerified']) && !empty($_GET['code'])) {
    // Check if verified parameter exists and update verification status
    if (isset($_GET['verified']) && !empty($_GET['verified'])) {
        if ($user->setVerified(true)) {
            // Send confirmation email after successful verification
            if ($user->emailVerified()) {
                $sendMail->confirmedEmail($user->getEmail(), $user->getUsername());
                $success = 'Votre compte vient d\'être vérifié';
            } else {
                $errors['update'] = "Échec de la mise à jour du statut de vérification. Réessayez à nouveau.";
            }
        } else {
            $errors['verified'] = 'Il y a eu une erreur lors de la vérification de votre email.';
        }
    } else {
        $errors['verified'] = 'Paramètre de vérification manquant ou invalide.';
    }
}


$title = "verification";

require_once '../../views/parts/header.php';
require_once '../../views/users/verify.php';
require_once '../../views/parts/footer.php';
?>
<script src="assets/js/verify.js"></script>