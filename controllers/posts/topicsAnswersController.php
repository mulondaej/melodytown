<<<<<<< HEAD
<?php
require_once("../../models/topicAnswersModel.php");
require_once("../../models/commentsModel.php");
require_once("../../models/categoriesModel.php");
require_once("../../models/tagsModel.php");


session_start();

// Check if the user is logged in. You can implement your authentication logic here.
if (!isset($_SESSION['user'])) {
    // Redirect to the login page or display an error message.
    header("Location: /connexion");  
    exit();
}

//$answers = new Answers;
$answersList = $answers->getById();

//$comments = new Comments;
$commentsList = $comments->getById();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $answers = new Answers;
    $answers->id_users = $_SESSION['user']['id'];

    if(!empty($_POST['content'])) {
        $answers->content = $_POST['content'];
        $wordCount = str_word_count($answers->content);
    } else {
        if ($wordcunt < 5  ) {
             $errors['content'] = TOPICS_CONTENT_ERROR_INVALID;
            } else if ($wordcunt < 1) {
                $errors['content'] = TOPICS_CONTENT_ERROR;
            }
         else {
            $errors['content'] = TOPICS_CONTENT_SUCCESS;
        }
    } 

    if (empty($errors)) {
        $answers->create();
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comments = new Comments;
    $comments->id_users = $_SESSION['user']['id'];

    if(!empty($_POST['content'])) {
        $comments->content = $_POST['content'];
        $wordCount = str_word_count($comments->content);
    } else {
        if ($wordcunt < 5  ) {
             $errors['content'] = TOPICS_CONTENT_ERROR_INVALID;
            } else if ($wordcunt < 1) {
                $errors['content'] = TOPICS_CONTENT_ERROR;
            }
         else {
            $errors['content'] = TOPICS_CONTENT_SUCCESS;
        }
    } 

    if (empty($errors)) {
        $comments->create();
    }

}

require_once '../../views/parts/header.php';

if ('Location: /topics') {
    require_once '../../views/posts/topics.php';
} else if ('Location: /threads') {
    require_once '../../views/posts/threadsList.php';
}

require_once '../../views/parts/footer.php';
=======
<?php
require_once("../../models/topicAnswersModel.php");
require_once("../../models/commentsModel.php");
require_once("../../models/categoriesModel.php");
require_once("../../models/tagsModel.php");


session_start();

// Check if the user is logged in. You can implement your authentication logic here.
if (!isset($_SESSION['user'])) {
    // Redirect to the login page or display an error message.
    header("Location: /connexion");  
    exit();
}

//$answers = new Answers;
$answersList = $answers->getById();

//$comments = new Comments;
$commentsList = $comments->getById();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $answers = new Answers;
    $answers->id_users = $_SESSION['user']['id'];

    if(!empty($_POST['content'])) {
        $answers->content = $_POST['content'];
        $wordCount = str_word_count($answers->content);
    } else {
        if ($wordcunt < 5  ) {
             $errors['content'] = TOPICS_CONTENT_ERROR_INVALID;
            } else if ($wordcunt < 1) {
                $errors['content'] = TOPICS_CONTENT_ERROR;
            }
         else {
            $errors['content'] = TOPICS_CONTENT_SUCCESS;
        }
    } 

    if (empty($errors)) {
        $answers->create();
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comments = new Comments;
    $comments->id_users = $_SESSION['user']['id'];

    if(!empty($_POST['content'])) {
        $comments->content = $_POST['content'];
        $wordCount = str_word_count($comments->content);
    } else {
        if ($wordcunt < 5  ) {
             $errors['content'] = TOPICS_CONTENT_ERROR_INVALID;
            } else if ($wordcunt < 1) {
                $errors['content'] = TOPICS_CONTENT_ERROR;
            }
         else {
            $errors['content'] = TOPICS_CONTENT_SUCCESS;
        }
    } 

    if (empty($errors)) {
        $comments->create();
    }

}

require_once '../../views/parts/header.php';

if ('Location: /topics') {
    require_once '../../views/posts/topics.php';
} else if ('Location: /threads') {
    require_once '../../views/posts/threadsList.php';
}

require_once '../../views/parts/footer.php';
>>>>>>> 19db88153d4fb2b0737212ded8e024505fda031c
