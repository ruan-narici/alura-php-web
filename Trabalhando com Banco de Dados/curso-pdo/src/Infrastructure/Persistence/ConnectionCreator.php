<?php

namespace ruannarici\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator {
    public static function createConnection(): PDO {
        $connection = new PDO('sqlite:' . __DIR__ . '../../../../BancoDeDados.sqlite');
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
}

?>