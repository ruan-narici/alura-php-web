<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class VideoRemove implements Controller{
    public function __construct(private VideoRepository $videoRepository) {
    }

    public function dataProcess() {
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

        if ($id == false) {
            header("Location: /?sucesso=0");
            exit();
        }

        if ($this->videoRepository->remove($id)) {
            header("Location: /?sucesso=1");
        } else {
            header("Location: /?sucesso=0");
        }
    }
}

?>