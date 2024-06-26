<main class="topics">
    <h1>Liste de Topics </h1>
    <hr>
    <p><b>Nombre de Topics :</b> <?= $topicCount ?></p>

    <?php if (count($topicsList) == 0): ?>
        <p>No topics available</p>
    <?php else: ?>
        <?php foreach ($topicsList as $t): ?>
            <div class="subforum central" id="okey">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center" id="icon">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                    </div>
                    <div class="subforum-description subforum-column" id="subDescript">
                        <ul class="topic-list">
                            <h4>
                                <a href="/topic-<?= $t->id ?>">
                                    <b><?= $t->title ?></b>, par <b><?= $t->username ?></b>
                                </a>
                            </h4>
                            <p>un topic de <b><?= $t->tag ?></b>/ <b><?= $t->categorie ?></b> , <b>Publié:</b> <?= $t->publicationDate ?>,
                                <b>Mis à jour:</b> <?= $t->updateDate ?></p>
                        </ul>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span>
                            <a href="/modifier-topic-<?= $t->id ?>">modifier</a>
                        </span>
                    </div>
                    <div class="subforum-info subforum-column" id="centerBtn">
                        <a href="/modifier-topic-<?= $t->id ?>"> supprimer</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</main>
