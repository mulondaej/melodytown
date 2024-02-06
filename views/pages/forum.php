<div id="main">
    <section class="forum" id="forum">
        <!-- Thread creation form -->

        <div class="forumcontainer">
            <?php if (!empty($_SESSION['user'])) { ?>
                    <h1>Discuter avec plaisir et passion!</h1>
                    
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
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b><a href="/thread?">
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
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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
                        <h5><a href="/topics">JoJo Bizarre</a></h5>
                        <h5><a href="/topics">more</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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
                        <h5><a href="/topics">MHA</a></h5>
                        <h5><a href="/topics">Kingdom</a></h5>
                        <h5><a href="/topics">OPM</a></h5>
                        <h5><a href="/topics">JJK</a></h5>
                        <h5><a href="/topics">more</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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
                        <h5><a href="/topics">AoT</a></h5>
                        <h5><a href="/topics">more</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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
                        <span><a href="/" id="topics"><?= $totalCount ?></a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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
                        <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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
                        <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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
                                <h5><a href="/topics">S.L</a></h5>
                                <h5><a href="/topics">Noblesse</a></h5>
                                <h5><a href="/topics">GoH</a></h5>
                                <h5><a href="/topics">ToG</a></h5>
                                <h5><a href="/topics">more</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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
                            <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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
                            <div>
                                <h5><a href="/topics">X-TSHERS</a></h5>
                                <h5><a href="/topics">UN-FAZE</a></h5>
                                <h5><a href="/topics">more</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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
                        <h4><a href="/topics">Populaire</a></h4>
                        <div>
                            <h5><a href="/topics">Sherlock</a></h5>
                            <h5><a href="/topics">GoT</a></h5>
                            <h5><a href="/topics">Harry Potter</a></h5>
                            <h5><a href="/topics">more</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>,
                            <?= $latestAnswer->publicationDate ?>
                        </a>
                        <?php } else { ?>
                            <a href="/thread?">
                                <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?>
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
                        <h4><a href="/topics">Autres</a></h4>
                        <div>
                            <h5><a href="/topics">The 100</a></h5>
                            <h5><a href="/topics">Atlas</a></h5>
                            <h5><a href="/topics">more</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b><a href="/thread?">
                            <?php if (!empty($_SESSION['user'])) { ?>
                                <?= $latestAnswer->username ?>,
                                <?= $latestAnswer->publicationDate ?>
                            </a>
                        <?php } else { ?>
                            <a href="/thread?">
                                <?php setlocale(LC_TIME, 'fr_FR.utf8');
                                echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?>
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
                                <h4><a href="/topics">Discussion</a></h4>
                                <p>Restons poli dans la discussion</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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
                                <p>Tête à tête</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href="/thread?">
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


                <div class="subforum gather" id="gather">
                    <div class="subforum-title">
                        <h1>Controverse</h1>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics">Politique</a></h4>
                            <p>Soyons respecteux dans la discussion</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href=""><?php if (!empty($_SESSION['user'])) { ?>
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
                            <p>Soyons respecteux dans la discussion</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b><a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
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
            <h2>posts</h2>
            <ul>
                <?php if (!empty($_SESSION['user'])) { ?>
                    <li><b>Latest Post: </b><a href="/thread?"><?= $latestAnswer->content ?>
                        </a><span id="posts-posted">by <a href="/thread?">
                                <?= $latestAnswer->username ?>
                            </a></span></li>
                    <li><b>Latest Thread: </b><a href="/thread?"><?= $latestTopic->title ?></a>
                        <span id="posts-posted">by <a href="/thread?">
                                <?= $latestTopic->username ?>
                            </a></span></li>
                    <li><b>Latest Status: </b><a href="#profile"><?= $latestStatus->content ?>
                        </a><span id="posts-posted"><a href="#profile">
                                <?= $latestStatus->username ?>
                            </a></span></li>
                    <li><b>Kings of posting: </b><a href="#winners"></a>
                        <span id="members-online"><a href="#profile">
                                <?php if (isset($userDetails) == 0) { ?>
                                    <?= $userDetails->username ?>
                                <?php } ?>
                            </a></span></li>
                <?php } ?>

            </ul>
        </div>
        <div class="updates">
            <h2>Forum stats</h2>
            <ul>
                <li><b>Total posts: </b><span id="posts-posted"><a href="/posts"><?= $totalCount ?></a></span></li>
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