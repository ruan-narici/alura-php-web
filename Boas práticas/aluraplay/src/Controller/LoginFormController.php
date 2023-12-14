<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\{
    Controller,
    ControllerWithHtml
};

class LoginFormController extends ControllerWithHtml implements Controller {

    public function dataProcess() {
        if (array_key_exists("logado", $_SESSION)) {
            header("Location: /");
            return;
        }
        $this->renderTemplate("login-form");
    }
}

?>