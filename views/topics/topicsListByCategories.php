<?php

?>
<div id="main">
    <section class="forum" id="forum">
    
        <h1>Les topics publiés</h1><hr>
        
        <div class="forumcontainer" id="forumcontainer">
        <?php if (!empty($_SESSION['user'])) { ?> <!-- si l'utilisateur est connecté, alors il a acces au creation du topic  -->
             
             <!-- button qui ouvre le modal du formulaire pour creer un nouveau topic -->    
             <button type="button" id="newThread" value="topic">Nouveau topic</button>
             <div id="modalContainer">
                 <div id="modalThread">
                     <span id="threadCloseBtn">&times;</span>
                     
                 <form action="/liste-topics-par-categories" method="POST" id="threadForm" >
                     <label for="tag">Tags:</label>
                     <select name="tag" id="tag" value="<?= @$_POST['tag'] ?>">
                        <option selected disabled>Choisissez un tag</option>
                        <?php foreach ($tagsList as $t) { ?>
                            <option value="<?= $t->id ?>"><?= $t->name ?></option>
                        <?php } ?>
                    </select>
                    <?php if (isset($errors['tag'])) : ?>
                        <p id=errorsMessage><?= $errors['tag'] ?></p>
                    <?php endif; ?>

                    <label for="categories">Categories</label>
                    <select id="categories" name="categories" value="<?= @$_POST['categories'] ?>">
                        <option selected disabled>Choisissez une catégorie</option>
                         <?php foreach ($categoriesList as $c) { ?>
                             <option value="<?= $c->id ?>"><?= $c->name ?></option>
                         <?php } ?>
                     </select>
                     <?php if (isset($errors['categories'])) : ?>
                         <p id=errorsMessage><?= $errors['categories'] ?></p>
                     <?php endif; ?>
 
                     <label for="title">Title:</label>
                     <input type="text" id="title" name="title" value="<?= @$_POST['title'] ?>">
                     <?php if (isset($errors['title'])) : ?>
                         <p id=errorsMessage><?= $errors['title'] ?></p>
                     <?php endif; ?>
 
                     <label for="content">Content:</label>
                     <textarea id="content" name="content" value="<?= @$_POST['content'] ?>"></textarea >
                     <?php if (isset($errors['content'])) : ?>
                         <p id=errorsMessage><?= $errors['content'] ?></p>
                     <?php endif; ?>
 
                     <div class="send">
                         <input type="submit" name="threadPost" value="Create">
                     </div>
                 </form>
                 </div>
             </div>
                 <hr>
             <?php } ?>
        <?php if (isset($success)) { ?><!-- Si la creation est une reussite, afficher le message de succes -->
            <p id=successMessage><?= $success ?></p>
        <?php } ?>
            <?php if (count($topicsList) == 0) { ?>
                <p>No topics available</p>
            <?php } else { ?>
                <?php foreach ($topicsList as $t) { ?>
                <div class="subforum central" id="central">
                    <div class="subforum-title">
                        <h1 id="title"><?= $t->categorie ?></h1>
                    </div>
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
 
    </section>
</div>