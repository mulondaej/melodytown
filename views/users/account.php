
<!-- Compte -->
<div class="comptePage">
    <!--  Titre de la page de compte et l'avatar d'utilisateur centré au top-->
    <h1 id="compteH1">Votre compte </h1><hr>
        <img src="../../assets/IMG/<?= $userAccount->avatar ?>" alt="User Avatar" id="avyCompte">
    
    <div class="details"><!-- les details de l'utilisateur -->
        <P><b>Pseudo :</b> <?= $userAccount->username ?></P>
        <P><b>Adresse mail :</b> <?= $userAccount->email ?></P>
        <P><b>Date de Naissance :</b> <?= $userAccount->birthdate ?></P>
        <P><b>Location :</b> <?= $userAccount->location ?></P>
        <P><b>Membre depuis :</b> <?= $userAccount->registerDate ?></P>
        <P><b>Rôle :</b> <?= $userAccount->roleName ?></P>
    </div>
    
    <!-- lien pour modifier son compte -->
    <p><a href="/modifier-mon-compte">Modifier tes infos</a></p>
</div>