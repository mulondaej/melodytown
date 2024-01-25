<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['tag']) && isset($_GET['title']) && isset($_GET['content']) 
&& isset($_GET['username']) && isset($_GET['publicationDate'])) {
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

    <main id="threadMain"><div id="threadHeader"><button id="backBtn"><a href="/forum">
    <i id="backArrow" class="fa fa-arrow-left"> Back</i>  </a></button><div id="threadTitle">
    <h2 id="tag">' . $_GET['tag'] . '</h2><h2>' . $_GET['title'] . '</h2></div></div><hr><br>
    <fieldset id="threadContains"><div id="userCard">
    <div class="userImg"><img src="../../assets/IMG/logo.jpg" id="userAvy"></div><br>
    <div class="username"><h5><a href="/profile">@' . $GET['username'] . 
    '</a><br><p href="location">'. $_GET['user']['id_usersRoles'] . '</p></h5></div>
    <div class="pFlex"><p><a href="">200</a> likes</p><p><a href="">100</a> points</p></div></div>
    </div>
    <div id="threadContent">
    <div id="contents"><p>' . $_GET['content'] . '</p><br>
    <div id="timed"><p>' . $_GET['publicationDate'] . '</p></div>
    <br><div class="interact">
    <button id="likeBtn"><i class="fa-solid fa-heart"></i></button>
    <button id="replyBtn"><a href="#comments">Reply</a></button>
    <button id="quoteBtn">+Quote</button>
    </div></fieldset><br>
    <fieldset>
    <div class="commentsArea"><div class="replies">
    <fieldset id="threadContains"> '
    // <div id="userCard"><div class="userImg"><img src="../../assets/IMG/logo.jpg" id="userAvy"><br>
    // <div class="username"><h5><a href="#user">@'  $_GET['user']['username'] . 
    // '</a><br><p href="location">'. $_GET['user']['id_usersRoles'] . '</p></h5>
    // <div class="pFlex"><p><a href="">200</a> likes</p><p><a href="">100</a> points</p></div></div>
    // </div></div>
     . '</div></fieldset><br>
    <fieldset id="userPosting">
    <div id="centered"><label for="comments"></label>
    <textarea name="comments" id="comments" ></textarea>
    <br><input type="submit" value="post" id="commentBtn"></div></fieldset></main>';

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
    } else {
        echo '<p id="messTxt"> Ce contenu n\'est pas disponible</p>';
    }
    
    var_dump($_GET);
    <div class="singleArticle">
    <h1><?= $articleDetails->title ?></h1>
    <p>
        <b>Ecrit par :</b> <?= $articleDetails->username ?><br>
        <b>Catégorie :</b> <?= $articleDetails->category ?><br>
        <b>Publié :</b> <?= $articleDetails->publicationDateFr ?><br>
        <b>Mis à jour :</b> <?= $articleDetails->updateDateFr ?>
    </p>
    <img src="assets/img/articles/<?= $articleDetails->image ?>" alt="Image d'illustration">
    <p>
        <?= $articleDetails->content ?>
    </p>
</div>
?>
