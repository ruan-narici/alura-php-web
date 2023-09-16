<?php

$databasePath = __DIR__ . '/BancoDeDados.sqlite';

$connection = new PDO('sqlite:' . $databasePath);

echo "Conectei" . PHP_EOL;

$sql = "
CREATE TABLE IF NOT EXISTS students (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    birthDate TEXT NOT NULL
)
";

$connection->exec($sql);

?>