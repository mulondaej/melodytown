<?php

require_once '../models/users/usersModel.php';
require_once '../models/users/contactModel.php';
require_once '../utils/regex.php';
require_once '../utils/messages.php';
require_once '../utils/functions.php';

session_start();
require_once '../views/parts/header.php';


if(empty($_SESSION['user'])){
    header('Location: /connexion');
    exit;
}

$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();
$userDetails = $user->getList();
$userCount = count($userDetails);

$contact = new Contact;
$userMessage = $contact->getList();

?>

<h1 class="compteH1">Contactez nous :</h1> 
<div class="terms"><hr>
 <div></div>
</div>


<?php 
var_dump($userMessage);



require_once '../views/parts/footer.php';
?>