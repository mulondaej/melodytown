<?php
// Include any necessary files or configurations
require_once '../../models/topicsModel.php';

session_start();

// Check if the user is logged in. You can implement your authentication logic here.
if (!isset($_SESSION['user'])) {
    // Redirect to the login page or display an error message.
    header("Location: /connexion");
    exit();
}


require_once '../../views/parts/header.php';

if ('Location: /forum') {
    require_once '../../views/pages/forum.php'; 
} else if ('Location: /arena') { 
    require_once '../../views/pages/arena.php';
}

require_once '../../views/parts/footer.php';
?>