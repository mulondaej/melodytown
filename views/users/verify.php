<?php

require_once "../../models/usersModel.php";
require_once "../../controllers/users/registerController.php";
require_once "../../utils/regex.php";
require_once "../../utils/messages.php";

require_once "../parts/header.php";

$user = new Users();

if (!isset ($_GET['token']) || empty ($_GET['token'])) {
    // Redirect or display an error message
    echo "Token missing!";
    exit;
}

$token = $_GET['token'];

// Query the database to find the user with the given token
$req = $pdo->prepare("SELECT id_users FROM a8yk4_emailvalidations WHERE token = ?");
$req->execute([$token]);
$id_users = $req->fetchColumn();

if (!$id_users) {
    // Token not found in the database
    echo "Invalid token!";
    exit;
}

// Update the user's verification status in the users table
$req = $pdo->prepare("UPDATE users SET verified = 1 WHERE id = ?");
$req->execute([$id_users]);

// Delete the verification token from the email_verifications table
$req = $pdo->prepare("DELETE FROM a8yk4_emailvalidations WHERE token = ?");
$req->execute([$token]);

// Redirect the user to a success page or display a success message
echo "Your email has been verified successfully!";


$title = "verification";

require_once "../parts/footer.php";
?>