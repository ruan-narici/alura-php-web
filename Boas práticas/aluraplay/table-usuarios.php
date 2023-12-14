<?php


$HOST = "localhost";
$DBNAME = "alura_play";
$USER = "root";
$PASSWORD = "root";

$conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $USER, $PASSWORD);

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(200) NOT NULL,
    password VARCHAR(200) NOT NULL
)";

$conn->exec($sql);

?>