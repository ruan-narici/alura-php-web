<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

class VideoListJsonController implements Controller {

    public function __construct(private VideoRepository $videoRepository) {

    }
    public function dataProcess() {

        $listVideo = array_map(function (Video $video): array {
            return [
                "id" => $video->id,
                "url" => $video->url,
                "title" => $video->title,
                "image" => "/img/upload/" . $video->getFilePath()
            ];
        }, $this->videoRepository->all());
        echo json_encode($listVideo);
    }
}

?>