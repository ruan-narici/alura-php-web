<?php

use ruannarici\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();

echo "Conectei" . PHP_EOL;

// $sqlAddPhoneTemp = "INSERT INTO phones (area_code, number, student_id) VALUES ('77','99999-9999',1)";
// $connection->exec($sqlAddPhoneTemp);
// exit();

$createTableSql = "
CREATE TABLE IF NOT EXISTS students (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name TEXT NOT NULL,
    birthDate TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS phones (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    area_code TEXT,
    number TEXT,
    student_id INTEGER,
    FOREIGN KEY (student_id) REFERENCES students(id)
)
";

$connection->exec($createTableSql);

?>