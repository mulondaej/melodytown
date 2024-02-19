<?php if (!isset($_SESSION['user'])) { ?>
    <p class="errorsMessage">Vous devez être connecté pour rajouter des réponses</p>
    <div class="messageCenter">
      <a href="/connexion" class="cta">Se connecter</a>
      <a href="/inscription" class="cta">S'inscrire</a>
    </div>
<?php } else { ?>
    <?php if (isset($success)) { ?>
        <p id="successMessage"><?= $success ?></p>
    <?php } ?>

    
    <fieldset id="userPosting">
      <form action="/topic-<?= $_GET['id'] ?>" method="POST" id="centered">
          <label for="content"></label>
          <textarea name="content" id="comments" value="<?= @$_POST['content'] ?>"></textarea>
          <br><input type="submit" value="post" id="commentBtn" name="reply">
          <?php if (isset($errors['content'])) { ?>
              <p class="errorsMessage"><?= $errors['content'] ?></p>
            <?php } ?>
      </form>
    </fieldset>
    <?php } ?>
    </main>


