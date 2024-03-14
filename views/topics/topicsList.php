<main class="topics">
    <h1>Liste de Topics </h1><hr>
    <p><b>Total nombre de Topics :</b> <?= $topicCount ?></p>
    
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
        
    
        <?php if (count($topicsList) == 0) { ?>
                        <p>No topics available</p>
            <?php } else { ?>
                        <?php foreach ($topicsList as $t) { ?>
                                <div class="subforum central" id="central">
                                    <!-- <div class="subforum-title">
                        <h1 id="title"><?= $t->categorie ?></h1>
                    </div> -->
                                    <div class="subforum-row">
                                        <div class="subforum-icon subforum-column center" id="icon">
                                            <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                                        </div>
                                        <div class="subforum-description subforum-column" id="subDescript">
                                            <ul class="topic-list">
                                                <h4><a href="/topic-<?= $t->id ?>">
                                                        <b><?= $t->title ?></b>, par <b><?= $t->username ?></b>
                                                    </a></h4>
                                                <p>un topic de <b><?= $t->tag ?></b>/ <b><?= $t->categorie ?></b> , <b>Publié:</b> <?= $t->publicationDate ?>, 
                                    <b>Mis à jour:</b> <?= $t->updateDate ?></p>
                                        
                                
                            
                                            </ul>
                                        </div>
                                        <div class="subforum-stats subforum-column center">
                                            <span>
                                                <button type="submit" class="cta"><a href="/modifier-topic-<?= $t->id ?>">modifier</a></button>
                                            </span>
                                        </div>
                                        <div class="subforum-info subforum-column">
                                            <a href="/topic-<?= $t->id ?>">
                            
                                    <button type="submit" class="cta"><a href="/modifier-topic-<?= $t->id ?>"><i class="fa-solid fa-trash-can"></i> supprimer</a></button>
                                        </div>
                                    </div>
                        <?php } ?>
            <?php } ?>

</main>