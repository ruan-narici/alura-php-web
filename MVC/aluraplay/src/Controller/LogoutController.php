<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\Controller;

class LogoutController implements Controller {
    
    public function dataProcess() {
        session_destroy();
        header("Location: /login");
    }
}

?>