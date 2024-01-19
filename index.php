<?php require_once 'views/parts/header.php'; ?>
<div id="main">
    <?php if (isset($_GET['deleteAccount'])) { ?>
        <p>Votre compte a bien été supprimé.</p>
    <?php } ?>




    <?php require_once 'views/pages/forum.php'; ?>
    <?php require_once 'views/parts/footer.php'; ?>