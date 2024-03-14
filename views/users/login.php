<section>
    <?php if (isset($success)) { ?>
        <!-- Si la connexion est une reussite, afficher le message de succes -->
        <p id="successMessage">
            <?= $success ?>
        </p>
    <?php } ?>
        
    <form action="/connexion" method="POST" id="logForm">
        <h1>Connexion</h1>

        <label for="email">Adresse mail</label><!-- Champ de l'adresse mail -->
        <input type="email" name="email" id="email" placeholder="alf.nzau243@mail.fr" value="<?= @$_COOKIE['email'] ?>">

        <?php if (isset($errors['email'])) { ?>
            <!-- afficher l'erreur si il y en a dans le champ email -->
            <p class="errorsMessage">
                <?= $errors['email'] ?>
            </p>
        <?php } ?>

        <label for="password">Mot de passe</label><!-- Champ de mot de passe -->
        <input type="password" name="password" id="password" placeholder="Liproto0!"
            value="<?= @$_COOKIE['password'] ?>">

        <?php if (isset($errors['password'])) { ?>
            <!-- afficher l'erreur si il y en a dans le champ password -->
            <p class="errorsMessage">
                <?= $errors['password'] ?>
            </p>
        <?php } ?>

        <div><!-- Case à cocher pour se souvenir du mot de passe -->
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Se souvenir de moi</label>
        </div>

        <div class="g-recaptcha" data-sitekey="reCAPTCHA_site_key"></div> <!-- recaptcha google -->

        <input type="submit" value="Se connecter"><!-- Bouton de la connexion -->

        <!-- Lien pour s'enregistrer -->
        <hr> Ou <a href="/inscription"><i class="fa-solid fa-circle-arrow-right"> S'enregistrer </i></a>
    </form>
</section>

<script src="assets/js/recaptcha.js"></script>