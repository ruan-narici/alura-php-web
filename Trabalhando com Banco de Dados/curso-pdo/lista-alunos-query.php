<?php
use ruannarici\Pdo\Domain\Model\Student;
use ruannarici\Pdo\Infrastructure\Persistence\ConnectionCreator;
use ruannarici\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = $connection = ConnectionCreator::createConnection();

$sqlSelect = "
SELECT *
    FROM students
";

$result = $connection->query($sqlSelect);
$studentsDataList = $result->fetchAll(PDO::FETCH_ASSOC);
$studentsList = [];

foreach($studentsDataList as $studentData) {
    $student = new Student(
        $studentData['id'],
        $studentData['name'],
        new DateTimeImmutable($studentData['birthDate'])
    );
    array_push($studentsList, $student);
}

// var_dump($studentsList);

$pdoStudentRepository = new PdoStudentRepository();
var_dump($pdoStudentRepository->findAll());

?>