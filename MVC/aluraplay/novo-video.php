<?php

$HOST = "localhost";
$DBNAME = "alura_play";
$DBUSER = "root";
$DBPASSWORD = "root";

$conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASSWORD);

$sql = "
    INSERT INTO videos (url, title) 
        VALUES (:url, :title);
";

$stmt = $conn->prepare($sql);

$stmt->bindValue(":url", $_POST['url']);
$stmt->bindValue(":title", $_POST['titulo']);

var_dump($stmt->execute());

?>