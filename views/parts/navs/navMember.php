<?php if(!empty($_SESSION['user'])) { ?>
<!-- le navbar affiché si l'utilisateur est connecté -->
<div class="navbar">
    <!-- <button class="btn btn-secondary btn-sm"><i class="fa-solid fa-house"></i><a href="/accueil"> Accueil</a></button> -->
    <!-- le button de forums -->
    <div class="btn-group dropdown-center">
        <button class="btn btn-secondary btn-sm" type="button">
            <i class="fa-sharp fa-solid fa-brands fa-discourse" id="discover"></i><a href="/forums">
                Forums</a></button>
        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark text-center">
            <li><a class="dropdown-item" href="#manga">Manga</a></li>
            <li><a class="dropdown-item" href="#comics">Comics</a></li>
            <li><a class="dropdown-item" href="#webtoon">Webtoon</a></li>
        </ul>
    </div>
    <!-- le button de discover (découverte) -->
    <div class="btn-group dropdown-center">
        <button class="btn btn-secondary btn-sm" type="button">
            <i class="fa-sharp fa-solid fa-sailboat" id="discover"></i><a href="/decouverte">
                Découvrir</a></button>
        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark text-center">
            <li><a class="dropdown-item" href="#anime">Hottest</a></li>
            <li><a class="dropdown-item" href="#cartoons">Latest show</a></li>
            <li><a class="dropdown-item" href="#series">Series</a></li>
        </ul>
    </div>

    <!-- le button de inbox -->
    <div class="btn-group dropdown-center">
        <button class="btn btn-secondary btn-sm notification" type="button">
            <?php 
            $hasUnreadMessages = false;
            if (isset($messagingsList) && is_array($messagingsList)) {
                foreach ($messagingsList as $message) {
                    if ($_SESSION['user']['id'] == $message->receiver_id) {
                        $hasUnreadMessages = true;
                        break;
                    }
                }
            }
            ?>
            <i class="fa-solid fa-message" id="chats"></i><a href="/messages"> Inbox
                <span class="badge" style="color: <?php echo $hasUnreadMessages ? 'yellow' : 'gray'; ?>">
                    <?php echo $hasUnreadMessages ? '1' : '0'; ?>
                </span></a>
        </button>
        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark text-center" id="chatUl">
            <div id="inboxPt">
                <!-- <li><a class="dropdown-item" href="/messages">New</a></li>
                <li><a class="dropdown-item" href="/messages">Check all</a></li> -->
                <?php 
                if (isset($messagingsList) && is_array($messagingsList)) {  
                ?> 
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
                <?php } else { ?>
                    No Messages
                <?php } ?>
            </div>
            <li>
                <div id="messages">
                    <p class="dropdown-item"><a href="/messages">Afficher tous</a></p>
                </div>
            </li>
        </ul>
    </div>

    <!-- le button des alertes -->
    <div class="btn-group dropdown-center">
        <button class="btn btn-secondary btn-sm notification" type="button">
            <?php 
            $hasUnreadMessages = false;
            if (isset($messagingsList) && is_array($messagingsList)) {
                foreach ($messagingsList as $message) {
                    if ($_SESSION['user']['id'] == $message->receiver_id) {
                        $hasUnreadMessages = true;
                        break;
                    }
                }
            }
            ?>
            <i class="fa-solid fa-bell " id="alertsBtn"></i><a href="/alerts"> Alerts
                <span class="badge" style="color: <?php echo $hasUnreadMessages ? 'yellow' : 'gray'; ?>">
                    <?php echo $hasUnreadMessages ? '1' : '0'; ?>
                </span></a>
        </button>
        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden"></span>
        </button>
        <!-- si l'utilisateur est un admin ou modérateur, ses alertes seront differents -->
        <?php if ($_SESSION['user']['id_userRoles'] == 381 || $_SESSION['user']['id_userRoles'] == 167) {  ?> 
            <ul class="dropdown-menu dropdown-menu-dark text-center">
            <?php 
                if (isset($messagingsList) && is_array($messagingsList)) {  
                ?> 
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
                <?php } else { ?>
                    No Alerts
                <?php } ?>
                <li>
                <div id="messages">
                    <p class="dropdown-item"><a href="/alerts">Afficher tous</a></p>
                </div>
            </li>
        <?php } else { ?>
            <ul class="dropdown-menu dropdown-menu-dark text-center">
                <?php 
                if (isset($messagingsList) && is_array($messagingsList)) {  
                ?> 
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
                <?php } else { ?>
                    No Alerts
                <?php } ?>
                <li>
                <div id="messages">
                    <p class="dropdown-item"><a href="/alerts">Afficher tous</a></p>
                </div>
            </li>
            </ul>
        <?php } ?>
    </div>
</div>
<?php } ?>