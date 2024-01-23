<!DOCTYPE php>
<php lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MelodyTown</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/scss.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b6dfd0b83.js" crossorigin="anonymous"></script>    
</head> 

<body>
    <header>
    <!--<ul class="breadcrumb">
    <li><a href="index.php">Accueil</a></li>
    <li>&gt;</li>
    <li class="active">Contact</li>
    </ul>-->
        <?php  //le logo à gauche, le photo profile d'utilisateur à droite  
        ?>
        <div class="siteLogo">
            <img src="assets/IMG/logo2.jpg" alt="site logo" id="logo">
            <a href="/accueil"><h1>MelodyTown</h1></a>
        </div>

        <div id="searching" class="searching">
            <form class="d-flex mt-1 h-25" role="search">
                <input class="form-control me-1 btn-sm h-25" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success btn-sm mt-3 h-75" type="submit" id="sBtn"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <?php // si la personne n'est pas connécté
        if (empty($_SESSION['user'])) { ?>

            <?php require_once 'navbar.php'; ?>

            <button class="btn btn-secondary btn-sm" id="connect"><i class="fa-solid fa-right-to-bracket ">
                    <a href="/connexion"> Connexion</a></i></button>
            <button class="btn btn-secondary btn-sm" id="connect"><i class="fa-solid fa-right-to-bracket ">
                    <a href="/inscription"> S'inscrire</a></i></button>
        <?php } else { ?>

            <?php // si l'utilisateur est connécté alors la navbar change mais aussi si il se dirige vers son profile ?>
            <?php if ($_SERVER['PHP_SELF'] == 'controllers/users/profileController.php') { ?>
                <div class="headerProfile">
                    <h1>VOTRE PROFILE</h1>
                    <div class="navbar">
                        <a href="/forum"><i class="fa-solid fa-person-chalkboard"> FORUMS</i></a>
                        <a href="/inbox"><i class="fa-solid fa-message"> Inbox</i></a>
                        <a href="/alerts"><i class="fa-solid fa-bell"> Alerts</i></a>
                        <a href="/mon-compte"><i class="fa-solid fa-bell"> Account settings</i></a>
                        <button type="button" id="searchBtn"><i class="fa fa-search"></i></button>
                    </div>
        
                </div>
                
            <?php  } else {?>

            <?php require_once 'navMember.php'; ?>

            <div class="btn-group" id="menu-button">
                <button type="button" class="btn btn-sm btn-tertiary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../assets/IMG/logokib.png" alt="User Avatar" id="avatar">
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark dropdown-menu-lg-start">
                    <li><a class="dropdown-item" type="button" href="/mon-compte">Mon compte</a></li>
                    <li><a class="dropdown-item" type="button" href="/posts">Posts</a></li>
                    <li><a class="dropdown-item" type="button" href="../pages/events.php">What's New</a></li>
                    <li><a class="dropdown-item" type="button" href="../pages/donate.php">Donate</a></li>
                </ul>
            </div>

            <?php //Le liens dans le navbar se different par rapport aux roles d'utilisateurs
            ?><div id="logging">
                <?php if ($_SESSION['user']['id_usersRoles'] == 1) { ?>
                    <a href="/profile" id="idCorner">@<?= $_SESSION['user']['username'] ?></a>
                <?php }
                if ($_SESSION['user']['id_usersRoles'] == 142) { ?>
                    <a href="/dashboard">Moderateur</a></li>
                <?php }
                if ($_SESSION['user']['id_usersRoles'] == 258) { ?>
                    <a href="/profile" id="idCorner">@<?= $_SESSION['user']['username'] ?></a>
                    <a href="/dashboard">Admin</a>
                <?php } ?>
                <a href="/deconnexion">Déconnexion</a>
            </div>
            <?php } ?>
        <?php } ?>
    </header>