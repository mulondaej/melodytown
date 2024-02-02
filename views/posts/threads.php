<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

<?php if (isset($_GET['id'])) { ?>

  <main id="threadMain">
    <div id="threadHeader"><button id="backBtn"><a href="/forum">
          <i id="backArrow" class="fa fa-arrow-left"> Back</i> </a></button>
      <div id="threadTitle">
        <h2 id="tag"><?= $t->tag ?></h2>
        <h2><?= $t->title ?></h2>
      </div>
    </div>
    <hr><br>
    <fieldset id="threadContains">
      <div id="userCard">
        <div class="userImg"><img src="../../assets/IMG/logo.jpg" id="userAvy"></div><br>
        <div class="username">
          <h5><a href="/profile">@ <?= $_GET['user']['username'] ?>
              '</a><br>
            <p href="location"><?= $_GET['user']['Rolename'] ?> '</p>
          </h5>
        </div>
        <div class="pFlex">
          <p><a href="">200</a> likes</p>
          <p><a href="">100</a> points</p>
        </div>
      </div>
      </div>
      <div id="threadContent">
        <div id="contents">
          <p><?= $t->content ?></p><br>
          <div id="timed">
            <p><?= $t->publicationDate ?></p>
          </div>
          <br>
          <div class="interact">
            <button id="likeBtn"><i class="fa-solid fa-heart"></i></button>
            <button id="replyBtn"><a href="#comments">Reply</a></button>
            <button id="quoteBtn">+Quote</button>
          </div>
    </fieldset><br>

    <fieldset id="userPosting">
      <div id="centered"><label for="comments"></label>
        <textarea name="comments" id="comments"></textarea>
        <br><input type="submit" value="post" id="commentBtn">
      </div>
    </fieldset>
  </main>';

  </nav>
<?php } else { ?>
  <p id="messTxt"> Ce contenu n\'est pas disponible</p>
<?php } ?>


  <?php var_dump($_GET) ?>

  </div>