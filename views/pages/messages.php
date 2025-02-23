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
                     
                 <label for="user"> To: </label>
                     <select name="receiver_id" id="receiver_id" value="<?= @$_POST['receiver_id'] ?>">
                        <option selected disabled>Envoyez un message à </option>
                        <?php foreach ($usersList as $u) { ?>
                            <option value="<?= $u->id ?>"><?= $messagingsDetails->receiver_id ?></option>
                        <?php } ?>
                    </select>
                    <?php if (isset($errors['receiver_id'])) : ?>
                        <p id=errorsMessage><?= $errors['receiver_id'] ?></p>
                    <?php endif; ?>

                    <label for="title">Title:</label>
                     <input type="text" id="title" name="title" value="<?= @$_POST['title'] ?>">
                     <?php if (isset($errors['title'])) : ?>
                         <p id=errorsMessage><?= $errors['title'] ?></p>
                     <?php endif; ?>
 
                     <label for="message">Message:</label>
                     <textarea id="message" name="message" value="<?= @$_POST['message'] ?>"></textarea >
                     <?php if (isset($errors['message'])) : ?>
                         <p id=errorsMessage><?= $errors['message'] ?></p>
                     <?php endif; ?>
 
                     <div class="send">
                         <input type="submit" name="messageUser" value="Send">
                     </div>
                 </form>
                 </div>
             </div>
                 <hr>
             <?php } ?>
        <?php if (isset($success)) { ?><!-- Si la creation est une reussite, afficher le message de succes -->
            <p id=successMessage><?= $success ?></p>
        <?php } ?>
            <?php if (count($messagingsList) == 0) { ?>
                <p>Pas de message disponible</p>
            <?php } else { ?>
                <?php foreach ($messagingsList as $msg) { ?>
                    <?php if($_SESSION['user']['id'] == $msg->sender_id || ($_SESSION['user']['id'] == $msg->receiver_id && ($_SESSION['user']['id_usersRoles'] == 167 || $_SESSION['user']['id_usersRoles'] == 381))){ ?>
                <div class="subforum central" id="central">
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column center" id="icon">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                        </div>
                        <div class="subforum-description subforum-column" id="subDescript">
                            <ul class="topic-list">
                                <h4><a href="/message-<?= $msg->id ?>">
                                <?= $msg->title ?>
                                    </a></h4>
                                <p> un message de la part de <?= $msg->username ?> </p>
                            </ul>
                        </div>
                        <div class="subforum-stats subforum-column center">
                            <span><a href="" id="topicPost"> 
                                <?php if(isset($messagingReplyList )== 1) { ?>
                                    <?= $textbackCount ?> 
                                <?php } else { ?>
                                    <?php } ?> </a>rép.</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <a href="/message-<?= $msg->id ?>">
                            <b>par</b> </a><a href="/message-<?= $msg->id ?>"><?= $msg->username ?>,
                             <?= $msg->timestamp ?></a>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            <?php } ?>
        </div>
        

        
 
    </section>
</div>