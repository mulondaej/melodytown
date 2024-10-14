<?php

require_once '../../models/usersModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();

$errors = [];
$user = new Users();

$user->__construct();

// if (isset($_GET['token'])) {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the verification code from the POST request
    $verificationCode = $_POST['token'];
    $user->setToken($_GET['token']);

    $req = $this->pdo->prepare("SELECT * FROM a8yk4_users WHERE token=? LIMIT 1");
    $req->bind_param("s", $user->getToken());
    $req->execute();
    $result = $req->get_result();
    if ($result->num_rows > 0) {
        $user->getById($result->fetch_assoc());
        $req->close();
        $req = $this->pdo->prepare("UPDATE a8yk4_users SET verified=1, token=NULL WHERE id=?");
        $req->bind_param("i", $user['id']);

        if ($req->execute() === TRUE) {
            echo "Email verification successful!";
        } else {
            echo "Error: " . $this->pdo->error;
        }
        $req->close();
    } else {
        echo "Invalid token!";
    }
}

// $this->pdo->close();
$title = "verification";

require_once '../../views/parts/header.php';
require_once '../../views/users/verify.php';
require_once '../../views/parts/footer.php';
?>
<script src="assets/js/verify.js"></script>