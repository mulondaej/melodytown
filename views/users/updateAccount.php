<h1 id="compteH1">Modifier ton compte</h1>
<hr>
<?php if (isset($success)) { ?><!-- Si la connexion est une reussite, afficher le message de succes -->
    <p id="successMessage" style="background-color: azure;">
        <?= $success ?>
    </p>
<?php } ?>
<div class="accountFlex">

    <form action="/modifier-mon-compte" method="post" id="logForm">
        <!--  -->
        <h1>Informations personnelles :</h1>
        <label for="username">Nom d'utilisateur</label><!-- champ pour modifier le nom -->
        <input type="text" name="username" id="username" placeholder="alfnzau" value="<?= $userAccount->username ?>">
        <?php if (isset($errors['username'])) { ?>
            <p id=errorsMessage><?= $errors['username'] ?></p>
        <?php } ?>

        <label for="email">Adresse mail</label><!-- champ pour modifier l'email -->
        <input type="email" name="email" id="email" value="<?= $userAccount->email ?>">
        <?php if (isset($errors['email'])) { ?>
            <p id=errorsMessage><?= $errors['email'] ?></p>
        <?php } ?>

        <label for="birthdate">Date de naissance</label><!-- champ pour modifier la daite de naissance -->
        <input type="date" name="birthdate" id="birthdate" value="<?= $userAccount->birthdate ?>">
        <?php if (isset($errors['birthdate'])) { ?>
            <p id=errorsMessage><?= $errors['birthdate'] ?></p>
        <?php } ?>

        <label for="location">Location</label><!-- champ pour modifier la location -->
        <input type="text" name="location" id="location" value="<?= $userAccount->location ?>">
        <?php if (isset($errors['location'])) { ?>
            <p id=errorsMessage><?= $errors['location'] ?></p>
        <?php } ?>

        <br>
        <button type="submit" value="Modifier" name="updateInfos"><i class="fa-solid fa-pen-to-square"></i>
            modifier</button><!-- button confirmer la modification  -->

        <button id="openModalBtn"><a href="#delete"><i class="fa-solid fa-trash-can"></i> supprimer
                compte</a></button><!-- button avec lien qui ouvre le modal de suppression de compte  -->
    </form>

    <div class="accountForm">
        <form action="/modifier-mon-compte" method="post" id="logForm" enctype="multipart/form-data">
            <!--  -->
            <label for="avatar">Nouveau avatar</label><!-- champ pour le nouveau mot de passe -->
            <input type="file" name="avatar" id="profileAvatar">
            <?php if (isset($errors['avatar'])) { ?>
                <p id=errorsMessage><?= $errors['avatar'] ?></p>
            <?php } ?>

            <input type="submit" value="Ajouter" name="updateAvatar"><!-- button confirmer la modification  -->
        </form>

        <form action="/modifier-mon-compte" method="post" id="logForm" enctype="multipart/form-data">
            <!--  -->
            <label for="avatar">Nouvelle banière</label><!-- champ pour le nouveau mot de passe -->
            <input type="file" name="image" id="profileBaniere">
            <?php if (isset($errors['image'])) { ?>
                <p id=errorsMessage><?= $errors['image'] ?></p>
            <?php } ?>

            <input type="submit" value="Ajouter" name="updateCoverPicture"><!-- button confirmer la modification  -->
        </form>

        <form action="/modifier-mon-compte" method="post" id="logForm">
            <!--  -->
            <label for="username">Nouveau username</label><!-- champ pour le nouveau mot de passe -->
            <input type="username" name="username" id="username">
            <?php if (isset($errors['username'])) { ?>
                <p id=errorsMessage><?= $errors['username'] ?></p>
            <?php } ?>

            <input type="submit" value="Modifier" name="updateUsername"><!-- button confirmer la modification  -->
        </form>

        <form action="/modifier-mon-compte" method="post" id="logForm">
            <!--  -->
            <label for="email">Nouveau email</label><!-- champ pour le nouveau mot de passe -->
            <input type="email" name="email" id="email">
            <?php if (isset($errors['email'])) { ?>
                <p id=errorsMessage><?= $errors['email'] ?></p>
            <?php } ?>

            <input type="submit" value="Modifier" name="updateEmail"><!-- button confirmer la modification  -->
        </form>

        <form action="/modifier-mon-compte" method="post" id="logForm">
            <!--  -->
            <label for="location">Nouveau Location</label><!-- champ pour le nouveau mot de passe -->
            <input type="location" name="location" id="location">
            <?php if (isset($errors['location'])) { ?>
                <p id=errorsMessage><?= $errors['location'] ?></p>
            <?php } ?>

            <input type="submit" value="Modifier" name="updateLocation"><!-- button confirmer la modification  -->
        </form>

        <form action="/modifier-mon-compte" method="post" id="logForm">
            <!--  -->
            <label for="password">Nouveau mot de passe</label><!-- champ pour le nouveau mot de passe -->
            <input type="password" name="password" id="password">
            <?php if (isset($errors['password'])) { ?>
                <p id=errorsMessage><?= $errors['password'] ?></p>
            <?php } ?>

            <label for="password_confirm">Confirmation du nouveau mot de
                passe</label><!-- champ pour confirmer le nouveau mot de passe -->
            <input type="password" name="password_confirm" id="password_confirm" placeholder="Liproto0!">
            <?php if (isset($errors['password_confirm'])) { ?>
                <p id=errorsMessage><?= $errors['password_confirm'] ?></p>
            <?php } ?>

            <input type="submit" value="Modifier" name="updatePassword"><!-- button confirmer la modification  -->
        </form>

    </div>

    <form action="/modifier-mon-compte" method="POST" id="logForm">
        <label for="verified">Verifiez votre email</label>
        <input type="hidden" name="verified" id="verified">
        <?php if (isset($errors['update'])): ?>
            <p class="errorsMessage"><?= $errors['update'] ?></p>
        <?php endif; ?><br>

        <input type="hidden" name="token" id="token">
        <?php if (isset($errors['update'])): ?>
            <p class="errorsMessage"><?= $errors['update'] ?></p>
        <?php endif; ?><br>

        <input type="submit" name="updateVerified" value="verifier">
    </form>

    <form action="/modifier-mon-compte" method="POST" id="logForm">
        <label for="token">Inserez votre token</label>
        <input type="hidden" name="token" id="token">
        <?php if (isset($errors['update'])): ?>
            <p class="errorsMessage"><?= $errors['update'] ?></p>
        <?php endif; ?><br>

        <input type="submit" name="updateToken" value="Inserez">
    </form>

    <div id="modalContainer">
        <!-- le modal de suppression du compte -->
        <div id="modal">
            <span id="closeBtn">&times;</span>
            <p id="modalText">Êtes-vous sûr de vouloir supprimer votre compte ?</p>
            <form action="/modifier-mon-compte" method="POST" id="delete">
                <input type="submit" value="Supprimer" name="deleteAccount">
            </form>
        </div>
    </div>

</div>