<?php

use Alura\Mvc\Controller\LoginController;
use Alura\Mvc\Controller\LoginFormController;
use Alura\Mvc\Controller\VideoForm;
use Alura\Mvc\Controller\VideoFormUpdate;
use Alura\Mvc\Controller\VideoList;
use Alura\Mvc\Controller\VideoNew;
use Alura\Mvc\Controller\VideoRemove;
use Alura\Mvc\Controller\VideoUpdate;

$routes = [
    "GET|/" => VideoList::class,
    "GET|/novo-video" => VideoForm::class,
    "POST|/novo-video" => VideoNew::class,
    "GET|/editar-video" => VideoFormUpdate::class,
    "POST|/editar-video" => VideoUpdate::class,
    "GET|/remover-video" => VideoRemove::class,
    "GET|/login" => LoginFormController::class,
    "POST|/login" => LoginController::class
];

?>