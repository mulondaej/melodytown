<section>
    <?php if (isset($success)) { ?>
        <p id="successMessage"><?= $success ?></p>
    <?php } ?>
    <form action="/connexion" method="POST" id="logForm">
        <h1>Connexion</h1>
        <label for="email">Adresse mail</label>
        <input type="email" name="email" id="email" placeholder="alf.nzau243@mail.fr" value="<?= @$_COOKIE['email'] ?>">
        <?php if (isset($errors['email'])) { ?>
            <p class="errorsMessage"><?= $errors['email'] ?></p>
        <?php } ?>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Liproto0!" value="<?= @$_COOKIE['password'] ?>">
        <?php if (isset($errors['password'])) { ?>
            <p class="errorsMessage"><?= $errors['password'] ?></p>
        <?php } ?>
        <div>
            <input type="checkbox" name="remember" id="remember"><label for="remember">Se souvenir de moi</label>
        </div>
        <input type="submit" value="Se connecter">
        <hr> Ou <a href="/inscription"><i class="fa-solid fa-arrow-right-to-bracket"> S'enregistrer </i></a>
    </form>
</section>