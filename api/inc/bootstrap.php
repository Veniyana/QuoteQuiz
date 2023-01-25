<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/../");

// include main configuration file
require_once PROJECT_ROOT_PATH . "/inc/config.php";
// include the base controller file
require_once PROJECT_ROOT_PATH . "/Controller/Api/BaseController.php";
require_once PROJECT_ROOT_PATH . "/Controller/Api/PeopleController.php";
require_once PROJECT_ROOT_PATH . "/Controller/Api/QuizController.php";

// include the use model file
require_once PROJECT_ROOT_PATH . "/Model/Question.php";
require_once PROJECT_ROOT_PATH . "/Model/People.php";