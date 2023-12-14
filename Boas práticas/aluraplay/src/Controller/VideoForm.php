<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\{
    Controller,
    ControllerWithHtml
};

class VideoForm extends ControllerWithHtml implements Controller{

    public function dataProcess(): void {
        $this->renderTemplate("video-form");
    }
}

?>