<?php
namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\Controller;

class LoginFormController implements Controller {

    public function dataProcess() {
        if ($_SESSION["logado"] == true) {
            header("Location: /");
            return;
        }
        require_once __DIR__ . "/../../views/login-form.php";
    }
}

?>