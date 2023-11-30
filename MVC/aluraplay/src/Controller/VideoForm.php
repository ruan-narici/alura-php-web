<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\Controller;

class VideoForm implements Controller{

    public function dataProcess(): void {
        require_once __DIR__ . "/../../views/video-form.php";
    }
}

?>