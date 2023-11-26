<?php
use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

$HOST = "localhost";
$DBNAME = "alura_play";
$DBUSER = "root";
$DBPASS = "root";

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
$titulo = filter_input(INPUT_POST, "titulo");

if ($id == false ||$url == false || $titulo == false) {
    header("Location: /?sucesso=0");
    exit();
}

$conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASS);

$videoRepository = new VideoRepository($conn);

$video = new Video($url, $titulo);
$video->setId($id);


if ($videoRepository->update($video)) {
    header("Location: /?sucesso=1");
} else {
    header("Location: /?sucesso=0");
}

?>