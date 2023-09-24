<?php

namespace ruannarici\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator {
    public static function createConnection(): PDO {
        // $connection = new PDO('sqlite:' . __DIR__ . '../../../../BancoDeDados.sqlite');
        $connection = new PDO("mysql:host=localhost:3306;dbname=schoolphp", "root", "root");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
}

?>