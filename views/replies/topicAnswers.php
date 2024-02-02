<?php if (!isset($_SESSION['user'])) { ?>
    <p class="errorsMessage">Vous devez être connecté pour rajouter des réponses</p>
    <a href="/connexion" class="cta">Se connecter</a>
    <a href="/inscription" class="cta">S'inscrire</a>
<?php } else { ?>
    <?php if (isset($success)) { ?>
        <p class="successMessage"><?= $success ?></p>
    <?php } ?>

    <?php if (isset($errors['content'])) { ?>
        <p class="errorsMessage"><?= $errors['content'] ?></p>
    <?php } ?>
    

    <form action="/thread?<?= $_GET['id'] ?>" method="POST">
        <label for="answer">Commenter</label>
        <textarea name="answer" id="answer"></textarea>
        <input type="submit" value="Post">
    </form>
<?php } ?>

    </div>


