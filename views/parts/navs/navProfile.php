<?php ?>

<!-- le navs de profile -->
<div class="navbarProfil">
    <button class="btn btn-secondary btn-sm" type="button">
        <a href="/accueil"> Accueil</a>
    </button>
    <button class="btn btn-secondary btn-sm" type="button">
        <a href="/messages"> Inbox</a>
    </button>
    <button class="btn btn-secondary btn-sm" type="button">
        <a href="/mon-compte"> Mon compte</a>
    </button>
    <button class="btn btn-secondary btn-sm" type="button">
        <a href="/deconnexion">Déconnexion</a>
    </button>

</div>

<style>
    /* HEADER */
    * {
        scroll-behavior: smooth;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: wheat;
        /*background-image: url('../IMG/melodyTown.jpg');*/
    }

    h1,
    h2,
    h3,
    p,
    button,
    input,
    select,
    textarea {
        margin: 0;
        padding: 0;
        color: black;
    }

    section {
        text-align: center;
    }

    header {
        background-color: #333333d6;
        color: #fff;
        display: block;
        justify-content: center;
        align-items: center;
        padding: 10px 20px;
        width: 100%;
        height: 3rem;
        position: relative;
    }

    header a {
        top: 0;
        display: flex;
        margin-right: 27px;
        color: white;
        text-decoration: none;
        justify-content: space-evenly;
    }

    header h1 {
        text-align: center;
    }

    .siteLogo,
    .siteLogo h1,
    #logo,
    .searchContainer {
        display: none;
    }

    /* NAVBAR */
    .navbar {
        display: flex;
        justify-content: center;
        text-align: center;
        margin: 0 auto;
        margin-top: 0;
        background-color: none;
        top: 0;
        position: relative;
    }

    .navbar a {
        color: rgba(226, 220, 220, 0.76);
        text-decoration: none;
        justify-content: center;
        text-align: center;
        top: 0;
        position: relative;
    }

    @media screen and (max-width: 767px) {
        .navbar {
            display: block;
            justify-content: space-between;
            text-align: center;
            margin: 0 auto;
            margin-top: 0;
        }

        .navbar button {
            margin-right: 0;
        }

        .navbar a {
            font-size: 14px;
            height: max-content;
            margin: -8px;
            margin-top: 0;
        }

        .navbar button i {
            margin-right: 2px;
        }

        .navbarProfil {
            top: 0;
            margin: 0 auto;
            margin-top: 0;
            justify-content: center;
            text-align: center;
        }
    }
</style>