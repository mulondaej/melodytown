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
          <textarea name="replyTextBar" id="replyTextBar" ></textarea>
          <br><input type="submit" value="post" id="repliesBtn" name="reply">
          <?php if (isset($errors['reponse'])) { ?>
              <p class="errorsMessage"><?= $errors['reponse'] ?></p>
            <?php } ?>
      </form>
    </fieldset>
    <?php } ?>
    </main>


