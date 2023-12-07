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

        $video = new Video($url, $title);
        if ($_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
            $newImagePath = __DIR__ . "/../../public/img/upload/" . $_FILES["imagem"]["name"];
            move_uploaded_file($_FILES["imagem"]["tmp_name"], $newImagePath);
            $video->setFilePath($_FILES["imagem"]["name"]);
        }

        if ($this->videoRepository->add($video)) {
            header("Location: /?sucesso=1");
        } else {
            header("Location: /?sucesso=0");
        }
    }
}

?>