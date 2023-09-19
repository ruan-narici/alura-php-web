<?php

namespace ruannarici\Pdo\Domain\Repository;

use DateTimeImmutable;
use ruannarici\Pdo\Domain\Model\Student;

interface StudentRepository {

    public function findAll(): array;
    public function findBirthAt(DateTimeImmutable $birthDate): array;
    public function save(Student $student): bool;
    public function remove(Student $student): bool;
}

?>