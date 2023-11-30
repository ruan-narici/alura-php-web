<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\Controller;
use Alura\Mvc\Repository\VideoRepository;

class VideoFormUpdate implements Controller{
    public function __construct(private VideoRepository $videoRepository) {
    }

    public function dataProcess() {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $video = null;

        if($id !== false) {
            $video = $this->videoRepository->findById($id);
        } else {
            header("Location: /?sucesso=0");
            exit();
        }
        require_once __DIR__ . "/../../views/video-form-update.php";
    }
}

?>