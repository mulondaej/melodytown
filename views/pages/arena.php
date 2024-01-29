<div id="main">
    <?php
    ?>
    <input type="button" value="New thread" id="newThread">
    <form action="/arena" method="POST" id="threadForm">
        <label for="tag">Tag:</label>
        <select name="tag" id="tag">
            <option value="DBZ">DBZ</option>
            <option value="OnePiece">OP</option>
            <option value="Naruto">Naruto</option>
            <option value="Bleach">Bleach</option>
            <option value="HxH">HxH</option>
            <option value="Marvel">Marvel</option>
            <option value="DCcomics">DC</option>
            <option value="any">any other</option>
            <option value="MultiV">MultiV</option>
        </select>
        <?php if (isset($errors['tag'])) : ?>
            <p><?= $errors['tag'] ?></p>
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
            <input type="submit" name="createThread" value="Create">
        </div>
    </form>
    