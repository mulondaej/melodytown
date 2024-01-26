<?php

?>
<div id="main">
    <section class="forum" id="topicContainer">
        <h1>Have fun through the forums!</h1>
        <button type="button" id="newThread" value="thread">Nouveau topic</button>
        <!--  if(empty($_POST)) {  -->

        <form action="topics" method="POST" id="threadForm">
            <label for="tag">Tags:</label>
            <select name="tag" id="tag">
                <?php foreach ($tagsList as $t) { ?>
                    <option value="<?= $t->id ?>"><?= $t->name ?></option>
                <?php } ?>
            </select>
            <?php if (isset($errors['tag'])) : ?>
                <p><?= $errors['tag'] ?></p>
            <?php endif; ?>

            <label for="categories">Categories</label>
            <select id="categories" name="categories">
                <?php foreach ($categoriesList as $c) { ?>
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
                <input type="submit" name="threadPost" value="Create" id=>
            </div>
        </form>

        <hr>

        <div class="forumcontainer" id="forumcontainer">
            <?php if (count($topicsList) == 0) { ?>
                <p>No topics available</p>
            <?php } else { ?>
                <?php foreach ($topicsList as $t) { ?>

                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center" id="icon">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                        </div>
                        <div class="subforum-description subforum-column" id="subDescript">
                            <ul class="topic-list">
                                <h4><a href="/thread?<?= $t->id ?>">
                                        <?= $t->title ?>
                                    </a></h4>
                                <p>An interesting <?= $t->tag ?> to discuss </p>
                            </ul>
                        </div>
                        <div class="subforum-stats subforum-column center">
                            <span><a href="" id="topicPost"> <?= $countA ?> </a>Answers </a></span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><?php foreach ($answersList as $a) { ?><a href="/thread?<?= $a->content ?>"><?php } ?>
                            Last post:</a></b> by <a href="/profile?="><?= $t->username ?>,
                            <?php foreach ($answersList as $a) { ?><?php } ?> <?= $a->publicationDate ?></a>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        </main>
 
    </section>
</div>