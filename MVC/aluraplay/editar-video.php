<?php

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

$sql = "
    UPDATE videos 
        SET url = :url, title = :title
    WHERE id = :id
";

$stmt = $conn->prepare($sql);
$stmt->bindValue(":url", $url, PDO::PARAM_STR);
$stmt->bindValue(":title", $titulo, PDO::PARAM_STR);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header("Location: /?sucesso=1");
} else {
    header("Location: /?sucesso=0");
}

?>