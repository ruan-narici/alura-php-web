<?php

namespace ruannarici\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator {
    public static function createConnection(): PDO {
        return new PDO('sqlite:' . __DIR__ . '../../../../BancoDeDados.sqlite');
    }
}

?>