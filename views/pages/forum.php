<div id="main">
    <?php if (isset($_GET['deleteAccount'])) { ?>
        <p>Votre compte a bien été supprimé.</p>
    <?php } ?>
<section class="forum" id="forum">
    <!-- Thread creation form -->
    <div class="forumcontainer">
        <?php if (!empty($_SESSION['user'])) { ?>
            <h1>Detendez-vous avec plaisir dans des discussions !</h1>
            <input id="newThread" type="button" value="Create new thread" href="/topic">
            <?php
            if (empty($_POST) || !empty($errors)) {
            ?>
                <form action='/forum' method="POST" id="threadForm">
                    <label for="tag">Tag:</label>
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
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p>
            <?php } ?>
            <?php
            var_dump($_POST);
            ?>
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
                    <h4><a href="#">Rules</a></h4>
                    <p>Description Content: let's try to be cool</p>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                        Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                    <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
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
                    <h4><a href="#">News</a></h4>
                    <p>Description Content: let's try to be cool</p>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                        Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                    <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
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
                        <h4><a href="#">Events</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
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
                        <h4><a href="#">Welcome</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
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
                <h4><a href="#">Bleach</a></h4>
                <div>
                    <h5><a href="#">Discussions</a></h5>
                    <h5><a href="#">Théories</a></h5>
                    <h5><a href="#">Versus</a></h5>
                    <h5><a href="#">News</a></h5>
                </div>
            </div>
            <div class="subforum-stats subforum-column ">
                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
            </div>
        </div>
        <hr class="subforum-devider">
        <div class="subforum-row">
            <div class="subforum-icon subforum-column ">
                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
            </div>
            <div class="subforum-description subforum-column">
                <h4><a href="#">Naruto</a></h4>
                <div>
                    <h5><a href="#">Discussions</a></h5>
                    <h5><a href="#">Théories</a></h5>
                    <h5><a href="#">Versus</a></h5>
                    <h5><a href="#">News</a></h5>
                </div>
            </div>
            <div class="subforum-stats subforum-column ">
                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
            </div>
        </div>
        <hr class="subforum-devider">
        <div class="subforum-row">
            <div class="subforum-icon subforum-column ">
                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
            </div>
            <div class="subforum-description subforum-column">
                <h4><a href="#">One Piece</a></h4>
                <div>
                    <h5><a href="#">Discussions</a></h5>
                    <h5><a href="#">Théories</a></h5>
                    <h5><a href="#">Versus</a></h5>
                    <h5><a href="#">News</a></h5>
                </div>
            </div>
            <div class="subforum-stats subforum-column ">
                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
            </div>
        </div>
        <hr class="subforum-devider">
        <div class="subforum-row">
            <div class="subforum-icon subforum-column ">
                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
            </div>
            <div class="subforum-description subforum-column">
                <h4><a href="#">Hunter X Hunter</a></h4>
                <div>
                    <h5><a href="#">Discussions</a></h5>
                    <h5><a href="#">Théories</a></h5>
                    <h5><a href="#">Versus</a></h5>
                    <h5><a href="#">News</a></h5>
                </div>
            </div>
            <div class="subforum-stats subforum-column ">
                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
            </div>
        </div>
        <hr class="subforum-devider">
        <div class="subforum-row">
            <div class="subforum-icon subforum-column ">
                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
            </div>
            <div class="subforum-description subforum-column">
                <h4><a href="#">Golden</a></h4>
                <div>
                    <h5><a href="#">DBZ</a></h5>
                    <h5><a href="#">Saint Seiya</a></h5>
                    <h5><a href="#">Sailor Moon</a></h5>
                    <h5><a href="#">Pokemon</a></h5>
                </div>
            </div>
            <div class="subforum-stats subforum-column ">
                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
            </div>
        </div>
        <div class="subforum-row">
            <div class="subforum-icon subforum-column ">
                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
            </div>
            <div class="subforum-description subforum-column">
                <h4><a href="#">Exceptional</a></h4>
                <div>
                    <h5><a href="#">Reborn</a></h5>
                    <h5><a href="#">Fairytail</a></h5>
                    <h5><a href="#">Seven Deadly Sins</a></h5>
                    <h5><a href="#">Hajime no Ippo</a></h5>
                    <h5><a href="#">JoJo Bizarre</a></h5>
                </div>
            </div>
            <div class="subforum-stats subforum-column ">
                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
            </div>
        </div>
        <div class="subforum-row">
            <div class="subforum-icon subforum-column ">
                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
            </div>
            <div class="subforum-description subforum-column">
                <h4><a href="#">New Gen</a></h4>
                <div>
                    <h5><a href="#">My Hero Academia</a></h5>
                    <h5><a href="#">Kingdom</a></h5>
                    <h5><a href="#">One Punchman</a></h5>
                    <h5><a href="#">Jujustu no Kaisen</a></h5>
                </div>
            </div>
            <div class="subforum-stats subforum-column ">
                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
            </div>
        </div>
        <div class="subforum-row">
            <div class="subforum-icon subforum-column ">
                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
            </div>
            <div class="subforum-description subforum-column">
                <h4><a href="#">Finished series</a></h4>
            </div>
            <div class="subforum-stats subforum-column ">
                <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
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
                    <h4><a href="#">Marvel</a></h4>
                    <div>
                        <h5><a href="#">Comics</a></h5>
                        <h5><a href="#">Animated series</a></h5>
                        <h5><a href="#">Series/ Movies</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                        Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                    <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
                </div>
            </div>
            <div class="subforum-row">
                <div class="subforum-icon subforum-column ">
                    <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="#">D.C</a></h4>
                    <div>
                        <h5><a href="#">Comics</a></h5>
                        <h5><a href="#">Animated series</a></h5>
                        <h5><a href="#">Series/ Movies</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                        Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                    <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
                </div>
            </div>
            <div class="subforum-row">
                <div class="subforum-icon subforum-column ">
                    <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="#">Other publish</a></h4>
                    <div>
                        <h5><a href="#">Invincible</a></h5>
                        <h5><a href="#">other Series</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                        Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                    <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
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
                        <h4><a href="#">Well-known</a></h4>
                        <div>
                            <h5><a href="#">Solo-Leveling</a></h5>
                            <h5><a href="#">Noblesse</a></h5>
                            <h5><a href="#">GoH</a></h5>
                            <h5><a href="#">Tower of God</a></h5>
                            <h5><a href="#">Let's Play</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Explore</a></h4>
                        <div>
                            <h5><a href="#">Dr. Frost</a></h5>
                            <h5><a href="#">Gosu</a></h5>
                            <h5><a href="#">Nano</a></h5>
                            <h5><a href="#">Dice</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
                    </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <ul class="thread-list">
                            <h4><a href="#">More</a></h4>
                            <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
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
                        <h4><a href="#">Comics</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Series/ Movies</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
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
                            <h4><a href="#">Discussion</a></h4>
                            <p>Description Content: let's try to be cool</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                            <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
                        </div>
                    </div>
                    <hr class="subforum-devider">
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="#">Versus</a></h4>
                            <p>Description Content: let's try to be cool</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                            <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
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
                        <h4><a href="#">Hottest ongoing series</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Latest animated series</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Animated series</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
                    </div>
                </div>
            </div>

            <div class="subforum gather" id="gather">
                <div class="subforum-title">
                    <h1>Générale</h1>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Political</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Social</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
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
                        <h4><a href="#">Main lounge</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Clubs</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
                    </div>
                </div>
                <?php if (!empty($_SESSION['user'])) { ?>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Archives</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                            Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                        <small id="dateAlert"><p><?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%A, %d %B %Y')); ?></p></small>
                    </div>
                </div>
                <?php  } ?>
            </div>
        </div>
    </div>
</section>


<!--Aside bar-->
<aside class="right-sidebar">
    <div class="updates">
        <h2>Staff</h2>
        <ul>
            <li><a href="#">Admin: </a><span id="members-online"><a href="#profile">X</a></span></li>
            <li><a href="#">Moderators: </a><span id="members-online"><a href="#profile">0</a></span></li>
        </ul>
    </div>
    <?php if (!empty($_SESSION['user'])) { ?>
        <div class="updates">
            <h2>A venir</h2>
            <ul>
                <li><a href="#news">News: </a><span id="members-online"><a href="#profile">0</a></span></li>
                <li><a href="#events">Tournaments: </a><span id="members-online"><a href="#profile">0</a></span>
                </li>
                <li><a href="#events">Events: </a><span id="posts-posted"><a href="#">0</a></span></li>
            </ul>
        </div>
    <?php } ?>
    <div class="updates">
        <h2>Posts</h2>
        <ul>
            <li><a href="#thread">Latest Post: </a><span id="posts-posted"><a href="#profile">0</a></span></li>
            <li><a href="#thread">Latest Thread: </a><span id="posts-posted"><a href="#profile">0</a></span>
            </li>
            <li><a href="#thread">Latest Status: </a><span id="posts-posted"><a href="#profile">0</a></span>
            <li><a href="#winners">Kings of posting:</a>
                <span id="members-online"><a href="#profile">0</a></span>
                <span id="members-online"><a href="#profile">0</a></span>
                <span id="members-online"><a href="#profile">0</a></span>
            </li>
            </li>
        </ul>
    </div>
    <div class="updates">
        <h2>Forum stats</h2>
        <ul>
            <li>Newest Member: <span id="members-online"><a href="#profile">0</a></span></li>
            <li>Total Amount of Posts: <span id="posts-posted">0</span></li>
            <li><a href="../views/pages/members.php">Members Online: </a><span id="members-online">0</span></li>
            <li>Guests Online: <span id="guests-online">0</span></li>
        </ul>
    </div>
</aside>
</div>