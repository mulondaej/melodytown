<main class="topics">
    <h1>Threads</h1><hr>
    <nav aria-label="Page navigation example">
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
        </nav>
    <div class="topicsContainer">
        
        <?php foreach($topicsList as $t) { ?>
        <div class="topic">
            <div class="topicBottom">
                <h2><b>Titre :</b> <?= $t->title ?> <br></h2>
                <p>
                    <b>Ecrit par :</b> <?= $t->username ?> <br>
                    <b>Tags :</b> <?= $t->tag ?> <br>
                    
                    <b>Publié :</b> <?= $t->publicationDate ?> <br>
                    <b>Mis à jour :</b> <?= $t->updateDate ?>
                </p><b>content :</b>
                <p class="topicContent">  <?= $t->content ?> <br>
                </p>
            <a href="/thread-<?= $t->title ?><?= $t->tag ?><?= $t->content ?>" class="cta">Lire la suite</a>
                <div class="threads">
                    <button type="submit" class="cta"><a href="/modifier-topic">modifier</a></button>
                    <button type="submit" class="cta"><a href="/modifier-topic">supprimer</a></button>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</main>