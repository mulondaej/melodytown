<div class="singletopic">
    <h1><?= $topicDetails->publicationDate = $_GET['title'] ?></h1>
    <p>
        <b>Ecrit par :</b> <?= $_GET['user']['username'] ?><br>
        <b>Catégorie :</b> <?= $_GET['categorie']?><br>
        <b>Publié :</b> <?= $topicDetails->publicationDate ?><br>
    </p>
    <p>
        <?= $topicDetails->content ?>
    </p>
</div>

        <input type="submit" value="Modifier" name="updateInfos">
        <button id="openModalBtn"><a href="#delete">Supprimer le post</a></button>

    <div id="modalContainer">
        <div id="modal">
            <span id="closeBtn">&times;</span>
            <p id="modalText">Êtes-vous sûr de vouloir supprimer votre thread ?</p>
            <form action="/modifier-topic" method="POST" id="delete">
                <input type="submit" value="Supprimer" name="deleteReply">
            </form>
        </div>
    </div>
<?php var_dump($_GET); ?>

  