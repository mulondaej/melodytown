<?php

// les models de site et les utils
require_once '../../models/usersModel.php';
require_once '../../models/forumModel.php';
require_once '../../models/statusModel.php';
require_once '../../models/topicsRepliesModel.php';
require_once '../../models/commentsModel.php';
require_once '../../models/messagesModel.php';
require_once '../../models/messageNotifModel.php';
require_once '../../models/textbackModel.php';
require_once '../../models/topicsModel.php';
require_once '../../models/categoriesModel.php';
require_once '../../models/subCategoriesModel.php';
require_once '../../models/tagsModel.php';
require_once '../../models/sectionsModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';

session_start();

// établissement des variables pour accéder aux données des modèles 
$user = new Users;

if (!empty($_SESSION['user'])) {
    $user->fetchUserData($_SESSION['user']['id']);
    $userAccount = $user->getById();
}



$forums = new Forums;

$categories = new Categories;
$categoriesList = $categories->getList();

$subCategories = new Subcategories;
$subCategoriesList = $subCategories->getList();

$sections = new Sections;
$sectionsList = $sections->getSection();

$tags = new Tags;
$tagsList = $tags->getList();

$topic = new Topics;

$messaging = new Messages();
$messagingsList = $messaging->getList();

// Fetch notifications
$notification = new messageNotif();

