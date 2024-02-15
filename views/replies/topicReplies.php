<?php if (!isset($_SESSION['user'])) { ?>
    <p class="errorsMessage">Vous devez être connecté pour rajouter des réponses</p>
    <div class="messageCenter">
      <a href="/connexion" class="cta">Se connecter</a>
      <a href="/inscription" class="cta">S'inscrire</a>
    </div>
<?php } else { ?>
    <?php if (isset($success)) { ?>
        <p #="successMessage"><?= $success ?></p>
    <?php } ?>

    <?php if (isset($errors['reply'])) { ?>
        <p class="errorsMessage"><?= $errors['reply'] ?></p>
    <?php } ?>
    
    
    <fieldset id="userPosting">
    <form action="/topic-<?= $_GET['id'] ?>" method="POST">
      <div id="centered"><label for="comments"></label>
        <textarea name="comments" id="comments" value=" <?= @$_POST['content'] ?>" ?></textarea>
        <br><input type="submit" value="post" id="commentBtn" name="reply">
      </div>
    </form>
    </fieldset>
    <?php } ?>
    </main>


