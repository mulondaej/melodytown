<h1 id="compteH1">Modifier le page</h1>
<main class="compteFlex">

    <form action="/modifier-topic" method="post" id="logForm">
        <?php if (isset($success)) { ?>
            <p id="successMessage"><?= $success ?></p>
        <?php } ?>

        <label for="tag">Tag: </label>
        <select name="tag" id="tag">
                <?php foreach ($tagsList as $t) { ?>
                    <option value="<?= $t->id ?>"><?= $t->name ?></option>
                <?php } ?>
            </select>
        <?php if (isset($errors['tag'])) { ?>
            <p id=errorsMessage><?= $errors['tag'] ?></p>
        <?php } ?>

        <label for="categories">Categorie: </label>
        <select id="categories" name="categories">
                <?php foreach ($categoriesList as $c) { ?>
                    <option value="<?= $c->id ?>"><?= $c->name ?></option>
                <?php } ?>
            </select>
        <?php if (isset($errors['categories'])) { ?>
            <p id=errorsMessage><?= $errors['categories'] ?></p>
        <?php } ?>

        <label for="title">Titre: </label>
        <?php foreach ($topicsList as $p) { ?>
            <input type="text" name="title" id="title" value="<?= $p->title ?>">
        <?php } ?>
        <?php if (isset($errors['title'])) { ?>
            <p id=errorsMessage><?= $errors['title'] ?></p>
        <?php } ?>

        <label for="content">Content: </label>
        <br>
        <?php foreach ($topicsList as $p) { ?>
            <input type="text" name="content" id="content" value="<?= $p->content ?>">
        <?php } ?>
        <?php if (isset($errors['content'])) { ?>
            <p id=errorsMessage><?= $errors['content'] ?></p>
        <?php } ?>

        
        <input type="submit" value="Modifier" name="updateInfos">

        <button id="openModalBtn">Supprimer le post</button>
    </form>

    <div id="modalContainer">
        <div id="modal">
            <span id="closeBtn">&times;</span>
            <p id="modalText">Êtes-vous sûr de vouloir supprimer votre compte ?</p>
            <form action="/modifier-topic" method="POST">
                <input type="submit" value="Supprimer" name="deletePost">
            </form>
        </div>
    </div>

</main>