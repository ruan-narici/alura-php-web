<?php

use ruannarici\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$student = new Student(
    null,
    'Ruan Narici Mendonca',
    new DateTimeImmutable('1998-07-30')
);

echo $student->age();

?>