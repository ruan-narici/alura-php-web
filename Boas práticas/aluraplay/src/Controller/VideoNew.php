<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repository\VideoRepository;

class VideoNew implements Controller{

    use FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository) {
    }

    public function dataProcess() {
        $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
        if ($url == false) {
            $this->addErroMessage("URL inválida.");
            header("Location: /");
            exit();
        }

        $title = filter_input(INPUT_POST, "titulo");
        if ($title == false) {
            $this->addErroMessage("Título inválido.");
            header("Location: /");
            exit();
        }

        $video = new Video($url, $title);
        if ($_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
            $safeFileName = pathinfo($_FILES["imagem"]["name"], PATHINFO_BASENAME);
            $newImagePath = __DIR__ . "/../../public/img/upload/" . $safeFileName;
            move_uploaded_file($_FILES["imagem"]["tmp_name"], $newImagePath);
            $video->setFilePath($safeFileName);
        }

        if ($this->videoRepository->add($video)) {
            header("Location: /?sucesso=1");
        } else {
            $this->addErroMessage("Erro ao inserir vídeo.");
            header("Location: /");
        }
    }
}

?>