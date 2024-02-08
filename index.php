

<div id="main">
    <section class="forum" id="forum">
        <!-- Thread creation form -->
        <div class="forumcontainer">
            <h1 id="">Bienvenu(e) sur le forum</h1>
            <?php if (!empty($_SESSION['user'])) { ?> <!-- si l'utilisateur est connecté, alors il a acces au creation du topic  -->
             
             <button type="button" id="newThread" value="thread">Nouveau topic</button>
             <div id="modalContainer">
                 <div id="modalThread">
                     <span id="threadCloseBtn">&times;</span>
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
                         <input type="submit" name="threadPost" value="Create">
                     </div>
                 </form>
                 </div>
                </div>
                 <hr>
             <?php } ?>
 

            <div class="subforum central" id="central">
                <div class="subforum-title">
                    <h1 id="central">Central</h1>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics">Rules</a></h4>
                        <p>Les règles de forum à respecter </p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                                <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                        <p>Prenez des nouvelles du site ou forum</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                                <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                            <p>Découvrez des évenements à venir</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post:</a></b> <a href=""><?= $latestReply->username ?>,
                                <?= $latestReply->publicationDate ?></a>
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
                            <p>Chaleureux accueil pour les nouveaux membres</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post:</a></b> <a href="">
                                <?= $latestUser->registerDate ?></a>
                        </div>
                    </div>
            </div>
        <?php } ?>

        <div class="subforum manga" id="manga">
            <div class="subforum-title">
                <h1 id="forums">Forums</h1>
            </div>
            <hr class="subforum-devider">
            <div class="subforum-row">
                <div class="subforum-icon subforum-column ">
                    <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="/forum">Manga</a></h4>
                    <div>
                        <h5><a href="/forum">One Piece</a></h5>
                        <h5><a href="/forum">Naruto</a></h5>
                        <h5><a href="/forum">Bleach</a></h5>
                        <h5><a href="/forum">more</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                    <h4><a href="/topics">Comics</a></h4>
                    <div>
                        <h5><a href="/topics">Marvel</a></h5>
                        <h5><a href="/topics">D.C</a></h5>
                        <h5><a href="/topics">Others</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                    <h4><a href="/topics">Webtoon</a></h4>
                    <div>
                        <h5><a href="/topics">Solo-Leveling</a></h5>
                        <h5><a href="/topics">ToG</a></h5>
                        <h5><a href="/topics">GoH</a></h5>
                        <h5><a href="/topics">more</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                    <h4><a href="/topics">Afrostories</a></h4>
                    <div>
                        <h5><a href="/topics">Sat. A.M</a></h5>
                        <h5><a href="/topics">Kibongatsho</a></h5>
                        <h5><a href="/topics">more</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                    <h4><a href="/topics">B.D</a></h4>
                    <div>
                        <h5><a href="/topics">Asterix</a></h5>
                        <h5><a href="/topics">Titeuf</a></h5>
                        <h5><a href="/topics">Tintin</a></h5>
                        <h5><a href="/topics">more</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
            </div>
            
            <div class="subforum webtoon" id="webtoon">
                <div class="subforum-title">
                    <h1 id="novel">Novels</h1>
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
                    <b><a href="">Last post:</a></b> <a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>,
                            <?= $latestReply->publicationDate ?>
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
                        <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="/thread?">
                            <?php if (!empty($_SESSION['user'])) { ?>
                                <?= $latestReply->username ?>,
                                <?= $latestReply->publicationDate ?>
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

            <div class="subforum comics" id="comics">
                <div class="subforum-title">
                    <h1 id="multiverse">Arène</h1>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/forum">Multiverse</a></h4>
                        <div>
                            <h5><a href="/topics">Versus</a></h5>
                            <h5><a href="/topics">Théories</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                        <h4><a href="/topics">TAKE OR LOSE</a></h4>
                        <div>
                            <h5><a href="/topics">à venir...</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                </div>
                <hr class="subforum-devider">

                <?php // Découvrir 
                ?>
                <div class="subforum discover" id="explore">
                    <div class="subforum-title">
                        <h1 id="decouvrir">Découvrir</h1>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics">Novels</a></h4>
                            <p>Soyons respecteux dans la discussion</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                            <h4><a href="/topics">Anime</a></h4>
                            <p>Soyons respecteux dans la discussion</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                            <h4><a href="/topics">Cartoons</a></h4>
                            <p>Soyons respecteux dans la discussion</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                        <h1 id="controverse">Controverse</h1>
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
                            <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                            <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                        <h1 id="baze">Baze</h1>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/topics">Main lounge</a></h4>
                            <p>Raccueillement de tous</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                            <p>Créez ou réjoignez un club de ton personnage preféré</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
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
                                <p>Recycle Bin</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="topics">0</a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b>X</b>
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
                            <?= $latestUser->username ?>
                        <?php } ?></a></span></li> 
                <li><a href="/#"><b>Moderators:</b> </a><span id="members-online">
                    <a href="#profile">
                    <?php if($_SESSION['user']['id_usersRoles'] == '142') { ?>
                            <?= $latestUser->username ?>
                        <?php } ?></a></span></li>
            </ul>
        </div>
            <div class="updates">
                <h2>A venir</h2>
                <ul>
                    <li><b>News:</b> <a href="#news"></a><span id="members-online"><a href="#profile">0</a></span></li>
                    <li><b>Tournaments:</b> <a href="#events"></a><span id="members-online"><a href="#profile">0</a></span>
                    </li>
                    <li><b>Events:</b> <a href="#events"></a><span id="posts-posted"><a href="/topics">0</a></span></li>
                </ul>
            </div>
        <?php } ?>
        <div class="updates">
            <h2>posts</h2>
            <ul>
                <?php if (!empty($_SESSION['user'])) { ?>
                <li><b>Latest Post: </b><a href="/thread?"><?= $latestReply->content ?>
                        </a><span id="posts-posted">by <a href="/thread?">
                                <?= $latestReply->username ?>
                            </a></span></li>
                    <li><b>Latest Thread: </b><a href="/thread?"><?= $latestTopic->title ?></a>
                        <span id="posts-posted">by <a href="/thread?">
                            <?= $latestTopic->username ?></a></span></li>
                    <li><b>Latest Status: </b><a href="#profile"><?= $latestStatus->content ?></a>
                            <span id="posts-posted"> <a href="#profile">
                            <?= $latestStatus->username ?>
                            </a></span></li>
                    <li><b>Kings of posting: </b><a href="#winners"></a>
                        <span id="members-online"><a href="#profile">
                                <?php if ($userDetails == 0) { ?>
                                    <?= $userDetails->username ?>
                                <?php } ?>
                            </a></span>
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

<script src="../../assets/javaSc/thread.js"></script>
<?php
$title = 'MelodyTown';
?>