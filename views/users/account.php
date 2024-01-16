

<div class="comptePage">
    <h1 id="compteH1">Votre compte </h1>
        <img src="../assets/IMG/asha-logo.png" alt="User Avatar" id="avyCompte">

    <div class="details">
        <P>Pseudo : <?= $userAccount->username ?></P>
        <P>Adresse mail : <?= $userAccount->email ?></P>
        <P>Date de Naissance : <?= $userAccount->birthdate ?></P>
        <P>Location : <?= $userAccount->location ?></P>
        <P>Membre depuis : <?= $userAccount->registerDate ?></P>
        <P>Rôle : <?= $userAccount->roleName ?></P>
    </div>

    
    <p><a href="/modifier-mon-compte">Modifier tes infos
    </a></p>
</div>