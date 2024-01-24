<?php if (!isset($_SESSION['user'])) { ?>
    <p class="errorsContainer">Vous devez être connecté pour ajouter un commentaire</p>
    <a href="/connexion" class="cta">Se connecter</a>
    <a href="/inscription" class="cta">S'inscrire</a>
<?php } else { ?>
    <?php if (isset($success)) { ?>
        <p class="successContainer"><?= $success ?></p>
    <?php } ?>

    <?php if (isset($errors['content'])) { ?>
        <p class="errorsMessage"><?= $errors['content'] ?></p>
    <?php } ?>

    <form action="/article-<?= $_GET['id'] ?>" method="POST">
        <label for="content">Votre commentaire</label>
        <textarea name="content" id="content"></textarea>
        <input type="submit" value="Ajouter">
    </form>
<?php } ?>