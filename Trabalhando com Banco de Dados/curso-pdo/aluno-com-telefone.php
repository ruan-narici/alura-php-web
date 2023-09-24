<?php

use ruannarici\Pdo\Infrastructure\Persistence\ConnectionCreator;
use ruannarici\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();

$pdoStudent = new PdoStudentRepository($connection);

$studentList = $pdoStudent->findAllWithPhones();

var_dump($studentList);

?>