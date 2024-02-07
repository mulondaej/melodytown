<h1 id="compteH1">Modifier le topic</h1><hr>
<main class="compteFlex">

    <form action="/modifier-topic" method="post" id="logForm" >
        <?php if (isset($success)) { ?>
            <p id="successMessage"><?= $success ?></p>
        <?php } ?>

        <label for="tag">Tag: </label>
        <select name="tag" id="tag">
                <?php foreach ($topicsList as $t) { ?>
                    <option value="<?= $t->id ?>"><?= $t->tag ?></option>
                 <?php } ?>
            </select>
        <?php if (isset($errors['tag'])) { ?>
            <p id=errorsMessage><?= $errors['tag'] ?></p>
        <?php } ?>

        <label for="categories">Categorie: </label>
        <select id="categories" name="categories">
                <?php foreach ($topicsList as $t) { ?>
                    <option value="<?= $t->id ?>"><?= $t->categorie ?></option>
                <?php } ?>
            </select>
        <?php if (isset($errors['categories'])) { ?>
            <p id=errorsMessage><?= $errors['categories'] ?></p>
        <?php } ?>

        <label for="title">Titre: </label>
        <input type="text" name="title" id="title" value="<?= $t->title ?>">
        <?php if (isset($errors['title'])) { ?>
            <p id=errorsMessage><?= $errors['title'] ?></p>
        <?php } ?>

        <label for="content">Content: </label>
        <br>
        <textarea type="text" name="content" id="content" value="<?= $t->content ?>"></textarea>
        <?php if (isset($errors['content'])) { ?>
            <p id=errorsMessage><?= $errors['content'] ?></p>
        <?php } ?>

        
        <input type="submit" value="Modifier" name="updateInfos">

        <button id="openModalBtn"><a href="#delete">Supprimer le post</a></button>
    </form>

    <div id="modalContainer">
        <div id="modal">
            <span id="closeBtn">&times;</span>
            <p id="modalText">Êtes-vous sûr de vouloir supprimer votre thread ?</p>
            <form action="/modifier-topic" method="POST" id="delete">
                <input type="submit" value="Supprimer" name="deletePost">
            </form>
        </div>
    </div>

</main>
<script src="../../assets/javaSc/modals.js"></script>