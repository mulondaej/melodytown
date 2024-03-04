﻿# melodytown

<!DOCTYPE php>
<php lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="un forum de manga, comic, webtoon, ">
        <title>
            MelodyTown        </title>
        <link rel="sicon" href="../../assets/IMG/logoResized.jpg" type="image/jpg">
        <link rel="canonical" href="URL_canonique_de_votre_forum">
        <link rel="stylesheet" href="../../assets/css/mainstyle.css">
        <link rel="stylesheet" href="../../assets/css/modal.css">
        <link rel="stylesheet" href="../../assets/cssforum.html.css">
        <link rel="stylesheet" href="../../assets/css/responsive.css">
        <link rel="stylesheet" href="../../assets/css/scss.scss">
        <link rel="stylesheet" href="../../assets/css/style.mini.css">
        <link rel="stylesheet" href="../../assets/css/style.min.css.map">
        <link rel="preconnect" href="https://www.google.com">
        <link rel="preconnect" href="https://www.gstatic.com" crossorigin>
        <script async src="https://www.google.com/recaptcha/api.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.tiny.cloud/1/r46x7x3vh3lxxmkcnj8zb3ribaidejh4xsiec99z9vj5oudn/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body>
        <header>

                        <div class="siteLogo">
                <img src="assets/IMG/logo2.jpg" alt="site logo" id="logo">
                <a href="/index.html">
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


            
                <div class="navbar">
    
