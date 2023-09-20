<?php

use ruannarici\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = $connection = ConnectionCreator::createConnection();

$sqlDelete = "
DELETE FROM students 
    WHERE id = :id
";

$prepareStatement = $pdo->prepare($sqlDelete);
$prepareStatement->bindValue(':id', 6, PDO::PARAM_INT);

$prepareStatement->execute();

?>