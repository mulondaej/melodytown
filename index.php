<div id="main">
    <section class="forum" id="forum">
        <!-- topic creation form -->
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
            <div class="subforum central" id="central">
                <div class="subforum-title">
                    <h1 id="central">
                    <?php if (isset($sectionsList)) {
                        foreach ($sectionsList as $s) {
                            if ($s->name == 'Central') {
                                echo $s->name;
                            }
                        }
                    } ?></h1>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/regles">Règles</a></h4>
                        <p>Les règles de forum à respecter </p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="/regles" id="topics-par-categories"> 1 </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="/regles">
                            <?php if (!empty($_SESSION['user'])) {
                                if (!empty($latestReply)) { ?>
                                    <?= $latestReply->username ?>,
                                    <?= $latestReply->publicationDate ?>
                                </a>
                            <?php } else { ?>
                                <p>Admin</p>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if (!empty($latestTopic)) { ?>
                                <a href="/topic-<?= $latestTopic->id ?>">
                                <?php } ?>
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
echo $formatter->format(time());
 ?>
                            </a>
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
                            
                    <?php if (isset($topicsList)) { ?>
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <h4><a href="/forums-<?= $topicsList[0]->categorie = 17 ?>">News</a></h4>
                        <?php } ?>
                        <p>Prenez des nouvelles du site ou forum</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topics-par-categories">
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
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
echo $formatter->format(time());
 ?>
                            </a>
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
                            <h4><a href="/forums-<?= $topicsList[0]->categorie = 14 ?>">Events</a></h4>
                            <p>Découvrez des évenements à venir</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics-par-categories">
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
                                    <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                </a>
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
                            <h4><a href="/forums-<?= $topicsList[0]->categorie = 15 ?>">Welcome</a></h4>
                            <p>Chaleureux accueil pour les nouveaux membres</p>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics-par-categories"> 0</a> posts</span>
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
                                    <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="subforum manga" id="manga">
                <div class="subforum-title">
                    <h1 id="forums">
                    <?php if (isset($sectionsList)) {
                        foreach ($sectionsList as $s) {
                            if ($s->name == 'Forums') {
                                echo $s->name;
                            }
                        }
                    } ?></h1>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/forums-<?= $topicsList[0]->categorie = 1 ?>">Manga</a></h4>
                        <div>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id = 1 ?>">One Piece</a></h5>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id = 1 ?>">Naruto</a></h5>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id = 1 ?>">Bleach</a></h5>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id = 1 ?>">more</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topics-par-categories">
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
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
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
                        <h4><a href="/forums-<?= $topicsList[0]->categorie = 3 ?>">Comics</a></h4>
                        <div>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Marvel</a></h5>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id?>">D.C</a></h5>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Others</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topics-par-categories">
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
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time());?>
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
                        <h4><a href="/forums-<?= $topicsList[0]->categorie = 8 ?>">Webtoon</a></h4>
                        <div>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Solo-Leveling</a></h5>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">ToG</a></h5>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">GoH</a></h5>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">more</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topics-par-categories">
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
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
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
                        <h4><a href="/forums-<?= $topicsList[0]->categorie = 4 ?>">Afrostories</a></h4>
                        <div>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Sat. A.M</a></h5>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Kibongatsho</a></h5>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">more</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topics-par-categories">
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
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
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
                        <h4><a href="/forums-<?= $topicsList[0]->categorie = 13 ?>">B.D</a></h4>
                        <div>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Asterix</a></h5>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Titeuf</a></h5>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Tintin</a></h5>
                            <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">more</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="topics-par-categories">
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
                                <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>

                <div class="subforum comics" id="comics">
                    <div class="subforum-title">
                        <h1 id="multiverse">
                    <?php if (isset($sectionsList)) {
                        foreach ($sectionsList as $s) {
                            if ($s->name == 'Arène') {
                                echo $s->name;
                            }
                        }
                    } ?></h1>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/forums-<?= $topicsList[0]->categorie = 9 ?>">Multiverse</a></h4>
                            <div>
                                <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Versus</a></h5>
                                <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">Théories</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics-par-categories">
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
                                    <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/forums-<?= $topicsList[0]->categorie = 18 ?>">TAKE OR LOSE</a></h4>
                            <div>
                                <h5><a href="/liste-souscategories-<?= $subCategoriesList[0]->id ?>">à venir...</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="topics-par-categories">
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
                                    <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <hr class="subforum-devider">

                    <?php // Découvrir 
                    ?>
                    <div class="subforum discover" id="explore">
                        <div class="subforum-title">
                            <h1 id="decouvrir">
                    <?php if (isset($sectionsList)) {
                        foreach ($sectionsList as $s) {
                            if ($s->name == 'Découvrir') {
                                echo $s->name;
                            }
                        }
                    } ?></h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/forums-<?= $topicsList[0]->categorie = 5 ?>">Novels</a></h4>
                                <p>Soyons respecteux dans la discussion</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="topics-par-categories">
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
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
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
                                <h4><a href="/forums-<?= $topicsList[0]->categorie = 2 ?>">Anime</a></h4>
                                <p>Soyons respecteux dans la discussion</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="topics-par-categories">
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
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
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
                                <h4><a href="/forums-<?= $topicsList[0]->categorie = 16 ?>">Cartoons</a></h4>
                                <p>Soyons respecteux dans la discussion</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="topics-par-categories">
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
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="subforum gather" id="gather">
                        <div class="subforum-title">
                            <h1 id="controverse">
                    <?php if (isset($sectionsList)) {
                        foreach ($sectionsList as $s) {
                            if ($s->name == 'Controverse') {
                                echo $s->name;
                            }
                        }
                    } ?></h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/forums-<?= $topicsList[0]->categorie = 10 ?>">Politique</a></h4>
                                <p>Soyons respecteux dans la discussion</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="topics-par-categories">
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
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
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
                                <h4><a href="/forums-<?= $topicsList[0]->categorie = 11 ?>">Social</a></h4>
                                <p>Soyons respecteux dans la discussion</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="topics-par-categories">
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
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="subforum" id="underground">
                        <div class="subforum-title">
                            <h1 id="baze">
                    <?php if (isset($sectionsList)) {
                        foreach ($sectionsList as $s) {
                            if ($s->name == 'Baze') {
                                echo $s->name;
                            }
                        }
                    } ?></h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/forums-<?= $topicsList[0]->categorie = 19 ?>">Main lounge</a></h4>
                                <p>Raccueillement de tous</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="topics-par-categories">
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
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
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
                                <h4><a href="/forums-<?= $topicsList[0]->categorie = 12 ?>">Clubs</a></h4>
                                <p>Créez ou réjoignez un club de ton personnage preféré</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="topics-par-categories">
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
                                        <?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
                                    echo $formatter->format(time()); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <div class="subforum-row">
                                <div class="subforum-icon subforum-column ">
                                    <i class="fa-solid fa-dumpster" style="color: #e0e9f6"></i>
                                </div>
                                <div class="subforum-description subforum-column">
                                    <h4><a href="/forums-<?= $topicsList[0]->categorie = 20 ?>">Archives</a></h4>
                                    <p>Recycle Bin</p>
                                </div>
                                <div class="subforum-stats subforum-column ">
                                    <span><a href="" id="topics-par-categories">0</a> posts</span>
                                </div>
                                <div class="subforum-info subforum-column">
                                    <b>X</b>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
    </section>

    <!--Aside bar-->
    <aside class="right-sidebar">
        <?php if (!empty($_SESSION['user'])) { ?>
            <div class="updates">
                <h2>Le Staff</h2>
                <ul>
                    <li><a href="/#"><b>Admin:</b> </a><span id="members-online">
                            <a href="/profil">
                                <?php if ($_SESSION['user']['id_usersRoles'] == '381') { ?>
                                    <?= $latestUser->username ?>
                                <?php } ?>
                            </a></span></li>
                    <li><a href="/#"><b>Modérateurs:</b> </a><span id="members-online">
                            <a href="/profil">
                                <?php if ($_SESSION['user']['id_usersRoles'] == '473') { ?>
                                    <?= $latestUser->username ?>
                                <?php } ?>
                            </a></span></li>
                </ul>
            </div>
            <div class="updates">
                <h2>A venir</h2>
                <ul>
                    <li><b>News:</b> <a href="#news"></a><span id="members-online"><a href="#profile">0</a></span></li>
                    <li><b>Tournois:</b> <a href="#events"></a><span id="members-online"><a href="#profile">0</a></span>
                    </li>
                    <li><b>Evénements:</b> <a href="#events"></a><span id="posts-posted"><a
                                href="/forums-<?= $topicsList[0]->categorie = 15 ?>">0</a></span></li>
                </ul>
            </div>
        <?php } ?>
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
                <li><b>Nombre de Publication: </b><span id="posts-posted"><a href="#">
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