<!-- <nav> -->
    <button class="btn btn-secondary btn-sm"><i class="fa-solid fa-house"></i><a href="/accueil"> Accueil</a></button>
    
    <div class="btn-group dropdown-center">
        <button class="btn btn-secondary btn-sm" type="button">
            <i class="fa-brands fa-discourse" id="discuss"></i>
            <a href="forum.html">                    Forums
                </a></button>
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
    </div>
                <button class="btn btn-secondary btn-sm" id="connect"><i class="fa-solid fa-right-to-bracket ">
                        <a href="login.html"> Connexion</a></i></button>
                <button class="btn btn-secondary btn-sm" id="connect"><i class="fa-solid fa-right-to-bracket ">
                        <a href="register.html"> S'inscrire</a></i></button>
                    </header>

        <body><div id="main">
    <section class="forum" id="forum">
        <!-- topic creation form -->
        <div class="forumcontainer">
                        <div class="subforum central" id="central">
                <div class="subforum-title">
                    <h1 id="central">Central</h1>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="rules.php">Règles</a></h4>
                        <p>Les règles de forum à respecter </p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="rules.php" id="liste-topics-par-categories"> 1 </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post:</a></b> <a href="rules.php">
                                                                                        <a href="/topic-161">
                                                                User: 04/03/2024                            </a>
                                            </div>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <!-- topic list -->
                        <ul class="topic-list">
                            <!-- topic items go here -->
                        </ul>
                                                    <h4><a href="/liste-topics-par-categories?">News</a></h4>
                                                <p>Prenez des nouvelles du site ou forum</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="liste-topics-par-categories">
                                1                            </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post: </a></b>
                                                    <a href="/topic-161">
                                                                                                                    <a href="/topic-161">
                                                                User: 04/03/2024                            </a>
                                            </div>
                </div>
                
            <div class="subforum manga" id="manga">
                <div class="subforum-title">
                    <h1 id="forums">Forums</h1>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="forum.html">Manga</a></h4>
                        <div>
                            <h5><a href="forum.html">One Piece</a></h5>
                            <h5><a href="forum.html">Naruto</a></h5>
                            <h5><a href="forum.html">Bleach</a></h5>
                            <h5><a href="forum.html">more</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="liste-topics-par-categories">
                                1                            </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post: </a></b>
                                                    <a href="/topic-161">
                                                                                                                    <a href="/topic-161">
                                                                User: 04/03/2024                            </a>
                                            </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/liste-topics-par-categories">Comics</a></h4>
                        <div>
                            <h5><a href="/liste-topics-par-categories">Marvel</a></h5>
                            <h5><a href="/liste-topics-par-categories">D.C</a></h5>
                            <h5><a href="/liste-topics-par-categories">Others</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="liste-topics-par-categories">
                                1                            </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post: </a></b>
                                                    <a href="/topic-161">
                                                                                                                    <a href="/topic-161">
                                                                User: 04/03/2024                            </a>
                                            </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/liste-topics-par-categories">Webtoon</a></h4>
                        <div>
                            <h5><a href="/liste-topics-par-categories">Solo-Leveling</a></h5>
                            <h5><a href="/liste-topics-par-categories">ToG</a></h5>
                            <h5><a href="/liste-topics-par-categories">GoH</a></h5>
                            <h5><a href="/liste-topics-par-categories">more</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="liste-topics-par-categories">
                                1                            </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post: </a></b>
                                                    <a href="/topic-161">
                                                                                                                    <a href="/topic-161">
                                                                User: 04/03/2024                            </a>
                                            </div>
                </div>

                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/liste-topics-par-categories">Afrostories</a></h4>
                        <div>
                            <h5><a href="/liste-topics-par-categories">Sat. A.M</a></h5>
                            <h5><a href="/liste-topics-par-categories">Kibongatsho</a></h5>
                            <h5><a href="/liste-topics-par-categories">more</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="liste-topics-par-categories">
                                1                            </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post: </a></b>
                                                    <a href="/topic-161">
                                                                                                                    <a href="/topic-161">
                                                                User: 04/03/2024                            </a>
                                            </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/liste-topics-par-categories">B.D</a></h4>
                        <div>
                            <h5><a href="/liste-topics-par-categories">Asterix</a></h5>
                            <h5><a href="/liste-topics-par-categories">Titeuf</a></h5>
                            <h5><a href="/liste-topics-par-categories">Tintin</a></h5>
                            <h5><a href="/liste-topics-par-categories">more</a></h5>
                        </div>
                    </div>
                    <div class="subforum-stats subforum-column ">
                        <span><a href="" id="liste-topics-par-categories">
                                1                            </a> posts</span>
                    </div>
                    <div class="subforum-info subforum-column">
                        <b><a href="">Last post: </a></b>
                                                    <a href="/topic-161">
                                                                                                                    <a href="/topic-161">
                                                                User: 04/03/2024                            </a>
                                            </div>
                </div>

                <div class="subforum comics" id="comics">
                    <div class="subforum-title">
                        <h1 id="multiverse">Arène</h1>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="forum.html">Multiverse</a></h4>
                            <div>
                                <h5><a href="/liste-topics-par-categories">Versus</a></h5>
                                <h5><a href="/liste-topics-par-categories">Théories</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="liste-topics-par-categories">
                                    1                                </a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post: </a></b>
                                                            <a href="/topic-161">
                                                                                                                                    <a href="/topic-161">
                                                                        User: 04/03/2024                                </a>
                                                    </div>
                    </div>
                    <div class="subforum-row">
                        <div class="subforum-icon subforum-column ">
                            <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                        </div>
                        <div class="subforum-description subforum-column">
                            <h4><a href="/liste-topics-par-categories">TAKE OR LOSE</a></h4>
                            <div>
                                <h5><a href="/liste-topics-par-categories">à venir...</a></h5>
                            </div>
                        </div>
                        <div class="subforum-stats subforum-column ">
                            <span><a href="" id="liste-topics-par-categories">
                                    1                                </a> posts</span>
                        </div>
                        <div class="subforum-info subforum-column">
                            <b><a href="">Last post: </a></b>
                                                            <a href="/topic-161">
                                                                                                                                    <a href="/topic-161">
                                                                        User: 04/03/2024                                </a>
                                                    </div>
                    </div>
                    <hr class="subforum-devider">

                                        <div class="subforum discover" id="explore">
                        <div class="subforum-title">
                            <h1 id="decouvrir">Découvrir</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-topics-par-categories">Novels</a></h4>
                                <p>Soyons respecteux dans la discussion</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="liste-topics-par-categories">
                                        1                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b>
                                                                    <a href="/topic-161">
                                                                                                                                                    <a href="/topic-161">
                                                                                User: 04/03/2024                                    </a>
                                                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-topics-par-categories">Anime</a></h4>
                                <p>Soyons respecteux dans la discussion</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="liste-topics-par-categories">
                                        1                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b>
                                                                    <a href="/topic-161">
                                                                                                                                                    <a href="/topic-161">
                                                                                User: 04/03/2024                                    </a>
                                                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-topics-par-categories">Cartoons</a></h4>
                                <p>Soyons respecteux dans la discussion</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="liste-topics-par-categories">
                                        1                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b>
                                                                    <a href="/topic-161">
                                                                                                                                                    <a href="/topic-161">
                                                                                User: 04/03/2024                                    </a>
                                                            </div>
                        </div>
                    </div>

                    <div class="subforum gather" id="gather">
                        <div class="subforum-title">
                            <h1 id="controverse">Controverse</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-topics-par-categories">Politique</a></h4>
                                <p>Soyons respecteux dans la discussion</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="liste-topics-par-categories">
                                        1                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b>
                                                                    <a href="/topic-161">
                                                                                                                                                    <a href="/topic-161">
                                                                                User: 04/03/2024                                    </a>
                                                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-topics-par-categories">Social</a></h4>
                                <p>Soyons respecteux dans la discussion</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="liste-topics-par-categories">
                                        1                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b>
                                                                    <a href="/topic-161">
                                                                                                                                                    <a href="/topic-161">
                                                                                User: 04/03/2024                                    </a>
                                                            </div>
                        </div>
                    </div>

                    <div class="subforum" id="underground">
                        <div class="subforum-title">
                            <h1 id="baze">Baze</h1>
                        </div>
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-topics-par-categories">Main lounge</a></h4>
                                <p>Raccueillement de tous</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="liste-topics-par-categories">
                                        1                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b>
                                                                    <a href="/topic-161">
                                                                                                                                                    <a href="/topic-161">
                                                                                User: 04/03/2024                                    </a>
                                                            </div>
                        </div>
                        <hr class="subforum-devider">
                        <div class="subforum-row">
                            <div class="subforum-icon subforum-column ">
                                <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                            </div>
                            <div class="subforum-description subforum-column">
                                <h4><a href="/liste-topics-par-categories">Clubs</a></h4>
                                <p>Créez ou réjoignez un club de ton personnage preféré</p>
                            </div>
                            <div class="subforum-stats subforum-column ">
                                <span><a href="" id="liste-topics-par-categories">
                                        1                                    </a> posts</span>
                            </div>
                            <div class="subforum-info subforum-column">
                                <b><a href="">Last post: </a></b>
                                                                    <a href="/topic-161">
                                                                                                                                                    <a href="/topic-161">
                                                                                User: 04/03/2024                                    </a>
                                                            </div>
                        </div>
                                            </div>
                </div>
            </div>
    </section>

    <!--Aside bar-->
    <aside class="right-sidebar">
                <div class="updates">
            <h2>Les Publications</h2>
            <ul>
                
            </ul>
        </div>
        <div class="updates">
            <h2>Le Stats du Forum</h2>
            <ul>
                <li><b>Nombre de Publication: </b><span id="posts-posted"><a href="#">
                            1                        </a></span></li>
                <li><b>Guests : </b><span id="guests-online">0</span></li>
                                                    <li><b>Members actif : </b><a href="#"></a><span id="members-online">
                        1                    </span></li>
            </ul>
        </div>
    </aside>
</div>
</div>
<!-- le footer avec liens pour contact, aide et termes -->
<footer class="footer">
    <div class="footer-links">
        <a href="/contact">Nous contacter</a>
        <a href="/termes">Termes et conditions</a>
        <a href="/credits">Mentions légales</a>
    </div>
    <p>EJMT &copy; Melodytown</p>
</footer>


<!-- appel de script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/6b6dfd0b83.js" crossorigin="anonymous"></script>

</body>
</html> 
<script src="../../assets/javaSc/topic.js"></script>
