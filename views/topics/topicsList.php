<main class="topics">
    <h1>Liste de Topics </h1><hr>
    <p><b>Total nombre de Threads :</b> <?= $topicCount ?></p>
    
    <!-- <nav aria-label="Page navigation example">
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
        </nav> -->
        
    <div class="topicsContainer">
        
        <?php foreach($topicsList as $t) { ?>
        <div class="topic">
            <div class="topicBottom">
                <h2><b>Titre:</b> <?= $t->title ?> <br></h2>
                <p>
                    <b>Ecrit par:</b> <?= $t->username ?> <br>
                    <b>Tags:</b> <?= $t->tag ?> <br>
                    <b>Catégorie:</b> <?= $t->categorie ?> <br>
                    <b>Publié:</b> <?= $t->publicationDate ?> <br>
                    <b>Mis à jour:</b> <?= $t->updateDate ?>
                </p><b>content:</b>
                <p class="topicContent"><?= strip_tags($t->content) ?><br>
                </p>
                <p><a href="/topic-<?= $t->id ?>"><b>Réponses :</b> <?= $repliesCount ?></a></p>
                <a href="/topic-<?= $t->id ?>" class="cta">Lire la suite</a><br>
                <?php if ($_SESSION['user']['id'] == $t->id_users) {?>
                <div class="threads">
                    <button type="submit" class="cta"><a href="/modifier-topic-<?= $t->id ?>">modifier</a></button>
                    <button type="submit" class="cta"><a href="/modifier-topic-<?= $t->id ?>"><i class="fa-solid fa-trash-can"></i> supprimer</a></button>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

    </div>
</main>