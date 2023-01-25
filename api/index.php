<?php
function cors()
{
    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            header("HTTP/1.1 200 OK");
            die();
        }
    } else {
        die();
    }
}

cors();

require __DIR__ . "/inc/bootstrap.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ((isset($uri[1]) && $uri[1] != 'quiz') || !isset($uri[2])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$objFeedController = new QuizController();
$strMethodName = $uri[2];
$objFeedController->{$strMethodName}();
