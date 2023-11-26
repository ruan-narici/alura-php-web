<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

class VideoUpdate implements Controller{

    public function __construct(private VideoRepository $videoRepository) {
    }

    public function dataProcess(): void {
        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
        $titulo = filter_input(INPUT_POST, "titulo");

        if ($id == false ||$url == false || $titulo == false) {
            header("Location: /?sucesso=0");
            exit();
        }

        $video = new Video($url, $titulo);
        $video->setId($id);

        if ($this->videoRepository->update($video)) {
            header("Location: /?sucesso=1");
        } else {
            header("Location: /?sucesso=0");
        }
    }
}

?>