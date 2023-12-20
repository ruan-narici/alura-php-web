<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\{
    Controller,
    ControllerWithHtml
};
use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repository\VideoRepository;

class VideoFormUpdate extends ControllerWithHtml implements Controller{

    use FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository) {
    }

    public function dataProcess() {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $video = null;

        if($id !== false) {
            $video = $this->videoRepository->findById($id);
        } else {
            $this->addErroMessage("ID de vídeo inválido!");
            header("Location: /");
            exit();
        }
        $this->renderTemplate("video-form-update", ["video" => $video]);
    }
}

?>