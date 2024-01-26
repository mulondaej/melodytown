<div id="main">

    <section class="forum" id="forum">

    <!-- Thread creation form -->
    <div class="forumcontainer">
        <?php if (!empty($_SESSION['user'])) { ?>
            <h1>Detendez-vous avec plaisir dans des discussions !</h1>
            <a href="/topics">Nouveau topic</a>

        <?php } ?>

        <?php if (!empty($_SESSION['topics'])) { ?>
            'header(Location : /error404)'
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
                    <span><a href="" id="topicPost"></a> Posts | <a href="" id="topics"></a>
                        Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                        <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
                    
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
                    <h4><a href="/topics">News</a></h4>
                    <p>Description Content: let's try to be cool</p>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost"></a> Posts | <a href="" id="topics"></a>
                        Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                        <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                            <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                            <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                <span><a href="" id="topicPost"></a> Posts | <a href="" id="topics"></a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                    <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')); ?></a>
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
                <span><a href="" id="topicPost"></a> Posts | <a href="" id="topics"></a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                    <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')); ?></a>
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
                <span><a href="" id="topicPost"></a> Posts | <a href="" id="topics"></a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                    <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')); ?></a>
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
                <span><a href="" id="topicPost"></a> Posts | <a href="" id="topics"></a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                    <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')); ?></a>
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
                </div>
            </div>
            <div class="subforum-stats subforum-column ">
                <span><a href="" id="topicPost"></a> Posts | <a href="" id="topics"></a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                    <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')); ?></a>
            </div>
        </div>
        <div class="subforum-row">
            <div class="subforum-icon subforum-column ">
                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
            </div>
            <div class="subforum-description subforum-column">
                <h4><a href="/topics">Exceptional</a></h4>
                <div>
                    <h5><a href="/topics">Reborn</a></h5>
                    <h5><a href="/topics">Fairytail</a></h5>
                    <h5><a href="/topics">Seven Deadly Sins</a></h5>
                    <h5><a href="/topics">Hajime no Ippo</a></h5>
                    <h5><a href="/topics">JoJo Bizarre</a></h5>
                </div>
            </div>
            <div class="subforum-stats subforum-column ">
                <span><a href="" id="topicPost"></a> Posts | <a href="" id="topics"></a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                    <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')); ?></a>
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
                <span><a href="" id="topicPost"></a> Posts | <a href="" id="topics"></a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                    <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')); ?></a>
            </div>
        </div>
        <div class="subforum-row">
            <div class="subforum-icon subforum-column ">
                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
            </div>
            <div class="subforum-description subforum-column">
                <h4><a href="/topics">Finished series</a></h4>
            </div>
            <div class="subforum-stats subforum-column ">
                <span><a href="" id="topicPost"></a> Posts | <a href="" id="topics"></a> Topics</span>
            </div>
            <div class="subforum-info subforum-column">
                <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                    <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')); ?></a>
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
                    <span><a href="" id="topicPost"></a> Posts | <a href="" id="topics"></a>
                        Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                                <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                    <span><a href="" id="topicPost"></a> Posts | <a href="" id="topics"></a>
                        Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                                <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
                </div>
            </div>
            <div class="subforum-row">
                <div class="subforum-icon subforum-column ">
                    <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="/topics">Other publish</a></h4>
                    <div>
                        <h5><a href="/topics">Invincible</a></h5>
                        <h5><a href="/topics">other Series</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topicPost"></a> Posts | <a href="" id="topics"></a>
                        Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                                <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post :</a></b> <a href="">JustAUser, 
                            <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
                    </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics">Explore</a></h4>
                        <div>
                            <h5><a href="/topics">Dr. Frost</a></h5>
                            <h5><a href="/topics">Gosu</a></h5>
                            <h5><a href="/topics">Nano</a></h5>
                            <h5><a href="/topics">Dice</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                            <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
                    </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <ul class="thread-list">
                            <h4><a href="/topics">More</a></h4>
                            <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                            <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                            <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                            <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                                <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                                <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                            <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                            <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                            <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <h4><a href="/topics">Political</a></h4>
                        <p>Description Content: let's try to be cool</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                            <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, 
                            <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
                        <span><a href="" id="topicPost"></a> Posts | 
                        <a href="" id="topics"></a> Topics</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="">JustAUser, <?= setlocale(LC_TIME, 'fr_FR');
                    date_default_timezone_set('Europe/Paris');
                    echo utf8_encode(strftime('%d/%m/%Y')) ?></a>
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
            <li><a href="/topics">Admin: </a><span id="members-online"><a href="#profile">X</a></span></li>
            <li><a href="/topics">Moderators: </a><span id="members-online"><a href="#profile">0</a></span></li>
        </ul>
    </div>
    <?php if (!empty($_SESSION['user'])) { ?>
        <div class="updates">
            <h2>A venir</h2>
            <ul>
                <li><a href="#news">News: </a><span id="members-online"><a href="#profile">0</a></span></li>
                <li><a href="#events">Tournaments: </a><span id="members-online"><a href="#profile">0</a></span>
                </li>
                <li><a href="#events">Events: </a><span id="posts-posted"><a href="/topics">0</a></span></li>
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
            <li>Total Amount of Posts: <span id="posts-posted"><a href="/posts">0</a></span></li>
            <li><a href="../views/pages/members.php">Members Online: </a><span id="members-online">0</span></li>
            <li>Guests Online: <span id="guests-online">0</span></li>
        </ul>
    </div>
</aside>
</div>