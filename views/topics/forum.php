


<div id="main">
    <section class="forum" id="forum">

        <!-- Thread creation form -->
        <h1>Discuter avec plaisir et passion!</h1>
        <div class="forumcontainer">
            <?php if (!empty($_SESSION['user'])) { ?>
                <!-- si l'utilisateur est connecté, alors il a acces au creation du topic  -->

                <!-- button qui ouvre le modal du formulaire pour creer un nouveau topic -->
                <button type="button" id="newThread" value="topic">Nouveau topic</button>
                <div id="modalContainer">
                    <div id="modalThread">
                        <span id="threadCloseBtn">&times;</span>

                        <form action="#" method="POST" id="threadForm">
                            <label for="tag">Tags:</label>
                            <select name="tag" id="tag" value="<?= @$_POST['tag'] ?>">
                                <option selected disabled>Choisissez un tag</option>
                                <?php foreach ($tagsList as $t) { ?>
                                    <option value="<?= $t->id ?>">
                                        <?= $t->name ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <?php if (isset($errors['tag'])): ?>
                                <p id=errorsMessage><?= $errors['tag'] ?></p>
                            <?php endif; ?>

                            <label for="categories">Categories</label>
                            <select id="categories" name="categories" value="<?= @$_POST['categories'] ?>">
                                <option selected disabled>Choisissez une catégorie</option>
                                <?php foreach ($categoriesList as $c) { ?>
                                    <option value="<?= $c->id ?>">
                                        <?= $c->name ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <?php if (isset($errors['categories'])): ?>
                                <p id=errorsMessage><?= $errors['categories'] ?></p>
                            <?php endif; ?>

                            

                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" value="<?= @$_POST['title'] ?>">
                            <?php if (isset($errors['title'])): ?>
                                <p id=errorsMessage><?= $errors['title'] ?></p>
                            <?php endif; ?>

                            <label for="content">Content:</label>
                            <textarea id="content" name="content" value="<?= @$_POST['content'] ?>"></textarea>
                            <?php if (isset($errors['content'])): ?>
                                <p id=errorsMessage><?= $errors['content'] ?></p>
                            <?php endif; ?>

                            <div class="send">
                                <input type="submit" name="threadPost" value="Create">
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
            <?php } ?>

<?php if (isset($topicsList)) { ?>
            <div class="subforum manga" id="manga">
                <div class="subforum-title">
                <h1>
    <?php if(isset($topicsList)) ?>
                    <?php foreach ($topicsList as $t) {
                        if ($t->categorie) {
                            echo $t->categorie;
                        }
                    }?>
                </h1>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i> 
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Bleach </a></h4>
                        
                        <div>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Discussions</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Théories</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Versus</a></h6>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" >
                                <?= $totalCount ?>
                            </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post: </a></b>
                        <?php if (!empty($latestTopic)) { ?>
                            <a href="/topic-<?= $latestTopic->id ?>">
                            <?php } ?>
                            <?php if (!empty($_SESSION['user'])) {
                                if (!empty($latestReply)) { ?>
                                    <?= $latestReply->username ?>,
                                    <?= $latestReply->publicationDate ?>
                                </a>
                            <?php } else { ?>
                                <p>Aucune</p>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if (!empty($latestTopic)) { ?>
                                <a href="/topic-<?= $latestTopic->id ?>">
                                <?php } ?>
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>"> Naruto  </a></h4>
                        <div>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Discussions</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Théories</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Versus</a></h6>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" >
                                <?= $totalCount ?>
                            </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post: </a></b>
                        <?php if (!empty($latestTopic)) { ?>
                            <a href="/topic-<?= $latestTopic->id ?>">
                            <?php } ?>
                            <?php if (!empty($_SESSION['user'])) {
                                if (!empty($latestReply)) { ?>
                                    <?= $latestReply->username ?>,
                                    <?= $latestReply->publicationDate ?>
                                </a>
                            <?php } else { ?>
                                <p>Aucune</p>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if (!empty($latestTopic)) { ?>
                                <a href="/topic-<?= $latestTopic->id ?>">
                                <?php } ?>
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">One Piece  </a></h4>
                        <div>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Discussions</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Théories</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Versus</a></h6>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" >
                                <?= $totalCount ?>
                            </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post: </a></b>
                        <?php if (!empty($latestTopic)) { ?>
                            <a href="/topic-<?= $latestTopic->id ?>">
                            <?php } ?>
                            <?php if (!empty($_SESSION['user'])) {
                                if (!empty($latestReply)) { ?>
                                    <?= $latestReply->username ?>,
                                    <?= $latestReply->publicationDate ?>
                                </a>
                            <?php } else { ?>
                                <p>Aucune</p>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if (!empty($latestTopic)) { ?>
                                <a href="/topic-<?= $latestTopic->id ?>">
                                <?php } ?>
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>

                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Hunter X Hunter</a></h4>
                        <div>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Discussions</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Théories</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Versus</a></h6>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" >
                                <?= $totalCount ?>
                            </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post: </a></b>
                        <?php if (!empty($latestTopic)) { ?>
                            <a href="/topic-<?= $latestTopic->id ?>">
                            <?php } ?>
                            <?php if (!empty($_SESSION['user'])) {
                                if (!empty($latestReply)) { ?>
                                    <?= $latestReply->username ?>,
                                    <?= $latestReply->publicationDate ?>
                                </a>
                            <?php } else { ?>
                                <p>Aucune</p>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if (!empty($latestTopic)) { ?>
                                <a href="/topic-<?= $latestTopic->id ?>">
                                <?php } ?>
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Golden</a></h4>
                        <div>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">DBZ</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Saint Seiya</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">JoJo Bizarre</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Major</a></h6>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" >
                                <?= $totalCount ?>
                            </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post: </a></b>
                        <?php if (!empty($latestTopic)) { ?>
                            <a href="/topic-<?= $latestTopic->id ?>">
                            <?php } ?>
                            <?php if (!empty($_SESSION['user'])) {
                                if (!empty($latestReply)) { ?>
                                    <?= $latestReply->username ?>,
                                    <?= $latestReply->publicationDate ?>
                                </a>
                            <?php } else { ?>
                                <p>Aucune</p>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if (!empty($latestTopic)) { ?>
                                <a href="/topic-<?= $latestTopic->id ?>">
                                <?php } ?>
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">New Gen</a></h4>
                        <div>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">MHA</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Kingdom</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">OPM</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">JJK</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">more</a></h6>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" >
                                <?= $totalCount ?>
                            </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post: </a></b>
                        <?php if (!empty($latestTopic)) { ?>
                            <a href="/topic-<?= $latestTopic->id ?>">
                            <?php } ?>
                            <?php if (!empty($_SESSION['user'])) {
                                if (!empty($latestReply)) { ?>
                                    <?= $latestReply->username ?>,
                                    <?= $latestReply->publicationDate ?>
                                </a>
                            <?php } else { ?>
                                <p>Aucune</p>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if (!empty($latestTopic)) { ?>
                                <a href="/topic-<?= $latestTopic->id ?>">
                                <?php } ?>
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Finished series</a></h4>
                        <div>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Reborn</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Fairytail</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">AoT</a></h6>
                            <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">more</a></h6>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" >
                                <?= $totalCount ?>
                            </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post: </a></b>
                        <?php if (!empty($latestTopic)) { ?>
                            <a href="/topic-<?= $latestTopic->id ?>">
                            <?php } ?>
                            <?php if (!empty($_SESSION['user'])) {
                                if (!empty($latestReply)) { ?>
                                    <?= $latestReply->username ?>,
                                    <?= $latestReply->publicationDate ?>
                                </a>
                            <?php } else { ?>
                                <p>Aucune</p>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if (!empty($latestTopic)) { ?>
                                <a href="/topic-<?= $latestTopic->id ?>">
                                <?php } ?>
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum comics" id="comics">
                    <div class="subforum-title">
                        <h1>Comics</h1>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Marvel</a></h4>
                            <div>
                                <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Comics</a></h6>
                                <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Series/ Movies</a></h6>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="/" >
                                    <?= $totalCount ?>
                                </a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post: </a></b>
                            <?php if (!empty($latestTopic)) { ?>
                                <a href="/topic-<?= $latestTopic->id ?>">
                                <?php } ?>
                                <?php if (!empty($_SESSION['user'])) {
                                    if (!empty($latestReply)) { ?>
                                        <?= $latestReply->username ?>,
                                        <?= $latestReply->publicationDate ?>
                                    </a>
                                <?php } else { ?>
                                    <p>Aucune</p>
                                <?php } ?>
                            <?php } else { ?>
                                <?php if (!empty($latestTopic)) { ?>
                                    <a href="/topic-<?= $latestTopic->id ?>">
                                    <?php } ?>
                                    <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">D.C</a></h4>
                            <div>
                                <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Comics</a></h6>
                                <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Series/ Movies</a></h6>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" >
                                    <?= $totalCount ?>
                                </a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post: </a></b>
                            <?php if (!empty($latestTopic)) { ?>
                                <a href="/topic-<?= $latestTopic->id ?>">
                                <?php } ?>
                                <?php if (!empty($_SESSION['user'])) {
                                    if (!empty($latestReply)) { ?>
                                        <?= $latestReply->username ?>,
                                        <?= $latestReply->publicationDate ?>
                                    </a>
                                <?php } else { ?>
                                    <p>Aucune</p>
                                <?php } ?>
                            <?php } else { ?>
                                <?php if (!empty($latestTopic)) { ?>
                                    <a href="/topic-<?= $latestTopic->id ?>">
                                    <?php } ?>
                                    <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Other publishers</a></h4>
                            <div>
                                <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Invincible</a></h6>
                                <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">other series</a></h6>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" >
                                    <?= $totalCount ?>
                                </a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post: </a></b>
                            <?php if (!empty($latestTopic)) { ?>
                                <a href="/topic-<?= $latestTopic->id ?>">
                                <?php } ?>
                                <?php if (!empty($_SESSION['user'])) {
                                    if (!empty($latestReply)) { ?>
                                        <?= $latestReply->username ?>,
                                        <?= $latestReply->publicationDate ?>
                                    </a>
                                <?php } else { ?>
                                    <p>Aucune</p>
                                <?php } ?>
                            <?php } else { ?>
                                <?php if (!empty($latestTopic)) { ?>
                                    <a href="/topic-<?= $latestTopic->id ?>">
                                    <?php } ?>
                                    <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <hr class="subforum-devider">

                    <div class="subforum webtoon" id="webtoon">
                        <div class="subforum-title">
                            <h1>Webtoon</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Well-known</a></h4>
                                <div>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Solo-Lvl</a></h6>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Noblesse</a></h6>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">GoH</a></h6>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">ToG</a></h6>
                                </div>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" >
                                        <?= $totalCount ?>
                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b>
                                <?php if (!empty($latestTopic)) { ?>
                                    <a href="/topic-<?= $latestTopic->id ?>">
                                    <?php } ?>
                                    <?php if (!empty($_SESSION['user'])) {
                                        if (!empty($latestReply)) { ?>
                                            <?= $latestReply->username ?>,
                                            <?= $latestReply->publicationDate ?>
                                        </a>
                                    <?php } else { ?>
                                        <p>Aucune</p>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if (!empty($latestTopic)) { ?>
                                        <a href="/topic-<?= $latestTopic->id ?>">
                                        <?php } ?>
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Explore more</a></h4>
                                <div>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Dr. Frost</a></h6>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Gosu</a></h6>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Dice</a></h6>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">more</a></h6>
                                </div>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" >
                                        <?= $totalCount ?>
                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b>
                                <?php if (!empty($latestTopic)) { ?>
                                    <a href="/topic-<?= $latestTopic->id ?>">
                                    <?php } ?>
                                    <?php if (!empty($_SESSION['user'])) {
                                        if (!empty($latestReply)) { ?>
                                            <?= $latestReply->username ?>,
                                            <?= $latestReply->publicationDate ?>
                                        </a>
                                    <?php } else { ?>
                                        <p>Aucune</p>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if (!empty($latestTopic)) { ?>
                                        <a href="/topic-<?= $latestTopic->id ?>">
                                        <?php } ?>
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="subforum gather" id="afrostories">
                        <div class="subforum-title">
                            <h1>Afrostories</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Comics</a></h4>
                                <div>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">X-TSHERS</a></h6>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">UN-FAZE</a></h6>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">more</a></h6>
                                </div>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" >
                                        <?= $totalCount ?>
                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b>
                                <?php if (!empty($latestTopic)) { ?>
                                    <a href="/topic-<?= $latestTopic->id ?>">
                                    <?php } ?>
                                    <?php if (!empty($_SESSION['user'])) {
                                        if (!empty($latestReply)) { ?>
                                            <?= $latestReply->username ?>,
                                            <?= $latestReply->publicationDate ?>
                                        </a>
                                    <?php } else { ?>
                                        <p>Aucune</p>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if (!empty($latestTopic)) { ?>
                                        <a href="/topic-<?= $latestTopic->id ?>">
                                        <?php } ?>
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <hr class="subforum-devider">

                    </div>
                    <div class="subforum webtoon" id="webtoon">
                        <div class="subforum-title">
                            <h1>Novels</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Populaire</a></h4>
                                <div>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Sherlock</a></h6>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">GoT</a></h6>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Harry Potter</a></h6>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">more</a></h6>
                                </div>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" >
                                        <?= $totalCount ?>
                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b>
                                <?php if (!empty($latestTopic)) { ?>
                                    <a href="/topic-<?= $latestTopic->id ?>">
                                    <?php } ?>
                                    <?php if (!empty($_SESSION['user'])) {
                                        if (!empty($latestReply)) { ?>
                                            <?= $latestReply->username ?>,
                                            <?= $latestReply->publicationDate ?>
                                        </a>
                                    <?php } else { ?>
                                        <p>Aucune</p>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if (!empty($latestTopic)) { ?>
                                        <a href="/topic-<?= $latestTopic->id ?>">
                                        <?php } ?>
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Autres</a></h4>
                                <div>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">The 100</a></h6>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Atlas</a></h6>
                                    <h6><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">more</a></h6>
                                </div>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" >
                                        <?= $totalCount ?>
                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b>
                                <?php if (!empty($latestTopic)) { ?>
                                    <a href="/topic-<?= $latestTopic->id ?>">
                                    <?php } ?>
                                    <?php if (!empty($_SESSION['user'])) {
                                        if (!empty($latestReply)) { ?>
                                            <?= $latestReply->username ?>,
                                            <?= $latestReply->publicationDate ?>
                                        </a>
                                    <?php } else { ?>
                                        <p>Aucune</p>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if (!empty($latestTopic)) { ?>
                                        <a href="/topic-<?= $latestTopic->id ?>">
                                        <?php } ?>
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <hr class="subforum-devider">
                    <?php if (!empty($_SESSION['user'])) { ?>
                        <div class="subforum arena" id="battledome">
                            <div class="subforum-title">
                                <h1>Multiverse</h1>
                            </div>
                            <div class="subforum-row">
                                <div class="subforum-icon subforum-column ">
                                    <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                                </div>
                                <div class="subforum-description subforum-column">
                                    <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Discussion</a></h4>
                                    <p>Restons poli dans la discussion</p>
                                </div>
                                <div class="subforum-stats subforum-column ">
                                    <span><a href="" >
                                            <?= $totalCount ?>
                                        </a> posts</span>
                                </div>
                                <div class="subforum-info subforum-column">
                                    <b><a href="">Last post: </a></b>
                                    <?php if (!empty($latestTopic)) { ?>
                                        <a href="/topic-<?= $latestTopic->id ?>">
                                        <?php } ?>
                                        <?php if (!empty($_SESSION['user'])) {
                                            if (!empty($latestReply)) { ?>
                                                <?= $latestReply->username ?>,
                                                <?= $latestReply->publicationDate ?>
                                            </a>
                                        <?php } else { ?>
                                            <p>Aucune</p>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php if (!empty($latestTopic)) { ?>
                                            <a href="/topic-<?= $latestTopic->id ?>">
                                            <?php } ?>
                                            <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <hr class="subforum-devider">
                            <div class="subforum-row">
                                <div class="subforum-icon subforum-column ">
                                    <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                                </div>
                                <div class="subforum-description subforum-column">
                                    <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Versus</a></h4>
                                    <p>Tête à tête</p>
                                </div>
                                <div class="subforum-stats subforum-column ">
                                    <span><a href="" >
                                            <?= $totalCount ?>
                                        </a> posts</span>
                                </div>
                                <div class="subforum-info subforum-column">
                                    <b><a href="">Last post: </a></b>
                                    <?php if (!empty($latestTopic)) { ?>
                                        <a href="/topic-<?= $latestTopic->id ?>">
                                        <?php } ?>
                                        <?php if (!empty($_SESSION['user'])) {
                                            if (!empty($latestReply)) { ?>
                                                <?= $latestReply->username ?>,
                                                <?= $latestReply->publicationDate ?>
                                            </a>
                                        <?php } else { ?>
                                            <p>Aucune</p>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php if (!empty($latestTopic)) { ?>
                                            <a href="/topic-<?= $latestTopic->id ?>">
                                            <?php } ?>
                                            <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                    <div class="subforum gather" id="gather">
                        <div class="subforum-title">
                            <h1>Controverse</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Politique</a></h4>
                                <p>Soyons respecteux dans la discussion</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" >
                                        <?= $totalCount ?>
                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b><a href="">
                                    <?php if (!empty($_SESSION['user'])) {
                                        if (!empty($latestReply)) { ?>
                                            <?= $latestReply->username ?>,
                                            <?= $latestReply->publicationDate ?>
                                        </a>
                                    <?php } else { ?>
                                        <p>Aucune</p>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if (!empty($latestTopic)) { ?>
                                        <a href="/topic-<?= $latestTopic->id ?>">
                                        <?php } ?>
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Social</a></h4>
                                <p>Soyons respecteux dans la discussion</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" >
                                        <?= $totalCount ?>
                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b><a href="">
                                    <?php if (!empty($_SESSION['user'])) {
                                        if (!empty($latestReply)) { ?>
                                            <?= $latestReply->username ?>,
                                            <?= $latestReply->publicationDate ?>
                                        </a>
                                    <?php } else { ?>
                                        <p>Aucune</p>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if (!empty($latestTopic)) { ?>
                                        <a href="/topic-<?= $latestTopic->id ?>">
                                        <?php } ?>
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
                <?php } ?>n 
            </div>
    </section>

    <!--Aside bar-->
    <aside class="right-sidebar">

        <div class="updates">
            <h2>Les Publications</h2>
            <ul>
                <?php if (!empty($_SESSION['user'])) {
                    if (!empty($latestReply)) { ?>
                        <li><b>Dèrnière Publication: </b><a href="/topic-<?= $latestReply->id_topics ?>">
                                <?= $latestReply->content ?>
                            </a><span id="posts-posted">
                                <?php if (!empty($latestTopic)) { ?>par <a href="/topic-<?= $latestTopic->id ?>">
                                    <?php } ?>
                                    <?= $latestReply->username ?>
                                </a>
                            </span></li>
                    <?php } ?>
                    <?php if (!empty($latestTopic)) { ?>
                        <li><b>Dèrnière Topic: </b><a href="/topic-<?= $latestTopic->id ?>">
                                <?= $latestTopic->title ?>
                            </a>
                        <?php } ?>
                        <span id="posts-posted">
                            <?php if (!empty($latestTopic)) { ?>par <a href="/topic-<?= $latestTopic->id ?>">
                                    <?= $latestTopic->username ?>
                                </a>
                            <?php } ?>
                        </span>
                    </li>
                    <?php if (!empty($latestStatus)) { ?>
                        <li><b>Dèrnière Status: </b><a href="/profil-<?= $latestStatus->id ?>">
                                <?= $latestStatus->content ?>
                            </a>
                            <span id="posts-posted">par <a href="/profil-<?= $latestStatus->id ?>">
                                    <?= $latestStatus->username ?>
                                </a></span>
                        </li>
                    <?php } ?>

                <?php } ?>

            </ul>
        </div>
        <div class="updates">
            <h2>Le Stats du Forum</h2>
            <ul>
                <li><b>Nombre de Publication: </b><span id="posts-posted"><a href="/posts">
                            <?= $totalCount ?>
                        </a></span></li>
                <li><b>Guests : </b><span id="guests-online">0</span></li>
                <?php if (!empty($_SESSION['user'])) { ?>
                    <li><b>Membres en ligne : </b><a href=".#">
                            <?= $_SESSION['user']['username'] ?>
                        </a>
                        <span id="members-online">(
                            <?= $userCount ?>)
                        </span>
                    <?php } ?>
                    <?php if (!empty($_SESSION['user'])) { ?>
                    <li><b>Nouveau Membre: </b><span id="members-online"><a href="/profil-<?= $latestUser->id ?>">
                                <?= $latestUser->username ?>
                            </a></span></li>
                <?php } ?>
                <li><b>Members actif : </b><a href="#"></a><span id="members-online">
                        <?= $userCount ?>
                    </span></li>
            </ul>
        </div>
    </aside>
</div>