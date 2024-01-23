<?php
require_once "../../models/topicsModel.php" ;
require_once "../../models/topicAnswersModel.php" ;
require_once "../../models/commentsModel.php" ;
require_once "../../models/categoriesModel.php" ;
require_once "../../models/tagsModel.php" ;
require_once "../../models/sectionsModel.php" ;
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';



session_start();

require_once '../../views/parts/header.php';
  
// Confirmation que l'utilisateur est bel et bien en ligne
if (!isset($_SESSION['user'])) {
    // Sinon, lui rediriger vers la page d'accueil ou de connexion
    header("Location: /connexion");
    exit();
}

$topic = new Topics;
 $topicsList = $topic->getList();

 if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
 }

 require_once '../../views/posts/thread.php';
require_once '../../views/parts/footer.php';
?>
<!-- <main id="threadMain"><div id="threadHeader"><button id="backBtn"><a href="/forum">
    <i id="backArrow" class="fa fa-arrow-left"> Back</i>  </a></button><div id="threadTitle">
    <h2 id="tag">  $topic->id_tags ?> </h2><h2>  $topic->title ?> </h2></div></div><hr><br>
    <fieldset id="threadContains"><div id="userCard">
    <div class="userImg"><img src="../../assets/IMG/logo.jpg" id="userAvy"></div><br>
    <div class="username"><h5><a href="/profile">@  $topic->username ?> 
    '</a><br><p href="location"> $topic->id_users ?> </p></h5></div>
    <div class="pFlex"><p><a href="">200</a> likes</p><p><a href="">100</a> points</p></div></div>
    </div>
    <div id="threadContent">
    <div id="contents"><p> $topic->content ?></p><br>
    <div id="timed"><p>$topic->publicationDate ?></p></div>
    <br><div class="interact">
    <button id="likeBtn"><i class="fa-solid fa-heart"></i></button>
    <button id="replyBtn"><a href="#comments">Reply</a></button>
    <button id="quoteBtn">+Quote</button>
    </div></fieldset><br>
    <fieldset>
    <div class="commentsArea"><div class="replies">
    <fieldset id="threadContains"> '
     <div id="userCard"><div class="userImg"><img src="../../assets/IMG/logo.jpg" id="userAvy"><br>
    <div class="username"><h5><a href="#user">@'  $_GET['user']['username'] . 
    '</a><br><p href="location">'. $_GET['user']['id_usersRoles'] . '</p></h5>
    <div class="pFlex"><p><a href="">200</a> likes</p><p><a href="">100</a> points</p></div></div>
    </div></div> -->
    <!-- </div></fieldset><br>
    <fieldset id="userPosting">
    <div id="centered"><label for="comments"></label>
    <textarea name="comments" id="comments" ></textarea>
    <br><input type="submit" value="POST" id="commentBtn"></div></fieldset></main> --> 