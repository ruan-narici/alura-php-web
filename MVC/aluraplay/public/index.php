<?php

declare(strict_types= 1);

use Alura\Mvc\Controller\VideoList;
use Alura\Mvc\Controller\VideoNew;
use Alura\Mvc\Controller\VideoUpdate;
use Alura\Mvc\Repository\VideoRepository;
use Alura\Mvc\Controller\VideoRemove;

require_once __DIR__ . "/../vendor/autoload.php";

$HOST = "localhost";
$DBNAME = "alura_play";
$DBUSER = "root";
$DBPASS = "root";
$conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASS);

$videoRepository = new VideoRepository($conn);

if (!array_key_exists("PATH_INFO", $_SERVER) || $_SERVER['PATH_INFO'] === "/") {
    $controller = new VideoList($videoRepository);
    $controller->dataProcess();
} else if ($_SERVER['PATH_INFO'] === "/novo-video") {
    $controller = new VideoNew($videoRepository);
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        $controller->form();
    } else if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $controller->dataProcess();
    }
} else if ($_SERVER['PATH_INFO'] === "/editar-video") {
    $controller = new VideoUpdate($videoRepository);
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        $controller->form();
    } else if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $controller->dataProcess();
    }
} else if ($_SERVER['PATH_INFO'] === "/remover-video") {
    $controller = new VideoRemove($videoRepository);
    $controller->dataProcess();
} else {
    http_response_code(404);
}

?>