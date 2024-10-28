<?php

require_once '../../models/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();

$errors = [];
$user = new Users();

if (isset($_POST['updateVerified'])) {
    if (!empty($_POST['verified'])) {
        if ($user->setVerified(true)) {
            $success = "Email verified successfully, thank you.";
            header('Location: /accueil');
            exit;
        } else {
           $success = 'Échec de la mise à jour du statut de vérification.</p>';
        }
    } else {
        $success = 'Votre email est déjà confirmé.</p>';
    }
} else {
    $success= 'Jeton invalide ou expiré.</p>';
}


// $this->pdo->close();
$title = "verification";

require_once '../../views/parts/header.php';
require_once '../../views/users/verify.php';
require_once '../../views/parts/footer.php';
?>
<script src="assets/js/verify.js"></script>