<h1 id="compteH1">Modifier le topic</h1><hr>
<main class="compteFlex">

    <form action="/modifier-topic-<?= $topicsDetails->id ?>" method="post" id="logForm" >
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
            <p class=errorsMessage><?= $errors['tag'] ?></p>
        <?php } ?>

        <label for="categories">Categorie: </label>
        <select id="categories" name="categories">
                <?php foreach ($categoriesList as $c) { ?>
                    <option value="<?= $c->id ?>"><?= $c->name ?></option>
                <?php } ?>
            </select>
        <?php if (isset($errors['categories'])) { ?>
            <p class=errorsMessage><?= $errors['categories'] ?></p>
        <?php } ?>

        <label for="title">Titre: </label>
        <input type="text" name="title" id="title" value="<?= $topicsDetails->title ?>">
        <?php if (isset($errors['title'])) { ?>
            <p class=errorsMessage><?= $errors['title'] ?></p>
        <?php } ?>

        <label for="content">Content: </label>
        <br>
        <textarea type="text" name="content" id="content" value="<?= $topicsDetails->content ?>">
        <?= $topicsDetails->content?></textarea>
        <?php if (isset($errors['content'])) { ?>
            <p class=errorsMessage><?= $errors['content'] ?></p>
        <?php } ?>

        
        <input type="submit" value="Modifier" name="updateTopic">

        <button id="openModalBtn"><a href="#delete">Supprimer</a></button>
    </form>

    <div id="modalContainer">
        <div id="modal">
            <span id="closeBtn">&times;</span>
            <p id="modalText">Êtes-vous sûr de vouloir supprimer votre topic ?</p>
            <form action="/liste-topics-par-categories" method="POST" id="delete">
                <input type="submit" value="Supprimer" name="deleteTopic">
            </form>
        </div>
    </div>

</main>
<script src="assets/javaSc/modals.js"></script>