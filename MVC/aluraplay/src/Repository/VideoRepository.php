<?php

namespace Alura\Mvc\Repository;

use Alura\Mvc\Entity\Video;
use PDO;

class VideoRepository {

    public function __construct(private PDO $pdo) {

    }

    public function add(Video $video): bool {
        $sql = "
        INSERT INTO videos (url, title) 
            VALUES (:url, :title);
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":url", $video->url);
        $stmt->bindValue(":title", $video->title);
        $result = $stmt->execute();

        $video->setId($this->pdo->lastInsertId());
        return $result;
    }

    public function remove(int $id): bool {
        $sql = "
            DELETE FROM videos 
                WHERE id = :id
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update(Video $video): bool {
        $sql = "
            UPDATE videos 
                SET url = :url, title = :title
            WHERE id = :id
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":url", $video->url, PDO::PARAM_STR);
        $stmt->bindValue(":title", $video->title, PDO::PARAM_STR);
        $stmt->bindValue(":id", $video->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    
    /**
     * @return Video[]
     */
    public function all(): array {
        $sql = "SELECT * FROM videos";

        $videoList = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return array_map(
            function ($videoData) {
                $video = new Video($videoData["url"], $videoData["title"]);
                $video->setId($videoData["id"]) ;
                return $video;
            }, $videoList);
    }
}


?>