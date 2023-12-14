<?php

$HOST = "localhost";
$DBNAME = "alura_play";
$USER = "root";
$PASSWORD = "root";

$conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $USER, $PASSWORD);

$sql = "
    CREATE TABLE IF NOT EXISTS videos (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        url VARCHAR(200),
        title VARCHAR(100)
    )
";

$conn->exec($sql);

?>