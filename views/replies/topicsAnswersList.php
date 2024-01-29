<main class="topics">
    <h1>Réponses</h1><hr>
    <p><b>Total nombre de réponses :</b> <?= $postCount ?></p>
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
        <?php foreach($answersList as $a) { ?>
        <div class="topic">
            <div class="topicBottom">
                <h4>Réponse :</h4>
                <p class="topicContent"> <b> <?= $a->content ?></b> <br>
                </p>
                <p>
                    <b>Ecrit par :</b> <?= $a->username ?> <br>
                    <b>Topic répondu :</b> <a href="/thread?<?= $a->id_topics ?>"><?= $a->id_topics ?></a> <br>
                    <b>Publié :</b> <?= $a->publicationDate ?> <br>
                    <b>Mis à jour :</b> <?= $a->updateDate ?>
                </p>
                
            <a href="/thread?<?= $a->id ?>" class="cta">Lire la suite</a>
                <div class="threads">
                    <button type="submit" class="cta"><a href="/modifier-reponse?<?= $a->id ?>">modifier</a></button>
                    <button type="submit" class="cta"><a href="/modifier-reponse?<?= $a->id ?>">supprimer</a></button>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</main>