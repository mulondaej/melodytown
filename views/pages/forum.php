<<<<<<< HEAD
<div id="main">
    <section class="forum" id="forum">
        <h1>Have fun through the forums!</h1>
        <input id="newThread" type="button" value="Create new thread" href="/threads">
        <div class="forumcontainer" id="forumcontainer">
            <?php
            if (empty($_POST) || !empty($errors)) {
            ?>
                <form action='/threads' method="POST" id="threadForm">
                <label for="forumSelect">Select Forum:</label>
                <select id="forumSelect" name="forum">
                <option value="news">News</option>
                <option value="event">Events</option>
        <option value="manga">Manga</option>
        <option value="comics">Comics</option>
        <option value="webtoon">Comics</option>
        <option value="afrost">Afrostories</option>
        <option value="theory">Theorie</option>
        <option value="versus">Versus</option>
        <option value="multiverse">Multiverse</option>
        <option value="anime">Anime</option>
    </select>
                    <?php if (isset($errors['forumSelect'])) { ?>
                        <p><?= $errors['forumSelect'] ?></p>
                    <?php } ?>
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title"><br>
                    <?php if (isset($errors['title'])) { ?>
                        <p><?= $errors['title'] ?></p>
                    <?php } ?>
                    <label for="content">Content:</label><br>
                    <textarea id="content" name="content"></textarea>
                    <?php if (isset($errors['content'])) { ?>
                        <p><?= $errors['content'] ?></p>
                    <?php } ?>
                    <div class="send">
                        <input id="createThread" type="submit" value="create" name="threadPost">
                    </div>
                </form>
                <? } else { ?>
        <h2><?= $_POST['title'] ?></h2><br>
        <p><?= $_POST['content'] ?></p>
        <p><?= setlocale(LC_TIME, 'fr_FR');
                date_default_timezone_set('Europe/Paris');
                echo utf8_encode(strftime('%H:%M')); ?></p>
    <?php } ?>
            <?php
            var_dump($_POST);
            ?>
            <div class="subforum manga" id="manga">
                <div class="subforum-title">
                    <h1>Manga</h1>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Bleach</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">Discussions</a></h5>
                            <h5><a href="#">Theories</a></h5>
                            <h5><a href="#">Versus</a></h5>
                            <h5><a href="#">News</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Naruto</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">Discussions</a></h5>
                            <h5><a href="#">Theories</a></h5>
                            <h5><a href="#">Versus</a></h5>
                            <h5><a href="#">News</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">One Piece</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">Discussions</a></h5>
                            <h5><a href="#">Theories</a></h5>
                            <h5><a href="#">Versus</a></h5>
                            <h5><a href="#">News</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Hunter X Hunter</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">Discussions</a></h5>
                            <h5><a href="#">Theories</a></h5>
                            <h5><a href="#">Versus</a></h5>
                            <h5><a href="#">News</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Golden</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">DBZ</a></h5>
                            <h5><a href="#">Saint Seiya</a></h5>
                            <h5><a href="#">Sailor Moon</a></h5>
                            <h5><a href="#">Pokemon</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Exceptional</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">Reborn</a></h5>
                            <h5><a href="#">Fairytail</a></h5>
                            <h5><a href="#">Seven Deadly Sins</a></h5>
                            <h5><a href="#">Hajime no Ippo</a></h5>
                            <h5><a href="#">JoJo Bizarre</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">New Gen</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">My Hero Academia</a></h5>
                            <h5><a href="#">Kingdom</a></h5>
                            <h5><a href="#">One Punchman</a></h5>
                            <h5><a href="#">Jujustu no Kaisen</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Finished series</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum comics" id="comics">
                    <div class="subforum-title">
                        <h1>Comics</h1>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="#">Marvel</a></h4>
                            <p>Description Content: let's try to be cool</p>
                            <div>
                                <h5><a href="#">Comics</a></h5>
                                <h5><a href="#">Animated series</a></h5>
                                <h5><a href="#">Series/ Movies</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column center">
                            <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                            <small id="dateAlert">12 Dec 2020</small>
                        </div>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="#">D.C</a></h4>
                            <p>Description Content: let's try to be cool</p>
                            <div>
                                <h5><a href="#">Comics</a></h5>
                                <h5><a href="#">Animated series</a></h5>
                                <h5><a href="#">Series/ Movies</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column center">
                            <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                            <small id="dateAlert">12 Dec 2020</small>
                        </div>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="#">Other publish</a></h4>
                            <p>Description Content: let's try to be cool</p>
                            <div>
                                <h5><a href="#">Invincible</a></h5>
                                <h5><a href="#">other Series</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column center">
                            <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                            <small id="dateAlert">12 Dec 2020</small>
                        </div>
                    </div>
                    <hr class="subforum-devider">

                    <div class="subforum webtoon" id="webtoon">
                        <div class="subforum-title">
                            <h1>Webtoon</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Well-known</a></h4>
                                <p>Description Content: let's try to be cool</p>
                                <div>
                                    <h5><a href="#">Solo-Leveling</a></h5>
                                    <h5><a href="#">Noblesse</a></h5>
                                    <h5><a href="#">GoH</a></h5>
                                    <h5><a href="#">Tower of God</a></h5>
                                    <h5><a href="#">Let's Play</a></h5>
                                </div>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Explore</a></h4>
                                <p>Description Content: let's try to be cool</p>
                                <div>
                                    <h5><a href="#">Dr. Frost</a></h5>
                                    <h5><a href="#">Gosu</a></h5>
                                    <h5><a href="#">Nano</a></h5>
                                    <h5><a href="#">Dice</a></h5>
                                </div>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <!-- Thread list -->
                                <ul class="thread-list">
                                    <!-- Thread items go here -->
                                </ul>
                                <h4><a href="#">More</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                    </div>
                    <div class="subforum gather" id="dtories">
                        <div class="subforum-title">
                            <h1>Afrostories</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Comics</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Series/ Movies</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                    </div>

                    <div class="subforum discover" id="explore">
                        <div class="subforum-title">
                            <h1>Discover</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Latest Series</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Latest animated series</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                    </div>

                    <div class="subforum" id="underground">
                        <div class="subforum-title">
                            <h1>Dungeon</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Archives</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">OFFLINE</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
