<div class="navbar">
        <div class="btn-group dropdown-center">
            <button class="btn btn-secondary btn-sm" type="button">
                <i class="fa-brands fa-discourse" id="discuss"></i><a href="/forum"> Discuss</a></button>
            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark text-center">
                <li><a class="dropdown-item" href="#">Manga</a></li>
                <li><a class="dropdown-item" href="#">Comics</a></li>
                <li><a class="dropdown-item" href="#">Webtoon</a></li>
                <li><a class="dropdown-item" href="#">Afrostories</a></li>
            </ul>
        </div>
        <div class="btn-group dropdown-center">
            <button class="btn btn-secondary btn-sm" type="button">
                <i class="fa-sharp fa-solid fa-sailboat" id="discover"></i><a href="/discover">
                    Discover</a></button>
            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark text-center">
                <li><a class="dropdown-item" href="#">Hottest</a></li>
                <li><a class="dropdown-item" href="#">Latest show</a></li>
                <li><a class="dropdown-item" href="#">Series</a></li>
            </ul>
        </div>
        <div class="btn-group dropdown-center">
            <button class="btn btn-secondary btn-sm" type="button">
                <i class="fa-solid fa-hands-bubbles" id="arena"></i><a href="/arena"> Arena</a>
            </button>
            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark text-center">
                <li><a class="dropdown-item" href="#">Vs Manga</a></li>
                <li><a class="dropdown-item" href="#">Vs Comics</a></li>
                <li><a class="dropdown-item" href="#">Vs Multiverse</a></li>
            </ul>
        </div>
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
                        <p class="dropdown-item" href="#">Private</p>
                    </div>
            </ul>
        </div>
        <div class="btn-group dropdown-center">
            <button class="btn btn-secondary btn-sm notification" type="button">
                <i class="fa-solid fa-bell " id="alertsBtn"></i><a href="/alerts"> Alerts
                    <span class="badge">0</span></a>
            </button>
            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark text-center">
                <li><a class="dropdown-item" href="#">...</a></li>
                <li><a class="dropdown-item" href="/alerts">check all</a></li>
            </ul>
        </div>
    </div>
    <!--toggled profile menu-->
    <div id="avy-overlay">
            <ul>
                <a href="/profile">Profile</a>
                <a href="#">Muted</a>
                <a href="#">Preferences</a>
                <a href="#">Settings</a>
                <a href="/deconnexion"><button type="submit">Déconnexion</button></a>
            </ul>
        </div>