<main id="threadMain">

  <div id="threadHeader">
    <button id="backBtn"><a href="/liste-topics-par-categories">
        <i id="backArrow" class="fa fa-arrow-left"> Back</i>
      </a></button>
    <div id="threadTitle">
      <h2 id="tag"><?= $topicsDetails->tag ?></h2>
      <h2><?= $topicsDetails->title ?></h2>
    </div>
    <hr>
  </div>
  <div id="threadContains">
    <div id="userCard">
      <div class="userImg"><img src="../../assets/IMG/logo.jpg" id="userAvy"></div><br>
      <div class="username">
        <h5><a href="/profil">@
            <?= $topicsDetails->username ?>
          </a></h5>
      </div><br>
    </div>
    <div id="threadContent">
      <div id="contents">
        <p id="contentP"><?= $topicsDetails->content ?></p>
        <div id="timed">
          <p><?= $topicsDetails->publicationDate ?></p>
        </div>

        <div class="interact">
          <button id="likeBtn"><i class="fa-solid fa-heart"></i></button>
          <button id="replyBtn" name="replyBtn"><a href="#comments">reply</a></button>
          <button type="submit" name="update" id="editModal">modifier</button>
          <div id="logFormEdits">
            <form action="#" method="POST" id="editForme">
              <textarea class="replyText"><?= $topicsDetails->content ?> </textarea>
              <input type="submit" class="postReply" name="updateContent" value="edit">
              <?php if (isset($errors['content'])): ?>
                <p class="errorsMessage"><?= $errors['content'] ?></p>
              <?php endif; ?><br>
            </form>
          </div>
          <button id="openModalBtn" style="background-color: transparent;"><a href="#delete">supprimer</a></button>
        </div>
      </div>
    </div>
  </div>
<hr>
  <div>
    <?php if ($repliesList == 0) { ?>
      <p>Aucune réponse</p>
    <?php } else { ?>
      <?php foreach ($repliesList as $r) { ?>
        <div id="repliesContains">
          <div id="userCard">
            <div class="userImg"><img src="../../assets/IMG/logo.jpg" id="userAvy"></div>
            <div class="username">
              <h5><a href="#user"><?= $r->username ?></a></h5>
            </div>
          </div>
          <div id="threadContent">
            <div id="contents">
              <p><?= $r->content ?></p>
              <div id="timed">
                <p><?= $r->publicationDate ?></p>
              </div>
      
              <div class="interact">
                <button id="replyLikeBtn"><i class="fa-solid fa-heart"></i></button>
                <button id="replyRepliesBtn" ><a href="#comments" name="replyRepliesBtn">reply</a></button>
                <button type="submit" name="update" id="editModal">modifier</button>
                <div id="logFormEdits">
                  <form action="#" method="POST" id="editForme">
                    <textarea class="replyText"><?= $r->content ?> </textarea>
                      <input type="submit" class="postReply" name="updateContent" value="edit">
                      <?php if (isset($errors['content'])): ?>
                        <p class="errorsMessage">
                          <?= $errors['content'] ?>
                        </p>
                      <?php endif; ?><br>
                    </form>
                  </div>
                  <button id="replyModalBtn" style="background-color: transparent;"><a href="#replyDelete">supprimer</a></button>
                </div>
            </div>
          </div>
        </div>
        <hr>
      <?php } ?>
    <?php } ?>
  </div>
  <div id="modalContainer">
    <div id="modal">
      <span id="closeBtn">&times;</span>
      <p id="modalText">Êtes-vous sûr de vouloir supprimer votre topic ?</p>
      <form action="/liste-topics-par-categories" method="POST" id="delete">
        <input type="submit" value="Supprimer" name="deleteTopic">
      </form>
    </div>
  </div>

  <div id="replyModalContainer">
    <div id="replyModal">
      <span id="replyCloseBtn">&times;</span>
      <p id="replyModalText">Êtes-vous sûr de vouloir supprimer votre réponse ?</p>
      <form action="/liste-topics-par-categories" method="POST" id="replyDelete">
        <input type="submit" value="Supprimer" name="deleteReply">
      </form>
    </div>
  </div>

  <script src="assets/javaSc/topic.js"></script>
  <script src="assets/javaSc/modals.js"></script>