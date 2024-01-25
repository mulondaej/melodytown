<?php

require_once '../models/users/usersModel.php' ;
require_once '../models/forumModel.php' ;
require_once '../models/posts/topicAnswersModel.php' ;
require_once '../models/posts/commentsModel.php' ;
require_once '../models/posts/topicsModel.php';
require_once '../models/posts/categoriesModel.php';
require_once '../models/posts/tagsModel.php';
require_once '../models/posts/sectionsModel.php' ;
require_once '../utils/regex.php';
require_once '../utils/messages.php';
require_once '../utils/functions.php';

session_start();




?>
<?php require_once('..//views/parts/header.php'); ?>
<?php require_once('../index.php'); ?>
<?php require_once('..//views/parts/footer.php'); ?>