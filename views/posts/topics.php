<<<<<<< HEAD
<?php

?>
<div id="main">
    <section class="forum" id="forum">
        <h1>Have fun through the forums!</h1>
        <input type="button" value="New thread" id="newThread">
        <form action="/thread" method="POST" id="threadForm">
            <label for="tag">Tag:</label>
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
                <input type="submit" name="threadPost" value="Create" onclick="createThread()">
            </div>
        </form>

<?php
function displayThreads()
{
    global $threads, $users, $score;
    echo '<div class="forumcontainer" id="forumcontainer"></div>';
    if (empty($threads)) {
        echo '<p>No threads available</p>';
    } else {
        foreach ($threads as $i => $thread) {

            // Your existing code to display threads
            $threadLink = '<a href="thread?threadId=' . $i . '">';
            $threadLink .= '<h4>' . $thread['title'] . '</h4>';
            $threadLink .= '<p>An interesting ' . $thread['tag'] . '\'s topic to discuss </p>';
            $threadLink .= '</a>';

            $threadDiv = '<div class="subforum-row">';
            $threadDiv .= '<div class="subforum-icon subforum-column center" id="icon">';
            $threadDiv .= '<i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>';
            $threadDiv .= '</div>';
            $threadDiv .= '<div class="subforum-description subforum-column" id="subDescript">';
            $threadDiv .= '<ul class="thread-list">';
            $threadDiv .= '<li>' . $threadLink . '</li>';
            $threadDiv .= '</ul>';
            $threadDiv .= '</div>';
            $threadDiv .= '<div class="subforum-stats subforum-column center">';
            $threadDiv .= '<span><a href="" id="topicPost">' . ($score + 1) . ' Posts | <a href="" id="topics">' . ($score + 1) . ' Topics</a></span>';
            $threadDiv .= '</div>';
            $threadDiv .= '<div class="subforum-info subforum-column">';
            $threadDiv .= '<b><a href="#">Last post</a></b> by <a href="#">' . $thread['user'] . '</a>,';
            $threadDiv .= '<small id="dateAlert">' . $thread['publicationDate'] . '</small>';
            $threadDiv .= '</div>';
            $threadDiv .= '</div>';

            echo $threadDiv;
        }
    }
    echo '</div>';
    echo '</div>';
}

displayThreads();
var_dump($threads);
?>
    </section>
=======
<?php

?>
<div id="main">
    <section class="forum" id="forum">
        <h1>Have fun through the forums!</h1>
        <input type="button" value="New thread" id="newThread">
        <form action="/thread" method="POST" id="threadForm">
            <label for="tag">Tag:</label>
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
                <input type="submit" name="threadPost" value="Create" onclick="createThread()">
            </div>
        </form>

<?php
function displayThreads()
{
    global $threads, $users, $score;
    echo '<div class="forumcontainer" id="forumcontainer"></div>';
    if (empty($threads)) {
        echo '<p>No threads available</p>';
    } else {
        foreach ($threads as $i => $thread) {

            // Your existing code to display threads
            $threadLink = '<a href="thread?threadId=' . $i . '">';
            $threadLink .= '<h4>' . $thread['title'] . '</h4>';
            $threadLink .= '<p>An interesting ' . $thread['tag'] . '\'s topic to discuss </p>';
            $threadLink .= '</a>';

            $threadDiv = '<div class="subforum-row">';
            $threadDiv .= '<div class="subforum-icon subforum-column center" id="icon">';
            $threadDiv .= '<i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>';
            $threadDiv .= '</div>';
            $threadDiv .= '<div class="subforum-description subforum-column" id="subDescript">';
            $threadDiv .= '<ul class="thread-list">';
            $threadDiv .= '<li>' . $threadLink . '</li>';
            $threadDiv .= '</ul>';
            $threadDiv .= '</div>';
            $threadDiv .= '<div class="subforum-stats subforum-column center">';
            $threadDiv .= '<span><a href="" id="topicPost">' . ($score + 1) . ' Posts | <a href="" id="topics">' . ($score + 1) . ' Topics</a></span>';
            $threadDiv .= '</div>';
            $threadDiv .= '<div class="subforum-info subforum-column">';
            $threadDiv .= '<b><a href="#">Last post</a></b> by <a href="#">' . $thread['user'] . '</a>,';
            $threadDiv .= '<small id="dateAlert">' . $thread['publicationDate'] . '</small>';
            $threadDiv .= '</div>';
            $threadDiv .= '</div>';

            echo $threadDiv;
        }
    }
    echo '</div>';
    echo '</div>';
}

displayThreads();
var_dump($threads);
?>
    </section>
>>>>>>> 19db88153d4fb2b0737212ded8e024505fda031c
</div>