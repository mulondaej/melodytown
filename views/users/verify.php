<?php

if (isset($_GET['token'])) {
    
    if ($user->getToken() == 0) {
        
        $user->setVerified(1);
        $user->updateToken();
        if ($user->updateToken()) {
            header('Location: /accueil');
            exit;
        } else {
            echo '<div id="main" style="background-color:white; height:100%"> <p id="successMessage"> Échec de la mise à jour du statut de vérification.</p></div>';
        }
    } else {
        echo '<div id="main" style="background-color:white; height:100%"><p id="successMessage"> Jeton invalide ou expiré.</p></div>';
    }
} else {
    echo '<div id="main" style="background-color:white; height:100%"><p id="successMessage"> votre mail est confirmé.</p></div>';
}


?>


<!-- <div id="verifyModal" class="verifyModal">
    <div class="verifyContent">
        <h3>Verifier votre compte</h3>
        <p>Inserez le code recu sur votre email SVP:</p>
        <input type="text" id="verifyCode" placeholder="Enter verification code">
        <button id="submitCode">Verifier</button>
    </div>
</div> -->


<?

?>

