<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class VideoList implements Controller{

    public function __construct(private VideoRepository $videoRepository) {
    }

    public function dataProcess(): void {
        session_start();
        if (array_key_exists("logado", $_SESSION)) {
            $videoList = $this->videoRepository->all();
            require_once __DIR__ . "/../../views/video-list.php";
        } else {
            header("Location: /login");
        }
    }
}

?>