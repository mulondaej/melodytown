<?php

// if (isset($_GET['token'])) {
//     if ($user->getToken($_GET['token']) ) {
//         if ($user->clickedMail() === true ) {
//             echo '<p id="successMessage">Your account has been successfully verified!</p>';
//             header('Location: /accueil'); 
//             exit;
//         } else {
//             echo '<div id="main" style="background-color:white; height:100%"> <p id="successMessage">Échec de la mise à jour du statut de vérification.</p></div>';
//         }
//     } else {
//         echo '<div id="main" style="background-color:white; height:100%"> <p id="successMessage">votre mail est déjà confirmé.</p></div>';
//     }
// } else {
//     echo '<div id="main" style="background-color:white; height:100%"> <p id="successMessage">Jeton invalide ou expiré.</p></div>';
// }


if(isset($_GET['token'])){
    $success = "Email verified successfully, thank you.";
    $token = $_GET['token'];
    $verified = '';
    $sql = "SELECT `token`, `verified` FROM `a8yk4_users` where `token` = ? AND `verified` = NULL LIMIT 1";
    $req = $this->pdo->prepare($sql);
    $req->bind_param("s", $token);
    $req->execute();
    $result = $req->get_result();
    $exist = $result->num_rows;
    if($exist == 0 ){

        // $row = $result->fetch_array(MYSQLI_ASSOC);
    $sql = "SELECT `token`, `verified` FROM `a8yk4_users` where `token` = ? AND `verified` = ? LIMIT 1";   // Line 16
        $req = $this->pdo->prepare($sql);
        $req->bind_param("ss", $token, $verified);
        $req->execute();
        $result = $req->get_result();
        $exist = $result->num_rows;
        if($exist == 1){
        ?>
            <script>
                alert("Email already verified.");
                window.location = "../../indexController.php";
            </script>;

        <?php exit(); ?>

        <?php }else{ ?>
            <script>
                alert("User not found.");
                window.location = "../../loginController.php";
            </script>;
      <?php  }

    }else{
        $sql = "UPDATE `a8yk4_users` SET `verified`= ? where `token` = ?  LIMIT 1";
        $req = $this->pdo->prepare($sql);
        $req->bind_param("ss", $verified, $token);
        $req->execute();
        $req->close();
        $_SESSION['message'] = $success;
        $_SESSION['token'] = $token;
        header('Location: /verification');
    }
}else{
    header('Location: /accueil');
    die();
}

$this->pdo->close();

?>



<div id="main" style="background-color:white; height:100%">
    <!-- <div id="verifyModal" class="verifyModal">
        <div class="verifyContent">
            <h3>Verifier votre compte</h3>
            <p>Inserez le code recu sur votre email SVP:</p>
            <input type="text" id="verifyCode" placeholder="Enter verification code">
            <button id="submitCode">Verifier</button>
        </div>
    </div> -->

    <h2>Verifier votre compte</h2>
    <form id="verificationForm">
        <input type="hidden" id="verification_token" name="verification_token">
        <label for="verification_code">Enter Verification Code:</label>
        <input type="text" id="verification_code" name="verification_code" required>
        <button type="submit">Verify</button>
    </form>
</div>


<?

?>