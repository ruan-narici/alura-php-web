<?php

use ruannarici\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/BancoDeDados.sqlite';

$pdo = new PDO('sqlite:' . $databasePath);

$sqlDelete = "
DELETE FROM students 
    WHERE id = :id
";

$prepareStatement = $pdo->prepare($sqlDelete);
$prepareStatement->bindValue(':id', 2, PDO::PARAM_INT);

$prepareStatement->execute();

?>