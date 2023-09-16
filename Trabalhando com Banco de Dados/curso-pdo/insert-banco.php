<?php

use ruannarici\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/BancoDeDados.sqlite';

$connection = new PDO('sqlite:' . $databasePath);

$student = new Student(
    null,
    'Ruan Narici Mendonca',
    new DateTimeImmutable('1998-07-30')
);

$sqlInsert = "
INSERT INTO students
    (name, birthDate)
VALUES ('{$student->getName()}','{$student->getBirthDate()->format('Y-m-d')}');
";

var_dump($connection->exec($sqlInsert));

?>