// si la requete est de type POST (envoi du formulaire), on l'execute
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['threadPost'])) {
    // on récupère les données du formulaire
    if (!empty($_POST['title'])) { // si le titre n'est pas vide
        if (preg_match($regex['title'], $_POST['title'])) { // si le titre n'est pas vide
            $topic->title = clean($_POST['title']); // on récupère le titre en le nettoyant
        } else {
            $errors['title'] = TOPICS_TITLE_ERROR; // sinon, afficher le message d'erreur 
        }
    }

    // même logique de titre pour le contenu mais avec une regex plus large
    if (!empty($_POST['content'])) {
        if (!preg_match($regex['content'], $_POST['content'])) {
            $topic->content = trim($_POST['content']);
        }
    } else {
        $errors['content'] = TOPICS_CONTENT_ERROR;
    }

     // même logique pour les sections
    //  if (!empty($_POST['sections'])) {
    //     $sections->id = $_POST['sections'];
    //     if ($sections->checkIfExistsById() == 1) {
    //         $topic->id_sections = clean($_POST['sections']);
    //     } else {
    //         $errors['sections'] = TOPICS_SECTION_ERROR_INVALID;
    //     }
    // } else {
    //     $errors['sections'] = TOPICS_SECTION_ERROR_EMPTY;
    // }

    // même logique pour les catégories 
    if (!empty($_POST['categories'])) {
        $categories->id = $_POST['categories'];
        if ($categories->checkIfExistsById() == 1) {
            $topic->id_categories = clean($_POST['categories']);
            if (in_array($categories->id, [1, 3, 4, 8, 13])) {
                $topic->id_sections = 6; // Set section id to 1 for specified categories
            } elseif (in_array($categories->id, [14, 15, 17])) {
                $topic->id_sections = 1;
            } elseif (in_array($categories->id, [9, 18])) {
                $topic->id_sections = 2;
            } elseif (in_array($categories->id, [2, 5, 16])) {
                $topic->id_sections = 3;
            } elseif (in_array($categories->id, [10, 11])) {
                $topic->id_sections = 4;
            } else {
                $topic->id_sections = 5;
            }
        } else {
            $errors['categories'] = TOPICS_CATEGORIES_ERROR_INVALID;
        }
    } else {
        $errors['categories'] = TOPICS_CATEGORIES_ERROR_EMPTY;
    }


    // // même logique pour les catégories 
    // if (!empty($_POST['subcategories'])) {
    //     $subCategories->id = $_POST['subcategories'];
    //     if ($subCategories->checkIfExistsById() == 1) {
    //         $topic->id_subcategories = clean($_POST['subcategories']);
    //     } else {
    //         $errors['subcategories'] = TOPICS_TAGS_ERROR_INVALID;
    //     }
    // } else {
    //     $errors['subcategories'] = TOPICS_TAGS_ERROR_EMPTY;
    // }

    // même logique pour les tags
    if (!empty($_POST['tag'])) {
        $tags->id = $_POST['tag'];
        if ($tags->checkIfExistsById() == 1) {
            $topic->id_tags = clean($_POST['tag']);
        } else {
            $errors['tag'] = TOPICS_TAGS_ERROR_INVALID;
        }
    } else {
        $errors['tag'] = TOPICS_TAGS_ERROR_EMPTY;
    }

    // si les erreurs sont vides, alors on ajoute le topic
    if (empty($errors)) {
        $topic->id_users = $_SESSION['user']['id'];
        if ($topic->create()) {
            $success = TOPICS_SUCCESS;

            header("Location: /topics-par-categories");
            exit();
        } else {
            $errors['add'] = TOPICS_ERROR;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $searchResults = [];
    if (!empty($_POST['searchQuery'])) {
        $searchQuery = clean($_POST['searchQuery']);
        $searchResults = $topic->searchTopics($searchQuery);
    } else {
        $errors['search'] = 'Search query cannot be empty.';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchUser'])) {
    $searchResults = [];
    if (!empty($_POST['searchQuery'])) {
        $searchQuery = clean($_POST['searchQuery']);
        $searchResults = $topic->searchUsers($searchQuery);
    } else {
        $errors['search'] = 'Search query cannot be empty.';
    }
}

$topicsList = $topic->getList();
$topicCount = count($topicsList);
if ($topicCount > 0) {
    $latestTopic = $topic->getTopic();
}

$replies = new Replies;

$repliesList = $replies->getList();
$postCount = count($repliesList);

if ($postCount > 0) {
    $latestReply = $replies->getReply();
}

$byCategories = $topic->getTopicsByCategories();
$bySubCategories = $topic->getTopicsBySubCategories();
$bySections = $topic->getTopicsBySections();
$byTags = $topic->getTopicsByTags();

//users
$latestUser = $user->getLatestUser();
$userDetails = $user->getList();
$userCount = count($userDetails);

///status
$status = new Status;
$statusList = $status->getList();
$latestStatus = $status->getStatus();
$statusCount = count($statusList);

// texts
$messagingsList = $messaging->getList();
// $latesttexts = $messaging->getMessages($user_id);
$messagingCount = count($messagingsList);

$notifications = json_decode(json_encode($notification->getNotifications()), true);

$userAlerts = json_decode(json_encode($notification->getListByIdUsers()), true) ?? []; // Ensure it's an array

foreach ($userAlerts as $note) {
    echo "<li class='".(isset($note['is_read']) && $note['is_read'] ? 'read' : 'unread')."'>";
    echo "<a href='{$note['link']}'>{$note['message']}</a>";
    echo "<small>{$note['created_at']}</small>";
    echo "</li>";
}

// 
if (!empty($userAlerts)) {
    foreach ($notifications as $note) {
        if (isset($note['is_read']) && !$note['is_read']) {
            $notification->id = $note['id']; // Ensure id is set
            $notification->markAsRead($note['id']);
        }
    }
}

// recupération des notifications
$alertsList = json_decode(json_encode($notification->getList()), true) ?? [];         
$latestAlert = json_decode(json_encode($notification->getUserNotifs()), true) ?? [];  

$alertsCount = is_array($alertsList) ? count($alertsList) : 0;

if (empty($alertsList)) {
    error_log("Warning: alertsList is empty or null.");
}
if (empty($latestAlert)) {
    error_log("Warning: latestAlert is empty or null.");
}

// Process 
if (!empty($latestAlert)) {
    foreach ($latestAlert as $alert) {
        echo "New Alert: " . htmlspecialchars($alert['message']);
    }
} else {
    echo "No new alerts available.";
}

$totalCount = $postCount + $topicCount + $statusCount; // total count de tous les publications : status; topics et replies 

$title = 'MelodyTown'; // Titre de la page

//  Inclusion des fichiers: header, du view et du footer 

require_once('../../views/parts/header.php');
require_once('../../index.php');
require_once('../../views/parts/footer.php');
?>

<script src="../../assets/js/topic.js"></script>