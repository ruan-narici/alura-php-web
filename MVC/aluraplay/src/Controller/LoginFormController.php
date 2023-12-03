<?php
namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\Controller;

class LoginFormController implements Controller {

    public function dataProcess() {
        if (array_key_exists("logado", $_SESSION)) {
            header("Location: /");
            return;
        }
        require_once __DIR__ . "/../../views/login-form.php";
    }
}

?>