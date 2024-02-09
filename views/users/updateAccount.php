<h1 id="compteH1">Modifier ton compte</h1><hr>
<?php if (isset($success)) { ?>
            <p id="successMessage"><?= $success ?></p>
        <?php } ?>
<main class="compteFlex">
    <form action="/modifier-mon-compte" method="post" id="logForm" enctype="multipart/form-data">
        
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="userAvatar" value="<?= $userAccount->avatar ?>" accept="image*/">
        <?php if (isset($errors['avatar'])) { ?>
            <p class="errorsMessage"><?= $errors['avatar'] ?></p>
        <?php } ?>
        <input type="submit" value="Modifier" name="updateAvatar">
    </form>

    <form action="/modifier-mon-compte" method="post" id="logForm" >
        
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

        <label for="birthdate">Date de naissance</label>
        <input type="date" name="birthdate" id="birthdate" value="<?= $userAccount->birthdate ?>">
        <?php if (isset($errors['birthdate'])) { ?>
            <p id=errorsMessage><?= $errors['birthdate'] ?></p>
        <?php } ?>
        <br>
        <input type="submit" value="Modifier" name="updateInfos">

        <button id="openModalBtn"><a href="#delete">Supprimer ton compte</a></button>
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
            <form action="/modifier-mon-compte" method="POST" id="delete">
                <input type="submit" value="Supprimer" name="deleteAccount">
                <input type="submit" value="Transfer-supprimer" name="transferData">
            </form>
        </div>
    </div>

    <!-- <div id="modalContainer">
        <div id="modal">
            <span id="closeBtn">&times;</span>
            <p id="modalText">Êtes-vous sûr de vouloir supprimer votre compte ?</p>
            <form action="/modifier-mon-compte" method="POST" id="delete">
                <input type="submit" value="Supprimer" name="deleteAccount">
            </form>
        </div>
    </div> -->

</main>
<script src="../../assets/javaSc/modals.js"></script>