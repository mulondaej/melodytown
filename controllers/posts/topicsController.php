<?php
require_once "../../models/topicsModel.php" ;
require_once "../../models/topicAnswersModel.php" ;
require_once "../../models/commentsModel.php" ;
require_once "../../models/categoriesModel.php" ;
require_once "../../models/tagsModel.php" ;
require_once "../../models/sectionsModel.php" ;
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


session_start();

// Confirmation que l'utilisateur est bel et bien en ligne
if (!isset($_SESSION['user'])) {
    // Sinon, lui rediriger vers la page d'accueil ou de connexion
    header("Location: /connexion");
    exit();
}

$categories = new Categories;
$categoriesList = $categories->getList();

$tags = new Tags;
$tagsList = $tags->getList();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (!empty($_POST['tag'])) {
        $topic->id_tags = $_POST['tag'];
        if ($tags->checkIfExistsById() == 1) {
            $topic->id_tags = clean($_POST['tag']);
        } else {
            $errors['tag'] = TOPICS_TAGS_ERROR_INVALID;
        }
    } else {
        $errors['tag'] = TOPICS_TAGS_ERROR_EMPTY;
    }

    if (!empty($_POST['categories'])) {
        $categories->id = $_POST['categories'];
        if ($categories->checkIfExistsById() == 1) {
            $categoriesList = clean($_POST['categories']);
        } else {
            $errors['categories'] = TOPICS_CATEGORIES_ERROR_INVALID;
        }
    } else {
        $errors['categories'] = TOPICS_CATEGORIES_ERROR_EMPTY;
    }

    if (!empty($_POST['title'])) {
        if (preg_match($regex['title'], $_POST['title'])) {
            $topic->title = clean($_POST['title']);
        } else {
            $errors['title'] = TOPICS_TITLE_ERROR_INVALID;
        }
    } else {
        $errors['title'] = TOPICS_TITLE_ERROR;
    }

    if (!empty($_POST['content'])) {
        if (!preg_match($regex['content'], $_POST['content'])) {
            $topic->content = trim($_POST['content']);
        } else {
            $errors['content'] = TOPICS_CONTENT_ERROR_INVALID;
        }
    } else {
        $errors['content'] = TOPICS_CONTENT_ERROR;
    }

   

    if(empty($errors)) {
        $topic->id_users = $_SESSION['user']['id'];
        // if(move_uploaded_file($_FILES['image']['tmp_name'], '../../assets/img/topics/' . $topic->image)) {
            if($topic->create()){
                $success = TOPICS_SUCCESS;
            } else {
                // unlink('../../assets/img/topics/' . $topic->image);
                $errors['add'] = TOPICS_ERROR;
            }
        } else {
            $errors['add'] = TOPICS_ERROR;
        }

    }
//}


require_once '../../views/parts/header.php';
require_once '../../views/posts/topics.php';
require_once '../../views/parts/footer.php';

?>
<?php
 // if (!empty($_FILES['image'])) {
    //     $imageMessage = checkImage($_FILES['image']);

    //     if ($imageMessage != '') {
    //         $errors['image'] = $imageMessage;
    //     } else {
    //         $topic->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    //         while(file_exists('../../assets/img/topics/' . $topic->image)) {
    //             $topic->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    //         }
    //     }
    // }