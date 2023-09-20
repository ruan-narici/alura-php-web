<?php
use ruannarici\Pdo\Domain\Model\Student;
use ruannarici\Pdo\Infrastructure\Persistence\ConnectionCreator;
use ruannarici\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();

// Iniciando a transacao
$connection->beginTransaction();

$pdo = new PdoStudentRepository($connection);

$estudante1 = new Student(
    null,
    'Ruan Narici Mendonça',
    new DateTimeImmutable('1998-07-30')
);

$estudante2 = new Student(
    null,
    'Cinthia Oliveira Silva',
    new DateTimeImmutable('1998-07-16')
);

$pdo->save($estudante1);
// $pdo->save($estudante2);

$connection->commit();

?>