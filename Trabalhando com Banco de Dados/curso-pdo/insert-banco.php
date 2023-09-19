<?php

use ruannarici\Pdo\Domain\Model\Student;
use ruannarici\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = $connection = ConnectionCreator::createConnection();

$student = new Student(
    null,
    'Ruan Narici Mendonca',
    new DateTimeImmutable('1998-07-30')
);

// $sqlInsert = "
// INSERT INTO students
//     (name, birthDate)
// VALUES ('{$student->getName()}','{$student->getBirthDate()->format('Y-m-d')}');
// ";

// Evitando SQL Injection
$sqlInsert = "
INSERT INTO students
    (name, birthDate)
VALUES (:name, :birthDate);
";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->getName());
$statement->bindValue(':birthDate', $student->getBirthDate()->format('Y-m-d'));
$statement->execute();


// var_dump($pdo->exec($sqlInsert));

?>