<?php require_once 'views/parts/header.php'; ?>
    <div id="main">
    <?php if(isset($_GET['deleteAccount'])) { ?>
    <p>Votre compte a bien été supprimé.</p>
<?php } ?>
        <section class="forum" id="forum">
            <h1>Have fun through the forums!</h1>
            <!-- Thread creation form -->
            <div class="forumcontainer">
            <a href="/threads">make a new thread</a>
                <div class="subforum central" id="central">
                    <div class="subforum-title">
                        <h1>Central</h1>
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
                            <h4><a href="#">Rules</a></h4>
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
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center">
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
                        <div class="subforum-stats subforum-column center">
                            <span><a href="" id="topicPost">24</a> Posts | <a href="" id="topics">12</a>
                                Topics</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post</a></b> by <a href="">JustAUser,</a>
                            <small id="dateAlert">12 Dec 2020</small>
                        </div>
                    </div>
                    <?php if(!empty($_SESSION['user'])) {?>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center">
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
                            <h4><a href="#">Welcome</a></h4>
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
                <?php } ?>

                <div class="subforum manga" id="forums">
                    <div class="subforum-title">
                        <h1>Discussions</h1>
                    </div>
                    <hr class="subforum-devider">
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="../views/pages/manga.php">Manga</a></h4>
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
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="../views/pages/comics.php">Comics</a></h4>
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
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <!-- Thread list -->
                            <ul class="thread-list">
                                <!-- Thread items go here -->
                            </ul>
                            <h4><a href="/threads">Webtoon</a></h4>
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
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <!-- Thread list -->
                            <ul class="thread-list">
                                <!-- Thread items go here -->
                            </ul>
                            <h4><a href="/threads">Afrostories</a></h4>
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

                    
                    
                <?php if(!empty($_SESSION['user'])) {?>
                    <div class="subforum arena" id="battledome">
                    <div class="subforum-title">
                        <h1>Arène</h1>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="#">Vs Multiverse</a></h4>
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
                            <h4><a href="#">Vs Character</a></h4>
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
                <?php } ?>
                    
                    <?php // Découvrir ?>
                    <div class="subforum discover" id="explore">
                        <div class="subforum-title">
                            <h1>Découvrir</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Hottest ongoing series</a></h4>
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
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Animated series</a></h4>
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

                    <div class="subforum gather" id="gather">
                        <div class="subforum-title">
                            <h1>Rensemblement</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Political</a></h4>
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
                                <h4><a href="#">Social</a></h4>
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
                            <h1>Chambre 0</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column center">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="#">Main lounge</a></h4>
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
                                <h4><a href="#">Clubs</a></h4>
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
        <?php if(!empty($_SESSION['user'])) {?>
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
    <?php require_once 'views/parts/footer.php'; ?>