<?php

declare(strict_types= 1);

use Alura\Mvc\Controller\VideoError404;
use Alura\Mvc\Repository\VideoRepository;

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../config/routes.php";

$HOST = "localhost";
$DBNAME = "alura_play";
$DBUSER = "root";
$DBPASS = "root";
$conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASS);

$videoRepository = new VideoRepository($conn);


$pathInfo = $_SERVER['PATH_INFO'] ?? "/";
$requestMethod = $_SERVER['REQUEST_METHOD'];

$isLogin = $pathInfo === "/login";
session_start();
if (isset($_SESSION['logado'])) {
    $originalInfo = $_SESSION['logado'];
    unset($_SESSION['logado']);
    session_regenerate_id();
    $_SESSION['logado'] = $originalInfo;
}
if (!array_key_exists("logado", $_SESSION) && !$isLogin) {
    header("Location: /login");
}


if (array_key_exists($requestMethod . "|" . $pathInfo, $routes)) {
    $routeClass = $routes[$requestMethod . "|" . $pathInfo];
    
    $controller = new $routeClass($videoRepository);
} else {
    $controller = new VideoError404();
}

$controller->dataProcess();

?>