=======
<div id="main">
    <section class="forum" id="forum">
        <h1>Have fun through the forums!</h1>
        <input id="newThread" type="button" value="Create new thread" href="/threads">
        <div class="forumcontainer" id="forumcontainer">
            <?php
            if (empty($_POST) || !empty($errors)) {
            ?>
                <form action='/threads' method="POST" id="threadForm">
                <label for="forumSelect">Select Forum:</label>
                <select id="forumSelect" name="forum">
                <option value="news">News</option>
                <option value="event">Events</option>
        <option value="manga">Manga</option>
        <option value="comics">Comics</option>
        <option value="webtoon">Comics</option>
        <option value="afrost">Afrostories</option>
        <option value="theory">Theorie</option>
        <option value="versus">Versus</option>
        <option value="multiverse">Multiverse</option>
        <option value="anime">Anime</option>
    </select>
                    <?php if (isset($errors['forumSelect'])) { ?>
                        <p><?= $errors['forumSelect'] ?></p>
                    <?php } ?>
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title"><br>
                    <?php if (isset($errors['title'])) { ?>
                        <p><?= $errors['title'] ?></p>
                    <?php } ?>
                    <label for="content">Content:</label><br>
                    <textarea id="content" name="content"></textarea>
                    <?php if (isset($errors['content'])) { ?>
                        <p><?= $errors['content'] ?></p>
                    <?php } ?>
                    <div class="send">
                        <input id="createThread" type="submit" value="create" name="threadPost">
                    </div>
                </form>
                <? } else { ?>
        <h2><?= $_POST['title'] ?></h2><br>
        <p><?= $_POST['content'] ?></p>
        <p><?= setlocale(LC_TIME, 'fr_FR');
                date_default_timezone_set('Europe/Paris');
                echo utf8_encode(strftime('%H:%M')); ?></p>
    <?php } ?>
            <?php
            var_dump($_POST);
            ?>
            <div class="subforum manga" id="manga">
                <div class="subforum-title">
                    <h1>Manga</h1>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Bleach</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">Discussions</a></h5>
                            <h5><a href="#">Theories</a></h5>
                            <h5><a href="#">Versus</a></h5>
                            <h5><a href="#">News</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Naruto</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">Discussions</a></h5>
                            <h5><a href="#">Theories</a></h5>
                            <h5><a href="#">Versus</a></h5>
                            <h5><a href="#">News</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">One Piece</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">Discussions</a></h5>
                            <h5><a href="#">Theories</a></h5>
                            <h5><a href="#">Versus</a></h5>
                            <h5><a href="#">News</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Hunter X Hunter</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">Discussions</a></h5>
                            <h5><a href="#">Theories</a></h5>
                            <h5><a href="#">Versus</a></h5>
                            <h5><a href="#">News</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Golden</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">DBZ</a></h5>
                            <h5><a href="#">Saint Seiya</a></h5>
                            <h5><a href="#">Sailor Moon</a></h5>
                            <h5><a href="#">Pokemon</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Exceptional</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">Reborn</a></h5>
                            <h5><a href="#">Fairytail</a></h5>
                            <h5><a href="#">Seven Deadly Sins</a></h5>
                            <h5><a href="#">Hajime no Ippo</a></h5>
                            <h5><a href="#">JoJo Bizarre</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">New Gen</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div>
                            <h5><a href="#">My Hero Academia</a></h5>
                            <h5><a href="#">Kingdom</a></h5>
                            <h5><a href="#">One Punchman</a></h5>
                            <h5><a href="#">Jujustu no Kaisen</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Finished series</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert">12 Dec 2020</small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum comics" id="comics">
                    <div class="subforum-title">
                        <h1>Comics</h1>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="#">Marvel</a></h4>
                            <p>Description Content: let's try to be cool</p>
                            <div>
                                <h5><a href="#">Comics</a></h5>
                                <h5><a href="#">Animated series</a></h5>
                                <h5><a href="#">Series/ Movies</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column center">
                            <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                            <small id="dateAlert">12 Dec 2020</small>
                        </div>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="#">D.C</a></h4>
                            <p>Description Content: let's try to be cool</p>
                            <div>
                                <h5><a href="#">Comics</a></h5>
                                <h5><a href="#">Animated series</a></h5>
                                <h5><a href="#">Series/ Movies</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column center">
                            <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                            <small id="dateAlert">12 Dec 2020</small>
                        </div>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="#">Other publish</a></h4>
                            <p>Description Content: let's try to be cool</p>
                            <div>
                                <h5><a href="#">Invincible</a></h5>
                                <h5><a href="#">other Series</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column center">
                            <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                            <small id="dateAlert">12 Dec 2020</small>
                        </div>
                    </div>
                    <hr class="subforum-devider">

                    <div class="subforum webtoon" id="webtoon">
                        <div class="subforum-title">
                            <h1>Webtoon</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Well-known</a></h4>
                                <p>Description Content: let's try to be cool</p>
                                <div>
                                    <h5><a href="#">Solo-Leveling</a></h5>
                                    <h5><a href="#">Noblesse</a></h5>
                                    <h5><a href="#">GoH</a></h5>
                                    <h5><a href="#">Tower of God</a></h5>
                                    <h5><a href="#">Let's Play</a></h5>
                                </div>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Explore</a></h4>
                                <p>Description Content: let's try to be cool</p>
                                <div>
                                    <h5><a href="#">Dr. Frost</a></h5>
                                    <h5><a href="#">Gosu</a></h5>
                                    <h5><a href="#">Nano</a></h5>
                                    <h5><a href="#">Dice</a></h5>
                                </div>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <!-- Thread list -->
                                <ul class="thread-list">
                                    <!-- Thread items go here -->
                                </ul>
                                <h4><a href="#">More</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                    </div>
                    <div class="subforum gather" id="dtories">
                        <div class="subforum-title">
                            <h1>Afrostories</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Comics</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Series/ Movies</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                    </div>

                    <div class="subforum discover" id="explore">
                        <div class="subforum-title">
                            <h1>Discover</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Latest Series</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Latest animated series</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                    </div>

                    <div class="subforum" id="underground">
                        <div class="subforum-title">
                            <h1>Dungeon</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Archives</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">OFFLINE</a></h4>
                                <p>Description Content: let's try to be cool</p>
                            </div>
                            <div class="subforum-stats subforum-column center">
                                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                    Topics</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                                <small id="dateAlert">12 Dec 2020</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
>>>>>>> 19db88153d4fb2b0737212ded8e024505fda031c
    