<h1 id="compteH1">Modifier ton compte</h1>
<main class="compteFlex">
    <form action="/modifier-mon-compte" method="post" id="logForm">
        <?php if (isset($success)) { ?>
            <p id="successMessage"><?= $success ?></p>
        <?php } ?>
        
        <!-- <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="avatar" value=" $userAccount->avatar ?>">
         if (isset($errors['avatar'])) { ?>
            <p class="errorsMessage"> $errors['avatar'] ?></p>
         } ?> -->

        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" placeholder="alfnzau" value="<?= $userAccount->username ?>">
        <?php if (isset($errors['username'])) { ?>
            <p id=errorsMessage><?= $errors['username'] ?></p>
        <?php } ?>

        <label for="email">Adresse mail</label>
        <input type="email" name="email" id="email" placeholder="alf.nzau243@mail.fr" value="<?= $userAccount->email ?>">
        <?php if (isset($errors['email'])) { ?>
            <p id=errorsMessage><?= $errors['email'] ?></p>
        <?php } ?>

        <!-- <label for="location">Location</label>
        <input type="text" name="location" id="location" value=" $userAccount->location ?>">
         if (isset($errors['location'])) { ?
            <p id=errorsMessage>$errors['location'] ?></p>
         } ?> -->

        <label for="birthdate">Date de naissance</label>
        <input type="date" name="birthdate" id="birthdate" value="<?= $userAccount->birthdate ?>">
        <?php if (isset($errors['birthdate'])) { ?>
            <p id=errorsMessage><?= $errors['birthdate'] ?></p>
        <?php } ?>
        <br>
        <input type="submit" value="Modifier" name="updateInfos">

        <button id="openModalBtn">Supprimer ton compte</button>
    </form>

    <form action="/modifier-mon-compte" method="post" id="logForm">

        <label for="password">Nouveau mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Liproto0!">
        <?php if (isset($errors['password'])) { ?>
            <p id=errorsMessage><?= $errors['password'] ?></p>
        <?php } ?>

        <label for="password_confirm">Confirmation du nouveau mot de passe</label>
        <input type="password" name="password_confirm" id="password_confirm" placeholder="Liproto0!">
        <?php if (isset($errors['password_confirm'])) { ?>
            <p id=errorsMessage><?= $errors['password_confirm'] ?></p>
        <?php } ?>

        <input type="submit" value="Modifier" name="updatePassword">
    </form>

    <div id="modalContainer">
        <div id="modal">
            <span id="closeBtn">&times;</span>
            <p id="modalText">Êtes-vous sûr de vouloir supprimer votre compte ?</p>
            <form action="/modifier-mon-compte" method="POST">
                <input type="submit" value="Supprimer" name="deleteAccount">
            </form>
        </div>
    </div>

</main>