<main id="threadMain">

  <div id="threadHeader">
    <button id="backBtn"><a href="/messages">
        <i id="backArrow" class="fa fa-arrow-left"> Back</i>
      </a></button>
    <div id="threadTitle">
      <h2 id="tag">messagerie entre Vous</h2>
      <h2><?= $messagingsDetails->title ?></h2>
    </div>
    <hr>
  </div>
  <?php if (isset($success)) { ?>
        <p id="successMessage"><?= $success ?></p>
  <?php } ?>

  <div id="threadContains">
    <div id="userCard">
      <div class="userImg"><img src="/assets/IMG/users/<?= $messagingsDetails->avatar ?>" id="userAvy"></div><br>
      <div class="username">
        <h5>@<a href="/profil-<?= $messagingsDetails->sender_id ?>"><?= $messagingsDetails->sendername ?>
          </a></h5>
      </div><br>
    </div>
    <div id="threadContent">
      <div id="contents">
        <p id="contentP"><?= $messagingsDetails->message ?></p>
        <div id="timed">
          <p><?= $messagingsDetails->timestamp ?></p>
        </div>
        
        <div class="interact">
          <?php if(!empty($_SESSION['user'])) { ?>
          <button id="likeBtn" name="liked" ><i class="fa-solid fa-heart">Like</i></button>
          <button id="replyBtn" name="replyBtn" quotecontent="<?= $messagingsDetails->message ?>"><a href="#comments">répondre</a></button>
          
          <?php if($_SESSION['user']['id'] == $messagingsDetails->sender_id && ($_SESSION['user']['id'] == $messagingsDetails->receiver_id) && ($_SESSION['user']['id_usersRoles'] == 167 || 381)){ ?>
            <button type="submit" name="update" id="editModal" updatecontent=<?= $messagingsDetails->message ?> >modifier</button>
            <button id="openModalBtn" style="background-color: transparent;">
            <a href="#delete"><i class="fa-solid fa-trash-can"></i></a></button>
          <?php } ?>
          <?php } ?>
        </div>
        <div id="logFormEdits">
          <form action="#" method="POST" id="editForme">
            <input type="text" class="replyText" name="contentUpdate" id="contentUpdate">
            <input type="submit" class="postReply" name="updateContent" value="modifier">
            <?php if (isset($errors['content'])): ?>
              <p class="errorsMessage"><?= $errors['content'] ?></p>
            <?php endif; ?><br>
          </form>
        </div>
      </div>
    </div>
  </div>
