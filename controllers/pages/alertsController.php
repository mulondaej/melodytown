<?php

require_once '../../models/usersModel.php';
require_once '../../models/topicsModel.php' ;
require_once '../../models/likesModel.php';
require_once '../../models/messageNotifModel.php';
require_once '../../models/commentsModel.php';
require_once '../../models/statusModel.php';
require_once '../../models/topicsRepliesModel.php';
require_once '../../models/messagesModel.php';
require_once '../../models/textbackModel.php';
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
$notification = new messageNotif();
$notifications = json_decode(json_encode($notification->getNotifications()), true);

// Fetch alerts safely
$userAlerts = json_decode(json_encode($notification->getListByIdUsers()), true) ?? []; // Ensure it's an array

foreach ($userAlerts as $note) {
    echo "<li class='".(isset($note['is_read']) && $note['is_read'] ? 'read' : 'unread')."'>";
    echo "<a href='{$note['link']}'>{$note['message']}</a>";
    echo "<small>{$note['created_at']}</small>";
    echo "</li>";
}

// Mark notifications as read
if (!empty($userAlerts)) {
    foreach ($notifications as $note) {
        if (isset($note['is_read']) && !$note['is_read']) {
            $notification->id = $note['id']; // Ensure id is set
            $notification->markAsRead($note['id']);
        }
    }
}

// Fetch alerts safely
$alertsList = json_decode(json_encode($notification->getList()), true) ?? [];         // Fix typo and ensure array
$latestAlert = json_decode(json_encode($notification->getUserNotifs()), true) ?? [];  // Ensure it's an array

$alertsCount = is_array($alertsList) ? count($alertsList) : 0;

if (empty($alertsList)) {
    error_log("Warning: alertsList is empty or null.");
}
if (empty($latestAlert)) {
    error_log("Warning: latestAlert is empty or null.");
}

// Process alerts safely
if (!empty($latestAlert)) {
    foreach ($latestAlert as $alert) {
        echo "New Alert: " . htmlspecialchars($alert['message']);
    }
} else {
    echo "No new alerts available.";
}

?>

<?php 

//  Inclusion des fichiers: header, du view et du footer
require_once '../../views/parts/header.php';
require_once '../../views/pages/alerts.php';
require_once '../../views/parts/footer.php';
?>

<!-- <script src="assets/js/alerts.js"></script> -->
<script src="assets/js/alertsAjax.js"></script>

