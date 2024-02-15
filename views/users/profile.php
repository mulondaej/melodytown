<main class="mainbox">

    <div class="profileContainer ">
        <input type="file" id="coverUpload" value="<?= $userAccount->avatar ?>" accept="image*/" style="display: none;">
        <div class="coverContainer">
            <img src="../assets/IMG/asha-frozz.jpg" alt="Cover Picture" id="cover-picture">
        </div>
        <button id="editCover">change</button>
        <div class="avatarContainer text-center">
            <input type="file" id="avatarUpload" class="avatarChange" value="<?= $userAccount->avatar ?>"
                accept="image*/" style="display: none;">
            <img src="/assets/IMG/Avril23j.jpg" alt="User Avatar" id="profileAvy">
            <input type="submit" id="editAvatar" class="overLay" value="Modifier" name="updateAvatar">
        </div>

    </div>

    <div class="userContainer">
        <p>@<b>
                <?= $userAccount->username ?>
            </b>, <i class="fa-sharp fa-solid fa-location-dot fa-sm" style="color: white"></i>
            <b>
                <?= $userAccount->location ?>
            </b><small><a href="/modifier-mon-compte"> edit your infos </a></small>
        </p>
        <div class="infoUser">
            <p>Posts: <span id="postCount"><b><?= $userTotalTopics ?></b></span></p>
            <p>Likes: <span id="likeCount"><b>100</b></span></p>
            <p>Rank: <span id="rank"><b><?= $userAccount->roleName ?></b></span></p>
            <p>Points: <span id="points"><b>500</b></span></p>
            <p>Depuis <b><?= $userAccount->registerDate ?></b></p>
        </div>
    </div>

    <div class="mainContainer">
        <aside class="asideBar">
            <h3>Media <i class="fa-solid fa-folder-open"></i></h3>
            <div class="Media">
                <input type="file" id="mediaUpload" accept="image*/" style="display: none;">
                <div class="disGallery">
                    <img src="assets/IMG/melodytown.jpg" alt="media" id="gallery">
                    <img src="assets/IMG/melodytown.jpg" alt="media" id="gallery">
                    <img src="assets/IMG/melodytown.jpg" alt="media" id="gallery">
                </div>
                <button id="upload-media"><a href="/media">Open</a></button>
            </div>
            <h3>Archive <i class="fa-solid fa-box-archive"></i></h3>
            <div class="Archive">
                <input type="file" id="archiveUpload" accept="image*/" style="display: none;">
                <img src="assets/IMG/melodytown.jpg" alt="archive" id="archives">
                <button id="open-archive"><a href="/media">Open</a></button>
            </div>
        </aside>

        <div class="mainStatus">
            <div class="State">
            <?php if (!isset($_SESSION['user'])) { ?>
                <p class="errorsContainer">Vous devez être connecté pour ajouter un commentaire</p>
                <a href="/connexion" class="cta">Se connecter</a>
                <a href="/inscription" class="cta">S'inscrire</a>
            <?php } else { ?>
                <?php if (isset($success)) { ?>
                    <p class="successContainer" id="successMessage"> <?= $success ?></p>
                <?php } ?>

                <form action="#" method="POST" id="postStatus">
                    <textarea name="content" id="postHere"></textarea>
                    <input type="submit" id="posted" value="post" name="addStatus">
                    <?php if (isset($errors['content'])): ?>
                        <p class="errorsMessage"><?= $errors['content'] ?></p>
                    <?php endif; ?><br>
                </form>

                <div class="statusContainer">

                    <?php if (count($userOwnStatus) == 0) { ?>
                        <p class="errorsMessage">No status available</p>
                    <?php } else { ?>
                    <?php foreach ($userOwnStatus as $ownStatus) { ?>

                        <div class="status" id="status">
                            <p><b><?= $ownStatus->username ?></b>:
                                <?= $ownStatus->content ?>
                            </p>
                            <button id="likeBtn"><i class="fa-solid fa-heart"></i></button>
                            <button id="replyBtn" name="replyBtn"><a href="#commenting">répondre</a></button>
                        <?php if($_SESSION['user']['id'] == $status->id_users){ ?>
                            <button type="submit" name="update" id="editModal">modifier</button>
                            <button type="submit" id="profiModalBtn"><a href="#delete">supprimer</a></button>
                        <?php } ?>
                    </div>
                        
                        <div id="logFormEdits">
                            <form action="" method="POST" id="editForm">
                                <textarea class="replyText" value=""><?= $ownStatus->content ?></textarea>
                                <input type="submit" class="postReply" name="updateStatus" value="modifier">
                                <?php if (isset($errors['content'])): ?>
                                    <p class="errorsMessage">
                                        <?= $errors['content'] ?>
                                    </p>
                                <?php endif; ?><br>
                            </form>
                        </div>

                        
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <div id="modalContainer">
                            <div id="modal">
                                <span id="closeBtn">&times;</span>
                                <p id="modalText">Vouliez-vous le supprimer?</p>
                                <form action="" method="POST" id="delete">
                                    <input type="submit" value="supprimer" name="deleteStatus">
                                </form>
                            </div>
                        </div>
                        <ul class="comments"><!-- Comments vont ici -->
                            <li>
                            <?php if (count($userOwnComments) == 0) { ?>
                                <p class="errorsMessage">No comments</p>
                            <?php } else { ?>
                                <?php foreach ($userOwnComments as $commentingUser) { ?>
                                    <p><b><?= $commentingUser->username ?></b>:
                                        <?= $commentingUser->content ?>
                                    </p>
                                    <button id="replyLikeBtn"><i class="fa-solid fa-heart"></i></button>
                                    <button id="replyRepliesBtn" ><a href="#commenting" name="replyRepliesBtn">répondre</a></button>
                                <?php if($_SESSION['user']['id'] == $comments->id_users){ ?>
                                    <button class="replyComment" name="update" type="submit" id="editModal">modifier</button>
                                    <button type="submit" value="delete" id="replyModalBtn"><a href="#replyDelete">supprimer</a></button>
                                </li>
                                <?php }?>
                                <div id="logFormEdits">
                                    <form action="" method="POST" id="editForm">
                                        <textarea class="replyText">value=" <?= $userOwnComments->content ?>" ?></textarea>
                                        <input type="submit" class="postReply" name="updateComment" value="modifier">
                                        <?php if (isset($errors['comment'])): ?>
                                            <p class="errorsMessage"><?= $errors['comment'] ?>
                                            </p>
                                        <?php endif; ?><br>
                                    </form>
                                </div>

                                
                            <?php } ?>
                        <?php } ?>
                        </ul>
                        <div id="replyModalContainer">
                                    <div id="replyModal">
                                        <span id="replyCloseBtn">&times;</span>
                                        <p id="replyModalText">Vouliez-vous supprimer le commentaire?</p>
                                        <form action="" method="POST" id="replyDelete">
                                        <input type="submit" value="supprimer" name="deleteComment">
                                        </form>
                                    </div>
                                </div>
                        <!-- Reply form for status -->

                        <form action="#" method="POST" class="replying">
                            <textarea class="replyText" id="commenting" ></textarea>
                            <input type="submit" class="postReply" name="addComment" value="comment">
                            <?php if (isset($errors['comment'])): ?>
                                <p class="errorsMessage">
                                    <?= $errors['comment'] ?>
                                </p>
                            <?php endif; ?><br>
                        </form>
                </div>
            </div>
        </div>

        <aside class="activ">
            <h3>Activity</h3>
            <div class="activity">
                <ul id="activity-list">
                    <!-- dèrnière activité ici -->
                    <?php foreach($userTopics as $p) { ?>
                        <li><?= $p['title'] ?></li>
                        <ul>
                            <?php foreach($p['content'] as $pr) { ?>
                                <li>--<?= $pr['content'] ?></li>
                        <?php } ?>
                        </ul>
                   <?php  } ?>
                </ul>
            </div>
        </aside>
    </div>

</main>

<script src="assets/javaSc/profileModal.js"></script>
<script src="assets/javaSc/profile.js"></script>
  <script src="assets/javaSc/repliesModal.js"></script>