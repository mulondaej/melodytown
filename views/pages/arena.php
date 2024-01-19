<div id="main">
    <?php
    ?>
    <input type="button" value="New thread" id="newThread">
    <form action="" method="POST" id="threadForm">
        <label for="tag">Tag:</label>
        <select name="tag" id="tag">
            <option value="DBZ">DBZ</option>
            <option value="OnePiece">OP</option>
            <option value="Naruto">Naruto</option>
            <option value="Bleach">Bleach</option>
            <option value="HxH">HxH</option>
            <option value="Marvel">Marvel</option>
            <option value="DCcomics">DC</option>
            <option value="any">any other</option>
            <option value="MultiV">MultiV</option>
        </select>
        <?php if (isset($errors['tag'])) : ?>
            <p><?= $errors['tag'] ?></p>
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
            <input type="submit" name="createThread" value="Create">
        </div>
    </form>
    <div class="subforum central" id="central">
        <div class="subforum-title">
            <h1>Get the crown</h1>
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
                <h4><a href="#">Win or lose</a></h4>
                <p>Description Content: let's try to be cool</p>
                <div class="arenaList">
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
    </div>
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
                <div class="arenaList">
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
                <div class="arenaList">
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
                <div class="arenaList">
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
                <div class="arenaList">
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
                <div class="arenaList">
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
                <div class="arenaList">
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
            <div class="subforum arena" id="battledome">
                <div class="subforum-title">
                    <h1>Arena</h1>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Versus Multiverse</a></h4>
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
                    <h1>Multiverse</h1>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="#">Anime</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div class="arenaList">
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
                        <h4><a href="#">Comics</a></h4>
                        <p>Description Content: let's try to be cool</p>
                        <div class="arenaList">
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
    <div class="updates">
        <h2>Upcoming</h2>
        <ul>
            <li><a href="#news">News: </a><span id="members-online"><a href="#profile">0</a></span></li>
            <li><a href="#events">Tournaments: </a><span id="members-online"><a href="#profile">0</a></span>
            </li>
            <li><a href="#events">Events: </a><span id="posts-posted"><a href="#">0</a></span></li>
        </ul>
    </div>
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
        <h2>Forum Updates</h2>
        <ul>
            <li>Newest Member: <span id="members-online"><a href="#profile">0</a></span></li>
            <li>Total Amount of Posts: <span id="posts-posted">0</span></li>
            <li><a href="members.html">Members Online: </a><span id="members-online">0</span></li>
            <li>Guests Online: <span id="guests-online">0</span></li>
        </ul>
    </div>
</aside>
</div>
<div class="chatPop">
    <button class="popUp" id="popUpChat">chat</button>
    <div class="dropup-content">
        <div class="allChats">
            <a href="#">chats</a>
            <a href="#">send</a>
        </div>
        <div class="messaging"></div>
    </div>
</div>