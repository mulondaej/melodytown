<main>
    <h1>Threads</h1>
<div class="articlesContainer">
    <?php foreach ($topicsList as $t) { ?>
        <div class="article">
            
            <div class="articleBottom">
                <h2><?= $t->title ?></h2>
                <p>
                    <b>Ecrit par :</b> <?= $t->username ?><br>
                    <b>Catégorie :</b> <?= $t->categories ?><br>
                    <b>Publié :</b> <?= $t->publicationDateFr ?><br>
                    <b>Mis à jour :</b> <?= $t->updateDateFr ?>
                </p>
                <p>
                    <?= strip_tags($t->content) ?>...
                </p>
                <a href="/topics-<?= $t->id ?>" class="cta">Lire la suite</a>
            </div>
        </div>
    <?php } ?>
</div>
</main>
