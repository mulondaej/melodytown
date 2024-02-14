

<div id="main">
    <section class="forum" id="forum">
        <!-- topic creation form -->
        <div class="forumcontainer">
            <h1 id="">Bienvenu(e) sur le forum</h1>
            <?php if (!empty($_SESSION['user'])) { ?> <!-- si l'utilisateur est connecté, alors il a acces au creation du topic  -->
             
             <button type="button" id="newThread" value="topic">Nouveau topic</button>
             <div id="modalContainer">
                 <div id="modaltopic">
                     <span id="threadCloseBtn">&times;</span>
                 <form action="/liste-topics-par-categories" method="POST" id="threadForm">
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
                         <input type="submit" name="topicPost" value="Create">
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
                        <h4><a href="/regles">Rules</a></h4>
                        <p>Les règles de forum à respecter </p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="/regles" id="liste-topics-par-categories"> 1 </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                                <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                    <?php } else { ?>
                        <a href="/topic?">
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
                        <!-- topic list -->
                        <ul class="topic-list">
                            <!-- topic items go here -->
                        </ul>
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <h4><a href="/liste-topics-par-categories?<?= $c->name ?>">News</a></h4>
                        <?php } else { ?>
                            <h4><a href="/liste-topics-par-categories?">News</a></h4>
                        <?php } ?>
                        <p>Prenez des nouvelles du site ou forum</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="liste-topics-par-categories"> <?= $totalCount ?></a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                                <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                    <?php } else { ?>
                        <a href="/topic?">
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
                            <!-- topic list -->
                            <ul class="topic-list">
                                <!-- topic items go here -->
                            </ul>
                            <h4><a href="/liste-topics-par-categories">Events</a></h4>
                            <p>Découvrez des évenements à venir</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="liste-topics-par-categories"> <?= $totalCount ?></a> posts</span>
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
                            <!-- topic list -->
                            <ul class="topic-list">
                                <!-- topic items go here -->
                            </ul>
                            <h4><a href="/liste-topics-par-categories">Welcome</a></h4>
                            <p>Chaleureux accueil pour les nouveaux membres</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                        <span><a href="" id="liste-topics-par-categories"> <?= $totalCount ?></a> posts</span>
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
                    <span><a href="" id="liste-topics-par-categories"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                    <h4><a href="/liste-topics-par-categories">Comics</a></h4>
                    <div>
                        <h5><a href="/liste-topics-par-categories">Marvel</a></h5>
                        <h5><a href="/liste-topics-par-categories">D.C</a></h5>
                        <h5><a href="/liste-topics-par-categories">Others</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="liste-topics-par-categories"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                    <h4><a href="/liste-topics-par-categories">Webtoon</a></h4>
                    <div>
                        <h5><a href="/liste-topics-par-categories">Solo-Leveling</a></h5>
                        <h5><a href="/liste-topics-par-categories">ToG</a></h5>
                        <h5><a href="/liste-topics-par-categories">GoH</a></h5>
                        <h5><a href="/liste-topics-par-categories">more</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="liste-topics-par-categories"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                    <h4><a href="/liste-topics-par-categories">Afrostories</a></h4>
                    <div>
                        <h5><a href="/liste-topics-par-categories">Sat. A.M</a></h5>
                        <h5><a href="/liste-topics-par-categories">Kibongatsho</a></h5>
                        <h5><a href="/liste-topics-par-categories">more</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="liste-topics-par-categories"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                    <h4><a href="/liste-topics-par-categories">B.D</a></h4>
                    <div>
                        <h5><a href="/liste-topics-par-categories">Asterix</a></h5>
                        <h5><a href="/liste-topics-par-categories">Titeuf</a></h5>
                        <h5><a href="/liste-topics-par-categories">Tintin</a></h5>
                        <h5><a href="/liste-topics-par-categories">more</a></h5>
                    </div>
                </div>
                <div class="subforum-stats subforum-column ">
                    <span><a href="" id="liste-topics-par-categories"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href="/topic?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                        <h4><a href="/liste-topics-par-categories">Populaire</a></h4>
                        <div>
                            <h5><a href="/liste-topics-par-categories">Sherlock</a></h5>
                            <h5><a href="/liste-topics-par-categories">GoT</a></h5>
                            <h5><a href="/liste-topics-par-categories">Harry Potter</a></h5>
                            <h5><a href="/liste-topics-par-categories">more</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="liste-topics-par-categories"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href="/topic?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>,
                            <?= $latestReply->publicationDate ?>
                        </a>
                        <?php } else { ?>
                            <a href="/topic?">
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
                        <h4><a href="/liste-topics-par-categories">Autres</a></h4>
                        <div>
                            <h5><a href="/liste-topics-par-categories">The 100</a></h5>
                            <h5><a href="/liste-topics-par-categories">Atlas</a></h5>
                            <h5><a href="/liste-topics-par-categories">more</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="liste-topics-par-categories"><?= $totalCount ?></a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="/topic?">
                            <?php if (!empty($_SESSION['user'])) { ?>
                                <?= $latestReply->username ?>,
                                <?= $latestReply->publicationDate ?>
                            </a>
                        <?php } else { ?>
                            <a href="/topic?">
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
                            <h5><a href="/liste-topics-par-categories">Versus</a></h5>
                            <h5><a href="/liste-topics-par-categories">Théories</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                    <span><a href="" id="liste-topics-par-categories"> <?= $totalCount ?></a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                        <h4><a href="/liste-topics-par-categories">TAKE OR LOSE</a></h4>
                        <div>
                            <h5><a href="/liste-topics-par-categories">à venir...</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="liste-topics-par-categories"> <?= $totalCount ?></a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                            <h4><a href="/liste-topics-par-categories">Novels</a></h4>
                            <p>Soyons respecteux dans la discussion</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="liste-topics-par-categories"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                            <h4><a href="/liste-topics-par-categories">Anime</a></h4>
                            <p>Soyons respecteux dans la discussion</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="liste-topics-par-categories"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                            <h4><a href="/liste-topics-par-categories">Cartoons</a></h4>
                            <p>Soyons respecteux dans la discussion</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="liste-topics-par-categories"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                            <h4><a href="/liste-topics-par-categories">Politique</a></h4>
                            <p>Soyons respecteux dans la discussion</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="liste-topics-par-categories"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                            <h4><a href="/liste-topics-par-categories">Social</a></h4>
                            <p>Soyons respecteux dans la discussion</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="liste-topics-par-categories"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                            <h4><a href="/liste-topics-par-categories">Main lounge</a></h4>
                            <p>Raccueillement de tous</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="liste-topics-par-categories"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                            <h4><a href="/liste-topics-par-categories">Clubs</a></h4>
                            <p>Créez ou réjoignez un club de ton personnage preféré</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="liste-topics-par-categories"> <?= $totalCount ?></a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b> <a href=""><?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestReply->username ?>, <?= $latestReply->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/topic?">
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
                                <h4><a href="/liste-topics-par-categories">Archives</a></h4>
                                <p>Recycle Bin</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="liste-topics-par-categories">0</a> posts</span>
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
            <h2>Le Staff</h2>
            <ul>
                <li><a href="/#"><b>Admin:</b> </a><span id="members-online">
                    <a href="/profile">
                    <?php if($_SESSION['user']['id_usersRoles'] == '258') { ?>
                            <?= $latestUser->username ?>
                        <?php } ?></a></span></li> 
                <li><a href="/#"><b>Modérateurs:</b> </a><span id="members-online">
                    <a href="/profile">
                    <?php if($_SESSION['user']['id_usersRoles'] == '142') { ?>
                            <?= $latestUser->username ?>
                        <?php } ?></a></span></li>
            </ul>
        </div>
            <div class="updates">
                <h2>A venir</h2>
                <ul>
                    <li><b>News:</b> <a href="#news"></a><span id="members-online"><a href="#profile">0</a></span></li>
                    <li><b>Tournois:</b> <a href="#events"></a><span id="members-online"><a href="#profile">0</a></span>
                    </li>
                    <li><b>Evénements:</b> <a href="#events"></a><span id="posts-posted"><a href="/liste-topics-par-categories">0</a></span></li>
                </ul>
            </div>
        <?php } ?>
        <div class="updates">
            <h2>Les Publications</h2>
            <ul>
                <?php if (!empty($_SESSION['user'])) { ?>
                <li><b>Dèrnière Publication: </b><a href="/topic?"><?= $latestReply->content ?>
                        </a><span id="posts-posted">par <a href="/topic?">
                                <?= $latestReply->username ?>
                            </a></span></li>
                    <li><b>Dèrnière Topic: </b><a href="/topic?"><?= $latestTopic->title ?></a>
                        <span id="posts-posted">par <a href="/topic?">
                            <?= $latestTopic->username ?></a></span></li>
                    <li><b>Dèrnière Status: </b><a href="/profil-<?= $latestStatus->id ?>"><?= $latestStatus->content ?></a>
                            <span id="posts-posted">par <a href="/profil-<?= $latestStatus->id ?>">
                            <?= $latestStatus->username ?>
                            </a></span></li>
                    
                <?php } ?>

            </ul>
        </div>
        <div class="updates">
            <h2>Le Stats du Forum</h2>
            <ul>
                <li><b>Nombre de Publication: </b><span id="posts-posted"><a href="/posts"><?= $totalCount ?></a></span></li>
                <li><b>Guests : </b><span id="guests-online">0</span></li>
                <?php if (!empty($_SESSION['user'])) { ?>
                    <li><b>Membres en ligne : </b><a href=".#"> <?= $_SESSION['user']['username']  ?></a>
                        <span id="members-online">(<?= $userCount?>)</span>
                <?php } ?>
                <?php if (!empty($_SESSION['user'])) { ?>
                    <li><b>Nouveau Membre: </b><span id="members-online"><a href="/profil-<?= $latestUser->id ?>">
                                <?= $latestUser->username ?></a></span></li>
                <?php } ?>
                <li><b>Members actif : </b><a href="#"></a><span id="members-online"><?= $userCount ?></span></li>
            </ul>
        </div>
    </aside>
</div>

<script src="../../assets/javaSc/topic.js"></script>
<?php
$title = 'MelodyTown';
?>