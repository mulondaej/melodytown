<?php

?>
<div id="main">
<section class="forum" id="forum">
    
    <h1>Notifications</h1><hr>
        <div class="forumcontainer" id="forumcontainer">

<div class="notifications">
    <ul>
    <?php if (count($alertsList) == 0) { ?>
                <p>Pas de notification disponible</p>
            <?php } else { ?>
        <?php foreach ($userAlerts as $note): ?>
            <li class="<?php echo $note['is_read'] ? 'read' : 'unread'; ?>">
                <a href="<?php echo $note['link']; ?>"><?php echo $note['message']; ?></a>
                <small><?php echo $note['created_at']; ?></small>
            </li>
        <?php endforeach; ?>
        <?php }?>
    </ul>
</div>

</div>
</section>
</div>

