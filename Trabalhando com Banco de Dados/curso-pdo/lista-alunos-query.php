<?php

$databasePath = __DIR__ . '/BancoDeDados.sqlite';

$connection = new PDO('sqlite:' . $databasePath);

$sqlSelect = "
SELECT *
    FROM students
";

$result = $connection->query($sqlSelect);
$studentsList = $result->fetchAll();
echo var_dump($studentsList);

?>