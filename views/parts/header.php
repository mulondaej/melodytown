<!DOCTYPE php>
<php lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="icon" href="assets/IMG/logo2.jpg" type="image/x-icon">
        <link rel="stylesheet" href="../../assets/css/mainstyle.css">
        <link rel="stylesheet" href="../../assets/css/forum.css">
        <link rel="stylesheet" href="../../assets/css/responsive.css">
        <link rel="stylesheet" href="../../assets/css/scss.scss">
        <link rel="stylesheet" href="../../assets/css/style.mini.css">
        <link rel="stylesheet" href="../../assets/css/style.min.css.map">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/6b6dfd0b83.js" crossorigin="anonymous"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        
    </head>

    <body>
        <header>
            <?php  //le logo à gauche, le photo profile d'utilisateur à droite  
            ?>
            <div class="siteLogo">
                <img src="assets/IMG/logo2.jpg" alt="site logo" id="logo">
                <a href="/accueil">
                    <h1>MelodyTown</h1>
                </a>
            </div>

            <!-- affiche de la barre de recherche -->
            <div class="searchContainer"> 
                <input type="text" id="searchInput" placeholder="..Search...">
                <button onclick="search()">
                <i class="fa-solid fa-magnifying-glass fa-sm"></i></button>
            </div>
            <div id="searchResults"></div>
  

            <?php // si la personne n'est pas connécté
            if (empty($_SESSION['user'])) { ?>

                <?php require_once 'navs/navbar.php'; ?>

                <button class="btn btn-secondary btn-sm" id="connect"><i class="fa-solid fa-right-to-bracket ">
                        <a href="/connexion"> Connexion</a></i></button>
                <button class="btn btn-secondary btn-sm" id="connect"><i class="fa-solid fa-right-to-bracket ">
                        <a href="/inscription"> S'inscrire</a></i></button>
            <?php } else { ?>

                <?php // si l'utilisateur est connécté alors la navbar change mais aussi si il se dirige vers son profile 
                ?>
                <?php if ($_SERVER['PHP_SELF'] == '/controllers/users/profileController.php') { ?>
                    <?php require_once 'navs/navProfile.php'; ?>
                    
                <?php  } else { ?>

                    <?php require_once 'navs/navMember.php'; ?>
                    <!-- l'avatar dans un menu bouton pour afficher ces liens -->
                    <div class="btn-group" id="menu-button"> 
                        <button type="button" class="btn btn-sm btn-tertiary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../assets/IMG/" alt="UserAvatar" id="avatar">
                        </button>
                        <ul class="dropdown-menu text-center dropdown-menu-end dropdown-menu-dark dropdown-menu-lg-start">
                            <li><a class="dropdown-item" type="button" href="/mon-compte">Mon compte</a></li>
                            <li><a class="dropdown-item" type="button" href="/posts">Posts</a></li>
                            <li><a class="dropdown-item" type="button" href="/events">What's New</a></li>
                        </ul>
                    </div>

                    <?php //Le liens dans le navbar se different par rapport aux roles d'utilisateurs
                    ?><div id="logging">
                        <?php if ($_SESSION['user']['id_usersRoles'] == 1) { ?>
                            <a href="/profile" id="idCorner">@<?= $_SESSION['user']['username'] ?></a>
                        <?php }
                        if ($_SESSION['user']['id_usersRoles'] == 142) { ?>
                            <a href="/profile" id="idCorner">@<?= $_SESSION['user']['username'] ?></a>
                            <a href="/dashboard" style="color: rgb(130, 182, 195);">Moderation</a></li>
                        <?php }
                        if ($_SESSION['user']['id_usersRoles'] == 258) { ?>
                            <a href="/profile" id="idCorner">@<?= $_SESSION['user']['username'] ?></a>
                            <a href="/dashboard" style="color: darkgreen;">Admin</a>
                        <?php } ?>
                        <a href="/deconnexion">Déconnexion</a>
                    </div>
                <?php } ?>
            <?php } ?>
        </header>