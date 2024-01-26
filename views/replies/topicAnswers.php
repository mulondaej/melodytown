<?php if (!isset($_SESSION['user'])) { ?>
    <p class="errorsMessage">Vous devez être connecté pour rajouter des réponses</p>
    <a href="/connexion" class="cta">Se connecter</a>
    <a href="/inscription" class="cta">S'inscrire</a>
<?php } else { ?>
    <?php if (isset($success)) { ?>
        <p class="successMessage"><?= $success ?></p>
    <?php } ?>

    <?php if (isset($errors['answer'])) { ?>
        <p class="errorsMessage"><?= $errors['answer'] ?></p>
    <?php } ?>
    <fieldset>
    <div class="commentsArea"><div class="replies">
    <div id="userCard"><div class="userImg"><img src="../../assets/IMG/logo.jpg" id="userAvy"><br>
    <div class="username"><h5><a href="#user"> <?= $_GET['user']['username'] ?>
    </a><br><p href="<?= $_GET['user']['location'] ?>"> <?= $_GET['user']['Rolename'] ?></p></h5>
    <div class="pFlex"><p><a href="">200</a> likes</p><p><a href="">100</a> points</p></div></div>
    </div></div>
    </div></fieldset><br>

    <form action="/thread-<?= $_GET['id'] ?>" method="POST">
        <label for="answer">Commenter</label>
        <textarea name="answer" id="answer"></textarea>
        <input type="submit" value="Post">
    </form>
<?php } ?>


