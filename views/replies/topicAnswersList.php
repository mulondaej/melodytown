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
        
        <?php foreach($answersList as $a) { ?>
        <div class="topic">
            <div class="topicBottom">
                <h4 class="topicContent"><b></b> <?= $a->content ?> <br></h4>
                <p>
                    <b>Ecrit par :</b> <?= $a->username ?> <br>
                    <b>Topic répondu :</b> <?= $a->id ?> <br>
                    <b>Publié :</b> <?= $a->publicationDate ?> <br>
                    <b>Mis à jour :</b> <?= $a->updateDate ?>
                 </p>
            <a href="/thread" class="cta">Lire la suite</a>
                <div class="threads">
                    <button type="submit" class="cta"><a href="/modifier-topic">modifier</a></button>
                    <button type="submit" class="cta"><a href="/modifier-topic">supprimer</a></button>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</main>