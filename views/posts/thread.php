<div class="singletopic">
    <h1><?= $topicDetails->title ?></h1>
    <p>
        <b>Ecrit par :</b> <?= $topicDetails->username ?><br>
        <b>Catégorie :</b> <?= $topicDetails->category ?><br>
        <b>Publié :</b> <?= $topicDetails->publicationDateFr ?><br>
        <b>Mis à jour :</b> <?= $topicDetails->updateDateFr ?>
    </p>
    <p>
        <?= $topicDetails->content ?>
    </p>
</div>

  