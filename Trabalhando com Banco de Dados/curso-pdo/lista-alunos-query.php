<?php
use ruannarici\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/BancoDeDados.sqlite';

$connection = new PDO('sqlite:' . $databasePath);

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

var_dump($studentsList);

?>