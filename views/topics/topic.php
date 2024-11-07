<main id="threadMain">

  <div id="threadHeader">
    <button id="backBtn"><a href="/topics-par-categories">
        <i id="backArrow" class="fa fa-arrow-left"> Back</i>
      </a></button>
    <div id="threadTitle">
      <h2 id="tag"><?= $topicsDetails->tag ?></h2>
      <h2><?= $topicsDetails->title ?></h2>
    </div>
    <hr>
  </div>
  <?php if (isset($success)) { ?>
    <p id="successMessage"><?= $success ?></p>
  <?php } ?>

  <div id="threadContains">
    <div id="userCard">
      <div class="userImg"><img src="/assets/IMG/users/<?= $topicsDetails->avatar ?>" id="userAvy"></div><br>
      <div class="username">
        <h5>@<a href="/profil-<?= $topicsDetails->id_users ?>"><?= $topicsDetails->username ?>
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
          <?php if (!empty($_SESSION['user'])) { ?>
            <button id="likeBtn" name="liked"><i class="fa-solid fa-heart">Like</i></button>
            <button id="replyBtn" name="replyBtn" quotecontent="<?= $topicsDetails->content ?>"><a
                href="#comments">répondre</a></button>

            <?php if ($_SESSION['user']['id'] == $topicsDetails->id_users && ($_SESSION['user']['id_usersRoles'] == 167 || 381)) { ?>
              <button type="submit" name="update" id="editModal" updatecontent=<?= $topicsDetails->content ?>>modifier</button>
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
    <?php if ($repliesList == 0) { ?>
      <p>Aucune réponse</p>
    <?php } else { ?>
      <?php foreach ($repliesList as $r) { ?>
        <div id="repliesContains">
          <div id="userCard">
            <div class="userImg"><img src="/assets/IMG/users/<?= $r['avatar'] ?>" id="userAvy"></div>
            <div class="username">
              <h5><a href="/profil-<?= $r['id_users'] ?>">@<?= $r['username'] ?></a></h5>
            </div>
          </div>
          <div id="threadContent">
            <div id="contents">
              <p><?= $r['content'] ?></p>
              <div id="timed">
                <p><?= $r['publicationDate'] ?></p>
              </div>

              <div class="interact">
                <?php if (!empty($_SESSION['user'])) { ?>
                  <button id="replyLikeBtn"><i class="fa-solid fa-heart">Like</i></button>
                  <button id="replyRepliesBtn" class="repliesBtn" name="replyRepliesBtn" quotereply=<?= $r['content'] ?>><a
                      href="#comments">répondre</a></button>

                  <?php if ($_SESSION['user']['id'] == $r['id_users'] || ($_SESSION['user']['id_usersRoles'] == 167 || 381)) { ?>
                    <button type="submit" name="updatereplies" id="replyEditModal" updatereply=<?= $r['content'] ?>>modifier</button>
                    <button id="replyModalBtn" style="background-color: transparent;" deleteid="<?= $r['id'] ?>">
                      <a href="#replyDelete"><i class="fa-solid fa-eraser"></i></a></button>
                  <?php } ?>
                <?php } ?>

              </div>
              <div id="replyLogFormEdits">
                <form action="#" method="POST" id="editFormeReply">
                  <input type="hidden" name="repliesid" value="<?= $r['id'] ?>">
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
      <form action="/topic-<?= $_GET['id'] ?>" method="POST" id="centered">
        <label for="content"></label>
        <textarea name="replyTextBar" id="replyTextBar"></textarea>
        <br><input type="submit" value="post" id="repliesBtn" name="reply">
        <?php if (isset($errors['reponse'])) { ?>
          <p class="errorsMessage"><?= $errors['reponse'] ?></p>
        <?php } ?>
      </form>
    </fieldset>
  <?php } ?>

  <div class="pagination">
    
    <?php if ($pages > 1): ?>
      <a href="?id=<?= $_GET['id'] ?>&page=<?= $pages - 1 ?>" class="pagination-link">Previous </a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $replies->totalPages; $i++): ?>
      <a href="?id=<?= $_GET['id'] ?>&page=<?= $i ?>"
        class="pagination-link <?= ($i === $pages) ? 'active' : '' ?>"><?= $i ?> / </a>
    <?php endfor; ?>

    <?php if ($pages < $replies->totalPages): ?>
      <a href="?id=<?= $_GET['id'] ?>&page=<?= $pages + 1 ?>" class="pagination-link"> Next</a>
    <?php endif; ?>
  </div>

</main>



<div id="modalContainer">
  <div id="modal">
    <span id="closeBtn">&times;</span>
    <p id="modalText">Êtes-vous sûr de vouloir supprimer votre topic ?</p>
    <form action="/topic-<?= $topic->id ?>" method="POST" id="delete">
      <input type="submit" value="Supprimer" name="deleteTopic">
    </form>
  </div>
</div>

<div id="replyModalContainer">
  <div id="replyModal">
    <span id="replyCloseBtn">&times;</span>
    <p id="replyModalText">Êtes-vous sûr de vouloir supprimer votre réponse ?</p>
    <form action="/topic-<?= $topic->id ?>" method="POST" id="replyDelete">
      <input type="text" name="idDelete" id="idDelete">
      <input type="submit" value="supprimer" name="deleteReply">
    </form>
  </div>
</div>