<?php

declare(strict_types= 1);

if (!array_key_exists("PATH_INFO", $_SERVER) || $_SERVER['PATH_INFO'] === "/") {
    require_once __DIR__ . "/../listar-video.php";
} else if ($_SERVER['PATH_INFO'] === "/novo-video") {
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        require_once __DIR__ . "/../pages/enviar-video.html";
    } else if ($_SERVER['REQUEST_METHOD'] === "POST") {
        require_once __DIR__ . "/../novo-video.php";
    }
} else if ($_SERVER['PATH_INFO'] === "/editar-video") {
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        require_once __DIR__ . "/../formulario.php";
    } else if ($_SERVER['REQUEST_METHOD'] === "POST") {
        require_once __DIR__ . "/../editar-video.php";
    }
} else if ($_SERVER['PATH_INFO'] === "/remover-video") {
    require_once __DIR__ . "/../remover-video.php";
} else {
    http_response_code(404);
}

?>