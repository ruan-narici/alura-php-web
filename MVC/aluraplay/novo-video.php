<?php

$HOST = "localhost";
$DBNAME = "alura_play";
$DBUSER = "root";
$DBPASSWORD = "root";

$url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
if ($url == false) {
    header("Location: /index.php?sucesso=0");
    exit();
}

$title = filter_input(INPUT_POST, "titulo");
if ($title == false) {
    header("Location: /index.php?sucesso=0");
    exit();
}

$conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASSWORD);

$sql = "
    INSERT INTO videos (url, title) 
        VALUES (:url, :title);
";

$stmt = $conn->prepare($sql);

$stmt->bindValue(":url", $url);
$stmt->bindValue(":title", $title);

if ($stmt->execute()) {
    header("Location: /index.php?sucesso=1");
} else {
    header("Location: /index.php?sucesso=0");
}

?>