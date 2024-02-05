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
    
    
    <fieldset id="userPosting">
    <form action="/thread?<?= $t->id ?>" method="POST" id="">
      <div id="centered"><label for="comments"></label>
        <textarea name="comments" id="comments"></textarea>
        <br><input type="submit" value="post" id="commentBtn">
      </div>
    </form>
    </fieldset>
<?php } ?>

    </main>


