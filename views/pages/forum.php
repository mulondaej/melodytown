<div id="main">
    <section class="forum" id="forum">
        <!-- Thread creation form -->

        <div class="forumcontainer">
            <?php if (!empty($_SESSION['user'])) { ?>
                <?php if (!empty($_SESSION['user'])) { ?>
                    <h1>Detendez-vous avec plaisir dans des discussions !</h1>
                <?php } else { ?>
                    <h1>Bienvenu(e) sur le forum</h1>
                <?php } ?>
                <button type="button" id="newThread" value="thread">Nouveau topic</button>

                <form action="/topics" method="POST" id="threadForm">
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
            <?php } ?>

            <div class="subforum central" id="central">
                <div class="subforum-title">
                    <h1>Central</h1>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <ul class="thread-list">
                            <!-- Thread items go here -->
                        </ul>
                        <h4><a href="/topics">Rules</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                            <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="/thread?"><?php if (!empty($_SESSION['user'])) { ?>
                                <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                    <?php } else { ?>
                        <a href="/thread?">
                            <?php setlocale(LC_TIME, 'fr_FR.utf8');
                            echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                    <?php } ?>
                    </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <!-- Thread list -->
                        <ul class="thread-list">
                            <!-- Thread items go here -->
                        </ul>
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <h4><a href="/topics?<?= $c->name ?>">News</a></h4>
                        <?php } else { ?>
                            <h4><a href="/topics?">News</a></h4>
                        <?php } ?>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                            <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="/thread?"><?php if (!empty($_SESSION['user'])) { ?>
                                <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                    <?php } else { ?>
                        <a href="/thread?">
                            <?php setlocale(LC_TIME, 'fr_FR.utf8');
                            echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                    <?php } ?>
                    </div>
                </div>
                <?php if (!empty($_SESSION['user'])) { ?>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <!-- Thread list -->
                            <ul class="thread-list">
                                <!-- Thread items go here -->
                            </ul>
                            <h4><a href="/topics">Events</a></h4>
                            <p>Description Content: let's try to be cool</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post</a></b> by <a href="/thread?"><?= $latestAnswer->username ?>,
                                <?= $latestAnswer->publicationDate ?></a>
                        </div>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <!-- Thread list -->
                            <ul class="thread-list">
                                <!-- Thread items go here -->
                            </ul>
                            <h4><a href="/topics">Welcome</a></h4>
                            <p>Description Content: let's try to be cool</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="/" id="topicPost"><?= $postCount ?></a> Posts |
                                <a href="/" id="topics"><?= $topicCount ?></a> Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post</a></b> by <a href="/thread?"><?= $latestAnswer->username ?>,
                                <?= $latestAnswer->publicationDate ?></a>
                        </div>
                    </div>
            </div>
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
                    <h4><a href="/topics">Bleach</a></h4>
                    <div>
                        <h5><a href="/topics">Discussions</a></h5>
                        <h5><a href="/topics">Théories</a></h5>
                        <h5><a href="/topics">Versus</a></h5>
                        <h5><a href="/topics">News</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost"><?= $postCount ?></a> Posts | <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
            </div>
            <hr class="subforum-devider">
            <div class="subforum-row">
                <div class="subforum-icon subforum-column ">
                    <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="/topics">Naruto</a></h4>
                    <div>
                        <h5><a href="/topics">Discussions</a></h5>
                        <h5><a href="/topics">Théories</a></h5>
                        <h5><a href="/topics">Versus</a></h5>
                        <h5><a href="/topics">News</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost"><?= $postCount ?></a> Posts | <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
            </div>
            <hr class="subforum-devider">
            <div class="subforum-row">
                <div class="subforum-icon subforum-column ">
                    <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="/topics">One Piece</a></h4>
                    <div>
                        <h5><a href="/topics">Discussions</a></h5>
                        <h5><a href="/topics">Théories</a></h5>
                        <h5><a href="/topics">Versus</a></h5>
                        <h5><a href="/topics">News</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost"><?= $postCount ?></a> Posts | <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
            </div>
            <hr class="subforum-devider">
            <div class="subforum-row">
                <div class="subforum-icon subforum-column ">
                    <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="/topics">Hunter X Hunter</a></h4>
                    <div>
                        <h5><a href="/topics">Discussions</a></h5>
                        <h5><a href="/topics">Théories</a></h5>
                        <h5><a href="/topics">Versus</a></h5>
                        <h5><a href="/topics">News</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost"><?= $postCount ?></a> Posts | <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
            </div>
            <hr class="subforum-devider">
            <div class="subforum-row">
                <div class="subforum-icon subforum-column ">
                    <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="/topics">Golden</a></h4>
                    <div>
                        <h5><a href="/topics">DBZ</a></h5>
                        <h5><a href="/topics">Saint Seiya</a></h5>
                        <h5><a href="/topics">Sailor Moon</a></h5>
                        <h5><a href="/topics">Pokemon</a></h5>
                        <h5><a href="/topics">JoJo Bizarre</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost"><?= $postCount ?></a> Posts | <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
            </div>
            <div class="subforum-row">
                <div class="subforum-icon subforum-column ">
                    <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="/topics">New Gen</a></h4>
                    <div>
                        <h5><a href="/topics">My Hero Academia</a></h5>
                        <h5><a href="/topics">Kingdom</a></h5>
                        <h5><a href="/topics">One Punchman</a></h5>
                        <h5><a href="/topics">Jujustu no Kaisen</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost"><?= $postCount ?></a> Posts | <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
            </div>
            <div class="subforum-row">
                <div class="subforum-icon subforum-column ">
                    <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="/topics">Finished series</a></h4>
                    <div>
                        <h5><a href="/topics">Reborn</a></h5>
                        <h5><a href="/topics">Fairytail</a></h5>
                        <h5><a href="/topics">Seven Deadly Sins</a></h5>
                        <h5><a href="/topics">Hajime no Ippo</a></h5>
                        <h5><a href="/topics">more</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost"><?= $postCount ?></a> Posts | <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
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
                        <h4><a href="/topics">Marvel</a></h4>
                        <div>
                            <h5><a href="/topics">Comics</a></h5>
                            <h5><a href="/topics">Animated series</a></h5>
                            <h5><a href="/topics">Series/ Movies</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="/" id="topicPost"><?= $postCount ?></a> Posts |
                            <a href="/" id="topics"><?= $topicCount ?></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics">D.C</a></h4>
                        <div>
                            <h5><a href="/topics">Comics</a></h5>
                            <h5><a href="/topics">Animated series</a></h5>
                            <h5><a href="/topics">Series/ Movies</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                            <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics">Other publishers</a></h4>
                        <div>
                            <h5><a href="/topics">Invincible</a></h5>
                            <h5><a href="/topics">other Series</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                            <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
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
                            <h4><a href="/topics">Well-known</a></h4>
                            <div>
                                <h5><a href="/topics">Solo-Leveling</a></h5>
                                <h5><a href="/topics">Noblesse</a></h5>
                                <h5><a href="/topics">GoH</a></h5>
                                <h5><a href="/topics">Tower of God</a></h5>
                                <h5><a href="/topics">Let's Play</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                    </div>
                    <hr class="subforum-devider">
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics">Explore more</a></h4>
                            <div>
                                <h5><a href="/topics">Dr. Frost</a></h5>
                                <h5><a href="/topics">Gosu</a></h5>
                                <h5><a href="/topics">Dice</a></h5>
                                <h5><a href="/topics">Others</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                    </div>
                </div>

                <div class="subforum gather" id="dtories">
                    <div class="subforum-title">
                        <h1>Afrostories</h1>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics">Comics</a></h4>
                            <p>Description Content: let's try to be cool</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                    </div>
                    <hr class="subforum-devider">
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics">Series/ Movies</a></h4>
                            <p>Description Content: let's try to be cool</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                    </div>
                </div>
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
                                <h4><a href="/topics">Discussion</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                    <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/topics">Versus</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                    <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                        </div>
                    </div>
                <?php } ?>

                <?php // Découvrir 
                ?>
                <div class="subforum discover" id="explore">
                    <div class="subforum-title">
                        <h1>Découvrir</h1>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics">Hottest ongoing series</a></h4>
                            <p>Description Content: let's try to be cool</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                    </div>
                    <hr class="subforum-devider">
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics">Latest animated series</a></h4>
                            <p>Description Content: let's try to be cool</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                    </div>
                    <hr class="subforum-devider">
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics">Animated series</a></h4>
                            <p>Description Content: let's try to be cool</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                    </div>
                </div>

                <div class="subforum gather" id="gather">
                    <div class="subforum-title">
                        <?php foreach ($categoriesList as $c) { ?>
                            <h1><?= $c->name == [1] ?></h1>
                        <?php } ?>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics">Political</a></h4>
                            <p>Description Content: let's try to be cool</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                    </div>
                    <hr class="subforum-devider">
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics">Social</a></h4>
                            <p>Description Content: let's try to be cool</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                    </div>
                </div>

                <div class="subforum" id="underground">
                    <div class="subforum-title">
                        <h1>Baze</h1>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics">Main lounge</a></h4>
                            <p>Description Content: let's try to be cool</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                    </div>
                    <hr class="subforum-devider">
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics">Clubs</a></h4>
                            <p>Description Content: let's try to be cool</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="/thread?">   
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                    </div>
                    <?php if (!empty($_SESSION['user'])) { ?>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/topics">Archives</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="topicPost"><?= $postCount ?></a> Posts |
                                    <a href="" id="topics"><?= $topicCount ?></a> Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> par <a href="/thread?"><?= $latestAnswer->username ?>, 
                                <?= $latestAnswer->publicationDate ?></a>
                            </div>
                        </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </section>

    <!--Aside bar-->
    <aside class="right-sidebar">
        <?php if (!empty($_SESSION['user'])) { ?>
        <div class="updates">
            <h2>Staff</h2>
            <ul>
                <li><a href="/#"><b>Admin:</b> </a><span id="members-online">
                    <a href="#profile">
                    <?php if($_SESSION['user']['id_usersRoles'] == '258') { ?>
                            <?= $userAccount->username ?>
                        <?php } ?></a></span></li> 
                <li><a href="/#"><b>Moderators:</b> </a><span id="members-online">
                    <a href="#profile">
                    <?php if($_SESSION['user']['id_usersRoles'] == '142') { ?>
                            <?= $userAccount->username ?>
                        <?php } ?></a></span></li>
            </ul>
        </div>
            <div class="updates">
                <h2>A venir</h2>
                <ul>
                    <li><a href="#news"><b>News:</b> </a><span id="members-online"><a href="#profile">0</a></span></li>
                    <li><a href="#events"><b>Tournaments:</b> </a><span id="members-online"><a href="#profile">0</a></span>
                    </li>
                    <li><a href="#events"><b>Events:</b> </a><span id="posts-posted"><a href="/topics">0</a></span></li>
                </ul>
            </div>
        <?php } ?>
        <div class="updates">
            <h2>Posts</h2>
            <ul>
                <?php if (!empty($_SESSION['user'])) { ?>
                <li><b><a href="/thread?">Latest Post: </b></a><span id="posts-posted">
                        <a href="/thread?"> <?= $latestAnswer->content ?> </a></span></li>
                <li><b><a href="/thread?">Latest Thread: </b></a><span id="posts-posted">
                        <a href="/thread?"><?= $latestTopic->title ?> </a></span>
                </li>
                <li><b><a href="#thread">Latest Status: </b></a><span id="posts-posted"></li>
                <a href="#profile"></a></span>
                    <li><b><a href="#winners">Kings of posting: </b></a>
                        <span id="members-online"><a href="#profile">
                                <?= $userAccount->username ?></a></span>
                    </li>
                <?php } ?>

            </ul>
        </div>
        <div class="updates">
            <h2>Forum stats</h2>
            <ul>
                <li><b>Total Posts: </b><span id="posts-posted"><a href="/posts"><?= $totalCount ?></a></span></li>
                <li><b>Guests Online : </b><span id="guests-online">0</span></li>
                <?php if (!empty($_SESSION['user'])) { ?>
                    <li><b>Members Online : </b><a href=".#"> <?= $_SESSION['user']['username']  ?></a>
                        <span id="members-online">(<?= $userCount?>)</span>
                    </li>
                <?php } ?>
                <?php if (!empty($_SESSION['user'])) { ?>
                    <li><b>Newest Member: </b><span id="members-online"><a href="#profile">
                                <?= $latestUser->username ?></a></span></li>
                <?php } ?>
                <li><b>Members joined : </b><a href="#"></a><span id="members-online"><?= $userCount ?></span></li>
            </ul>
        </div>
    </aside>
</div>