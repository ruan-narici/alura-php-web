<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repository\VideoRepository;

class VideoRemove implements Controller{

    use FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository) {
    }

    public function dataProcess() {
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

        if ($id == false) {
            $this->addErroMessage("Nenhum ID foi informado.");
            header("Location: /");
            exit();
        }

        if ($this->videoRepository->remove($id)) {
            header("Location: /?sucesso=1");
        } else {
            $this->addErroMessage("Erro ao excluir vídeo.");
            header("Location: /");
        }
    }
}

?>