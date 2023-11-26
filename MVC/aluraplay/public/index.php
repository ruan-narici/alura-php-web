<?php

declare(strict_types= 1);

use Alura\Mvc\Controller\VideoError404;
use Alura\Mvc\Controller\VideoList;
use Alura\Mvc\Controller\VideoForm;
use Alura\Mvc\Controller\VideoFormUpdate;
use Alura\Mvc\Controller\VideoNew;
use Alura\Mvc\Repository\VideoRepository;
use Alura\Mvc\Controller\VideoRemove;
use Alura\Mvc\Controller\VideoUpdate;

require_once __DIR__ . "/../vendor/autoload.php";

$HOST = "localhost";
$DBNAME = "alura_play";
$DBUSER = "root";
$DBPASS = "root";
$conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASS);

$videoRepository = new VideoRepository($conn);

if (!array_key_exists("PATH_INFO", $_SERVER) || $_SERVER['PATH_INFO'] === "/") {
    $controller = new VideoList($videoRepository);
} else if ($_SERVER['PATH_INFO'] === "/novo-video") {
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        $controller = new VideoForm();
    } else if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $controller = new VideoNew($videoRepository);
    }
} else if ($_SERVER['PATH_INFO'] === "/editar-video") {
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        $controller = new VideoFormUpdate($videoRepository);
    } else if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $controller = new VideoUpdate($videoRepository);
    }
} else if ($_SERVER['PATH_INFO'] === "/remover-video") {
    $controller = new VideoRemove($videoRepository);
} else {
    $controller = new VideoError404();
}

$controller->dataProcess();

?>