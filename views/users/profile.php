<main class="mainbox">

    <div class="profileContainer ">
    
            <div class="avatarContainer" >
                <img src="/assets/IMG/users/<?= $userAccount->avatar ?>" alt="User Avatar" id="profileAvy">
                <input type="submit" name="avy" id="imgModalBtn" class="overLay" value="modifier">
                <!-- <button type="submit" name="open" id="imgModalBtn" class="overLay">modifier</button> -->
            </div>
            <div id="myModal" class="imgModal">
                <div id="imgModalContent">
                    <span id="imgClose">&times;</span>
                    <form action="/profil" method="post"  enctype="multipart/form-data">
                        <label for="avatar">Nouveau avatar</label>
                        <input type="file" name="avatar" id="profileAvatar" value="<?= $userAccount->avatar ?>" accept="image/*">
                        <?php if (isset($errors['avatar'])) { ?>
                                            <p id=errorsMessage><?= $errors['avatar'] ?></p>
                        <?php } ?>
                        <input type="submit" value="modifier" name="updateAvatar">
                    </form>
                </div>
            </div>
    
            <div class="coverContainer" action="/profil" method="post" enctype="multipart/form-data">
                
                <img src="/assets/IMG/users/<?= $userAccount->coverpicture ?>" alt="" id="cover-picture">
                <input type="submit" name="open" id="editCover" class="overLay" value="changer">
                
            </div>
            <div id="myModals" class="imgModals">
                <div id="imgModalContents">
                    <span id="imgCloses">&times;</span>
                    <form action="/profil" method="post" enctype="multipart/form-data">
                        <label for="avatar">Nouvelle banière</label>
                        <input type="file" name="image" id="profileBaniere" value="<?= $userAccount->coverpicture ?>" accept="image/*" >
                        <?php if (isset($errors['image'])) { ?>
                                            <p id=errorsMessage><?= $errors['image'] ?></p>
                        <?php } ?>

                        <input type="submit" value="modifier" name="updateCoverPicture">
                    </form>
                </div>
            </div>
        </div>
            <div class="userContainer">
                <div class="infoUser">
                    <p>@
                        <b><?= $userAccount->username ?></b>,
                        <i class="fa-sharp fa-solid fa-location-dot fa-sm" style="color: white"></i>
                        <b><?= $userAccount->location ?></b>
                        <small><a href="/modifier-mon-compte"> modifier tes infos </a></small>
                    </p>
                        <p>Posts: <span id="postCount"><b><?= $userTotalTopics ?></b></span></p>
                        <p>Likes: <span id="likeCount"><b>100</b></span></p>
                        <p>Rank: <span id="rank"><b><?= $userAccount->roleName ?></b></span></p>
                        <p>Points: <span id="points"><b><? $userPoints ?></b></span></p>
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
                            <textarea name="content" id="postHere" ></textarea>
                            <input type="submit" id="posted" value="post" name="addStatus">
                            <?php if (isset($errors['content'])): ?>
                                        <p class="errorsMessage"><?= $errors['content'] ?></p>
                            <?php endif; ?><br>
                        </form>

                        <div class="statusContainer">
                        

                            <?php if (count($userStatus) == 0) { ?>
                                        <p class="errorsMessage">No status available</p>
                            <?php } else { ?>
                                
                                    <?php foreach ($userStatus as $personalStatus) { ?>

                                                <div class="status" id="status">
                                                    <p><b><?= $personalStatus->username ?></b>:
                                                        <?= $personalStatus->content ?>
                                                    </p>
                                                    <button id="likeBtn"><i class="fa-solid fa-heart"></i></button>
                                                    <button id="replyBtn" class="replyBtn" name="replyBtn" replystatus=<?= $personalStatus->username ?> ><a href="#commenting">répondre</a></button>
                            
                                                <?php if ($_SESSION['user']['id'] == $status->id_users) { ?>
                                                            <button type="submit" name="update" id="editModal" updatestatus=<?= $personalStatus->content ?> >modifier</button>
                                                            <button type="submit" id="profiModalBtn" statusdeleteid=<?= $personalStatus->id ?>><a href="#delete">supprimer</a></button>
                                                <?php } ?>
                                            </div>

                                                    <!-- modification form -->
                                            <div id="logFormEdits">
                                            <?php if (isset($success)) { ?>
                                                        <p id="successMessage"><?= $success ?></p>
                                            <?php } ?>
                                                <form action="#" method="POST" id="editForme">
                                                    <input type="hidden" name="statusid" value="<?= $personalStatus->id ?>">
                                                    <input type="text" class="replyText" name="statusUpdate" id="statusUpdate">
                                                    <input type="submit" class="postReply" name="updateStatus" value="modifier">
                                                    <?php if (isset($errors['content'])): ?>
                                                                <p class="errorsMessage"><?= $errors['content'] ?></p>
                                                    <?php endif; ?><br>
                                                </form>
                                            </div>
                    
                                            <ul class="comments">
                                            <li><!-- Comments vont ici -->
                                            <?php if (count($userComments) == 0) { ?>
                                                        <p class="errorsMessage">No comments</p>
                                            <?php } else { ?>
                                                        <?php foreach ($userComments as $c) { ?>
                                                                    <p><b><?= $c->username ?></b>:
                                                                        <?= $c->content ?>
                                                                    </p>
                                                                    <button id="statusLikeBtn"><i class="fa-solid fa-heart"></i></button>
                                                                    <button id="statusReplyBtn" name="statusReplyBtn" class="statusReplyBtn" commentstatus=<?= $c->username ?>>
                                                                    <a href="#commenting" >répondre</a></button>
                                                                <?php if ($_SESSION['user']['id'] == $comments->id_users) { ?>
                                                                            <button id="editCommentModal" class="replyComment" name="update" type="submit" commentupdate=<?= $c->content ?>>
                                                                                modifier</button>
                                                                            <button type="submit" value="delete" id="commentModalBtn" class="commentModalBtn" commentdelete=<?= $c->id ?>>
                                                                            <a href="#replyDelete">supprimer</a></button>
                                                                        </li>
                                                                <?php } ?>
                                                                <div id="logFormEdit">
                                                                    <form action="" method="POST" id="editForm">
                                                                        <input type="hidden" name="commentsid" value=<?= $c->id ?>>
                                                                        <input type="text" class="replyText" name="commentUpdate" id="commentUpdate">
                                                                        <input type="submit" class="postReply" name="updateComments" value="modifier">
                                                                        <?php if (isset($errors['reponse'])): ?>
                                                                                    <p class="errorsMessage"><?= $errors['reponse'] ?></p>
                                                                        <?php endif; ?><br>
                                                                    </form>
                                                                </div>
                                                            <?php } ?>
                                                <?php } ?>
                                            </ul>

                                            <!-- reponses -->
                                            <form action="#" method="POST" class="replying" id="replying">
                                                <input type="hidden" name="statusid" value="<?= $personalStatus->id ?>">
                    
                                                <input type="text" class="replyText" id="commenting" name="commenting">
                                                <input type="submit" class="postReply" name="addComment" value="commenter">
                                                <?php if (isset($errors['comment'])): ?>
                                                           <p class="errorsMessage"><?= $errors['comment'] ?></p>
                                                <?php endif; ?><br>
                                            </form>
                                        <?php } ?>
                            <?php } ?>
                <?php } ?>

                <!-- suppression -->
                <div id="modalContainer">
                    <div id="modal">
                        <span id="closeBtn">&times;</span>
                        <p id="modalText">Êtes-vous sûr de vouloir supprimer votre status ?</p>
                        <form action="/profil ?>" method="POST" id="delete">
                            <input type="hidden" name="statusid" value=<?= $personalStatus->id ?>>
                            <input type="text" name="idStatusDelete" id="idStatusDelete">
                            <input type="submit" value="supprimer" name="deleteStatus">
                        </form>
                    </div>
                </div>
                
                <div id="replyModalContainer">
                    <div id="replyModal">
                        <span id="replyCloseBtn">&times;</span>
                        <p id="replyModalText">Vouliez-vous supprimer le commentaire ?</p>
                        <form action="" method="POST" id="replyDelete"> 
                            <input type="hidden" name="commentsid" value=<?= $c->id ?>>
                            <input type="text" name="idCommentsDelete" id="idCommentsDelete">
                            <input type="submit" value="supprimer" name="deleteComment">
                        </form>
                    </div>
                </div>
                <!-- Reply form for status -->
                </div>
            </div>
        </div>

        <aside class="activ">
            <h3>Activité</h3>
            <div class="activity">
                <ul id="activity-list">
                    <!-- dèrnière activité ici -->
                    <h5><b>Tes contenus:</b><hr></h5>
                    <?php foreach ($userTopics as $p) { ?>
                                <li>-- <a href="/topic-<?= $p['id'] ?>"><?= $p['title'] ?></a></li><hr>
                                <ul>
                                    <?php foreach ($p['content'] as $pr) { ?>
                                                <li>** <a href="/topic-<?= $p['id'] ?>"><?= $pr['content'] ?></a></li><hr>
                                <?php } ?>
                                </ul>
                   <?php } ?>
                </ul>
            </div>
        </aside>
    </div>

</main>

