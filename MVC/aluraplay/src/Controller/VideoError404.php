<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\Controller;

class VideoError404 implements Controller{

    public function dataProcess() {
        http_response_code(404);
    }
}

?>