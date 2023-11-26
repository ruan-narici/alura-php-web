<?php

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

$HOST = "localhost";
$DBNAME = "alura_play";
$DBUSER = "root";
$DBPASSWORD = "root";

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

$conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASSWORD);
$videoRepository = new VideoRepository($conn);

if ($videoRepository->add(new Video($url, $title))) {
    header("Location: /?sucesso=1");
} else {
    header("Location: /?sucesso=0");
}

?>