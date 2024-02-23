<?php

require_once '../../models/contactModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start(); // démarrage de la session

$title = 'contact'; // Titre de la page

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/pages/contact.php';
require_once '../../views/parts/footer.php';
?>
