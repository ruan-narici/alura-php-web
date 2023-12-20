<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repository\VideoRepository;

class VideoUpdate implements Controller{

    use FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository) {
    }

    public function dataProcess(): void {
        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
        $titulo = filter_input(INPUT_POST, "titulo");

        if ($id == false ||$url == false || $titulo == false) {
            $this->addErroMessage("Parametros vazios.");
            header("Location: /");
            exit();
        }
        $video = new Video($url, $titulo);
        if ($_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
            $newImagePath = __DIR__ . "/../../public/img/upload/" . $_FILES["imagem"]["name"];
            move_uploaded_file($_FILES["imagem"]["tmp_name"], $newImagePath);
            $video->setFilePath($_FILES["imagem"]["name"]);
        }
        $video->setId($id);

        if ($this->videoRepository->update($video)) {
            header("Location: /?sucesso=1");
        } else {
            $this->addErroMessage("Erro ao atualizar vídeo.");
            header("Location: /");
        }
    }
}

?>