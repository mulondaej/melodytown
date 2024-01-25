<h1 id="compteH1">Modifier le page</h1>
<main class="compteFlex">

    <form action="/modifier-topic" method="post" id="logForm">
        <?php if (isset($success)) { ?>
            <p id="successMessage"><?= $success ?></p>
        <?php } ?>

        <label for="tag">Tag: </label>
        <select name="tag" id="tag">
                <?php foreach ($tagsList as $g) { ?>
                    <option value="<?= $g->id ?>"><?= $g->name ?></option>
                 <?php } ?>
            </select>
        <?php if (isset($errors['tag'])) { ?>
            <p id=errorsMessage><?= $errors['tag'] ?></p>
        <?php } ?>

        <label for="categories">Categorie: </label>
        <select id="categories" name="categories">
                <?php foreach ($topicsList as $t) { ?>
                    <option value="<?= $t->id_categories ?>"></option>
                <?php } ?>
            </select>
        <?php if (isset($errors['categories'])) { ?>
            <p id=errorsMessage><?= $errors['categories'] ?></p>
        <?php } ?>

        <label for="title">Titre: </label>
        <?php foreach ($topicsList as $t) { ?>
            <input type="text" name="title" id="title" value="<?= $t->title ?>">
        <?php } ?>
        <?php if (isset($errors['title'])) { ?>
            <p id=errorsMessage><?= $errors['title'] ?></p>
        <?php } ?>

        <label for="content">Content: </label>
        <br>
        <?php foreach ($topicsList as $t) { ?>
            <textarea type="text" name="content" id="content" value="<?= $t->content ?>"></textarea>
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