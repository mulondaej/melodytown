<div class="footDiv">
    <h1 class="compteH1">Contactez nous :</h1>
    <div class="terms">
        <hr>
        <div>

            <p>Si vous avez des questions ou des commentaires concernant notre forum, n'hésitez pas à nous contacter.
                Notre équipe est disponible pour vous aider et écouter vos suggestions.
                Vous pouvez nous rejoindre en nous envoyant un email melodytown@gmail.com</p>

            <p>N'oubliez pas d'adapter ces textes en fonction de la politique spécifique de votre forum de manga et de
                vos besoins particuliers.</p>
        </div>
<br>

<?php if (isset($success)) { ?><!-- Si la creation est une reussite, afficher le message de succes -->
        <p id=successMessage><?= $success ?></p>
    <?php } ?>
<form action="/contact" method="post" id="logForm">
        <label for="username">Name:</label><br>
        <input type="text" id="username" name="username" value="<?= @$_POST['username'] ?>" required><br>
        <?php if (isset($errors['username'])) : ?>
            <p><?= $errors['username'] ?></p>
        <?php endif; ?>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?= @$_POST['email'] ?>" required><br>
        <?php if (isset($errors['email'])) : ?>
            <p><?= $errors['email'] ?></p>
        <?php endif; ?>

        <label for="subject">Sujet:</label><br>
        <input type="text" id="subject" name="subject" value="<?= @$_POST['subject'] ?>" required><br>
        <?php if (isset($errors['subject'])) : ?>
            <p><?= $errors['subject'] ?></p>
        <?php endif; ?>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" value="<?= @$_POST['message'] ?>" required></textarea><br><br>
        <?php if (isset($errors['message'])) : ?>
            <p><?= $errors['message'] ?></p>
        <?php endif; ?>

        <input type="submit" value="Submit" name="sendMessage">
    </form>

    </div>
</div>