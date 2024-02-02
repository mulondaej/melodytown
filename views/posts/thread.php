
<div class="singleArticle">
    <h1><?= $topicsDetails->title ?></h1>
    <p>
        <b>Ecrit par :</b> <?= $topicsDetails->username ?><br>
        <b>Catégorie :</b> <?= $topicsDetails->category ?><br>
        <b>Publié :</b> <?= $topicsDetails->publicationDateFr ?><br>
        <b>Mis à jour :</b> <?= $topicsDetails->updateDateFr ?>
    </p>
    <p>
        <?= $topicsDetails->content ?>
    </p>


