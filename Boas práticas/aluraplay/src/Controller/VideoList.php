<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;
use Alura\Mvc\Controller\ControllerWithHtml;

class VideoList extends ControllerWithHtml implements Controller{

    public function __construct(private VideoRepository $videoRepository) {
    }

    public function dataProcess(): void {
        $videoList = $this->videoRepository->all();
        $this->renderTemplate("video-list", ["videoList" => $videoList]);
    }
}

?>