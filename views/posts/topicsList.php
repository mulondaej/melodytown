<main>
    <h1>Threads</h1>
<div class="articlesContainer">
    <?php foreach ($postsList as $p) { ?>
        <div class="article">
            <div class="articleImage" style="background-image: url('assets/img/articles/<?= $p->image ?>')"></div>
            <div class="articleBottom">
                <h2><?= $p->title ?></h2>
                <p>
                    <b>Ecrit par :</b> <?= $p->username ?><br>
                    <b>Catégorie :</b> <?= $p->category ?><br>
                    <b>Publié :</b> <?= $p->publicationDateFr ?><br>
                    <b>Mis à jour :</b> <?= $p->updateDateFr ?>
                </p>
                <p>
                    <?= strip_tags($p->content) ?>...
                </p>
                <a href="/article-<?= $p->id ?>" class="cta">Lire la suite</a>
            </div>
        </div>
    <?php } ?>
</div>
</main>
