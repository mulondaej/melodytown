main id="threadMain">
    <?php var_dump($_GET) ?>
    <div id="threadHeader"><button id="backBtn"><a href="/forum">
          <i id="backArrow" class="fa fa-arrow-left"> Back</i> </a></button>
      <div id="threadTitle">
        <h2 id="tag"><?= $_GET['tag']?></h2>
        <h2><?= $$_GET['title'] ?></h2>
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
          <p><?= $_GET['content'] ?></p><br>
          <div id="timed">
            <p><?= $_GET['publicationDate'] ?></p>
          </div>
          <br>
          <div class="interact">
            <button id="likeBtn"><i class="fa-solid fa-heart"></i></button>
            <button id="replyBtn"><a href="#comments">Reply</a></button>
            <button id="quoteBtn">+Quote</button>
          </div>
    </fieldset><br>

    <fieldset>
    <div class="commentsArea"><div class="replies">
    <div id="userCard"><div class="userImg"><img src="../../assets/IMG/logo.jpg" id="userAvy"><br>
    <div class="username"><h5><a href="#user"> <?= $_GET['user']['username'] ?>
    </a><br><p href="<?= $_GET['user']['location'] ?>"> <?= $_GET['user']['Rolename'] ?></p></h5>
    <div class="pFlex"><p><a href="">200</a> likes</p><p><a href="">100</a> points</p></div></div>
    </div></div>
    </div></fieldset><br>
