<?php

?>
<div id="main">
    <section class="forum" id="forum">
    
        <h1>Threads</h1><hr>
        
        <div class="forumcontainer" id="forumcontainer">
        <?php if (isset($success)) { ?><!-- Si la creation est une reussite, afficher le message de succes -->
            <p id=successMessage><?= $success ?></p>
        <?php } ?>
            <?php if (count($topicsList) == 0) { ?>
                <p>No topics available</p>
            <?php } else { ?>
                <?php foreach ($topicsList as $t) { ?>

                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center" id="icon">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                        </div>
                        <div class="subforum-description subforum-column" id="subDescript">
                            <ul class="topic-list">
                                <h4><a href="/topic-<?= $t->id ?>">
                                        <?= $t->title ?>
                                    </a></h4>
                                <p> Un topic <?= $t->tag ?> à discuter </p>
                            </ul>
                        </div>
                        <div class="subforum-stats subforum-column center">
                            <span><a href="" id="topicPost"> 
                                <?php if(isset($repliesList )== 1) { ?>
                                    <?= $repliesCount ?> 
                                <?php } else { ?>
                                    <?php } ?> </a>rép.</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <a href="/topic-<?= $t->id ?>">
                            <b>par</b> </a><a href="/topic-<?= $t->id ?>"><?= $t->username ?>,
                             <?= $t->publicationDate ?></a>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

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
        </main>
 
    </section>
</div>