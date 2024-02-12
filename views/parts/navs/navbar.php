<div class="navbar">
    
<!-- <nav> -->
    <button class="btn btn-secondary btn-sm"><i class="fa-solid fa-house"></i><a href="/accueil"> Accueil</a></button>
    
    <div class="btn-group dropdown-center">
        <button class="btn btn-secondary btn-sm" type="button">
            <i class="fa-brands fa-discourse" id="discuss"></i>
            <a href="/forum"><?php if (!empty($_SESSION['user'])) { ?>
                Discuss 
                <?php } else { ?>
                    Forums
                <?php } ?></a></button>
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

    <!-- si l'utilisateur en ligne est sur la page de forum, alors ses navs changent -->
    <?php if (!empty($_SESSION['user'])) { ?>          
    <?php if ($_SERVER['PHP_SELF'] == '/controllers/posts/forumController.php') { ?> 
          
    <div class="btn-group dropdown-center">
        <button class="btn btn-secondary btn-sm" type="button">
            <i class="fa-solid fa-hands-bubbles" id="arena"></i><a href="/forum"> Arène</a>
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
    <?php } ?>
    <?php } ?>
</div>