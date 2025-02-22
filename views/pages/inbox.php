<?php

?>
<div id="main">
    <section class="forum" id="forum">
    
        <h1>Ton inbox</h1><hr>
        
        <div class="forumcontainer" id="forumcontainer">
        <?php if (!empty($_SESSION['user'])) { ?> <!-- si l'utilisateur est connecté, alors il a acces au creation du topic  -->
             
             <!-- button qui ouvre le modal du formulaire pour creer un nouveau topic -->    
             <button type="button" id="newThread" value="topic">Nouveau message</button>
             <div id="modalContainer">
                 <div id="modalThread">
                     <span id="threadCloseBtn">&times;</span>
                     
                 <form action="#" method="POST" id="threadForm" >
                     
                 <label for="user"> Members: </label>
                     <select name="username" id="username" value="<?= @$_POST['username'] ?>">
                        <option selected disabled>Envoyez un message à </option>
                        <?php foreach ($usersList as $u) { ?>
                            <option value="<?= $u->id ?>"><?= $u->username ?></option>
                        <?php } ?>
                    </select>
                    <?php if (isset($errors['username'])) : ?>
                        <p id=errorsMessage><?= $errors['username'] ?></p>
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
                         <input type="submit" name="messageUser" value="Create">
                     </div>
                 </form>
                 </div>
             </div>
                 <hr>
             <?php } ?>
        <?php if (isset($success)) { ?><!-- Si la creation est une reussite, afficher le message de succes -->
            <p id=successMessage><?= $success ?></p>
        <?php } ?>
            <?php if (count($chatsList) == 0) { ?>
                <p>Pas de message disponible</p>
            <?php } else { ?>
                <?php foreach ($chatsList as $c) { ?>
                    <?php if($_SESSION['user']['id'] == $c->id_users && ($_SESSION['user']['id_usersRoles'] == 167 || 381)){ ?>
                <div class="subforum central" id="central">
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center" id="icon">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                        </div>
                        <div class="subforum-description subforum-column" id="subDescript">
                            <ul class="topic-list">
                                <h4><a href="/chat-<?= $c->id ?>">
                                        <?= $c->title ?>
                                    </a></h4>
                                <p> un message de la part de <?= $c->username ?> </p>
                            </ul>
                        </div>
                        <div class="subforum-stats subforum-column center">
                            <span><a href="" id="topicPost"> 
                                <?php if(isset($chatsReplyList )== 1) { ?>
                                    <?= $replybackCount ?> 
                                <?php } else { ?>
                                    <?php } ?> </a>rép.</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <a href="/topic-<?= $c->id ?>">
                            <b>par</b> </a><a href="/chat-<?= $c->id ?>"><?= $c->username ?>,
                             <?= $c->publicationDate ?></a>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            <?php } ?>
        </div>

        
 
    </section>
</div>