


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


            <div class="subforum manga" id="manga">
                <div class="subforum-title">
                    <h1>Manga</h1>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i> 
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics-par-categories">Bleach </a></h4>
                        
                        <div>
                            <h6><a href="/topics-par-categories">Discussions</a></h6>
                            <h6><a href="/topics-par-categories">Théories</a></h6>
                            <h6><a href="/topics-par-categories">Versus</a></h6>
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
                                <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                        <h4><a href="/topics-par-categories"> Naruto  </a></h4>
                        <div>
                            <h6><a href="/topics-par-categories">Discussions</a></h6>
                            <h6><a href="/topics-par-categories">Théories</a></h6>
                            <h6><a href="/topics-par-categories">Versus</a></h6>
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
                                <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                        <h4><a href="/topics-par-categories">One Piece  </a></h4>
                        <div>
                            <h6><a href="/topics-par-categories">Discussions</a></h6>
                            <h6><a href="/topics-par-categories">Théories</a></h6>
                            <h6><a href="/topics-par-categories">Versus</a></h6>
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
                                <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                        <h4><a href="/topics-par-categories">Hunter X Hunter</a></h4>
                        <div>
                            <h6><a href="/topics-par-categories">Discussions</a></h6>
                            <h6><a href="/topics-par-categories">Théories</a></h6>
                            <h6><a href="/topics-par-categories">Versus</a></h6>
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
                                <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                        <h4><a href="/topics-par-categories">Golden</a></h4>
                        <div>
                            <h6><a href="/topics-par-categories">DBZ</a></h6>
                            <h6><a href="/topics-par-categories">Saint Seiya</a></h6>
                            <h6><a href="/topics-par-categories">JoJo Bizarre</a></h6>
                            <h6><a href="/topics-par-categories">Major</a></h6>
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
                                <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                echo 'User: ' . strftime('%d/%m/%Y'); ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics-par-categories">New Gen</a></h4>
                        <div>
                            <h6><a href="/topics-par-categories">MHA</a></h6>
                            <h6><a href="/topics-par-categories">Kingdom</a></h6>
                            <h6><a href="/topics-par-categories">OPM</a></h6>
                            <h6><a href="/topics-par-categories">JJK</a></h6>
                            <h6><a href="/topics-par-categories">more</a></h6>
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
                                <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                echo 'User: ' . strftime('%d/%m/%Y'); ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics-par-categories">Finished series</a></h4>
                        <div>
                            <h6><a href="/topics-par-categories">Reborn</a></h6>
                            <h6><a href="/topics-par-categories">Fairytail</a></h6>
                            <h6><a href="/topics-par-categories">AoT</a></h6>
                            <h6><a href="/topics-par-categories">more</a></h6>
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
                                <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                            <h4><a href="/topics-par-categories">Marvel</a></h4>
                            <div>
                                <h6><a href="/topics-par-categories">Comics</a></h6>
                                <h6><a href="/topics-par-categories">Series/ Movies</a></h6>
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
                                    <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                    echo 'User: ' . strftime('%d/%m/%Y'); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics-par-categories">D.C</a></h4>
                            <div>
                                <h6><a href="/topics-par-categories">Comics</a></h6>
                                <h6><a href="/topics-par-categories">Series/ Movies</a></h6>
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
                                    <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                    echo 'User: ' . strftime('%d/%m/%Y'); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics-par-categories">Other publishers</a></h4>
                            <div>
                                <h6><a href="/topics-par-categories">Invincible</a></h6>
                                <h6><a href="/topics-par-categories">other series</a></h6>
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
                                    <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                    echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                                <h4><a href="/topics-par-categories">Well-known</a></h4>
                                <div>
                                    <h6><a href="/topics-par-categories">Solo-Lvl</a></h6>
                                    <h6><a href="/topics-par-categories">Noblesse</a></h6>
                                    <h6><a href="/topics-par-categories">GoH</a></h6>
                                    <h6><a href="/topics-par-categories">ToG</a></h6>
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
                                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                        echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                                <h4><a href="/topics-par-categories">Explore more</a></h4>
                                <div>
                                    <h6><a href="/topics-par-categories">Dr. Frost</a></h6>
                                    <h6><a href="/topics-par-categories">Gosu</a></h6>
                                    <h6><a href="/topics-par-categories">Dice</a></h6>
                                    <h6><a href="/topics-par-categories">more</a></h6>
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
                                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                        echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                                <h4><a href="/topics-par-categories">Comics</a></h4>
                                <div>
                                    <h6><a href="/topics-par-categories">X-TSHERS</a></h6>
                                    <h6><a href="/topics-par-categories">UN-FAZE</a></h6>
                                    <h6><a href="/topics-par-categories">more</a></h6>
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
                                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                        echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                                <h4><a href="/topics-par-categories">Populaire</a></h4>
                                <div>
                                    <h6><a href="/topics-par-categories">Sherlock</a></h6>
                                    <h6><a href="/topics-par-categories">GoT</a></h6>
                                    <h6><a href="/topics-par-categories">Harry Potter</a></h6>
                                    <h6><a href="/topics-par-categories">more</a></h6>
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
                                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                        echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                                <h4><a href="/topics-par-categories">Autres</a></h4>
                                <div>
                                    <h6><a href="/topics-par-categories">The 100</a></h6>
                                    <h6><a href="/topics-par-categories">Atlas</a></h6>
                                    <h6><a href="/topics-par-categories">more</a></h6>
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
                                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                        echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                                    <h4><a href="/topics-par-categories">Discussion</a></h4>
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
                                            <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                            echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                                    <h4><a href="/topics-par-categories">Versus</a></h4>
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
                                            <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                            echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                                <h4><a href="/topics-par-categories">Politique</a></h4>
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
                                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                        echo 'User: ' . strftime('%d/%m/%Y'); ?>
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
                                <h4><a href="/topics-par-categories">Social</a></h4>
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
                                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                        echo 'User: ' . strftime('%d/%m/%Y'); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
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