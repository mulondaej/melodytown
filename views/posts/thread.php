<?php
require_once("../../models/topicsModel.php");
require_once("../../models/usersModel.php");
require_once("../../models/topicAnswersModel.php");
require_once("../../models/commentsModel.php");
require_once("../../models/categoriesModel.php");
require_once("../../models/tagsModel.php");

session_start();

require_once '../../views/parts/header.php'; 

if(empty($_SESSION['user'])){
    header('Location: /connexion');
    exit;
}?>

<?php  
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['tag']) && isset($_POST['title']) && isset($_POST['content'])) {

    echo '<main id="threadMain"><div id="threadHeader"><button id="backBtn" onclick="goBack()>
    <i id="backArrow" class="fa fa-arrow-left"></i> back</button><div id="threadTitle">
    <h2 id="tag">' . $_POST['tag'] . '</h2><h2>' . $_POST['title'] . '</h2></div></div><hr><br>
    <fieldset id="threadContains"><div id="userCard">
    <div class="userImg"><img src="../../assets/IMG/logo.jpg" id="userAvy"></div><br>
    <div class="username"><h5><a href="/profile">@' . $_SESSION['user']['username'] . 
    '</a><br><p href="location">'. $_SESSION['user']['id_usersRoles'] . '</p></h5></div>
    <div class="pFlex"><p><a href="">200</a> likes</p><p><a href="">100</a> points</p></div></div>
    </div>
    <div id="threadContent">
    <div id="contents"><p>' . $_POST['content'] . '</p><br>
    <div id="timed"><p>' . setlocale(LC_TIME, 'fr_FR') 
    . date_default_timezone_set('Europe/Paris') . $formattedDate = strftime('%A, %d %B %Y, %H:%M') . '</p></div>
    <br><div class="interact">
    <button id="likeBtn"><i class="fa-solid fa-heart"></i></button>
    <button id="replyBtn"><a href="#comments">Reply</a></button>
    <button id="quoteBtn">+Quote</button>
    </div></fieldset><br>
    <fieldset>
    <div class="commentsArea"><div class="replies">
    <fieldset id="threadContains">
    <div id="userCard"><div class="userImg"><img src="../../assets/IMG/logo.jpg" id="userAvy"><br>
    <div class="username"><h5><a href="#user">@' . $_SESSION['user']['username'] . 
    '</a><br><p href="location">'. $_SESSION['user']['id_usersRoles'] . '</p></h5>
    <div class="pFlex"><p><a href="">200</a> likes</p><p><a href="">100</a> points</p></div></div>
    </div></div></div>
    </fieldset><br>
    <fieldset id="userPosting">
    <div id="centered"><label for="comments"></label>
    <textarea name="comments" id="comments" ></textarea>
    <br><input type="submit" value="post" id="commentBtn"></div></fieldset></main>';

    } else {
        echo '<p id="messTxt"> Ce contenu n\'est pas disponible</p>';
    }
    
    var_dump($_POST);
?>

<?php require_once '../../views/parts/footer.php';
?>