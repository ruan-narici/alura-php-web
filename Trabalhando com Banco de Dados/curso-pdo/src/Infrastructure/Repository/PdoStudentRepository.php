<?php

namespace ruannarici\Pdo\Infrastructure\Repository;

use DateTimeImmutable;
use PDO;
use ruannarici\Pdo\Domain\Model\Student;
use ruannarici\Pdo\Domain\Repository\StudentRepository;
use ruannarici\Pdo\Infrastructure\Persistence\ConnectionCreator;

class PdoStudentRepository implements StudentRepository {
    private $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findAll(): array {
        $sql = "SELECT * FROM students";
        $statement = $this->pdo->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $students = [];

        foreach($result as $row) {
            $student = new Student($row['id'], $row['name'], new DateTimeImmutable($row['birthDate']));
            array_push($students, $student);
        }

        return $students;
    }

    public function findBirthAt(DateTimeImmutable $birthDate): array {
        $sql = "SELECT * FROM students WHERE birthDate = ':birthDate'";
        $statement = $this->pdo->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $students = [];

        foreach($result as $row) {
            $student = new Student($row['id'], $row['name'], new DateTimeImmutable($row['birthDate']));
            array_push($students, $student);
        }
        return $students;
    }

    public function save(Student $student): bool {
        $sql = "INSERT INTO students (name, birthDate) VALUES (':name', ':birthDate');";
        $prepareStatement = $this->pdo->prepare($sql);
        $prepareStatement->bindValue(':name', $student->getName());
        $prepareStatement->bindValue(':birthDate', $student->getBirthDate()->format('Y-m-d'));
        $success = $prepareStatement->execute();

        if ($success) {
            $student->setId($this->pdo->lastInsertId());
        }

        return $success;
    }

    public function update(Student $student): bool {
        $sql = "UPDATE students SET name = ':name', birthDate = ':birthDate' WHERE id = ':id';" ;
        $prepareStatement = $this->pdo->prepare($sql);
        $prepareStatement->bindValue(':name', $student->getName());
        $prepareStatement->bindValue(':birthDate', $student->getBirthDate()->format('Y-m-d'));
        $prepareStatement->bindValue(':id', $student->getId());
        return $prepareStatement->execute();
    }

    public function remove(Student $student): bool {
        $sql = "DELETE FROM students WHERE name = ':name' AND birthDate = ':birthDate';";
        $prepareStatement = $this->pdo->prepare($sql);
        $prepareStatement->bindValue(':name', $student->getName());
        $prepareStatement->bindValue(':birthDate', $student->getBirthDate()->format('Y-m-d'));
        return $prepareStatement->execute();
    }

}

?>