<hr>
  <div>
    <?php if ($textbackList == 0) { ?>
      <p>Aucune réponse</p>
    <?php } else { ?>
      <?php foreach ($textbackList as $cr) { ?>
        <?php if ($cr['id_users'] == $messagingsDetails->receiver_id) { ?>

        <div id="repliesContains">
          <div id="userCard">
            <div class="userImg"><img src="/assets/IMG/users/<?= $cr['avatar'] ?>" id="userAvy"></div>
            <div class="username">
              <h5><a href="/profil-<?= $cr['id_users'] ?>">@<?= $cr['username'] ?></a></h5>
            </div>
          </div>
          <div id="threadContent">
            <div id="contents">
              <p><?= $cr['content'] ?></p>
              <div id="timed">
                <p><?= $cr['publicationDate'] ?></p>
              </div>
              
              <div class="interact">
                <?php if(!empty($_SESSION['user'])) { ?>
                <button id="replyLikeBtn"><i class="fa-solid fa-heart">Like</i></button>
                <button id="replyRepliesBtn" class="repliesBtn" name="replyRepliesBtn" quotereply=<?= $cr['content'] ?>><a href="#comments">répondre</a></button>
                
                <?php if($_SESSION['user']['id'] == $cr['id_users'] || ($_SESSION['user']['id_usersRoles'] == 167 || 381)){ ?>
                  <button type="submit" name="updatereplies" id="replyEditModal" updatereply=<?= $cr['content'] ?>>modifier</button>
                  <button id="replyModalBtn" style="background-color: transparent;" deleteid="<?= $cr['id'] ?>">
                  <a href="#replyDelete"><i class="fa-solid fa-eraser"></i></a></button>
                <?php } ?>
                <?php }?>
                  
              </div>
              <div id="replyLogFormEdits">
                <form action="#" method="POST" id="editFormeReply">
                  <input type="hidden" name="repliesid" value="<?= $cr['id'] ?>">
                  <input type="text" class="replyText" name="repliesUpdate" id="repliesUpdate">
                  <input type="submit" class="postReply" name="updateReply" value="modifier">
                  
                  <?php if (isset($errors['reponse'])): ?>
                    <p class="errorsMessage">
                      <?= $errors['reponse'] ?>
                    </p>
                  <?php endif; ?><br>
                </form>
              </div>
            </div>
          </div>
        </div>
        <hr>
        
      <?php } else { ?>
          <div id="repliesContains">
            <div id="threadContent">
              <div id="contents">
                <p><?= $cr['content'] ?></p>
                <div id="timed">
                  <p><?= $cr['publicationDate'] ?></p>
                </div>
                
                <div class="interact">
                  <?php if(!empty($_SESSION['user'])) { ?>
                  <button id="replyLikeBtn"><i class="fa-solid fa-heart">Like</i></button>
                  <button id="replyRepliesBtn" class="repliesBtn" name="replyRepliesBtn" quotereply=<?= $cr['content'] ?>><a href="#comments">répondre</a></button>
                  
                  <?php if($_SESSION['user']['id'] == $cr['id_users'] || ($_SESSION['user']['id_usersRoles'] == 167 || 381)){ ?>
                    <button type="submit" name="updatereplies" id="replyEditModal" updatereply=<?= $cr['content'] ?>>modifier</button>
                    <button id="replyModalBtn" style="background-color: transparent;" deleteid="<?= $cr['id'] ?>">
                    <a href="#replyDelete"><i class="fa-solid fa-eraser"></i></a></button>
                  <?php } ?>
                  <?php }?>
                    
                </div>
                <div id="replyLogFormEdits">
                  <form action="#" method="POST" id="editFormeReply">
                    <input type="hidden" name="repliesid" value="<?= $cr['id'] ?>">
                    <input type="text" class="replyText" name="repliesUpdate" id="repliesUpdate">
                    <input type="submit" class="postReply" name="updateReply" value="modifier">
                    
                    <?php if (isset($errors['reponse'])): ?>
                      <p class="errorsMessage">
                        <?= $errors['reponse'] ?>
                      </p>
                    <?php endif; ?><br>
                  </form>
                </div>
              </div>
            </div>
            
            <div id="userCard">
              <div class="userImg"><img src="/assets/IMG/users/<?= $cr['avatar'] ?>" id="userAvy"></div>
              <div class="username">
                <h5><a href="/profil-<?= $cr['id_users'] ?>">@<?= $cr['username'] ?></a></h5>
              </div>
            </div>
          </div>
          <hr>
          
      <?php } ?>
      <?php } ?>
    <?php } ?>
  </div>

  <?php if (!isset($_SESSION['user'])) { ?>
    <p class="errorsMessage">Vous devez être connecté pour rajouter des réponses</p>
    <div class="messageCenter">
      <a href="/connexion" class="cta">Se connecter</a>
      <a href="/inscription" class="cta">S'inscrire</a>
    </div>
<?php } else { ?>
    <?php if (isset($success)) { ?>
        <p id="successMessage"><?= $success ?></p>
    <?php } ?>

    
    <fieldset id="userPosting">
      <form action="/message-<?= $_GET['id'] ?>" method="POST" id="centered">
          <label for="content"></label>
          <textarea name="replyTextBar" id="replyTextBar" ></textarea>
          <br><input type="submit" value="post" id="repliesBtn" name="reply">
          <?php if (isset($errors['reponse'])) { ?>
              <p class="errorsMessage"><?= $errors['reponse'] ?></p>
            <?php } ?>
      </form>
    </fieldset>
    <?php } ?>
    </main>




  <div id="modalContainer">
    <div id="modal">
      <span id="closeBtn">&times;</span>
      <p id="modalText">Êtes-vous sûr de vouloir supprimer votre message ?</p>
      <form action="/message-<?= $topic->id ?>" method="POST" id="delete">
        <input type="submit" value="Supprimer" name="deleteChat">
      </form>
    </div>
  </div>

  <div id="replyModalContainer">
    <div id="replyModal">
      <span id="replyCloseBtn">&times;</span>
      <p id="replyModalText">Êtes-vous sûr de vouloir supprimer votre réponse ?</p>
      <form action="/message-<?= $topic->id ?>" method="POST" id="replyDelete">
        <input type="text" name="idDelete" id="idDelete">
        <input type="submit" value="supprimer" name="deleteReply">
      </form>
    </div>
  </div>

  