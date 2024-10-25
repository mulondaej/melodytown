<?php

require_once '../../models/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();

$errors = [];
$user = new Users();

$user->__construct();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verification_token']) && isset($_POST['verification_code'])) {
    $verificationToken = $_POST['verification_token'];
    $verificationCode = $_POST['verification_code'];

    // Perform the account verification
    $response = $user->verifyAccount($this->pdo, $verificationToken, $verificationCode);

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}

// $this->pdo->close();
$title = "verification";

require_once '../../views/parts/header.php';
require_once '../../views/users/verify.php';
require_once '../../views/parts/footer.php';
?>
<script src="assets/js/verify.js"></script>