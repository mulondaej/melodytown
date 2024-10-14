<?php

require_once '../../models/usersModel.php';
require_once '../../models/topicsModel.php' ;
require_once '../../models/likesModel.php';
require_once '../../models/notifModel.php';
require_once '../../models/commentsModel.php';
require_once '../../models/statusModel.php';
require_once '../../models/topicsRepliesModel.php';
require_once "../../models/inboxModel.php";
require_once "../../models/chatReplyModel.php";
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();

$user = new Users;
$usersList = $user->getList();

if (!empty($_SESSION['user'])) {
    $user->fetchUserData($_SESSION['user']['id']);
    $userAccount = $user->getById();
}

if(empty($_SESSION['user'])) {
    header('Location: /accueil');
    exit();
}

// Fetch notifications
$notification = new Notifications;
$notifications = $notification->getNotifications();


foreach ($notifications as $note) {
    echo "<li class='".($note['is_read'] ? 'read' : 'unread')."'>";
    echo "<a href='{$note['link']}'>{$note['message']}</a>";
    echo "<small>{$note['created_at']}</small>";
    echo "</li>";
}

// Mark notifications as read
if (!empty($notifications)) {
    foreach ($notifications as $note) {
        if (!$note['is_read']) {
            $notification->markAsRead($note['id']);
        }
    }
}

$alertsList - $notification->getList();
$latestAlert = $notification->getNotifByChats();
$alertsCount = count($alertsList);

?>

<?php 

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/pages/alerts.php';
require_once '../../views/parts/footer.php';
?>

<!-- <script src="assets/js/alerts.js"></script> -->
<script src="assets/js/alertsAjax.js"></script>

