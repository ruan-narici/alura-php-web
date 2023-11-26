<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

class VideoNew implements Controller{
    public function __construct(private VideoRepository $videoRepository) {
    }

    public function dataProcess() {
        $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
        if ($url == false) {
            header("Location: /?sucesso=0");
            exit();
        }

        $title = filter_input(INPUT_POST, "titulo");
        if ($title == false) {
            header("Location: /?sucesso=0");
            exit();
        }

        if ($this->videoRepository->add(new Video($url, $title))) {
            header("Location: /?sucesso=1");
        } else {
            header("Location: /?sucesso=0");
        }
    }
}

?>