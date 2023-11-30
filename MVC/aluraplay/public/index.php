<?php

declare(strict_types= 1);

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

$routeClass = $routes[$requestMethod . "|" . $pathInfo];

$controller = new $routeClass($videoRepository);

$controller->dataProcess();

?>