
<!-- le navbar affiché si l'utilisateur est connecté -->
<div class="navbar">
    <!-- <button class="btn btn-secondary btn-sm"><i class="fa-solid fa-house"></i><a href="/accueil"> Accueil</a></button> -->
    <!-- le button de forums -->
    <div class="btn-group dropdown-center">
        <button class="btn btn-secondary btn-sm" type="button">
            <i class="fa-brands fa-discourse" id="discuss"></i><a href="/forum"> Forums</a></button>
        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark text-center">
            <li><a class="dropdown-item" href="#manga">Manga</a></li>
            <li><a class="dropdown-item" href="#comics">Comics</a></li>
            <li><a class="dropdown-item" href="#webtoon">Webtoon</a></li>
            <li><a class="dropdown-item" href="#afrostories">Afrostories</a></li>
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
            <i class="fa-solid fa-message" id="chats"></i><a href="/inbox"> Inbox
                <span class="badge">0</span></a>
        </button>
        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark text-center" id="chatUl">
            <div id="inboxPt">
                <li><a class="dropdown-item" href="/inbox">New</a></li>
                <li><a class="dropdown-item" href="/inbox">Check all</a></li>
            </div>
            <li>
                <div id="messages">
                    <p class="dropdown-item" href="/inbox">Private</p>
                </div>
        </ul>
    </div>

    <!-- le button des alertes -->
    <div class="btn-group dropdown-center">
        <button class="btn btn-secondary btn-sm notification" type="button">
            <i class="fa-solid fa-bell " id="alertsBtn"></i><a href="/alerts"> Alerts
                <span class="badge">0</span></a>
        </button>
        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden"></span>
        </button>
        <!-- si l'utilisateur est un admin ou modérateur, ses alertes seront differents -->
        <?php if ($_SESSION['user']['id_userRoles'] = 258) {  ?> 
            <ul class="dropdown-menu dropdown-menu-dark text-center">
                <li><a class="dropdown-item" href="#">
                        <i class="fa-solid fa-envelope"></i> 5 nouveaux messages</a></li>
                <li><a class="dropdown-item" href="#">
                        <i class="fa-solid fa-user-large-slash"></i> 14 utilisateurs signalés</a></li>
                <li><a class="dropdown-item" href="#">
                        <i class="fa-solid fa-comment-slash"></i> 3 commentaires signalés</a></li>
                <li><a class="dropdown-item" href="/alerts">check all</a></li>
            </ul>
        <?php } else { ?>
            <ul class="dropdown-menu dropdown-menu-dark text-center">
                <li><a class="dropdown-item" href="#">
                        <i class="fa-solid fa-envelope"></i> 0 nouveaux messages</a></li>
                <li><a class="dropdown-item" href="#">
                        <i class="fa-solid fa-user-large-slash"></i> 0 mentions</a></li>
                <li><a class="dropdown-item" href="#">
                        <i class="fa-solid fa-comment-slash"></i> 0 reponses </a></li>
                <li><a class="dropdown-item" href="/alerts">check all</a></li>
            </ul>
        <?php } ?>
    </div>
</div>
