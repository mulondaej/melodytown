<section>
    <?php if (isset($success)) { ?>
        <p id="successMessage"><?= $success ?></p>
    <?php } ?>
    <form action="/inscription" method="post" id="logForm">

        <a href="/connexion"><i class="fa-solid fa-circle-arrow-left"> Se connecter </i></a><hr>
        <h1>Inscription</h1>
        
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" placeholder="alfnzau">
        <?php if (isset($errors['username'])) { ?>
            <p id=errorsMessage><?= $errors['username'] ?></p>
        <?php } ?>

        <label for="email">Adresse mail</label>
        <input type="email" name="email" id="email" placeholder="alf.nzau243@mail.fr">
        <?php if (isset($errors['email'])) { ?>
            <p id=errorsMessage><?= $errors['email'] ?></p>
        <?php } ?>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Liproto0!">
        <?php if (isset($errors['password'])) { ?>
            <p id=errorsMessage><?= $errors['password'] ?></p>
        <?php } ?>

        <label for="password_confirm">Confirmation du mot de passe</label>
        <input type="password" name="password_confirm" id="password_confirm" placeholder="Liproto0!">
        <?php if (isset($errors['password_confirm'])) { ?>
            <p id=errorsMessage><?= $errors['password_confirm'] ?></p>
        <?php } ?>

        <label for="birthdate">Date de naissance</label>
        <input type="date" name="birthdate" id="birthdate">
        <?php if (isset($errors['birthdate'])) { ?>
            <p id=errorsMessage><?= $errors['birthdate'] ?></p>
        <?php } ?>
        <br>
        <input type="submit" value="S'inscrire">
    </form>
</section>