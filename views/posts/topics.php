<?php

?>
<div id="main">
    <section class="forum" id="forum">
        <h1>Have fun through the forums!</h1>
        <button type="button" id="newThread" value="thread">Nouveau topic</button>
        <form action="" method="POST" id="threadForm">
            <label for="tag">Tags:</label>
            <select name="tag" id="tag">
            <?php foreach($tagsList as $t){ ?>
                    <option value="<?= $t->id ?>"><?= $t->name ?></option>
                    <?php } ?>
            </select>
            <?php if (isset($errors['tag'])) : ?>
                <p><?= $errors['tag'] ?></p>
            <?php endif; ?>

            <label for="categories">Categories</label>
            <select id="categories" name="categories">
                <?php foreach($categoriesList as $c){ ?>
                    <option value="<?= $c->id ?>"><?= $c->name ?></option>
                    <?php } ?>
            </select>
            <?php if (isset($errors['categories'])) : ?>
                <p><?= $errors['categories'] ?></p>
            <?php endif; ?>

            <label for="title">Title:</label>
            <input type="text" id="title" name="title">
            <?php if (isset($errors['title'])) : ?>
                <p><?= $errors['title'] ?></p>
            <?php endif; ?>

            <label for="content">Content:</label>
            <textarea id="content" name="content"></textarea>
            <?php if (isset($errors['content'])) : ?>
                <p><?= $errors['content'] ?></p>
            <?php endif; ?>

            <div class="send">
                <input type="submit" name="threadPost" value="Create">
            </div>
        </form>

<?php
